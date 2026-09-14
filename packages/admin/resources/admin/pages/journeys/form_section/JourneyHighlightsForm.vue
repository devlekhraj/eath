<template>
    <div class="mb-4">
        <v-card>
            <v-card-title class="d-flex align-center justify-space-between py-0">
                <v-btn color="primary" title="Add Highlight" @click="openForm()">
                    <v-icon>mdi-plus</v-icon> Add Highlight
                </v-btn>
            </v-card-title>
            <v-card-text>


                <div class="mt-4">

                    <v-row>
                        <v-col cols="12" md="6" v-for="(highlight, index) in journey?.highlights" :key="index">
                            <div class="border pa-4">
                                <div class="d-flex">
                                    <div v-if="highlight.icon || highlight.icon_url" style="width: 40px; height: 40px;">
                                        <v-icon color="primary">{{ highlight.icon || highlight.icon_url }}</v-icon>
                                    </div>
                                    <div class="pl-4">
                                        <p class="text-primary">{{ highlight.title || highlight.highlight_name }}</p>
                                        <p style="font-size: 0.9rem;">
                                            {{ highlight.description }}
                                        </p>
                                    </div>
                                    <v-spacer></v-spacer>
                                    <div>
                                        <v-btn color="primary" icon @click="openForm(highlight)" variant="tonal">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>

                </div>

            </v-card-text>
        </v-card>
        <!-- Modal -->
    </div>
</template>
<script setup>
import { ref } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
const { open: openModal } = useGlobalModal()
const emit = defineEmits(['refresh', 'close'])

const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})

import JourneyHighlightForm from '@/modal-form/journeys/JourneyHighlightForm.vue'

function openForm(item = {}) {
    openModal({
        title: item?.id ? 'Edit ' + (item.title || item.highlight_name) : 'Add Highlight',
        component: JourneyHighlightForm,
        size: 'lg',
        props: {
            item,
            journey: props.journey,
        },
        onClose: handleClose,
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>
