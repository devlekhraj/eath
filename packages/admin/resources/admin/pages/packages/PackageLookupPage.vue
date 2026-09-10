<template>
    <div>


        <div>
            <v-data-table :items="filteredItems" :headers="headers" :loading="loading" class="elevation-0">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                            <v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search" />
                        </v-col>

                        <v-col cols="auto">
                            <v-btn color="primary" @click="openForm()"> <v-icon>mdi-plus</v-icon>
                                Add Item</v-btn>
                        </v-col>
                    </v-row>
                </template>
                <template #item.sn="{ index }">
                    <div style="min-width: max-content;">{{ index + 1 }}</div>
                </template>
      
                <template #item.name="{ item }">
                    <div style="min-width: max-content;">
                        <a href="#" class="text-primary text-capitalize text-decoration-underline" @click.prevent="openForm(item)">
                            {{ item.name }}
                        </a>
                    </div>
                </template>
      
                <template #item.icon="{ item }">
                    <div class="d-flex align-center" style="min-width: max-content; height: 30px; width: 30px;">
                        <img :src="item.icon_url" alt="Icon" height="30" />
                    </div>
                </template>

                <template #item.actions="{ item }">
                    <div class="d-flex align-center justify-end ga-2" style="min-width: max-content;">
                        <v-btn icon size="x-small" variant="tonal" color="primary" @click="openForm(item)">
                            <v-icon size="16">mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn icon size="x-small" variant="tonal" color="error" @click="deleteItem(item)">
                            <v-icon size="16">mdi-delete</v-icon>
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>

        <modal-template ref="globalModal" @close="fetchLoopData"></modal-template>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'

import ItineraryLookupForm from './modal/ItineraryLookupForm.vue'
import ItineraryLookupDeleteForm from './modal/ItineraryLookupDeleteForm.vue'
// Get package ID from route
const route = useRoute()
const globalModal = ref(null)


const formReady = ref(false)
const loading = ref(false)
const search = ref('');
const itinerary_lookups = ref([])

const filteredItems = computed(() => {
    if (!search.value) return itinerary_lookups.value
    const term = search.value.toLowerCase()
    return itinerary_lookups.value.filter(item =>
        item.name.toLowerCase().includes(term)
    )
})

const headers = [
    { title: 'SN', key: 'sn', sortable: false, width: '60px' },
    { title: 'Icon', key: 'icon' },
    { title: 'Name', key: 'name' },
    { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
]



function openForm(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: ItineraryLookupForm,
        size: 'md',
        props: {
            item,
        },
    })
}
function deleteItem(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: 'Delete '+item.name,
        component: ItineraryLookupDeleteForm,
        size: 'sm',
        props: {
            item,
        },
    })
}


// Fetch single travel package
async function fetchLoopData() {
    try {
        loading.value = true;
        const resp = await http.get('/admin/package-lookups');
        loading.value = false;
        itinerary_lookups.value = resp.data;
    } catch (err) {
        loading.value = true;
        console.error('Failed to fetch package:', err)
    }
}


// Fetch on load
onMounted(() => {
    // if (packageId) fetchLoopData()
    fetchLoopData();
})
</script>
