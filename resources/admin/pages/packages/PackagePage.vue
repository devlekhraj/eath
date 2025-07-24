<template>
    <v-container>
        <v-data-table :headers="headers" :items="filteredItems" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">
            <!-- Top slot: search box left, add button right -->
            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable hide-details
                            prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="addNewItem">
                            <v-icon left>mdi-plus</v-icon> Add Package
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>

            <template #item.sn="{ index }">
                {{ index + 1 }}
            </template>
            <template #item.created_at="{ item }">
                {{ formatDate(item.created_at) }}
            </template>

            <template #item.name="{ item }">
                <span class="text-primary">{{ item.name }}</span>
            </template>

            <template #item.end_date="{ item }">
                {{ formatDate(item.end_date) }}
            </template>

            <template #item.duration_days="{ item }">
                <span class="text-primary" style="font-size: small; font-weight: 600;">
                    {{ item.duration_days }} days
                </span>
            </template>

            <template #item.price="{ item }">
                <span>{{ formatAmount(item.price) }}</span>
            </template>

            <template #item.is_active="{ item }">
                <div>
                    <v-switch v-model="item.is_active" density="compact" color="success" hide-details
                        @change="toggleActive(item)" />
                </div>
            </template>

            <template #item.is_featured="{ item }">
                <v-chip :color="item.is_featured ? 'blue' : 'grey'" dark size="small">
                    {{ item.is_featured ? 'Featured' : 'No' }}
                </v-chip>
            </template>

            <template #item.actions="{ item }">
                <v-menu location="bottom end">
                    <template #activator="{ props }">
                        <v-btn v-bind="props" icon variant="text" color="primary">
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list density="compact" elevation="1">

                        <v-list-item :to="{ name: 'adminPackageForm', query: { id: item.id } }">
                            <v-list-item-title>
                                <v-icon start icon="mdi-pencil" class="mr-2" /> Edit
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="deleteItem(item)">
                            <v-list-item-title>
                                <v-icon start icon="mdi-delete" class="mr-2" /> Delete
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </template>
        </v-data-table>

        <modal-template ref="globalModal" @saved="fetchPackages" @close="fetchPackages" />
    </v-container>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import { formatDate, formatAmount } from '@/utils/format'
import PackageDelete from './modal/PackageDelete.vue'

import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()


const headers = [
    { title: 'SN', key: 'sn', sortable: true },
    { title: 'Created', key: 'created_at', sortable: false },
    { title: 'Name', key: 'name', sortable: false },
    { title: 'Duration', key: 'duration_days', sortable: true },
    { title: 'Price (USD)', key: 'price', sortable: true },
    { title: 'Start Date', key: 'start_date', sortable: false },
    { title: 'End Date', key: 'end_date', sortable: false },
    { title: 'Active', key: 'is_active', sortable: false },
    { title: 'Featured', key: 'is_featured', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false },
]

const travelPackages = ref([])
const globalModal = ref(null);
const search = ref('');


const filteredItems = computed(() => {
  if (!search.value) return travelPackages.value
  const term = search.value.toLowerCase()
  return travelPackages.value.filter(item =>
    item.name.toLowerCase().includes(term)
  )
})


function addNewItem() {
  // Your add item logic here
  console.log('Add clicked')
}

async function fetchPackages() {
    try {
        const resp = await axios.get('admin/travel-packages')
        travelPackages.value = resp.data
    } catch (error) {
        console.error('Failed to fetch travel packages', error)
    }
}

async function toggleActive(item) {
    try {
        const resp = await axios.patch(`admin/travel-packages/${item.id}/toggle-active`, {
            is_active: item.is_active
        });
        console.log({ resp });
        showSuccess(resp.message || 'success');
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_active = !item.is_active; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}

function deleteItem(item) {
    globalModal.value.open({
        title: 'Delete Category',
        component: PackageDelete,
        size: 'sm',
        props: {
            item, // <-- correctly passed as a prop
        },
    });
}


onMounted(() => {
    fetchPackages()
})
</script>

<style scoped></style>