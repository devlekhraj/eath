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
                            hide-details
                            prepend-inner-icon="mdi-magnify"
                            placeholder="Search by title..."
                        />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" @click="addArticle()">
                            <v-icon start>mdi-plus</v-icon> Add Article
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.sn="{ index }">
                <div>{{ index + 1 }}</div>
            </template>

            <template #item.title="{ item }">
                <div class="d-flex align-center ga-3">
                    <div v-if="item.banner_url" style="height: 36px; width: 36px;" class="overflow-hidden flex-shrink-0">
                        <v-img :src="item.banner_url" height="36" width="36" cover />
                    </div>
                    <router-link :to="{ name: 'adminArticleDetailPage', params: { id: item.id } }" class="text-primary text-decoration-underline text-capitalize">
                        {{ item.title }}
                    </router-link>
                </div>
            </template>

            <template #item.category="{ item }">
                <div v-if="item?.category?.name" class="d-flex align-center ga-2">
                    <span class="d-inline-block flex-shrink-0 square-indicator" :style="squareStyle(item.category)"></span>
                    <span class="text-capitalize">{{ item.category.name }}</span>
                </div>
                <div v-else class="d-flex align-center ga-2 text-grey">
                    <span class="d-inline-block flex-shrink-0 square-indicator" :style="squareStyle(null)"></span>
                    <span>Uncategorized</span>
                </div>
            </template>

            <template #item.author="{ item }">
                <div>
                    <span>{{ item.author_name || item.author || '—' }}</span>
                </div>
            </template>

            <template #item.status="{ item }">
                <div>
                    <v-chip
                        size="small"
                        label
                        class="text-uppercase"
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
                <div class="d-flex align-center justify-center ga-1">
                    <v-btn size="small" color="primary" variant="outlined" :to="{ name: 'adminArticleDetailPage', params: { id: item.id } }" title="View article">
                        <v-icon start size="14">mdi-eye</v-icon>
                        View
                    </v-btn>
                    <v-btn size="small" color="error" variant="outlined" @click="deleteItem(item)" title="Delete article">
                        <v-icon start size="14">mdi-delete</v-icon>
                        Delete
                    </v-btn>
                </div>
            </template>
        </v-data-table>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { dotStyle } from '@/utils/utils'
import { useGlobalModal } from '@/composables/globalModal'
import ArticleAdd from './modal/ArticleAdd.vue'
import ArticleDelete from './modal/ArticleDelete.vue'
import { getArticlesApi } from '@/api/articles.api'

const { open: openModal } = useGlobalModal()


const headers = [
    { title: 'SN', key: 'sn', sortable: false },
    { title: 'Title', key: 'title', sortable: false },
    { title: 'Category', key: 'category', sortable: false },
    { title: 'Author', key: 'author', sortable: false },
    { title: 'Status', key: 'status', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const articles = ref([])
const search = ref('')
const fetching_data = ref(false)

const filteredItems = computed(() => {
    if (!search.value) return articles.value
    const term = search.value.toLowerCase()
    return articles.value.filter(item =>
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

function addArticle(item = {}) {
    openModal({
        title: 'Add New Article',
        component: ArticleAdd,
        size: 'md',
        props: {
            item,
        },
        onClose: fetchArticles,
    })
}

const fetchArticles = async () => {
    try {
        fetching_data.value = true
        const resp = await getArticlesApi()
        fetching_data.value = false
        articles.value = resp.data || []
    } catch (error) {
        console.error(error)
        fetching_data.value = false
    }
}

const deleteItem = (item) => {
    openModal({
        title: 'Delete ' + item.title,
        component: ArticleDelete,
        size: 'sm',
        props: {
            item,
        },
        onClose: fetchArticles,
    })
}

onMounted(fetchArticles)
</script>

<style scoped>
.square-indicator {
    width: 8px;
    height: 8px;
    border-radius: 0 !important;
}
</style>
