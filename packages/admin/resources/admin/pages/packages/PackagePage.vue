<template>
    <div>
        <v-data-table-server
            :headers="headers"
            :items="travelPackages"
            :loading="fetching_data"
            :items-per-page="itemsPerPage"
            :items-length="totalItems"
            :sort-by="['name']"
            :sort-desc="[false]"
            v-model:page="page"
            v-model:items-per-page="itemsPerPage"
            @update:options="handleOptions"
        >
            <!-- Top slot: search box left, add button right -->
            <template #top>
                <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                    <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                        <v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" @click="addPackage">
                            <v-icon left>mdi-plus</v-icon> Add Package
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.start_date="{ item }">
                <div style="min-width: max-content;">{{ formatDate(item.start_date) }}</div>
            </template>

            <template #item.sn="{ index }">
                <div style="min-width: max-content;">{{ (page - 1) * itemsPerPage + index + 1 }}</div>
            </template>

            <template #item.name="{ item }">
                <div style="min-width: max-content;">
                    <router-link :to="{ name: 'adminPackageForm', query: { id: item.id } }" class="text-primary text-decoration-underline">
                        {{ item.name }}
                    </router-link>
                </div>
            </template>

            <template #item.region="{ item }">
                <div v-if="item?.destination?.name" class="d-flex align-center ga-2" style="min-width: max-content;">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(item.destination)"
                    ></span>
                    <span class="text-capitalize">{{ item.destination.name }}</span>
                </div>
                <div v-else class="d-flex align-center ga-2 text-grey" style="min-width: max-content;">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(null)"
                    ></span>
                    <span>Not Assigned</span>
                </div>
            </template>

            <template #item.duration_days="{ item }">
                <div style="min-width: max-content;">
                    <span class="text-primary">
                        {{ item.duration_days }} days
                    </span>
                </div>
            </template>

            <template #item.price="{ item }">
                <div style="min-width: max-content;">
                    {{ formatAmount(item.price) }}
                </div>
            </template>

            <template #item.is_active="{ item }">
                <div style="min-width: max-content;">
                    <v-chip size="small" label class="text-capitalize" :color="item.is_active ? 'success' : 'warning'">
                        <v-icon start size="16">{{ item.is_active ? 'mdi-check-circle' : 'mdi-alert-circle' }}</v-icon>
                        {{ item.is_active ? 'Active' : 'Draft' }}
                    </v-chip>
                </div>
            </template>

            <template #item.is_featured="{ item }">
                <div style="min-width: max-content;">
                    <v-chip size="small" label class="text-capitalize" :color="item.is_featured ? 'success' : 'warning'">
                        <v-icon start size="16">{{ item.is_featured ? 'mdi-check-circle' : 'mdi-alert-circle' }}</v-icon>
                        {{ item.is_featured ? 'Yes' : 'No' }}
                    </v-chip>
                </div>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center ga-2" style="min-width: max-content;">
                    <v-btn variant="tonal" icon size="x-small" color="primary" :to="{ name: 'adminPackageForm', query: { id: item.id } }">
                        <v-icon size="16">mdi-eye</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" icon size="x-small" color="error" @click="deleteItem(item)">
                        <v-icon size="16">mdi-delete</v-icon>
                    </v-btn>
                </div> <!-- <v-menu location="bottom"> <template #activator="{ props }"> <div style="width: max-content;"> <v-btn v-bind="props" icon variant="text" color="primary"> <v-icon>mdi-dots-vertical</v-icon> </v-btn> </div> </template>

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
                </v-menu> -->
            </template>
        </v-data-table-server>

        <modal-template ref="globalModal" @saved="fetchPackages" @close="fetchPackages" />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import http from '@/http.config'
import { formatDate, formatAmount, formatDateTime, dotStyle } from '@/utils/utils'
import PackageDelete from './modal/PackageDelete.vue'
import PackageAdd from './modal/PackageAdd.vue'

import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()


const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
    // { title: 'Created', key: 'created_at', sortable: false },
    { title: 'Name', key: 'name', sortable: false },
    { title: 'Region', key: 'region', sortable: false,  },
    { title: 'Active', key: 'is_active', sortable: false,  },
    { title: 'Featured', key: 'is_featured', sortable: false,  },
    // { title: 'Published', key: 'is_published', sortable: false },
    // { title: 'Published On', key: 'published_at', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false, width: '100px', align: 'end' },
]

const travelPackages = ref([])
const page = ref(1)
const itemsPerPage = ref(20)
const totalItems = ref(0)
const globalModal = ref(null);
const search = ref('');
const publicBaseUrl = window?.location?.origin ?? ''


const fetching_data = ref(false);

async function fetchPackages() {
    try {
        fetching_data.value = true;
        const resp = await http.get('admin/travel-packages', {
            params: {
                page: page.value,
                per_page: itemsPerPage.value,
            },
        })
        fetching_data.value = false;
        travelPackages.value = resp.data ?? []
        totalItems.value = resp?.meta?.total ?? travelPackages.value.length
    } catch (error) {
        fetching_data.value = false;
        console.error('Failed to fetch travel packages', error)
    }
}
function handleOptions() {
    fetchPackages()
}

async function toggleActive(item) {
    try {
        const resp = await http.patch(`admin/travel-packages/${item.id}/toggle-active`, {
            is_active: item.is_active
        });
        console.log({ resp });
        showSuccess(resp.message || 'success');
        fetchPackages();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_active = !item.is_active; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}

const togglePublished = async (item) => {
    try {
        const resp = await http.patch(`admin/travel-packages/${item.id}/toggle-publish`, {
            is_published: item.is_published
        });
        showSuccess(resp.message || 'success');
        fetchPackages();
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update');
        item.is_published = !item.is_published; // Revert back if failed
        console.error('Failed to update status:', error);
    }
}

function addPackage(item) {
    globalModal.value.open({
        title: 'Add New Package',
        component: PackageAdd,
        size: 'md',
        props: {
            item, // <-- correctly passed as a prop
        },
    });
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
