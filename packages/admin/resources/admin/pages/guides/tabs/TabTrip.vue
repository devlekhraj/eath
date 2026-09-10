<template>
    <div>
        <div class="text-right pb-4">
            <v-btn variant="tonal" color="primary" @click="openForm">
                <v-icon left>mdi-pencil</v-icon> Add Trip
            </v-btn>
        </div>

        <v-row dense>
            <v-col v-for="(trip, index) in guide.trips" :key="trip.id || index" cols="12" md="6">
                <v-card class="pa-4 mb-4 border">
                    <v-row align="center" no-gutters>
                        <v-col>
                            <div class="d-flex align-center justify-space-between">
                                <h4 class="mb-2 font-weight-medium text-primary">
                                    {{ trip.travel_package?.name || 'No Package' }}
                                </h4>
                                <v-btn icon variant="tonal" size="small" color="primary" @click="openForm(trip)"><v-icon>mdi-pencil</v-icon></v-btn>
                            </div>
                        </v-col>
                    </v-row>

                    <v-divider class="my-2"></v-divider>

                    <p>
                        <strong>Date:</strong>
                        <span>{{ trip.start_date }} - {{ trip.end_date }}</span>
                    </p>

                    <p>
                        <strong>Group Size:</strong>
                        <span>{{ trip.group_size }}</span>
                    </p>

                    <p>
                        <strong>Notes:</strong>
                        <span>{{ trip.notes || 'N/A' }}</span>
                    </p>
                </v-card>
            </v-col>
        </v-row>


        <modal-template ref="globalModal" @close="handleClose" />
    </div>
</template>

<script setup>
import { ref } from 'vue'
import TripForm from './modal/TripForm.vue'
import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['close'])
const { showSuccess, showError } = useSnackbar()
const props = defineProps({
    guide: {
        type: Object,
        default: () => ({}),
    },
})

const globalModal = ref(null)


function openForm(item = {}) {
    globalModal.value.open({
        component: TripForm,
        size: 'md',
        props: {
            guide: props.guide,
            item: item,
        },
    })
}

function handleClose() {
    // You can refresh data or show a message here after modal closes
    emit('close')
}
</script>

<style scoped>
/* Optional: limit card max height and add scroll if needed */
.v-card {
    min-height: 140px;
}
</style>
