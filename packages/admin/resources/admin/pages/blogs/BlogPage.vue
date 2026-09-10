<template>
    <div>
        <v-data-table :headers="headers" 
        :loading="fetching_data"
        :items="filteredItems" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">

            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" @click="addBlog()">
                            <v-icon left>mdi-plus</v-icon> Add Blog
                        </v-btn>
                    </v-col>
                </v-row>
            </template>



            <template #item.sn="{ index }">
                <div style="min-width: max-content;">{{ index + 1 }}</div>
            </template>

            <template #item.category="{ item }">
                <div v-if="item?.category?.name" class="d-flex align-center ga-2" style="min-width: max-content;">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(item.category)"
                    ></span>
                    <span class="text-capitalize">{{ item.category.name }}</span>
                </div>
                <div v-else class="d-flex align-center ga-2 text-grey" style="min-width: max-content;">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(null)"
                    ></span>
                    <span>Uncategorized</span>
                </div>
            </template>

            <template #item.title="{ item }">
                <div class="d-flex align-center ga-3" style="min-width: max-content;">
                    <div v-if="item.banner_url" style="height: 40px; width: 40px;" class="rounded overflow-hidden flex-shrink-0">
                        <v-img :src="item.banner_url" height="40" width="40" cover />
                    </div>
                    <router-link :to="{ name: 'adminBlogDetailPage', query: { id: item.id } }" class="text-primary text-decoration-underline text-capitalize">
                        {{ item.title }}
                    </router-link>
                </div>
            </template>

            <template #item.status="{ item }">
                <div style="min-width: max-content;">
                    <v-chip
                        size="small"
                        label
                        class="text-capitalize"
                        :color="item.status ? 'success' : 'warning'"
                    >
                        <v-icon start size="16">
                            {{ item.status ? 'mdi-check-circle' : 'mdi-alert-circle' }}
                        </v-icon>
                        {{ item.status ? 'Active' : 'Draft' }}
                    </v-chip>
                </div>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center ga-2" style="min-width: max-content;">
                    <v-btn variant="tonal" icon size="x-small" color="primary" :to="{ name: 'adminBlogDetailPage', query: { id: item.id } }">
                        <v-icon size="16">mdi-eye</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" icon size="x-small" color="error" @click="deleteItem(item)">
                        <v-icon size="16">mdi-delete</v-icon>
                    </v-btn>
                </div>
            </template>
        </v-data-table>
        <modal-template ref="globalModal" @close="fetchBlogs"></modal-template>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { formatDate, formatDateTime, formatAmount, dotStyle } from '@/utils/utils'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
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
        const resp = await http.get('admin/blogs')
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
        const resp = await http.patch(`admin/blogs/${item.id}/toggle-active`, {
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
        const resp = await http.patch(`admin/blogs/${item.id}/toggle-publish`, {
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
