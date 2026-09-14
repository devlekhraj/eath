<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-3 px-4">
            <div>
                <span class="text-h6 font-weight-bold">Travel Months</span>
                <div class="text-caption text-slate-600">Manage 12 seasonal trekking windows and planning conditions across Nepal.</div>
            </div>
        </v-card-title>
        <v-divider />

        <v-data-table
            :headers="headers"
            :items="months"
            :items-per-page="12"
            :loading="fetching_data"
            class="elevation-0"
        >
            <template #item.month_number="{ item }">
                <span class="font-mono text-caption text-slate-500">#{{ item.month_number }}</span>
            </template>

            <template #item.name="{ item }">
                <div>
                    <a href="#" class="text-primary text-decoration-underline" @click.prevent="handleOpen(item)">
                        {{ item.name }}
                    </a>
                </div>
            </template>

            <template #item.season="{ item }">
                <v-chip
                    size="small"
                    label
                    class="text-uppercase"
                    :color="getSeasonColor(item.season)"
                >
                    {{ item.season }}
                </v-chip>
            </template>

            <template #item.conditions_note="{ item }">
                <div class="text-caption text-slate-600 text-truncate" style="max-width: 380px;">
                    {{ item.conditions_note || item.summary || '—' }}
                </div>
            </template>

            <template #item.journeys_count="{ item }">
                <span class="text-caption">
                    {{ item.journeys_count ?? 0 }} Journeys
                </span>
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
                    {{ item.is_active ? 'Active' : 'Disabled' }}
                </v-chip>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center justify-center">
                    <v-btn size="small" color="primary" variant="outlined" @click="handleOpen(item)" title="Edit month details">
                        <v-icon start size="14">mdi-pencil</v-icon>
                        Edit
                    </v-btn>
                </div>
            </template>

            <template #no-data>
                <v-alert type="info" variant="tonal" border="start" class="my-4">
                    No travel months found.
                </v-alert>
            </template>
        </v-data-table>
    </v-card>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import Form from '@/modal-form/travel-months/Form.vue'
import { getTravelMonthsApi, toggleTravelMonthActiveApi } from '@/api/travel-months.api'

const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const headers = [
    { title: 'No.', key: 'month_number', sortable: true },
    { title: 'Month', key: 'name', sortable: true },
    { title: 'Season', key: 'season', sortable: true },
    { title: 'Conditions & Weather Notes', key: 'conditions_note', sortable: false },
    { title: 'Journeys', key: 'journeys_count', sortable: true },
    { title: 'Status', key: 'is_active', sortable: true },
    { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const months = ref([])
const fetching_data = ref(false)

const getSeasonColor = (season) => {
    switch (season) {
        case 'spring':
            return 'success'
        case 'autumn':
            return 'primary'
        case 'summer':
            return 'warning'
        case 'winter':
            return 'info'
        default:
            return 'secondary'
    }
}

function handleOpen(item) {
    openModal({
        title: `Edit ${item.name}`,
        component: Form,
        size: 'md',
        props: {
            item,
        },
    })
}

async function fetchMonths() {
    try {
        fetching_data.value = true
        const resp = await getTravelMonthsApi()
        months.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to load travel months', error)
        showError('Failed to load travel months')
    } finally {
        fetching_data.value = false
    }
}

async function toggleActive(item) {
    try {
        const resp = await http.patch(`admin/travel-months/${item.id}/toggle-active`)
        item.is_active = !item.is_active
        showSuccess(resp.data?.message ?? resp.message ?? 'Status updated successfully')
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update status')
        console.error('Failed to update status:', error)
    }
}

onMounted(() => {
    fetchMonths()
})
</script>
