<template>
    <div>
        <v-data-table-server
            :headers="headers"
            :items="journeys"
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
                        <v-btn color="primary" @click="addJourney">
                            <v-icon left>mdi-plus</v-icon> Add Journey
                        </v-btn>
                    </v-col>
                </v-row>
            </template>

            <template #item.start_date="{ item }">
                <div>{{ formatDate(item.start_date) }}</div>
            </template>

            <template #item.sn="{ index }">
                <div>{{ (page - 1) * itemsPerPage + index + 1 }}</div>
            </template>

            <template #item.name="{ item }">
                <div>
                    <router-link :to="{ name: 'adminJourneyForm', query: { id: item.id } }" class="text-primary text-decoration-underline">
                        {{ item.name }}
                    </router-link>
                </div>
            </template>

            <template #item.region="{ item }">
                <div v-if="item?.destination?.name" class="d-flex align-center ga-2">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(item.destination)"
                    ></span>
                    <span class="text-capitalize">{{ item.destination.name }}</span>
                </div>
                <div v-else class="d-flex align-center ga-2 text-grey">
                    <span
                        class="d-inline-block rounded-circle flex-shrink-0"
                        :style="dotStyle(null)"
                    ></span>
                    <span>Not Assigned</span>
                </div>
            </template>

            <template #item.duration_days="{ item }">
                <div>
                    <span class="text-primary">
                        {{ item.duration_days }} days
                    </span>
                </div>
            </template>

            <template #item.price="{ item }">
                <div>
                    {{ formatAmount(item.price) }}
                </div>
            </template>

            <template #item.is_active="{ item }">
                <div>
                    <v-chip size="small" label class="text-uppercase" :color="item.is_active ? 'success' : 'warning'">
                        <v-icon start size="16">{{ item.is_active ? 'mdi-check-circle' : 'mdi-alert-circle' }}</v-icon>
                        {{ item.is_active ? 'Active' : 'Draft' }}
                    </v-chip>
                </div>
            </template>

            <template #item.is_featured="{ item }">
                <div>
                    <v-chip size="small" label class="text-uppercase" :color="item.is_featured ? 'success' : 'warning'">
                        <v-icon start size="16">{{ item.is_featured ? 'mdi-check-circle' : 'mdi-alert-circle' }}</v-icon>
                        {{ item.is_featured ? 'Yes' : 'No' }}
                    </v-chip>
                </div>
            </template>

            <template #item.actions="{ item }">
                <div class="d-flex align-center justify-center ga-1">
                    <v-btn size="small" color="primary" variant="outlined" :to="{ name: 'adminJourneyForm', query: { id: item.id } }" title="View / Edit Journey">
                        <v-icon start size="14">mdi-eye</v-icon>
                        View
                    </v-btn>
                    <v-btn size="small" color="error" variant="outlined" @click="deleteJourney(item)" title="Delete Journey">
                        <v-icon start size="14">mdi-delete</v-icon>
                        Delete
                    </v-btn>
                </div>
            </template>
        </v-data-table-server>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { formatDate, formatAmount, dotStyle } from '@/utils/utils'
import JourneyDelete from '@/modal-form/journeys/JourneyDelete.vue'
import JourneyAdd from '@/modal-form/journeys/JourneyAdd.vue'

import { useGlobalModal } from '@/composables/globalModal'
import { getJourneys } from '@/api/journeys.api'

const { open: openModal } = useGlobalModal()



const headers = [
    { title: 'SN', key: 'sn', sortable: false },
    { title: 'Name', key: 'name', sortable: false },
    { title: 'Region', key: 'region', sortable: false,  },
    { title: 'Active', key: 'is_active', sortable: false,  },
    { title: 'Featured', key: 'is_featured', sortable: false,  },
    { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const journeys = ref([])
const page = ref(1)
const itemsPerPage = ref(20)
const totalItems = ref(0)
const search = ref('');


const fetching_data = ref(false);

async function fetchJourneys() {
    try {
        fetching_data.value = true;
        const resp = await getJourneys({
                page: page.value,
                per_page: itemsPerPage.value,
            })
        fetching_data.value = false;
        journeys.value = resp.data ?? []
        totalItems.value = resp?.meta?.total ?? journeys.value.length
    } catch (error) {
        fetching_data.value = false;
        console.error('Failed to fetch journeys', error)
    }
}
function handleOptions() {
    fetchJourneys()
}

function addJourney(item) {
    openModal({
        title: 'Add New Journey',
        component: JourneyAdd,
        size: 'md',
        props: {
            item, // <-- correctly passed as a prop
        },
        onSaved: fetchJourneys,
        onClose: fetchJourneys,
    });
}
function deleteJourney(item) {
    openModal({
        title: 'Delete Journey',
        component: JourneyDelete,
        size: 'sm',
        props: {
            item, // <-- correctly passed as a prop
        },
        onSaved: fetchJourneys,
        onClose: fetchJourneys,
    });
}


onMounted(() => {
    fetchJourneys()
})
</script>

<style scoped></style>
