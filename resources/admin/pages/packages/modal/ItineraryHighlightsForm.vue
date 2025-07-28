<template>
    <v-card flat>
        <v-card-title>
            <span class="font-medium">Itinerary Highlights</span>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text class="pt-10">
            <v-form ref="formRef" lazy-validation>
                <v-row>
                    <v-col cols="12" md="4">
                        <v-select v-model="form.lookup_id" :items="lookupItems" label="Highlight"
                            item-title="name" item-value="id" variant="outlined" density="comfortable"
                            :rules="[rules.required]" :error-messages="fieldErrors.lookup_id">
                            <!-- Dropdown list items -->
                            <template #item="{ props, item }">
                                <v-list-item v-bind="props">
                                    <template #prepend>
                                        <div style="height: 20px; width: 20px;object-fit: contain;" class="mr-2">
                                            <img :src="item.raw.icon_url" alt="icon" style="width: 100%;"/>
                                        </div>
                                    </template>
                                    <p class="pl-3">{{ item.name }}</p>
                                </v-list-item>
                            </template>

                            <!-- Selected item display -->
                            <template #selection="{ item }">
                                <div style="height: 20px; width: 20px;object-fit: contain;">
                                    <img :src="item.raw.icon_url" alt="icon" style="width: 100%;" />
                                </div>
                            
                                <span class="pl-2">{{ item.raw.name }}</span>
                            </template>
                        </v-select>


                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field v-model="form.sort_order" label="Sort Order" variant="outlined"
                            density="comfortable" placeholder="1" :error-messages="fieldErrors.sort_order" />

                    </v-col>

                    <v-col cols="12" md="12">

                        <v-textarea v-model="form.description" label="Description" variant="outlined"
                            density="comfortable" :rules="[rules.required]" :error-messages="fieldErrors.description" />

                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" class="ml-4" color="error" :loading="loading_delete"
                    :disabled="loading_delete" @click="handleDelete">
                    Delete
                </v-btn>
            </div>

            <div>
                <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">
                    Save
                </v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import axios from 'axios'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    itinerary: {
        type: Object,
        default: () => ({}),
    },
})

const formRef = ref(null)
const loading = ref(false)
const loading_delete = ref(false)
const lookupItems = ref([])
const fieldErrors = reactive({
    lookup_id: [],
    sort_order: [],
    description: [],
})

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    lookup_id: null,
    itinerary_id: null,
    description: '',
    sort_order: null,
})

onMounted(() => {
    fetchHighlights()
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            description: props.item.description || '',
            lookup_id: props.item.lookup_id || null,
            itinerary_id: props.item.itinerary_id || null,
            sort_order: props.item.sort_order || null,
        })
    } else {
        form.itinerary_id = props.itinerary.id
    }
})

async function fetchHighlights() {
    try {
        const resp = await axios.get('/admin/lookups?code=itinerary_highlights')
        lookupItems.value = resp.data
    } catch (err) {
        showError('Failed to load highlights')
    }
}

function handleCancel() {
    emit('close')
}

function resetFieldErrors() {
    for (const key in fieldErrors) {
        fieldErrors[key] = []
    }
}


async function submitForm() {
    const formEl = formRef.value
    const { valid, errors } = await formEl.validate()

    resetFieldErrors()

    if (!valid) {
        const allMessages = errors.flatMap(e => e.errorMessages).filter(Boolean)
        if (allMessages.length) {
            showError(allMessages.join('\n'))
        } else {
            showError('Validation failed. Please check the form.')
        }
        return
    }

    loading.value = true
    try {
        const response = await axios.post(`/admin/package-itineraries/${props.itinerary.id}/highlight`, form)
        showSuccess(response.message || 'Saved successfully')
        emit('close')
    } catch (err) {
        if (err.response && err.response.status === 422) {
            const serverErrors = err.response.data.errors || {}
            for (const field in serverErrors) {
                if (fieldErrors.hasOwnProperty(field)) {
                    fieldErrors[field] = serverErrors[field]
                }
            }
            showError('Please correct the highlighted fields.')
        } else {
            showError('Failed to save data')
        }
    } finally {
        loading.value = false
    }
}

async function handleDelete() {
    if (!form.id) return

    loading_delete.value = true
    try {
        const resp = await axios.delete(`/admin/itinerary-highlights/${form.id}/delete`)
        showSuccess(resp.message || 'Deleted successfully')
        emit('saved')
        emit('close')
    } catch (err) {
        showError('Delete failed')
    } finally {
        loading_delete.value = false
    }
}
</script>
