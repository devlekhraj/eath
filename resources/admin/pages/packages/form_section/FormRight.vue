<template>
    <div>
        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center justify-space-between py-4">
                <h2 class="font-medium">Itineraries</h2>
                <v-btn color="primary" size="large" rounded @click="handleOpen()"><v-icon>mdi-plus</v-icon> Add Itinerary</v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-expansion-panels multiple elevation="1">
                <v-expansion-panel v-for="(itinerary, index) in travelPackage?.itineraries" :key="index">
                    <v-expansion-panel-title>
                        <div class="font-weight-medium">
                            Day {{ index + 1 }} - {{ itinerary.title }}
                        </div>
                    </v-expansion-panel-title>

                    <v-expansion-panel-text>
                        <div>
                            <div class="mb-3">
                                <v-btn color="primary" @click="handleOpen(itinerary)" variant="tonal"><v-icon>mdi-pencil-box</v-icon> Edit Item</v-btn>
                               
                            </div>
                            <div v-html="itinerary.description" class="text-body-2"></div>
                        </div>
                    </v-expansion-panel-text>
                </v-expansion-panel>
            </v-expansion-panels>
        </v-card>
    </div>
    <modal-template ref="globalModal" @saved="handleSaved" @close="handleClose"></modal-template>
</template>

<script setup>
import { ref } from 'vue'
import ItineraryForm from '../modal/ItineraryForm.vue'
const emit = defineEmits(['close'])

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
    travelPackageId: {
        type: Number,
        required: true,
    }
})

const globalModal = ref(null)

function handleOpen(item = {}) {
    globalModal.value.open({
        title: item ? 'Edit Category' : 'Add New Category',
        component: ItineraryForm,
        size: 'lg',
        props: {
            item, // <-- correctly passed as a prop
            travelPackageId: props.travelPackageId
        },
    });
}


async function handleClose() {
     emit('close')
}

async function handleSaved(param) {
    console.log("save", {param});
}
</script>
