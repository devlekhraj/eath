<template>
	<v-container>
		<!-- <div class="text-right mb-4">
			<v-btn size="large" color="primary" rounded @click="handleOpen">
				<v-icon>mdi-plus</v-icon> Add Category
			</v-btn>
		</div> -->

		<v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
			:sort-desc="[false]">

			<template #top>
				<v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
					<v-col cols="12" sm="6" md="4" lg="3" xl="3">
						<v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
							hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
					</v-col>

					<v-col cols="auto">
						<v-btn color="primary" rounded size="large" variant="elevated" @click="handleOpen">
							<v-icon left>mdi-plus</v-icon> Add Category
						</v-btn>
					</v-col>
				</v-row>
			</template>


			<template #item.sn="{ index }">
				{{ index + 1 }}
			</template>

			<template #item.name="{ item }">
				<div style="min-width: 250px;">
					<span class="text-primary text-capitalize">{{ item.name }}</span>
				</div>
			</template>

			<template #item.hierarchy="{ item }">
				<div style="min-width: 400px;">
					<span>{{ item.hierarchy_text }}</span>
				</div>
			</template>

			<!-- <template #item.is_active="{ item }">
        <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
          {{ item.is_active ? 'Active' : 'Inactive' }}
        </v-chip>
      </template> -->
			<template #item.is_active="{ item }">
				<div>
					<v-switch v-model="item.is_active" density="compact" color="success" hide-details
						@change="toggleActive(item)" />
				</div>
			</template>



			<template #item.actions="{ item }">
				<v-menu location="bottom end">
					<template #activator="{ props }">
						<v-btn v-bind="props" icon variant="text" color="primary">
							<v-icon>mdi-dots-vertical</v-icon>
						</v-btn>
					</template>

					<v-list density="compact" elevation="1">
						<!-- <v-list-item @click="viewItem(item)">
							<v-list-item-title>
								<v-icon start icon="mdi-eye" class="mr-2" /> View Detail
							</v-list-item-title>
						</v-list-item> -->

						<v-list-item @click="handleOpen(item)">
							<v-list-item-title>
								<v-icon start icon="mdi-pencil" class="mr-2" /> Edit Cateogry
							</v-list-item-title>
						</v-list-item>

						<v-list-item @click="handleDelete(item)">
							<v-list-item-title>
								<v-icon start icon="mdi-delete" class="mr-2" /> Delete Category
							</v-list-item-title>
						</v-list-item>
					</v-list>
				</v-menu>
			</template>

		</v-data-table>

		<modal-template ref="globalModal" @saved="fetchCategories" @close="fetchCategories"></modal-template>
	</v-container>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
// Static headers
const headers = [
	{ title: 'S.N.', key: 'sn', sortable: false },
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


// Fetch categories and compute hierarchy
async function fetchCategories() {
	try {
		const resp = await axios.get('admin/package-categories');
		categories.value = resp.data.map((item) => {
			return {
				...item,
				hierarchy: item.parent
					? `${item.parent.name_en} > ${item.name_en}`
					: item.name_en,
			};
		});
	} catch (error) {
		console.error('Failed to load categories', error);
	}
}

async function toggleActive(item) {
	try {
		const resp = await axios.patch(`admin/package-categories/${item.id}/toggle-active`, {
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
