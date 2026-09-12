<template>
    <div>
        <v-data-table
            :headers="headers"
            :loading="fetching_data"
            :items="filteredItems"
            :items-per-page="20"
            :sort-by="['title']"
            :sort-desc="[false]"
        >
            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field
                            v-model="search"
                            label="Search Articles"
                            clearable
                            density="compact"
                            variant="outlined"
                            hide-details
                            rounded="0"
                            prepend-inner-icon="mdi-magnify"
                            placeholder="Search by title..."
                        />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded="0" @click="addBlog()">
                            <v-icon start>mdi-plus</v-icon> Add Article
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.sn="{ index }">
                <div style="min-width: max-content;">{{ index + 1 }}</div>
            </template>

            <template #item.title="{ item }">
                <div class="d-flex align-center ga-3" style="min-width: max-content;">
                    <div v-if="item.banner_url" style="height: 36px; width: 36px;" class="overflow-hidden flex-shrink-0">
                        <v-img :src="item.banner_url" height="36" width="36" cover rounded="0" />
                    </div>
                    <router-link :to="{ name: 'adminArticleDetailPage', params: { id: item.id } }" class="text-primary text-decoration-underline text-capitalize">
                        {{ item.title }}
                    </router-link>
                </div>
            </template>

            <template #item.category="{ item }">
                <div v-if="item?.category?.name" class="d-flex align-center ga-2" style="min-width: max-content;">
                    <span class="d-inline-block flex-shrink-0 square-indicator" :style="squareStyle(item.category)"></span>
                    <span class="text-capitalize">{{ item.category.name }}</span>
                </div>
                <div v-else class="d-flex align-center ga-2 text-grey" style="min-width: max-content;">
                    <span class="d-inline-block flex-shrink-0 square-indicator" :style="squareStyle(null)"></span>
                    <span>Uncategorized</span>
                </div>
            </template>

            <template #item.author="{ item }">
                <div style="min-width: max-content;">
                    <span>{{ item.author_name || item.author || '—' }}</span>
                </div>
            </template>

            <template #item.status="{ item }">
                <div style="min-width: max-content;">
                    <v-chip
                        size="small"
                        label
                        rounded="0"
                        class="text-capitalize"
                        :color="item.is_active || item.status ? 'success' : 'warning'"
                    >
                        <v-icon start size="14">
                            {{ (item.is_active || item.status) ? 'mdi-check-circle' : 'mdi-alert-circle' }}
                        </v-icon>
                        {{ (item.is_active || item.status) ? 'Active' : 'Draft' }}
                    </v-chip>
                </div>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center justify-center ga-2" style="min-width: max-content;">
                    <v-btn variant="tonal" icon size="x-small" color="primary" rounded="0" :to="{ name: 'adminArticleDetailPage', params: { id: item.id } }">
                        <v-icon size="16">mdi-eye</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" icon size="x-small" color="error" rounded="0" @click="deleteItem(item)">
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
import http from '@/http.config'
import { dotStyle } from '@/utils/utils'
import { useSnackbar } from '@/composables/snackbar'
import ArticleAdd from './modal/ArticleAdd.vue'
import ArticleDelete from './modal/ArticleDelete.vue'

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
    { title: 'Title', key: 'title', sortable: false },
    { title: 'Category', key: 'category', sortable: false },
    { title: 'Author', key: 'author', sortable: false },
    { title: 'Status', key: 'status', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const blogList = ref([])
const search = ref('')
const globalModal = ref(null)
const fetching_data = ref(false)

const filteredItems = computed(() => {
    if (!search.value) return blogList.value
    const term = search.value.toLowerCase()
    return blogList.value.filter(item =>
        item.title?.toLowerCase().includes(term) ||
        item.category?.name?.toLowerCase().includes(term) ||
        item.author_name?.toLowerCase().includes(term)
    )
})

function squareStyle(category) {
    const style = dotStyle(category) || {}
    return {
        ...style,
        borderRadius: '0',
    }
}

function addBlog(item = {}) {
    globalModal.value.open({
        title: 'Add New Article',
        component: ArticleAdd,
        size: 'md',
        props: {
            item,
        },
    })
}

const fetchBlogs = async () => {
    try {
        fetching_data.value = true
        const resp = await http.get('admin/articles')
        fetching_data.value = false
        blogList.value = resp.data || []
    } catch (error) {
        console.error(error)
        fetching_data.value = false
    }
}

const deleteItem = (item) => {
    globalModal.value.open({
        title: 'Delete ' + item.title,
        component: ArticleDelete,
        size: 'sm',
        props: {
            item,
        },
    })
}

async function toggleActive(item) {
    try {
        const resp = await http.patch(`admin/articles/${item.id}/toggle-active`, {
            is_active: item.is_active
        })
        showSuccess(resp.message || 'Updated status')
        fetchBlogs()
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update')
        item.is_active = !item.is_active
        console.error('Failed to update status:', error)
    }
}

const togglePublished = async (item) => {
    try {
        const resp = await http.patch(`admin/articles/${item.id}/toggle-publish`, {
            is_published: item.is_published
        })
        showSuccess(resp.message || 'Updated publish status')
        fetchBlogs()
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update')
        item.is_published = !item.is_published
        console.error('Failed to update status:', error)
    }
}

onMounted(fetchBlogs)
</script>

<style scoped>
.square-indicator {
    width: 8px;
    height: 8px;
    border-radius: 0 !important;
}
</style>
