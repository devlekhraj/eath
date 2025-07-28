<template>
    <div>
        <v-card elevation="0" class="mt-4">
            <v-card-title class="d-flex align-center justify-space-between py-4">
                <h2 class="font-medium">Include / Exclude Items</h2>
                <!-- <v-btn color="primary" size="small" title="Add Itinerary" icon @click="handleOpen()">
                    <v-icon>mdi-plus</v-icon>
                </v-btn> -->
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation class="border pa-4 rounded">
                    <div>

                        <div class="w-100">
                            <div>
                                <v-text-field label="Item name" v-model="form.title" hide-details density="comfortable"
                                    :rules="[rules.required]"></v-text-field>
                            </div>
                            <div>
                                <v-switch label="Is Excluded?" v-model="form.is_excluded" inset
                                    color="error"></v-switch>
                            </div>
                        </div>
                        <div class="text-center">
                            <v-btn color="primary" rounded size="large" :loading="loading" :disabled="loading"
                                @click="handleSubmit()">
                                <v-icon>mdi-check</v-icon> &nbsp; Save
                            </v-btn>
                        </div>
                    </div>
                </v-form>
                <div class="mb-4">
                    <div v-if="travelPackage?.inclusions?.length" class="mt-4">
                        <div>
                            <p>Included Items</p>
                        </div>
                        <v-list density="compact">
                            <v-list-item v-for="(item, index) in travelPackage?.inclusions" :key="'inc-' + item.id"
                                class="px-0">

                                <div class="border rounded d-flex align-center justify-space-between pa-2">
                                    <div class="d-flex align-start pl-2">
                                        <v-icon color="success" size="20" class="mr-3"
                                            :class="item.description ? 'mt-1' : ''">
                                            mdi-check-outline
                                        </v-icon>
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <!-- <div class="text-body-2 text-medium-emphasis" v-if="item?.description">{{
                                                item.description }}</div> -->
                                        </div>
                                    </div>
                                    <div>
                                        <v-btn icon size="x-small" variant="tonal" color="primary"
                                            @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn icon size="x-small" variant="tonal" color="error" class="ml-3"
                                            @click="deleteItem(item)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </v-list-item>
                        </v-list>
                    </div>
                </div>

                <div>
                    <div v-if="travelPackage?.exclusions?.length">
                        <div>
                            <p>Excluded Items</p>
                        </div>
                        <v-list density="compact">
                            <v-list-item v-for="(item, index) in travelPackage?.exclusions" :key="'inc-' + item.id"
                                class="px-0">

                                <div class="border rounded d-flex align-center justify-space-between pa-2">
                                    <div class="d-flex align-start pl-2">
                                        <v-icon color="success" size="20" class="mr-3"
                                            :class="item.description ? 'mt-1' : ''">
                                            mdi-check-outline
                                        </v-icon>
                                        <div>
                                            <div class="font-weight-medium">{{ item.title }}</div>
                                            <!-- <div class="text-body-2 text-medium-emphasis" v-if="item?.description">{{
                                                item.description }}</div> -->
                                        </div>
                                    </div>
                                    <div>
                                        <v-btn icon size="x-small" variant="tonal" color="primary"
                                            @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn icon size="x-small" variant="tonal" color="error" class="ml-3"
                                            @click="deleteItem(item)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </v-list-item>
                        </v-list>
                    </div>
                </div>
            </v-card-text>
        </v-card>
        <!-- Modal -->
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['refresh', 'close'])


const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

const rules = {
    required: (v) => !!v || 'This field is required',
}

const formRef = ref(null)
const loading = ref(false);
const serverErrors = reactive({})
const globalModal = ref(null)

const form = reactive({
    title: '',
    is_excluded: false,
    travel_package_id: props.travelPackage.id,
})

async function handleSubmit() {
    const { valid, errors } = await formRef.value.validate()
    if (!valid) {
        const allMessages = errors.flatMap(e => e.errorMessages).filter(Boolean)
        if (allMessages.length) {
            showError(allMessages.join('\n'))
        } else {
            showError('Validation failed. Please check the form.')
        }
        return
    }

    // Clear previous errors
    Object.keys(serverErrors).forEach((key) => delete serverErrors[key])

    try {
        loading.value = true
        const resp = await axios.post(
            `/admin/travel-packages/${props.travelPackage.id}/inlusions`,
            form
        )
        Object.assign(form, {
            title: '',
        })
        emit('refresh')
    } catch (err) {
        if (err.response?.status === 422) {
            const errors = err.response.data.errors
            for (const key in errors) {
                serverErrors[key] = errors[key]
            }
        } else {
            console.error('Failed to save:', err)
        }
    } finally {
        loading.value = false
    }
}

// const globalModal = ref(null)

import DeleteIncludeItem from '../modal/DeleteIncludeItem.vue'
import IncludeExcludeForm from '../modal/IncludeExcludeForm.vue'

function deleteItem(item) {
    globalModal.value.open({
        title: 'Delete Item',
        component: DeleteIncludeItem,
        size: 'sm',
        props: {
            item,
        },
    })
}
function editItem(item) {
    globalModal.value.open({
        title: 'Edit ' + item.title,
        component: IncludeExcludeForm,
        size: 'md',
        props: {
            item,
        },
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>