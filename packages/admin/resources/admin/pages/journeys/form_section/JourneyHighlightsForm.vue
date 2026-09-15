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
                    <v-list v-if="journey?.highlights?.length" style="font-size: 14px;">
                        <template v-for="(highlight, index) in journey?.highlights" :key="index">
                            <v-list-item class="px-0 py-3">
                                <template #prepend>
                                    <v-avatar size="36" color="primary" variant="tonal" class="mr-3">
                                        <v-icon size="20">{{ highlight.icon || highlight.icon_url || 'mdi-star' }}</v-icon>
                                    </v-avatar>
                                </template>

                                <v-list-item-title class="text-primary" style="font-size: 14px !important; font-weight: 400; line-height: 1.5; white-space: normal;">
                                    {{ highlight.title || highlight.highlight_name }}
                                </v-list-item-title>

                                <v-list-item-subtitle v-if="highlight.description" class="text-slate-600 mt-1" style="font-size: 14px !important; white-space: normal; line-height: 1.4;">
                                    {{ highlight.description }}
                                </v-list-item-subtitle>

                                <template #append>
                                    <v-btn color="primary" variant="outlined" @click="openForm(highlight)">
                                        <v-icon start size="14">mdi-pencil</v-icon>
                                        Edit
                                    </v-btn>
                                </template>
                            </v-list-item>
                            <v-divider v-if="index < journey.highlights.length - 1" />
                        </template>
                    </v-list>
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
