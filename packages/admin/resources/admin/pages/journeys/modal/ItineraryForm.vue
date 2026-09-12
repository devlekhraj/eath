<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Itinerary Form</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12" md="3">
                        <div class="mb-2">
                            <v-text-field v-model="form.day_number" label="Day" type="number" :rules="[rules.required]" required />
                        </div>
                    </v-col>
                    <v-col cols="12" md="9">
                        <div class="mb-2">
                            <v-text-field v-model="form.title" label="Title" placeholder="Arrival in Kathmandu" :rules="[rules.required]" required />
                        </div>
                    </v-col>
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field v-model="form.route" label="Route" />
                        </div>
                    </v-col>
                    <v-col cols="12" md="3">
                        <div class="mb-2">
                            <v-text-field v-model="form.altitude_m" label="Altitude (m)" type="number" />
                        </div>
                    </v-col>
                    <v-col cols="12" md="3">
                        <div class="mb-2">
                            <v-text-field v-model="form.walking_hours" label="Walking Hours" type="number" />
                        </div>
                    </v-col>
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field v-model="form.accommodation_label" label="Accommodation" />
                        </div>
                    </v-col>
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field v-model="form.meal_note" label="Meals" />
                        </div>
                    </v-col>

                    <v-col cols="12" md="12">
                        <SummarnoteEditor v-model="form.description" />
                        <span v-if="descriptionError" class="text-error text-caption">Content is required</span>
                    </v-col>
          

                </v-row>
            </v-form>
        </v-card-text>
        <v-card-actions class="justify-end">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" class="ml-4" color="error" :loading="loading_delete" :disabled="loading_delete" @click="handleDelete">Delete</v-btn>
            </div>
            <div>
                <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue';

import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { saveJourneyItineraryDay, deleteJourneyItineraryDay } from '@/api/journeys.api'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])
const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    journeyId: {
        type: Number,
        required: true,
    }
})

const formRef = ref(null)
const loading = ref(false)
const loading_delete = ref(false)
const descriptionError = ref(false)

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    day_number: null,
    title: '',
    route: '',
    description: '',
    altitude_m: null,
    walking_hours: null,
    accommodation_label: '',
    meal_note: '',
    is_acclimatization: false,
    sort_order: null,
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            day_number: props.item.day_number || null,
            title: props.item.title || '',
            journey_id: props.item.journey_id || null,
            route: props.item.route || '',
            description: props.item.description || '',
            altitude_m: props.item.altitude_m || null,
            walking_hours: props.item.walking_hours || null,
            accommodation_label: props.item.accommodation_label || '',
            meal_note: props.item.meal_note || '',
            is_acclimatization: props.item.is_acclimatization ?? false,
            sort_order: props.item.sort_order || null,
        })
    }
    Object.assign(form, {
        journey_id: props.journeyId
    })
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}
async function handleDelete(item) {
    try {
        loading_delete.value = true

        // Submit logic here, for example:
        const resp = await deleteJourneyItineraryDay(props.item.id)
        showSuccess(resp.message || "Itinerary day deleted successfully");
        console.log(resp.data);
        emit('close')

    } catch (err) {
        showSuccess("Failed to Delete");
        console.error('Failed to save:', err)
    } finally {
        loading_delete.value = false
    }
}

async function submitForm() {

    // if (!formRef.value) return

    const valid = await formRef.value.validate()
    if (!valid) return

    descriptionError.value = !form.description || form.description.trim() === ''
    if (descriptionError.value) return

    try {
        loading.value = true

        // Submit logic here, for example:
        const resp = await saveJourneyItineraryDay(props.journeyId, form)
        console.log(resp.data);
        showSuccess(resp.message || "Itinerary day saved successfully");
        emit('saved')
        emit('close')

    } catch (err) {
        console.error('Failed to save:', err)
        showError("Failed");
    } finally {
        loading.value = false
    }
}
</script>
