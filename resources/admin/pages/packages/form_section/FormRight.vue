<template>
    <div>
        <!-- <div>
            <v-card class="elevation-0">
                <v-card-title class="d-flex align-center justify-space-between py-4">
                    <h2 class="font-medium">Itineraries</h2>
                    <v-btn color="primary" size="small" title="Add Itinerary" icon @click="handleOpen()"><v-icon>mdi-plus</v-icon></v-btn>
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
                                    <v-btn color="primary" @click="handleOpen(itinerary)"
                                        variant="tonal"><v-icon>mdi-pencil-box</v-icon> Edit Item</v-btn>
    
                                </div>
                                <div v-html="itinerary.description" class="text-body-2"></div>
                            </div>
                        </v-expansion-panel-text>
                    </v-expansion-panel>
                </v-expansion-panels>
            </v-card>
        </div> -->
        <!-- <div class="mt-4">
            <v-card class="elevation-0">
                <v-card-title class="d-flex align-center justify-space-between py-4">
                    <h2 class="font-medium">Included Items</h2>
                    <v-btn color="primary" size="small" icon @click="editItem({}, false)">
                        <v-icon>mdi-plus</v-icon>
                    </v-btn>
                </v-card-title>
    
    
                <v-card-text>
                    <div v-if="travelPackage?.inclusions?.length">
                        <v-list density="compact" class="mb-4">
                            <v-list-item v-for="(item, index) in travelPackage?.inclusions" :key="'inc-' + item.id"
                                class="py-4 position-relative border mb-4 rounded">
                               
                                <div class="position-absolute top-0 right-0 mt-1 mr-1 d-flex">
                                    <v-btn icon size="x-small" variant="tonal" color="primary"
                                        @click="editItem(item, false)">
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                </div>
    
                                 <v-list-item-content>
                                    <div class="d-flex align-start">
                                        <v-icon color="success" size="20" class="mt-1 mr-3">
                                            mdi-check-outline
                                        </v-icon>
    
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <div class="text-body-2 text-medium-emphasis">{{ item.description }}</div>
                                        </div>
                                    </div>
                                </v-list-item-content>
    
                            </v-list-item>
                        </v-list>
    
    
                    </div>
                    <div v-else class="pl-4">
                        <p>Items not added yet</p>
                    </div>
                </v-card-text>
    
            </v-card>
        </div>
        <div class="mt-4">
            <v-card class="elevation-0">
                <v-card-title class="d-flex align-center justify-space-between py-4">
                    <h2 class="font-medium">Excluded Items</h2>
                    <v-btn color="primary" size="small" icon @click="editItem({}, true)">
                        <v-icon>mdi-plus</v-icon></v-btn>
                </v-card-title>
    
    
                <v-card-text>
                    <div v-if="travelPackage?.exclusions?.length">
                        <v-list density="compact" class="mb-4">
                            <v-list-item v-for="(item, index) in travelPackage?.exclusions" :key="'inc-' + item.id"
                                class="py-4 position-relative border mb-4 rounded">
                  
                                <div class="position-absolute top-0 right-0 mt-1 mr-1 d-flex">
                                    <v-btn icon size="x-small" variant="tonal" color="primary"
                                        @click="editItem(item, true)">
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                </div>
    
                                <v-list-item-content>
                                    <div class="d-flex align-start">
                                        <v-icon color="error" size="20" class="mt-1 mr-3">
                                            mdi-close-outline
                                        </v-icon>
    
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <div class="text-body-2 text-medium-emphasis">{{ item.description }}</div>
                                        </div>
                                    </div>
                                </v-list-item-content>
    
                            </v-list-item>
                        </v-list>
    
                    </div>
                    <div v-else class="pl-4">
                        <p>Items not added yet</p>
                    </div>
                </v-card-text>
    
            </v-card>
        </div> -->
        <!-- <modal-template ref="globalModal" @saved="handleSaved" @close="handleClose"></modal-template> -->
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
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
    }
})


const editItem = (item, is_excluded) => {


    // Open dialog and populate form for editing
    globalModal.value.open({
        title: item ? 'Edit Item' : 'Add Item',
        component: IncludeExcludeForm,
        size: 'lg',
        props: {
            item, // <-- correctly passed as a prop
            isExcluded: is_excluded,
            travelPackageId: props.travelPackageId
        },
    });
}

// const deleteItem = (item) => {
//     console.log(item);
// }

// const inclusions = ref([])

// const exclusions = ref([])
// onMounted(() => {
//     inclusions.value = props.travelPackage?.inclusions || []
//     exclusions.value = props.travelPackage?.exclusions || []
// })



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
    console.log("save", { param });
}
</script>
<style lang="scss" scoped>
// .position-absolute {
//     position: absolute;
// }

// .top-0 {
//     top: 0;
// }

// .right-0 {
//     right: 0;
// }

// .mt-1 {
//     margin-top: 4px;
// }

// .mr-1 {
//     margin-right: 4px;
// }
</style>
