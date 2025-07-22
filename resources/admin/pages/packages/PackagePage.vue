<template>
    <v-container>
        <v-data-table :headers="headers" :items="travelPackages" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">
            <template #item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>

            <template #item.sn="{ index }">
                {{ index + 1 }}
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
                        <v-list-item @click="viewItem(item)">
                            <v-list-item-title>
                                <v-icon start icon="mdi-eye" class="mr-2" /> View Detail
                            </v-list-item-title>
                        </v-list-item>

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
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { formatDate, formatAmount } from '@/utils/format'
import PackageDelete from './modal/PackageDelete.vue'

const headers = [
    { title: 'SN', key: 'sn', sortable: true },
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
        console.log({resp});
        this.$toast?.success?.('Status updated successfully'); // Optional toast
    } catch (error) {
        item.is_active = !item.is_active; // Revert back if failed
        console.error('Failed to update status:', error);
        this.$toast?.error?.('Failed to update status');
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



function viewItem(item) {
    console.log('View item:', item)
}

onMounted(() => {
    fetchPackages()
})
</script>

<style scoped></style>
