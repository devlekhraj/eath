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
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="addBlog()">
                            <v-icon left>mdi-plus</v-icon> Add Blog
                        </v-btn>
                    </v-col>
                </v-row>
            </template>



            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>
            <template #item.category="{ item }">
                <div style="min-width: max-content;">   
                    <v-chip
                    
                        size="small"
                        :color="item.category?.name ? 'primary' : 'error'"
                        variant="tonal"
                        label
                        class="text-capitalize"
                    >
                        {{ item.category?.name || 'no category' }}
                    </v-chip>
                </div>
            </template>


            <template #item.title="{ item }">
                <div style="min-width:max-content">
                    <div class="d-flex align-center">
                        <div style="height: 50px; width: 50px;">
                            <v-img :src="item.banner_url" height="50" width="50" contain></v-img>
                        </div>
                        <div class="ml-4 blog-title-cell">
                            <p class="text-body-2 font-weight-medium text-high-emphasis text-capitalize mb-1" :title="item.title">
                                {{ item.title }}
                            </p>
                            <div class="d-flex align-center">
                                <p class="text-caption text-medium-emphasis mb-0 blog-url" :title="item.blog_url">
                                    {{ item.blog_url }}
                                </p>
                                <a
                                    v-if="item.blog_url"
                                    :href="item.blog_url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ml-1 d-inline-flex align-center text-medium-emphasis"
                                    :title="`Open ${item.blog_url}`"
                                >
                                    <v-icon size="12" color="primary">mdi-open-in-new</v-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template #item.status="{ item }">
                <div class="d-inline-flex align-center">
                    <span
                        class="status-dot mr-2"
                        :class="item.status ? 'bg-success' : 'bg-error'"
                    ></span>
                    <span
                        class="text-body-2"
                        :class="item.status ? 'text-success' : 'text-error'"
                    >
                        {{ item.status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </template>
            <template #item.actions="{ item }">
             
                <div class="width-max-content d-flex align-center">
                    <v-btn variant="tonal" icon size="x-small" color="primary" :to="{ name: 'adminBlogDetailPage', query: { id: item.id } }">
                        <v-icon>mdi-eye</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" class="ml-2" icon size="x-small" color="error" @click="deleteItem(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>

                </div>
            </template>
        </v-data-table>
        <modal-template ref="globalModal" @close="fetchBlogs"></modal-template>
    </div>
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
    { title: 'Category', key: 'category', sortable: false },
    { title: 'Status', key: 'status', sortable: false },
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

<style scoped>
/* .blog-title-cell {
    max-width: 420px;
} */

/* .blog-url {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
} */

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 999px;
    display: inline-block;
}
</style>
