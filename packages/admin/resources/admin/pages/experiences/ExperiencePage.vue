<template>
    <v-card>
        <v-data-table
            :headers="headers"
            :items="filteredItems"
            :items-per-page="20"
            :sort-by="['sort_order', 'name']"
            :loading="fetching_data"
            class="elevation-0"
        >
            <template #top>
                <v-row class="px-4 py-3" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4">
                        <v-text-field
                            v-model="search"
                            label="Search experiences..."
                            clearable
                            prepend-inner-icon="mdi-magnify"
                            hide-details
                        />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" variant="flat" @click="handleOpen()">
                            <v-icon start>mdi-plus</v-icon> Add Experience
                        </v-btn>
                    </v-col>
                </v-row>
                <v-divider />
            </template>

            <template #item.sn="{ index }">
                <span class="text-caption text-slate-500">{{ index + 1 }}</span>
            </template>

            <template #item.name="{ item }">
                <a href="#" class="text-primary text-decoration-underline" @click.prevent="handleOpen(item)">
                    {{ item.name }}
                </a>
            </template>

            <template #item.journeys_count="{ item }">
                <span class="text-caption">
                    {{ item.journeys_count ?? 0 }} Journeys
                </span>
            </template>

            <template #item.sort_order="{ item }">
                <span class="text-caption">{{ item.sort_order ?? 0 }}</span>
            </template>

            <template #item.is_featured="{ item }">
                <v-chip
                    size="small"
                    label
                    class="text-uppercase"
                    :color="item.is_featured ? 'primary' : 'secondary'"
                >
                    {{ item.is_featured ? 'Featured' : 'Standard' }}
                </v-chip>
            </template>

            <template #item.is_active="{ item }">
                <v-chip
                    size="small"
                    label
                    class="text-uppercase"
                    :color="item.is_active ? 'success' : 'secondary'"
                    @click="toggleActive(item)"
                    style="cursor: pointer;"
                >
                    {{ item.is_active ? 'Active' : 'Draft' }}
                </v-chip>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center justify-center ga-1">
                    <v-btn size="small" color="primary" variant="outlined" @click="handleOpen(item)" title="Edit experience">
                        <v-icon start size="14">mdi-pencil</v-icon>
                        Edit
                    </v-btn>
                    <v-btn size="small" color="error" variant="outlined" @click="handleDelete(item)" title="Delete experience">
                        <v-icon start size="14">mdi-delete</v-icon>
                        Delete
                    </v-btn>
                </div>
            </template>

            <template #no-data>
                <v-alert type="info" variant="tonal" border="start" class="my-4">
                    No experiences found. Click "Add Experience" above to create tags.
                </v-alert>
            </template>
        </v-data-table>
    </v-card>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import Form from './modal/Form.vue'
import FormDelete from './modal/FormDelete.vue'
import { getExperiencesApi, toggleExperienceActiveApi } from '@/api/experiences.api'

const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'SN', key: 'sn', sortable: false },
    { title: 'Experience Name', key: 'name', sortable: true },
    { title: 'Journeys', key: 'journeys_count', sortable: true },
    { title: 'Sort Order', key: 'sort_order', sortable: true },
    { title: 'Featured', key: 'is_featured', sortable: true },
    { title: 'Status', key: 'is_active', sortable: true },
    { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const experiences = ref([])
const search = ref('')
const fetching_data = ref(false)

const filteredItems = computed(() => {
    if (!search.value) return experiences.value
    const term = search.value.toLowerCase()
    return experiences.value.filter((item) =>
        item.name?.toLowerCase().includes(term) ||
        item.slug?.toLowerCase().includes(term) ||
        item.summary?.toLowerCase().includes(term)
    )
})

function handleOpen(item = null) {
    openModal({
        title: item?.id ? 'Edit Experience' : 'Add Experience',
        component: Form,
        size: 'md',
        props: {
            item: item || {},
        },
    })
}

function handleDelete(item = {}) {
    openModal({
        title: 'Delete Experience',
        component: FormDelete,
        size: 'sm',
        props: {
            item,
        },
    })
}

async function fetchExperiences() {
    try {
        fetching_data.value = true
        const resp = await getExperiencesApi()
        experiences.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to load experiences', error)
        showError('Failed to load experiences')
    } finally {
        fetching_data.value = false
    }
}

async function toggleActive(item) {
    try {
        const resp = await http.patch(`admin/experiences/${item.id}/toggle-active`)
        item.is_active = !item.is_active
        showSuccess(resp.data?.message ?? resp.message ?? 'Status updated successfully')
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update status')
        console.error('Failed to update status:', error)
    }
}

onMounted(() => {
    fetchExperiences()
})
</script>
