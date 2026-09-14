<template>
    <div class="mb-4">
        <v-card class="pa-2">
          
            <v-card-text>
                <div class="mb-4">
                    <SummarnoteEditor v-model="form.description" />
                    <span v-if="descriptionError" class="text-error text-caption">Content is required</span>
                </div>

                <div class="mt-6 text-center">
                    <v-btn color="primary" :loading="submitting" :disabled="submitting" @click="submitJourney">
                        <v-icon left>mdi-check</v-icon>
                        {{ journeyId ? 'Update Description' : 'Create Description' }}
                    </v-btn>
                </div>
            </v-card-text>
        </v-card>
    </div>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue';
import { reactive, ref, watch } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { saveJourney } from '@/http/journeys.http'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})

const emit = defineEmits(['refresh'])

const submitting = ref(false)
const descriptionError = ref(false)
const errors = ref({})

const form = reactive({
    id: null,
    name: '',
    slug: '',
    summary: '',
    description: '',
    destination_id: null,
    overview_secondary: '',
    accommodation_note: '',
    logistics_note: '',
    safety_note: '',
    route_map_note: '',
})

const journeyId = ref(null)

watch(
    () => props.journey,
    (newVal) => {
        if (newVal && Object.keys(newVal).length) {
            Object.assign(form, {
                ...newVal,
                summary: newVal.summary ?? '',
                description: newVal.description ?? '',
                overview_secondary: newVal.overview_secondary ?? '',
                accommodation_note: newVal.accommodation_note ?? '',
                logistics_note: newVal.logistics_note ?? '',
                safety_note: newVal.safety_note ?? '',
                route_map_note: newVal.route_map_note ?? '',
            })
            journeyId.value = newVal.id
        }
    },
    { immediate: true }
)

async function submitJourney() {
    descriptionError.value = !form.description || form.description.trim() === ''
    if (descriptionError.value) return

    submitting.value = true
    errors.value = {}

    try {
        const payload = {
            id: form.id,
            name: form.name,
            slug: form.slug,
            summary: form.summary,
            description: form.description,
            destination_id: form.destination_id,
            overview_secondary: form.overview_secondary,
            accommodation_note: form.accommodation_note,
            logistics_note: form.logistics_note,
            safety_note: form.safety_note,
            route_map_note: form.route_map_note,
        }

        const resp = await saveJourney(payload)

        showSuccess(resp.message || 'Journey description saved successfully')
        emit('refresh')
    } catch (error) {
        showError(error?.response?.data?.message || 'An error occurred')
        errors.value = error?.response?.data?.errors || {}
    } finally {
        submitting.value = false
    }
}
</script>
