<template>
	<div>

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
							<v-icon left>mdi-plus</v-icon> Add Banner
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
			<template #item.slug="{ item }">
				<div style="min-width: 200px;">
					<span class="text-secondary">{{ item.slug }}</span>
				</div>
			</template>
			<template #item.is_active="{ item }">
				<div>
						<v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
							{{ item.is_active ? 'Active' : 'Inactive' }}
						</v-chip>
				</div>
			</template>
			<template #item.image_count="{ item }">
				<div style="min-width: 70px;">
					<v-chip :color="item.image_count ? 'green' : 'red'" dark size="small">
						{{ item.image_count ? item.image_count +' images': 'No Images' }}
					</v-chip>
				</div>
			</template>



			<template #item.actions="{ item }">
		
					<div style="min-width: 120px;">
						<v-btn size="x-small" icon variant="tonal" color="primary"
							:to="{name:'adminBannerDetailPage', params:{ id: item.id}}"><v-icon>mdi-eye</v-icon></v-btn>
						<v-btn size="x-small" icon variant="tonal" color="warning" class="ml-2"
							@click="handleOpen(item)"><v-icon>mdi-pencil</v-icon></v-btn>
						<v-btn size="x-small" icon variant="tonal" color="error" class="ml-2"
							@click="handleDelete(item)"><v-icon>mdi-delete</v-icon></v-btn>
					</div>
		
				
			</template>

		</v-data-table>

		<modal-template ref="globalModal" @saved="fetchBanners" @close="fetchBanners"></modal-template>
	</div>
</template>

<script setup>
import http from '@/http.config'
import { ref, onMounted, computed } from 'vue';
import { useSnackbar } from '@/composables/snackbar'
import { getBannersApi } from '@/api/banners.api'

const { showSuccess, showError } = useSnackbar()
// Static headers
const headers = [
	{ title: 'S.N.', key: 'sn', sortable: false },
	{ title: 'Banner Name', key: 'name', sortable: false },
	{ title: 'Slug', key: 'slug', sortable: false },
	{ title: 'Images', key: 'image_count', sortable: false },
	{ title: 'Active', key: 'is_active', sortable: false },
	{ title: 'Action', key: 'actions', sortable: false },
];

// Refs
const banners = ref([]);
const globalModal = ref(null);
const search = ref('');


const filteredItems = computed(() => {
  if (!search.value) return banners.value
  const term = search.value.toLowerCase()
  return banners.value.filter(item =>
    item.name.toLowerCase().includes(term)
  )
})


import BannerForm from './modal/BannerForm.vue';
import BannerDelete from './modal/BannerDelete.vue';
// Method: Open modal
function handleOpen(item = {}) {
	globalModal.value.open({
		title: item ? 'Edit Category' : 'Add New Category',
		component: BannerForm,
		size: 'md',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}
function handleDelete(item = {}) {
	globalModal.value.open({
		title: 'Delete Category',
		component: BannerDelete,
		size: 'sm',
		props: {
			item, // <-- correctly passed as a prop
		},
	});
}

const fetching_data = ref(false);

async function fetchBanners() {
	try {
		fetching_data.value = true;
		const resp = await getBannersApi();
		banners.value = resp?.data ?? resp ?? [];
	} catch (error) {
		console.error('Failed to load banners', error);
	} finally {
		fetching_data.value = false;
	}
}

async function toggleActive(item) {
	try {
		const resp = await http.patch(`admin/banners/${item.id}/toggle-active`, {
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
	fetchBanners();
});
</script>

<style scoped></style>
