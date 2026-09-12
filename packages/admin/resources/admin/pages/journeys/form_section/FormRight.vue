<template>
    <div>
        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center justify-space-between py-0">
                <h2>Itineraries</h2>
                <v-btn color="primary" size="small" title="Add Itinerary" icon @click="handleOpen()">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider />
            <v-expansion-panels multiple elevation="1">
                <v-expansion-panel v-for="(itinerary, index) in travelPackage?.itineraries" :key="index">
                    <v-expansion-panel-title>
                        {{ itinerary.title }}
                    </v-expansion-panel-title>

                    <v-expansion-panel-text>
                        <div>
                            <div class="mb-3">
                                <v-btn color="primary" @click="handleOpen(itinerary)" variant="tonal">
                                    <v-icon>mdi-pencil-box</v-icon> Edit Item
                                </v-btn>
                            </div>
                            <div v-if="itinerary.description" class="text-body-2">
                               
                                <SummarnoteViewer :value="itinerary.description" />
                            </div>
                        </div>
                    </v-expansion-panel-text>
                </v-expansion-panel>
            </v-expansion-panels>
        </v-card>

        <div v-if="travelPackageId">
            <!-- Included Items -->
            <div class="mt-4">
                <v-card class="elevation-0">
                    <v-card-title class="d-flex align-center justify-space-between py-0">
                        <h2>Included Items</h2>
                        <v-btn color="primary" size="small" icon @click="editItem({}, false)">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-card-title>

                    <v-card-text>
                        <div v-if="travelPackage?.inclusions?.length">
                            <v-list density="compact" class="mb-4">
                                <v-list-item v-for="(item, index) in travelPackage?.inclusions" :key="'inc-' + item.id"
                                    class="py-4 position-relative border mb-4 rounded">
                                    <div class="position-absolute top-0 right-0 mr-1 d-flex" :class="item.description ? 'mt-1':''">
                                        <v-btn icon size="x-small" variant="tonal" color="primary" @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                    </div>

                                    <div class="d-flex align-start">
                                        <v-icon color="success" size="20" class="mr-3" :class="item.description ? 'mt-1':''">
                                            mdi-check-outline
                                        </v-icon>
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <div class="text-body-2 text-medium-emphasis" v-if="item?.description">{{ item.description }}</div>
                                        </div>
                                    </div>
                                </v-list-item>
                            </v-list>
                        </div>
                        <div v-else class="pl-4">
                            <p>Items not added yet</p>
                        </div>
                    </v-card-text>
                </v-card>
            </div>

            <!-- Excluded Items -->
            <div class="mt-4">
                <v-card class="elevation-0">
                    <v-card-title class="d-flex align-center justify-space-between py-0">
                        <h2 class="font-medium">Excluded Items</h2>
                        <v-btn color="primary" size="small" icon @click="editItem({}, true)">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-card-title>

                    <v-card-text>
                        <div v-if="travelPackage?.exclusions?.length">
                            <v-list density="compact" class="mb-4">
                                <v-list-item v-for="(item, index) in travelPackage?.exclusions" :key="'exc-' + item.id"
                                    class="py-4 position-relative border mb-4 rounded">
                                    <div class="position-absolute top-0 right-0 mr-1 d-flex" :class="item.description ? 'mt-1':''">
                                        <v-btn icon size="x-small" variant="tonal" color="primary" @click="editItem(item, true)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                    </div>

                                    <div class="d-flex align-start">
                                        <v-icon color="error" size="20" class="mr-3" :class="item.description ? 'mt-1':''">
                                            mdi-close-outline
                                        </v-icon>
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <div class="text-body-2 text-medium-emphasis" v-if="item?.description">{{ item.description }}</div>
                                        </div>
                                    </div>
                                </v-list-item>
                            </v-list>
                        </div>
                        <div v-else class="pl-4">
                            <p>Items not added yet</p>
                        </div>
                    </v-card-text>
                </v-card>
            </div>

            <!-- Modal -->
            <modal-template ref="globalModal" @saved="handleSaved" @close="handleClose"></modal-template>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import ItineraryForm from '../modal/ItineraryForm.vue'
import IncludeExcludeForm from '../modal/IncludeExcludeForm.vue'

const emit = defineEmits(['close'])

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
    travelPackageId: {
        type: Number,
        required: true,
    },
})

const globalModal = ref(null)

function handleOpen(item = {}) {
    globalModal.value.open({
        title: item?.id ? 'Edit Category' : 'Add New Category',
        component: ItineraryForm,
        size: 'lg',
        props: {
            item,
            travelPackageId: props.travelPackageId,
        },
    })
}

function editItem(item, is_excluded) {
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add Item',
        component: IncludeExcludeForm,
        size: 'lg',
        props: {
            item,
            isExcluded: is_excluded,
            travelPackageId: props.travelPackageId,
        },
    })
}

function handleClose() {
    emit('close')
}

function handleSaved(param) {
    console.log("save", { param });
}
</script>
