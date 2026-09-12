<template>
    <div class="mb-4">
        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center justify-space-between py-0">
                <!-- <h2 class="font-medium">Highlights</h2> -->
                <v-btn color="primary" title="Add Highlight" @click="openForm()">
                    <v-icon>mdi-plus</v-icon> Add Highlight
                </v-btn>
            </v-card-title>
            <!-- <v-divider /> -->
            <v-card-text>


                <div class="mt-4">

                    <v-row>
                        <v-col cols="12" md="6" v-for="(highlight, index) in travelPackage?.highlights" :key="index">
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
        <!-- Modal -->
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import { ref } from 'vue'
const emit = defineEmits(['refresh', 'close'])

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

const globalModal = ref(null)
import PackageHighlightForm from '../modal/PackageHighlightForm.vue'

function openForm(item = {}) {
    globalModal.value.open({
        title: item?.id ? 'Edit ' + (item.title || item.highlight_name) : 'Add Highlight',
        component: PackageHighlightForm,
        size: 'lg',
        props: {
            item,
            travelPackage: props.travelPackage,
        },
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>
