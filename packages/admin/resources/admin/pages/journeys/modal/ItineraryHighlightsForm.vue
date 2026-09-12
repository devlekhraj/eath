<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Itinerary Highlights </span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pt-10">
            <v-form ref="formRef" lazy-validation>
                <v-row>
                    <v-col cols="12" md="8">
                        <v-text-field v-model="form.title" label="Title" :rules="[rules.required]" :error-messages="fieldErrors.title" />
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field v-model="form.sort_order" label="Sort Order" placeholder="1" :error-messages="fieldErrors.sort_order" />

                    </v-col>

                    <v-col cols="12" md="12">

                        <v-textarea v-model="form.description" label="Description" :rules="[rules.required]" :error-messages="fieldErrors.description" />

                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-divider />

        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" class="ml-4" color="error" :loading="loading_delete" :disabled="loading_delete" @click="handleDelete">
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
import { useSnackbar } from '@/composables/snackbar'
import { saveJourneyItineraryHighlight, deleteJourneyItineraryHighlight } from '@/api/journeys.api'

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
const fieldErrors = reactive({
    title: [],
    sort_order: [],
    description: [],
})

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    title: '',
    journey_itinerary_day_id: null,
    description: '',
    sort_order: null,
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            title: props.item.title || '',
            description: props.item.description || '',
            journey_itinerary_day_id: props.item.journey_itinerary_day_id || null,
            sort_order: props.item.sort_order || null,
        })
    } else {
        form.journey_itinerary_day_id = props.itinerary.id
    }
})

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
        const response = await saveJourneyItineraryHighlight(props.itinerary.id, form)
        showSuccess(response.message || 'Saved successfully')
        emit('saved')
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
        const resp = await deleteJourneyItineraryHighlight(form.id)
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
