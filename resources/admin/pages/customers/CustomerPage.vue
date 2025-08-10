<template>
    <div>


        <div>
            <v-data-table :items="filteredItems" :headers="headers" :loading="loading" class="elevation-0"
                items-per-page="50">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                            <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined"
                                clearable hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                        </v-col>

                        <v-col cols="auto">
                            <v-btn size="large" color="primary" rounded @click="openForm()"> <v-icon>mdi-plus</v-icon>
                                Add New Guide</v-btn>
                        </v-col>
                    </v-row>
                </template>
                <template #item.sn="{ index }">
                    <span>{{ index + 1 }}</span>
                </template>

                <template #item.name="{ item }">
                    <div>
                        <v-avatar size="36" shadow-sm>
                            <v-icon size="36">mdi-account-circle</v-icon>
                            <!-- <v-img :src="item.avatar" contain></v-img> -->
                        </v-avatar>

                        <span class="text-capitalize pl-2">{{ item.fname }} {{ item.lname }}</span>

                    </div>
                </template>
                <template #item.mobile_no="{ item }">
                   <div>
                    <span>{{ formatPhoneNumber(item.mobile_no) }}</span>
                   </div>
                </template>
                <template #item.created_at="{ item }">
                    <div>

                        <span>{{ formatDate(item.created_at) }}</span>
                    </div>
                </template>


                <template #item.actions="{ item }">
                    <div>
                        <!-- <v-btn icon variant="tonal" size="x-small" color="primary"
                            :to="{ name: 'adminCustomerDetail', params: { id: item.id } }" class="mb-2">
                            <v-icon>mdi-eye</v-icon>
                        </v-btn> -->

                        <v-btn icon variant="tonal" size="x-small" color="warning" @click="openForm(item)" class="mb-2 ml-2">
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>

                        <v-btn icon variant="tonal" size="x-small" color="error" @click="deleteItem(item)" class="ml-2">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>

        <modal-template ref="globalModal" @close="fetchData"></modal-template>
    </div>
</template>

<script setup>
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import { formatDate, formatPhoneNumber } from '@utils/format'

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
    { title: 'SN', key: 'sn', width: '60px' },
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
        const resp = await axios.get('/admin/customers');
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
