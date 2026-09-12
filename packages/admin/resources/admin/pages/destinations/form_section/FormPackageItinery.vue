<template>
    <div class="mb-4">
        <v-card>
            <v-card-title class="d-flex align-center justify-space-between py-0">
                                <v-btn color="primary" title="Add Itinerary" @click="handleOpen()">
                    <v-icon>mdi-plus</v-icon> Add Itinerary
                </v-btn>
            </v-card-title>
                        <v-expansion-panels multiple elevation="1">
                <v-expansion-panel v-for="(itinerary, index) in travelPackage?.itineraries" :key="index">
                    <v-expansion-panel-title>
                        {{ itinerary.title }}
                    </v-expansion-panel-title>

                    <v-expansion-panel-text>
                        <div>
                            <div class="mb-3">
                                <v-btn color="primary" @click="handleOpen(itinerary)" variant="tonal">
                                    <v-icon>mdi-pencil-box</v-icon> Edit Itinerary
                                </v-btn>

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
                                            <div class="border pa-4 rounded">
                                                <div class="d-flex">
                                                    <div style="width: 40px; height: 40px;">
                                                        <v-img :src="highlight.icon_url" contain height="40" width="40"></v-img>
                                                    </div>
                                                    <div class="pl-4">
                                                        <p class="text-primary">{{ highlight.highlight_name }}</p>
                                                        <p style="font-size: 0.9rem;">
                                                            {{ highlight.description }}
                                                        </p>
                                                    </div>
                                                    <v-spacer></v-spacer>
                                                    <div>
                                                        <v-btn color="primary" icon size="small" @click="editHighlight(itinerary, highlight)" variant="tonal">
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
import { reactive, ref, watch, onMounted } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
const emit = defineEmits(['refresh'])


const { open: openModal } = useGlobalModal()


const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})


// Update form when prop travelPackage changes
//     () => props.travelPackage,
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



import ItineraryForm from '../modal/ItineraryForm.vue'
import ItineraryHighlightsForm from '../modal/ItineraryHighlightsForm.vue'


function handleOpen(item = {}) {
    console.log({ item });
    openModal({
        title: item?.id ? 'Edit Category' : 'Add New Category',
        component: ItineraryForm,
        size: 'xl',
        props: {
            item,
            travelPackageId: props.travelPackage.id,
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
