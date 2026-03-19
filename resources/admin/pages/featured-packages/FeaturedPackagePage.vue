<template>
	<div class="">
		<v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
		:loading="fetching_data"
			:sort-desc="[false]">

			<template #top>
				<v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
					<v-col cols="12" sm="6" md="4" lg="3" xl="3">
						<v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
							hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
					</v-col>

					<v-col cols="auto">
						<v-btn color="primary" rounded size="large" variant="elevated" @click="handleOpen">
							<v-icon left>mdi-plus</v-icon> create
						</v-btn>
					</v-col>
				</v-row>
			</template>


			<template #item.sn="{ index }">
				{{ index + 1 }}
			</template>

			<template #item.title="{ item }">
				<div style="min-width: 250px;" class="d-flex align-center">
					<div style="height: 34px; width: 34px;" >
						<v-img :src="item.banner_url" ></v-img>
					</div>
					<span class="text-primary text-capitalize ml-2">{{ item.title }}</span>
				</div>
			</template>

			<template #item.hierarchy="{ item }">
				<div style="min-width: 400px;">
					<span>{{ item.hierarchy_text }}</span>
				</div>
			</template>

			<template #item.is_active="{ item }">
				<div>
					<v-switch v-model="item.is_active" density="compact" color="success" hide-details
						@change="toggleActive(item)" />
				</div>
			</template>



			<template #item.actions="{ item }">
				<div>
					<v-btn size="x-small" icon variant="tonal" color="primary" @click="handleOpen(item)"><v-icon>mdi-pencil</v-icon></v-btn>
					<v-btn size="x-small" icon variant="tonal" color="error" class="ml-2" @click="handleDelete(item)"><v-icon>mdi-delete</v-icon></v-btn>
				</div>
			</template>

		</v-data-table>

		<modal-template ref="globalModal" @saved="fetchData" @close="fetchData"></modal-template>
	</div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
// Static headers
const headers = [
	{ title: 'S.N.', key: 'sn', sortable: false },
	{ title: 'Title', key: 'title', sortable: false },
	{ title: 'Duration', key: 'duration', sortable: false },
	{ title: 'Start Date', key: 'start_date', sortable: false },
	{ title: 'End Date', key: 'end_date', sortable: false },
	{ title: 'Active', key: 'is_active', sortable: false },
	{ title: 'Action', key: 'actions', sortable: false },
];

// Refs
const data_list = ref([]);
const globalModal = ref(null);
const search = ref('');


const filteredItems = computed(() => {
  if (!search.value) return data_list.value
  const term = search.value.toLowerCase()
  return data_list.value.filter(item =>
    item.name.toLowerCase().includes(term)
  )
})


import FormAdd from './modal/FormAdd.vue';
import FormDelete from './modal/FormDelete.vue';
// Method: Open modal
function handleOpen(item = {}) {
	globalModal.value.open({
		title: item ? 'Edit Category' : 'Add New Category',
		component: FormAdd,
		size: 'md',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}
function handleDelete(item = {}) {
	globalModal.value.open({
		title: 'Delete Category',
		component: FormDelete,
		size: 'sm',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}

const fetching_data = ref(false);
// Fetch data_list and compute hierarchy
async function fetchData() {
	try {
		fetching_data.value = true;
		const resp = await http.get('admin/featured-packages');
		data_list.value = resp.data;
		fetching_data.value = false;
	} catch (error) {
		fetching_data.value = false;
		console.error('Failed to load data_list', error);
	}
}

async function toggleActive(item) {
	try {
		const resp = await http.patch(`admin/featured-packages/${item.id}/toggle-active`, {
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
	fetchData();
});
</script>

<style scoped></style>
