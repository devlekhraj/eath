<template>
    <v-container>
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
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="addBlog()">
                            <v-icon left>mdi-plus</v-icon> Add Blog
                        </v-btn>
                    </v-col>
                </v-row>
            </template>



            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>
            <template #item.author="{ item }">
                <div style="min-width: max-content;">   
                    <v-avatar><v-icon size="32">mdi-account-circle</v-icon></v-avatar>
                    <span class="text-capitalize">
                        {{ item.author ? item.author : 'Admin' }}
                    </span>
                </div>
            </template>


            <template #item.title="{ item }">
                <div style="min-width: max-content;">
                    <div class="d-flex align-center">
                        <div style="height: 50px; width: 50px;">
                            <v-img :src="item.banner_url" height="50" width="50" contain></v-img>
                        </div>
                        <div class="ml-4">
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

            <template #item.published_at="{ item }">
                <div style="min-width: 140px;">
                    {{ formatDateTime(item.published_at) }}
                </div>
            </template>

            <template #item.is_active="{ item }">
                <v-switch v-model="item.is_active" density="compact" color="success" hide-details
                    @change="() => toggleActive(item)" />
            </template>

            <template #item.is_published="{ item }">
                <v-switch v-model="item.is_published" density="compact" color="success" hide-details
                    @change="() => togglePublished(item)" />
            </template>

            <template #item.actions="{ item }">
                <!-- <v-menu location="bottom end">
                    <template #activator="{ props }">
                        <v-btn v-bind="props" icon variant="text" color="primary">
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list density="compact" elevation="1">
                        <v-list-item :to="{ name: 'adminBlogForm', query: { id: item.id } }">
                            <v-list-item-title>
                                <v-icon start icon="mdi-pencil" class="mr-2" /> Edit Blog
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="() => deleteItem(item)">
                            <v-list-item-title>
                                <v-icon start icon="mdi-delete" class="mr-2" /> Delete Blog
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu> -->
                <div class="width-max-content d-flex align-center">
                    <v-btn variant="tonal" icon size="x-small" color="primary" :to="{ name: 'adminBlogForm', query: { id: item.id } }">
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" class="ml-2" icon size="x-small" color="error" @click="deleteItem(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>

                </div>
            </template>
        </v-data-table>
        <modal-template ref="globalModal" @close="fetchBlogs"></modal-template>
    </v-container>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import { formatDate, formatDateTime, formatAmount } from '@/utils/format'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'SN', key: 'sn', sortable: true },
    { title: 'Title', key: 'title', sortable: false },
    { title: 'Author', key: 'author', sortable: true },
    { title: 'Created', key: 'created_at', sortable: true },
    { title: 'Published', key: 'is_published', sortable: false },
    { title: 'Published On', key: 'published_at', sortable: false },
    { title: 'Active', key: 'is_active', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false },
]

const blogList = ref([])
const search = ref('');
const globalModal= ref(null);

const filteredItems = computed(() => {
    if (!search.value) return blogList.value
    const term = search.value.toLowerCase()
    return blogList.value.filter(item =>
        item.title.toLowerCase().includes(term)
    )
})

import BlogAdd from './modal/BlogAdd.vue'
import BlogDelete from './modal/BlogDelete.vue'
function addBlog(item = {}) {
    globalModal.value.open({
        title: 'Add New Blog',
        component: BlogAdd,
        size: 'md',
        props: {
            item, // <-- correctly passed as a prop
        },
    });
}

const fetching_data = ref(false);

const fetchBlogs = async () => {
    try {
        fetching_data.value = true;
        const resp = await axios.get('admin/blogs')
        fetching_data.value = false;
        blogList.value = resp.data
        
    } catch (error) {
        console.log(error);
        fetching_data.value = false;    
    }
}

const deleteItem = (item) => {

    globalModal.value.open({
        title: 'Delete '+item.title,
        component: BlogDelete,
        size: 'sm',
        props: {
            item, // <-- correctly passed as a prop
        },
    });

}

async function toggleActive(item) {
    try {
        const resp = await axios.patch(`admin/blogs/${item.id}/toggle-active`, {
            is_active: item.is_active
        });
        showSuccess(resp.message || 'success');
        fetchBlogs();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_active = !item.is_active; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}


const togglePublished = async (item) => {
    try {
        const resp = await axios.patch(`admin/blogs/${item.id}/toggle-publish`, {
            is_published: item.is_published
        });
        showSuccess(resp.message || 'success');
        fetchBlogs();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_published = !item.is_published; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}

onMounted(fetchBlogs)
</script>

<style scoped></style>
