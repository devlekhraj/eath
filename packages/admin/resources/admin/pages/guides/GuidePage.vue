<template>
    <div>


        <div>
            <v-data-table :items="filteredItems" :headers="headers" :loading="loading" class="elevation-0"
                items-per-page="50">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                            <v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search" />
                        </v-col>

                        <v-col cols="auto">
                            <v-btn color="primary" @click="openForm()"> <v-icon>mdi-plus</v-icon>
                                Add New Guide</v-btn>
                        </v-col>
                    </v-row>
                </template>
                <template #item.sn="{ index }">
                    <div style="min-width: max-content;">{{ index + 1 }}</div>
                </template>

                <template #item.name="{ item }">
                    <div class="d-flex align-center ga-2" style="min-width: max-content;">
                        <v-avatar size="36">
                            <v-img :src="item.avatar" contain />
                        </v-avatar>
                        <router-link :to="{ name: 'adminGuideDetailPage', params: { id: item.id } }" class="text-primary text-capitalize text-decoration-underline">
                            {{ item.name }}
                        </router-link>
                    </div>
                </template>

                <template #item.language_spoken="{ item }">
                    <div class="d-flex align-center ga-1" style="min-width: max-content;">
                        <v-chip color="green" size="small" label class="text-capitalize" v-for="lang in item.language_spoken" :key="lang">
                            {{ lang }}
                        </v-chip>
                    </div>
                </template>

                <template #item.status="{ item }">
                    <div style="min-width: max-content;">
                        <v-chip :color="getStatusColor(item.status)" size="small" label class="text-capitalize">
                            {{ item.status }}
                        </v-chip>
                    </div>
                </template>

                <template #item.actions="{ item }">
                    <div class="d-flex align-center ga-2" style="min-width: max-content;">
                        <v-btn size="x-small" color="primary" icon variant="tonal" :to="{ name: 'adminGuideDetailPage', params: { id: item.id } }">
                            <v-icon size="16">mdi-eye</v-icon>
                        </v-btn>
                        <v-btn size="x-small" color="warning" icon variant="tonal" @click="openForm(item)">
                            <v-icon size="16">mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn size="x-small" color="error" icon variant="tonal" @click="deleteItem(item)">
                            <v-icon size="16">mdi-delete</v-icon>
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>

        <modal-template ref="globalModal" @close="fetchGuideList"></modal-template>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'

import GuideForm from './modal/GuideForm.vue'
import GuideDeleteForm from './modal/GuideDeleteForm.vue'
// Get package ID from route
const route = useRoute()
const globalModal = ref(null)
const lookupCodes = ref([])


const formReady = ref(false)
const loading = ref(false)
const search = ref('');
const guide_list = ref([])
const lookup_codes = ref([])

const filteredItems = computed(() => {
    if (!search.value) return guide_list.value
    const term = search.value.toLowerCase()
    return guide_list.value.filter(item =>
        item.name.toLowerCase().includes(term)
    )
})

const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
    { title: 'Name', key: 'name' },
    { title: 'Email', key: 'email' },
    { title: 'Phone', key: 'phone_no' },
    { title: 'Language Spoken', key: 'language_spoken' },
    { title: 'Ratings', key: 'rating_count' },
    { title: 'Trips', key: 'trip_count' },
    { title: 'Status', key: 'status' },
    { title: 'Actions', key: 'actions', sortable: false },
]

function getStatusColor(status) {
    switch (status) {
        case 'active':
            return 'green';
        case 'inactive':
            return 'grey';
        case 'pending':
            return 'orange';
        case 'suspended':
            return 'red';
        case 'deleted':
            return 'black';
        default:
            return 'default';
    }
}


function openForm(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: GuideForm,
        size: 'md',
        props: {
            item,
            lookup_codes,
        },
    })
}
function deleteItem(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: 'Delete ' + item.name,
        component: GuideDeleteForm,
        size: 'sm',
        props: {
            item,
        },
    })
}


// Fetch single travel package
async function fetchGuideList() {
    try {
        loading.value = true;
        const resp = await http.get('/admin/guides');
        loading.value = false;
        guide_list.value = resp.data;
        console.log(resp);
    } catch (err) {
        loading.value = true;
        console.error('Failed to fetch package:', err)
    }
}


// Fetch on load
onMounted(() => {
    // if (packageId) fetchGuideList()
    fetchGuideList();
})
</script>
