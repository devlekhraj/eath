<template>
	<div>
		<!-- <div class="text-right mb-4">
			<v-btn color="primary" @click="handleOpen">
				<v-icon>mdi-plus</v-icon> Add Category
			</v-btn>
		</div> -->

		<v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
		:loading="fetching_data"
			:sort-desc="[false]">

			<template #top>
				<v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
					<v-col cols="12" sm="6" md="4" lg="3" xl="3">
						<v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search" />
					</v-col>

					<v-col cols="auto">
						<v-btn color="primary" @click="handleOpen">
							<v-icon left>mdi-plus</v-icon> Add Category
						</v-btn>
					</v-col>
				</v-row>
			</template>


			<template #item.sn="{ index }">
				<div style="min-width: max-content;">{{ index + 1 }}</div>
			</template>

			<template #item.name="{ item }">
				<div style="min-width: max-content;">
					<a href="#" class="text-primary text-capitalize text-decoration-underline" @click.prevent="handleOpen(item)">
						{{ item.name }}
					</a>
				</div>
			</template>

			<template #item.hierarchy="{ item }">
				<div style="min-width: max-content;">
					<span>{{ item.hierarchy_text }}</span>
				</div>
			</template>

			<template #item.is_active="{ item }">
				<div style="min-width: max-content;">
					<v-switch v-model="item.is_active" density="compact" color="success" @change="toggleActive(item)" />
				</div>
			</template>

			<template #item.actions="{ item }">
				<div class="d-flex align-center ga-2" style="min-width: max-content;">
					<v-btn size="x-small" color="primary" icon variant="tonal" @click="handleOpen(item)">
						<v-icon size="16">mdi-pencil</v-icon>
					</v-btn>
					<v-btn size="x-small" color="error" icon variant="tonal" @click="handleDelete(item)">
						<v-icon size="16">mdi-delete</v-icon>
					</v-btn>
				</div>
			</template>

		</v-data-table>

		<modal-template ref="globalModal" @saved="fetchCategories" @close="fetchCategories"></modal-template>
	</div>
</template>

<script setup>
import http from '@/http.config'
import { ref, onMounted, computed } from 'vue';
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
// Static headers
const headers = [
	{ title: 'SN', key: 'sn', sortable: false, width: '60px' },
	{ title: 'Category Name', key: 'name', sortable: false },
	{ title: 'Hierarchy', key: 'hierarchy', sortable: false },
	{ title: 'URL Slug', key: 'slug', sortable: false },
	{ title: 'Seq#', key: 'sort_order', sortable: false },
	{ title: 'Active', key: 'is_active', sortable: false },
	{ title: 'Action', key: 'actions', sortable: false },
];

// Refs
const categories = ref([]);
const globalModal = ref(null);
const search = ref('');


const filteredItems = computed(() => {
  if (!search.value) return categories.value
  const term = search.value.toLowerCase()
  return categories.value.filter(item =>
    item.name.toLowerCase().includes(term)
  )
})


import CategoryForm from './modal/CategoryForm.vue';
import CategoryDelete from './modal/CategoryDelete.vue';
// Method: Open modal
function handleOpen(item = {}) {
	globalModal.value.open({
		title: item ? 'Edit Category' : 'Add New Category',
		component: CategoryForm,
		size: 'md',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}
function handleDelete(item = {}) {
	globalModal.value.open({
		title: 'Delete Category',
		component: CategoryDelete,
		size: 'sm',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}

const fetching_data = ref(false);
// Fetch categories and compute hierarchy
async function fetchCategories() {
	try {
		fetching_data.value = true;
		const resp = await http.get('admin/package-categories');
		categories.value = resp.data.map((item) => {
			return {
				...item,
				hierarchy: item.parent
				? `${item.parent.name_en} > ${item.name_en}`
				: item.name_en,
			};
		});
		fetching_data.value = false;
	} catch (error) {
		fetching_data.value = false;
		console.error('Failed to load categories', error);
	}
}

async function toggleActive(item) {
	try {
		const resp = await http.patch(`admin/package-categories/${item.id}/toggle-active`, {
			is_active: item.is_active
		});
		showSuccess(resp.message);
	} catch (error) {
		showError(resp?.response?.data?.message || 'Failed to update status');
		item.is_active = !item.is_active; // Revert back if failed
		console.error('Failed to update status:', error);

	}
}
// Initial load
onMounted(() => {
	fetchCategories();
});
</script>

<style scoped></style>
