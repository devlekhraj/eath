<template>
    <v-container>
        <v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">

            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
                            hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded size="large" variant="elevated">
                            <v-icon left>mdi-plus</v-icon> Add Blog
                        </v-btn>
                    </v-col>
                </v-row>
            </template>



            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>

            <template #item.title="{ item }">
                <div style="min-width: max-content;">
                    <span class="text-primary text-capitalize" :title="item.title">
                        {{ item.title }}
                    </span>
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
                <v-menu location="bottom end">
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
                </v-menu>
            </template>
        </v-data-table>
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


const filteredItems = computed(() => {
    if (!search.value) return blogList.value
    const term = search.value.toLowerCase()
    return blogList.value.filter(item =>
        item.title.toLowerCase().includes(term)
    )
})



const fetchBlogs = async () => {
    const resp = await axios.get('admin/blogs')
    blogList.value = resp.data
}

const deleteItem = (item) => {
    console.log({ item })
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
