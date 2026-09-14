<template>
    <div>
        <div class="text-right pb-4">
            <v-btn variant="tonal" color="primary" @click="openForm">
                <v-icon left>mdi-pencil</v-icon> Add Trip
            </v-btn>
        </div>

        <v-row dense>
            <v-col v-for="(trip, index) in guide.trips" :key="trip.id || index" cols="12" md="6">
                <v-card class="pa-4 mb-4">
                    <v-row align="center" no-gutters>
                        <v-col>
                            <div class="d-flex align-center justify-space-between">
                                <h4 class="mb-2 font-weight-medium text-primary">
                                    {{ trip.travel_package?.name || 'No Package' }}
                                </h4>
                                <v-btn icon variant="tonal" color="primary" @click="openForm(trip)"><v-icon>mdi-pencil</v-icon></v-btn>
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
    </div>
</template>

<script setup>
import { ref } from 'vue'
import TripForm from '@/modal-form/guides/TripForm.vue'
import { useGlobalModal } from '@/composables/globalModal'
const emit = defineEmits(['close'])
const { open: openModal } = useGlobalModal()

const props = defineProps({
    guide: {
        type: Object,
        default: () => ({}),
    },
})



function openForm(item = {}) {
    openModal({
        component: TripForm,
        size: 'md',
        props: {
            guide: props.guide,
            item: item,
        },
        onClose: handleClose,
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
