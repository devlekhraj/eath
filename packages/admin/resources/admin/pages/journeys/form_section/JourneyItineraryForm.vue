<template>
    <div class="mb-4">
        <v-card>
            <v-card-title class="d-flex align-center justify-space-between py-0">
                                <v-btn color="primary" title="Add Itinerary Day" @click="handleOpen()">
                    <v-icon>mdi-plus</v-icon> Add Day
                </v-btn>
            </v-card-title>
            <v-expansion-panels multiple flat elevation="0">
                <v-expansion-panel v-for="(itinerary, index) in itineraryDays" :key="itinerary.id || index" elevation="0">
                    <v-expansion-panel-title>
                        Day {{ itinerary.day_number }} - {{ itinerary.title }}
                    </v-expansion-panel-title>

                    <v-expansion-panel-text>
                        <div>
                            <div class="mb-3">
                                <v-btn color="primary" @click="handleOpen(itinerary)" variant="tonal">
                                    <v-icon>mdi-pencil-box</v-icon> Edit Day
                                </v-btn>

                            </div>
                            <div class="mb-3 text-body-2 text-slate-600">
                                <span v-if="itinerary.route">{{ itinerary.route }}</span>
                                <span v-if="itinerary.altitude_label"> · {{ itinerary.altitude_label }}</span>
                                <span v-else-if="itinerary.altitude_m"> · {{ itinerary.altitude_m }}m</span>
                                <span v-if="itinerary.walking_hours_label"> · {{ itinerary.walking_hours_label }}</span>
                                <span v-else-if="itinerary.walking_hours"> · {{ itinerary.walking_hours }} hours</span>
                            </div>
                            <div v-if="itinerary.description" class="text-body-2">
                                <SummarnoteViewer :value="itinerary.description" />
                            </div>
                            <div class="mt-6">
                                <div class="d-flex align-center">
                                                                        <v-btn color="primary" @click="handleHighlights(itinerary)" variant="tonal">
                                        <v-icon>mdi-plus-circle</v-icon> Add Highlight
                                    </v-btn>
                                </div>
                                <div class="pt-3">
                                    <v-row>
                                        <v-col cols="12" md="6" v-for="(highlight, index) in itinerary.highlights"
                                            :key="index">
                                            <div class="border pa-4">
                                                <div class="d-flex">
                                                    <div>
                                                        <p class="text-primary">{{ highlight.title }}</p>
                                                        <p style="font-size: 0.9rem;">
                                                            {{ highlight.description }}
                                                        </p>
                                                    </div>
                                                    <v-spacer></v-spacer>
                                                    <div>
                                                        <v-btn color="primary" icon @click="editHighlight(itinerary, highlight)" variant="tonal">
                                                            <v-icon>mdi-pencil</v-icon>
                                                        </v-btn>
                                                    </div>
                                                </div>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </div>
                            </div>
                        </div>
                    </v-expansion-panel-text>
                </v-expansion-panel>
            </v-expansion-panels>
        </v-card>
    </div>
</template>
<script setup>
import { computed, ref } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import SummarnoteViewer from '@/components/SummarnoteViewer.vue'
const emit = defineEmits(['refresh'])


const { open: openModal } = useGlobalModal()


const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})


// Update form when prop journey changes
//     () => props.journey,
//     (newVal) => {
//         if (newVal && Object.keys(newVal).length) {
//             Object.assign(form, newVal)
//         }
//     },
//     { immediate: true }
// )

function handleRefresh() {
    emit('refresh')
}

const itineraryDays = computed(() => props.journey?.itinerary_days ?? [])


import ItineraryForm from '@/modal-form/journeys/ItineraryForm.vue'
import ItineraryHighlightsForm from '@/modal-form/journeys/ItineraryHighlightsForm.vue'


function handleOpen(item = {}) {
    console.log({ item });
    openModal({
        title: item?.id ? 'Edit Itinerary Day' : 'Add Itinerary Day',
        component: ItineraryForm,
        size: 'xl',
        props: {
            item,
            journeyId: props.journey.id,
        },
        onClose: handleRefresh,
    })
}
function handleHighlights(itinerary = {}, item = {}) {
    console.log({ itinerary });
    openModal({
        title: 'Highlights',
        component: ItineraryHighlightsForm,
        size: 'lg',
        props: {
            itinerary,
            item,
        },
        onClose: handleRefresh,
    })
}
function editHighlight(itinerary = {}, item = {}) {
    console.log({ itinerary }, { item});
    openModal({
        title: 'Highlights',
        component: ItineraryHighlightsForm,
        size: 'lg',
        props: {
            itinerary,
            item,
        },
        onClose: handleRefresh,
    })
}

</script>
