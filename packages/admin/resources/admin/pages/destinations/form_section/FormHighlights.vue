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
                        <v-col cols="12" md="6" v-for="(highlight, index) in travelPackage?.highlights" :key="index">
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
                                        <v-btn color="primary" icon size="small" @click="openForm(highlight)" variant="tonal">
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
            </div>
</template>
<script setup>
import http from '@/http.config'

import { useGlobalModal } from '@/composables/globalModal'
const emit = defineEmits(['refresh', 'close'])


const { open: openModal } = useGlobalModal()


const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})




import PackageHighlightForm from '../modal/PackageHighlightForm.vue'

function openForm(item = {}) {
    openModal({
        title: item ? 'Edit ' + item.title : 'Add Highlight',
        component: PackageHighlightForm,
        size: 'lg',
        props: {
            item,
            travelPackage: props.travelPackage,
        },
        onClose: handleClose,
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>
