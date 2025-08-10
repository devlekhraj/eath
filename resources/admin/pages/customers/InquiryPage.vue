<template>
    <div>


        <div>
            <v-data-table :items="filteredItems" :headers="headers" :loading="loading" class="elevation-0"
                items-per-page="50" v-model:expanded="expanded">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                            <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined"
                                clearable hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
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
                <template #item.travel_date="{ item }">
                    <div>

                        <span>{{ formatDate(item.travel_date) }}</span>
                    </div>
                </template>

                <!-- Expanded Row -->
                <template #expanded-row="{ item, columns }">
                    <tr>
                        <td :colspan="columns.length" class="pa-4">
                            <v-card rounded class="pa-4" elevation="0">
                                <v-row>
                                    <v-col cols="12" md="3">

                                        <div>
                                            <div class="mb-2">
                                                <strong class="text-subtitle-2 text-primary">Contact Details</strong>
                                            </div>
                                            <div class="mb-2">
                                                <strong>Name:</strong> {{ item.fname }} {{ item.lname }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Mobile:</strong> {{ item.mobile_no || 'N/A' }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Email:</strong> {{ item.email || 'N/A' }}
                                            </div>
                                        </div>
                                    </v-col>
                                    <v-col cols="12" md="9">
                                        <div>
                                            <div class="mb-2">
                                                <strong class="text-subtitle-2 text-primary">Inquiry Details</strong>
                                            </div>
                                            <div class="mb-4">
                                                <strong>Custom Destination:</strong>
                                                <div class="text-body-1">{{ item.custom_destination || 'N/A' }}</div>
                                            </div>

                                            <div class="mb-4">
                                                <strong>Description:</strong>
                                                <div class="text-body-1">{{ item.description || 'N/A' }}</div>
                                            </div>

                                            <div class="mb-4">
                                                <strong>Message:</strong>
                                                <div class="text-body-1">{{ item.message || 'No message provided' }}
                                                </div>
                                            </div>
                                        </div>

                                    </v-col>
                                </v-row>

                                <!-- <v-divider class="my-4" /> -->

                            </v-card>
                        </td>
                    </tr>


                </template>

                <template #item.actions="{ item }">
                    <div>

                        <v-btn icon size="x-small" color="primary" variant="tonal" class="ml-2"
                            @click="toggleExpand(item)">
                            <v-icon>
                                {{
                                    expanded.includes(item.id)
                                        ? 'mdi-chevron-up'
                                        : 'mdi-chevron-down'
                                }}
                            </v-icon>
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

// Get package ID from route
const route = useRoute()
const globalModal = ref(null)




const loading = ref(false)
const search = ref('');
const data_list = ref([])
const lookup_codes = ref([])
const expanded = ref([])

function toggleExpand(item) {
    const index = expanded.value.indexOf(item.id)
    if (index >= 0) {
        expanded.value.splice(index, 1)
    } else {
        expanded.value.push(item.id)
    }
}

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
    { title: 'Travel Date', key: 'travel_date' },
    { title: 'Package', key: 'travel_package' },
    { title: 'No. of People', key: 'number_of_people' },
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


// function openForm(item = {}) {
//     globalModal.value.open({
//         title: item?.id ? 'Edit Item' : 'Add New Item',
//         component: CustomerForm,
//         size: 'md',
//         props: {
//             item,
//             lookup_codes,
//         },
//     })
// }
// function deleteItem(item = {}) {
//     globalModal.value.open({
//         title: 'Delete ' + item.name,
//         component: CustomerDelete,
//         size: 'sm',
//         props: {
//             item,
//         },
//     })
// }


// Fetch single travel package
async function fetchData() {
    try {
        loading.value = true;
        const resp = await axios.get('/admin/inquiries');
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
