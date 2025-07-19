<template>
    <v-container>
        <v-data-table :headers="headers" :items="travelPackages" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">
            <template #item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>
            <template #item.sn="{ item, index }">
                {{ index + 1 }}
            </template>
            <template #item.name="{ item }">
                <span class="text-primary">{{ item.name }}</span>
            </template>


            <template #item.end_date="{ item }">
                {{ formatDate(item.end_date) }}
            </template>
            <template #item.duration_days="{ item }">
                <span class="text-primary" style="font-size: small;font-weight: 600;">{{ item.duration_days }} days</span>
            </template>
            <template #item.price="{ item }">
                <span>{{ formatAmount(item.price) }}</span>
            </template>

            <template #item.is_active="{ item }">
                <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
                    {{ item.is_active ? 'Active' : 'Inactive' }}
                </v-chip>
            </template>

            <template #item.is_featured="{ item }">
                <v-chip :color="item.is_featured ? 'blue' : 'grey'" dark size="small">
                    {{ item.is_featured ? 'Featured' : 'No' }}
                </v-chip>
            </template>
            <template #item.actions="{ item }">
               <v-btn icon color="primary" variant="text" :to="{ name:'adminPackageDetailPage', params:{ id: item.id }}"> <v-icon>mdi-eye-circle</v-icon></v-btn>
               <v-btn icon color="warning" variant="text" :to="{ name:'adminPackageForm', query:{ id: item.id }}"> <v-icon>mdi-pencil</v-icon></v-btn>
            </template>
        </v-data-table>
    </v-container>
</template>

<script>
import { formatDate, formatAmount } from '@/utils/format';
export default {
    data() {
        return {
            headers: [
                { title: 'SN', key: 'sn', sortable: true },
                { title: 'Name', key: 'name', sortable: false },
                { title: 'Duration', key: 'duration_days', sortable: true },
                { title: 'Price (USD)', key: 'price', sortable: true },
                { title: 'Start Date', key: 'start_date', sortable: false },
                { title: 'End Date', key: 'end_date', sortable: false },
                { title: 'Active', key: 'is_active', sortable: false },
                { title: 'Featured', key: 'is_featured', sortable: false },
                { title: 'Actions', key: 'actions', sortable: false },
            ],
            travelPackages: [],
        };
    },
    mounted(){
        this.fetchPackages();
    },

    methods: {
        formatAmount,
        formatDate,

        async fetchPackages(){
           const resp = await axios.get('admin/travel-packages');
           this.travelPackages = resp.data;
        }
    },
};
</script>

<style scoped></style>
