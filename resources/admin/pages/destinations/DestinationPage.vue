<template>
    <div>


        <v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
            :loading="fetching_data" :sort-desc="[false]">

            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
                            hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="handleOpen">
                            <v-icon left>mdi-plus</v-icon> Add Destination
                        </v-btn>
                    </v-col>
                </v-row>
            </template>


            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>

            <template #item.name="{ item }">
                <div style="min-width: 150px;">
                    <span class="text-primary text-capitalize">{{ item.name }}</span>
                </div>
            </template>

            <template #item.slug="{ item }">
                <div class="d-flex align-center" style="min-width: 280px;">
                    <span class="text-medium-emphasis">
                        {{ item.slug ? `${publicBaseUrl}/destinations/${item.slug}` : '' }}
                    </span>
                    <v-btn
                        v-if="item.slug"
                        size="x-small"
                        class="ml-2"
                        color="primary"
                        icon
                        variant="tonal"
                        :href="`${publicBaseUrl}/destinations/${item.slug}`"
                        target="_blank"
                        rel="noopener"
                    >
                        <v-icon>mdi-open-in-new</v-icon>
                    </v-btn>
                </div>
            </template>

            <template #item.images="{ item }">
                <div class="d-flex align-center" style="min-width: 180px;">
                    <v-avatar size="36" class="mr-3" rounded="sm">
                        <v-img v-if="item.thumb" :src="item.thumb" cover/>
                        <v-icon v-else>mdi-image-off-outline</v-icon>
                    </v-avatar>
                    <span class="text-caption text-medium-emphasis">
                        {{ item.image_count ?? 0 }} image{{ (item.image_count ?? 0) === 1 ? '' : 's' }}
                    </span>
                </div>
            </template>

            <template #item.treks_count="{ item }">
                <div style="min-width: 80px;">
                    <span class="text-caption text-medium-emphasis">
                        {{ item.treks_count ?? 0 }} Treks
                    </span>
                </div>
            </template>


            <template #item.is_active="{ item }">
                  <div style="min-width: 80px;">
                  
                        <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
                            {{ item.is_active ? 'Active' : 'Inactive' }}
                        </v-chip>
                </div>
            </template>



            <template #item.actions="{ item }">
                <div style="width: max-content;">

                    <v-btn size="x-small" class="ml-2" color="primary" icon variant="tonal"
                    :to="{ name: 'admin.destination.detail', params: { id: item.id } }"
                    ><v-icon>mdi-eye</v-icon></v-btn>

                    <v-btn size="x-small" class="ml-2" color="error" icon variant="tonal"
                        @click="handleDelete(item)"><v-icon>mdi-delete</v-icon></v-btn>
                </div>
            </template>

        </v-data-table>

        <modal-template ref="globalModal" @saved="fetchCategories" @close="fetchCategories"></modal-template>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
const publicBaseUrl = window?.location?.origin ?? ''
// Static headers
const headers = [
    { title: 'S.N.', key: 'sn', sortable: false },
    { title: 'Category Name', key: 'name', sortable: false },
    { title: 'URL Slug', key: 'slug', sortable: false },
    { title: 'Images', key: 'images', sortable: false },
    { title: 'Treks', key: 'treks_count', sortable: false },
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


import Form from './modal/Form.vue';
import FormDelete from './modal/FormDelete.vue';
// Method: Open modal
function handleOpen(item = {}) {
    globalModal.value.open({
        title: item ? 'Edit Category' : 'Add New Category',
        component: Form,
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
// Fetch categories and compute hierarchy
async function fetchCategories() {
    try {
        fetching_data.value = true;
        const resp = await axios.get('admin/destinations');
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
