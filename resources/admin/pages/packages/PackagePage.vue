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
                        <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
                            hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                    </v-col>

                    <v-col cols="auto">
                        <v-btn color="primary" rounded size="large" variant="elevated" @click="addPackage">
                            <v-icon left>mdi-plus</v-icon> Add Package
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>

            <template #item.sn="{ index }">
                <div style="width: 50px;">
                    {{ index + 1 }}
                </div>
            </template>
            <!-- <template #item.created_at="{ item }">
                {{ formatDate(item.created_at) }}
            </template> -->

            <template #item.name="{ item }">

                <div style="vertical-align: middle; min-width: max-content;">
                    <div class="text-primary">{{ item.name }}</div>
                    <div class="d-flex align-center">
                        <div class="text-caption text-grey-darken-1">
                            {{ item?.destination?.slug && item?.slug ? `${publicBaseUrl}/treks/${item.destination.slug}/${item.slug}` : '' }}
                        </div>
                        <v-btn
                            v-if="item?.destination?.slug && item?.slug"
                            size="x-small"
                            class="ml-2"
                            color="primary"
                            icon
                            variant="text"
                            :href="`${publicBaseUrl}/treks/${item.destination.slug}/${item.slug}`"
                            target="_blank"
                            rel="noopener"
                        >
                            <v-icon>mdi-open-in-new</v-icon>
                        </v-btn>
                    </div>
                </div>

            </template>
            <template #item.region="{ item }">

                <div style="min-width: max-content;">
                    <div class="d-flex my-2 text-capitalize" v-if="item?.destination">
                        {{ item.destination.name }}
                    </div>
                    <div v-else>
                        <span>Not Assigned</span>
                    </div>
                </div>

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
                    <!-- <v-switch v-model="item.is_active" density="compact" color="success" hide-details
                        @change="toggleActive(item)" /> -->
                        <v-chip size="small" class="text-capitalize" :color="item.is_active ? 'success':'warning'">
                            <v-icon start size="16">
                                {{ item.is_active ? 'mdi-check-circle' : 'mdi-alert-circle' }}
                            </v-icon>
                            {{ item.is_active ? 'active' : 'Draft' }}
                        </v-chip>
                </div>
            </template>
            <template #item.is_featured="{ item }">
                <div>
                    <!-- <v-switch v-model="item.is_active" density="compact" color="success" hide-details
                        @change="toggleActive(item)" /> -->
                        <v-chip size="small" class="text-capitalize" :color="item.is_featured ? 'success':'warning'">
                            <v-icon start size="16">
                                {{ item.is_featured ? 'mdi-check-circle' : 'mdi-alert-circle' }}
                            </v-icon>
                            {{ item.is_featured ? 'yes' : 'no' }}
                        </v-chip>
                </div>
            </template>

            <!-- <template #item.is_featured="{ item }">
                <v-chip :color="item.is_featured ? 'blue' : 'grey'" dark size="small">
                    {{ item.is_featured ? 'Featured' : 'No' }}
                </v-chip>
            </template> -->
            <!-- <template #item.is_published="{ item }">
                <v-switch v-model="item.is_published" density="compact" color="success" hide-details
                    @change="() => togglePublished(item)" />
            </template> -->
            <!-- <template #item.published_at="{ item }">
                <div style="min-width: 140px;">
                    {{ formatDateTime(item.published_at) }}
                </div>
            </template> -->


            <template #item.actions="{ item }">
                <div class="width-max-content d-flex align-center">
                    <v-btn variant="tonal" icon size="x-small" color="primary" :to="{ name: 'adminPackageForm', query: { id: item.id } }">
                        <v-icon>mdi-eye</v-icon>
                    </v-btn>
                    <v-btn variant="tonal" class="ml-2" icon size="x-small" color="error" @click="deleteItem(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </div>
                <!-- <v-menu location="bottom">
                    <template #activator="{ props }">
                        <div style="width: max-content;">
                            <v-btn v-bind="props" icon variant="text" color="primary">
                                <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                        </div>
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
                </v-menu> -->
            </template>
        </v-data-table-server>

        <modal-template ref="globalModal" @saved="fetchPackages" @close="fetchPackages" />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import { formatDate, formatAmount, formatDateTime } from '@/utils/format'
import PackageDelete from './modal/PackageDelete.vue'
import PackageAdd from './modal/PackageAdd.vue'

import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()


const headers = [
    { title: 'SN', key: 'sn', sortable: true },
    // { title: 'Created', key: 'created_at', sortable: false },
    { title: 'Name', key: 'name', sortable: false },
    { title: 'Region', key: 'region', sortable: false },
    { title: 'Active', key: 'is_active', sortable: false },
    { title: 'Featured', key: 'is_featured', sortable: false },
    // { title: 'Published', key: 'is_published', sortable: false },
    // { title: 'Published On', key: 'published_at', sortable: false },
    { title: 'Actions', key: 'actions', sortable: false },
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
        const resp = await axios.get('admin/travel-packages', {
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
        const resp = await axios.patch(`admin/travel-packages/${item.id}/toggle-active`, {
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
        const resp = await axios.patch(`admin/travel-packages/${item.id}/toggle-publish`, {
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
