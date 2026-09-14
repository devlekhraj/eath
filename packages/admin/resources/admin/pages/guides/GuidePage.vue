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
                    <div>{{ index + 1 }}</div>
                </template>

                <template #item.name="{ item }">
                    <div class="d-flex align-center ga-2">
                        <v-avatar size="36">
                            <v-img :src="item.avatar" contain />
                        </v-avatar>
                        <router-link :to="{ name: 'adminGuideDetailPage', params: { id: item.id } }" class="text-primary text-capitalize text-decoration-underline">
                            {{ item.name }}
                        </router-link>
                    </div>
                </template>

                <template #item.language_spoken="{ item }">
                    <div class="d-flex align-center ga-1">
                        <v-chip color="green" size="small" label class="text-uppercase" v-for="lang in item.language_spoken" :key="lang">
                            {{ lang }}
                        </v-chip>
                    </div>
                </template>

                <template #item.status="{ item }">
                    <div>
                        <v-chip :color="getStatusColor(item.status)" size="small" label class="text-uppercase">
                            {{ item.status }}
                        </v-chip>
                    </div>
                </template>

                <template #item.actions="{ item }">
                    <div class="d-flex align-center justify-center ga-1">
                        <v-btn size="small" color="primary" variant="outlined" :to="{ name: 'adminGuideDetailPage', params: { id: item.id } }" title="View guide details">
                            <v-icon start size="14">mdi-eye</v-icon>
                            View
                        </v-btn>
                        <v-btn size="small" color="secondary" variant="outlined" @click="openForm(item)" title="Edit guide">
                            <v-icon start size="14">mdi-pencil</v-icon>
                            Edit
                        </v-btn>
                        <v-btn size="small" color="error" variant="outlined" @click="deleteItem(item)" title="Delete guide">
                            <v-icon start size="14">mdi-delete</v-icon>
                            Delete
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>
    </div>
</template>

<script setup>
import { useGlobalModal } from '@/composables/globalModal'
import { getStatusColor } from '@/utils/utils'
const { open: openModal } = useGlobalModal()
import { ref, onMounted, computed } from 'vue'

import GuideForm from '@/modal-form/guides/GuideForm.vue'
import GuideDeleteForm from '@/modal-form/guides/GuideDeleteForm.vue'
import { getGuidesApi } from '@/api/guides.api'


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
    { title: 'SN', key: 'sn', sortable: false },
    { title: 'Name', key: 'name' },
    { title: 'Email', key: 'email' },
    { title: 'Phone', key: 'phone_no' },
    { title: 'Language Spoken', key: 'language_spoken' },
    { title: 'Ratings', key: 'rating_count' },
    { title: 'Trips', key: 'trip_count' },
    { title: 'Status', key: 'status' },
    { title: 'Actions', key: 'actions', sortable: false },
]

function openForm(item = {}) {
    console.log({ item });
    openModal({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: GuideForm,
        size: 'md',
        props: {
            item,
            lookup_codes,
        },
        onClose: fetchGuideList,
    })
}
function deleteItem(item = {}) {
    console.log({ item });
    openModal({
        title: 'Delete ' + item.name,
        component: GuideDeleteForm,
        size: 'sm',
        props: {
            item,
        },
        onClose: fetchGuideList,
    })
}


// Fetch single travel package
async function fetchGuideList() {
    try {
        loading.value = true;
        const resp = await getGuidesApi();
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
        fetchGuideList();
})
</script>
