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
                            <v-icon size="36">mdi-account-circle</v-icon>
                        </v-avatar>
                        <a href="#" class="text-primary text-capitalize text-decoration-underline" @click.prevent="openForm(item)">
                            {{ item.fname }} {{ item.lname }}
                        </a>
                    </div>
                </template>

                <template #item.mobile_no="{ item }">
                    <div style="min-width: max-content;">
                        <span>{{ formatPhoneNumber(item.mobile_no) }}</span>
                    </div>
                </template>

                <template #item.created_at="{ item }">
                    <div style="min-width: max-content;">
                        <span>{{ formatDate(item.created_at) }}</span>
                    </div>
                </template>

                <template #item.actions="{ item }">
                    <div class="d-flex align-center justify-end ga-2" style="min-width: max-content;">
                        <v-btn icon variant="tonal" size="x-small" color="warning" @click="openForm(item)">
                            <v-icon size="16">mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn icon variant="tonal" size="x-small" color="error" @click="deleteItem(item)">
                            <v-icon size="16">mdi-delete</v-icon>
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>

        <modal-template ref="globalModal" @close="fetchData"></modal-template>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import { formatDate, formatPhoneNumber } from '@utils/utils'

import CustomerDelete from './modal/CustomerDelete.vue'
import CustomerForm from './modal/CustomerForm.vue'
// Get package ID from route
const route = useRoute()
const globalModal = ref(null)
const lookupCodes = ref([])


const formReady = ref(false)
const loading = ref(false)
const search = ref('');
const data_list = ref([])
const lookup_codes = ref([])

const filteredItems = computed(() => {
    if (!search.value) return data_list.value
    const term = search.value.toLowerCase()
    return data_list.value.filter(item =>
        item.name.toLowerCase().includes(term)
    )
})

const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
    { title: 'Name', key: 'name' },
    { title: 'Email', key: 'email' },
    { title: 'Phone', key: 'mobile_no' },
    { title: 'Created', key: 'created_at' },
    { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
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
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: CustomerForm,
        size: 'md',
        props: {
            item,
            lookup_codes,
        },
    })
}
function deleteItem(item = {}) {
    globalModal.value.open({
        title: 'Delete ' + item.name,
        component: CustomerDelete,
        size: 'sm',
        props: {
            item,
        },
    })
}


// Fetch single travel package
async function fetchData() {
    try {
        loading.value = true;
        const resp = await http.get('/admin/customers');
        loading.value = false;
        data_list.value = resp.data;
        console.log(resp);
    } catch (err) {
        loading.value = true;
        console.error('Failed to fetch package:', err)
    }
}


// Fetch on load
onMounted(() => {
    // if (packageId) fetchData()
    fetchData();
})
</script>
