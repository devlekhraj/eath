<template>
    <div>
        <v-data-table :headers="headers" 
        :loading="fetching_data"
        :items="filteredItems" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">

            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
                            hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="addPage()">
                            <v-icon left>mdi-plus</v-icon> Add New Page
                        </v-btn>
                    </v-col>
                </v-row>
            </template>



            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>
           

            <template #item.title="{ item }">
                <div style="min-width: max-content;">
                    <div class="d-flex align-center">
                        
                        <div>
                            <span class="text-primary text-capitalize" :title="item.title">
                                {{ item.title }}
                            </span>
                        </div>
                    </div>
                </div>
            </template>




            <template #item.created_at="{ item }">
                <div style="min-width: 80px;">
                    {{ formatDate(item.created_at) }}
                </div>
            </template>


            <template #item.is_active="{ item }">
                <v-switch v-model="item.is_active" density="compact" color="success" hide-details
                    @change="() => toggleActive(item)" />
            </template>


            <template #item.actions="{ item }">
                <!-- <v-menu location="bottom end">
                    <template #activator="{ props }">
                        <v-btn v-bind="props" icon variant="text" color="primary">
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list density="compact" elevation="1">
                        <v-list-item :to="{ name: 'adminWebPageDetail', params: { id: item.id } }">
                            <v-list-item-title>
                                <v-icon start icon="mdi-pencil" class="mr-2" /> Edit Page
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="() => deleteItem(item)">
                            <v-list-item-title>
                                <v-icon start icon="mdi-delete" class="mr-2" /> Delete Page
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu> -->
                <div>
                    <v-btn size="x-small" icon variant="tonal" color="primary" :to="{ name: 'adminWebPageDetail', params: { id: item.id } }"><v-icon>mdi-pencil</v-icon></v-btn>
                    <v-btn size="x-small" icon variant="tonal" color="error" class="ml-2" @click="deleteItem(item)"><v-icon>mdi-delete</v-icon></v-btn>
                </div>
            </template>
        </v-data-table>
        <modal-template ref="globalModal" @close="fetchData"></modal-template>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import http from '@/http.config'
import { formatDate, formatDateTime, formatAmount } from '@/utils/format'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'SN', key: 'sn', sortable: true },
    { title: 'Title', key: 'title', sortable: false },
    { title: 'Slug', key: 'slug', sortable: false },
    { title: 'Active', key: 'is_active', sortable: false },
    { title: 'Created At', key: 'created_at', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false },
]

const data_list = ref([])
const search = ref('');
const globalModal= ref(null);

const filteredItems = computed(() => {
    if (!search.value) return data_list.value
    const term = search.value.toLowerCase()
    return data_list.value.filter(item =>
        item.title.toLowerCase().includes(term)
    )
})

import PageForm from './modal/PageForm.vue'
import PageDelete from './modal/PageDelete.vue'
function addPage(item = {}) {
    globalModal.value.open({
        title: 'Add New Blog',
        component: PageForm,
        size: 'md',
        props: {
            item, // <-- correctly passed as a prop
        },
    });
}

const fetching_data = ref(false);

const fetchData = async () => {
    try {
        fetching_data.value = true;
        const resp = await http.get('admin/pages')
        fetching_data.value = false;
        data_list.value = resp.data
        
    } catch (error) {
        console.log(error);
        fetching_data.value = false;    
    }
}

const deleteItem = (item) => {

    globalModal.value.open({
        title: 'Delete '+item.title,
        component: PageDelete,
        size: 'sm',
        props: {
            item, // <-- correctly passed as a prop
        },
    });

}

async function toggleActive(item) {
    try {
        const resp = await http.patch(`admin/pages/${item.id}/toggle-active`, {
            is_active: item.is_active
        });
        showSuccess(resp.message || 'success');
        fetchData();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_active = !item.is_active; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}


const togglePublished = async (item) => {
    try {
        const resp = await http.patch(`admin/blogs/${item.id}/toggle-publish`, {
            is_published: item.is_published
        });
        showSuccess(resp.message || 'success');
        fetchData();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_published = !item.is_published; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}

onMounted(fetchData)
</script>

<style scoped></style>
