<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span class="text-subtitle-1 font-weight-bold text-uppercase">Edit {{ form.name }} (Month #{{ form.month_number }})</span>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pa-4">
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row dense>
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-select
                                v-model="form.season"
                                :items="seasonOptions"
                                label="Season"
                                :rules="[rules.required]"
                                :error-messages="serverErrors.season"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_active"
                                label="Active (Available in Planning)"
                                inset
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.conditions_note"
                                label="Weather & Trail Conditions Note"
                                placeholder="e.g. Crisp skies, excellent mountain clarity, moderate temperatures."
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.content.trail_vibe"
                                label="Trail Atmosphere & Crowds (Vibe)"
                                placeholder="e.g. Peaceful, uncrowded villages with warm teahouse hearths."
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.content.pack_tip"
                                label="Seasonal Gear & Packing Tip"
                                placeholder="e.g. Down jackets, thermal layering systems."
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-select
                                v-model.number="form.content.clarity_score"
                                :items="[1, 2, 3, 4, 5]"
                                label="Sky Clarity Score (1-5)"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="8">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.content.clarity_label"
                                label="Sky Clarity Label"
                                placeholder="e.g. Crystal 360° Clarity, Prime Panoramic"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-select
                                v-model.number="form.content.footprint_score"
                                :items="[1, 2, 3, 4, 5]"
                                label="Trail Footprint / Crowd (1-5)"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.content.footprint_label"
                                label="Trail Footprint Label"
                                placeholder="e.g. Peak Vitality, Active & Social"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.content.badge"
                                label="Seasonal Badge / Kicker"
                                placeholder="e.g. Peak Trekking Season"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.summary"
                                label="Summary"
                                rows="2"
                                auto-grow
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.description"
                                label="Full Description"
                                rows="4"
                                auto-grow
                            />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" variant="flat" class="px-6 font-weight-medium" :loading="loading" :disabled="loading" @click="submitForm">
                <v-icon start>mdi-check</v-icon>
                Save Changes
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { updateTravelMonthApi } from '@/http/travel-months.http'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const seasonOptions = ['winter', 'spring', 'summer', 'autumn']

const form = reactive({
    id: null,
    month_number: 1,
    name: '',
    season: 'spring',
    conditions_note: '',
    summary: '',
    description: '',
    content: {
        trail_vibe: '',
        pack_tip: '',
        clarity_score: 3,
        clarity_label: '',
        footprint_score: 3,
        footprint_label: '',
        badge: '',
    },
    is_active: true,
})

const serverErrors = reactive({})

const rules = {
    required: (v) => !!v || 'This field is required',
}

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            month_number: props.item.month_number || 1,
            name: props.item.name || '',
            season: props.item.season || 'spring',
            conditions_note: props.item.conditions_note || '',
            summary: props.item.summary || '',
            description: props.item.description || '',
            content: {
                trail_vibe: props.item.content?.trail_vibe || '',
                pack_tip: props.item.content?.pack_tip || '',
                clarity_score: Number(props.item.content?.clarity_score) || 3,
                clarity_label: props.item.content?.clarity_label || '',
                footprint_score: Number(props.item.content?.footprint_score) || 3,
                footprint_label: props.item.content?.footprint_label || '',
                badge: props.item.content?.badge || '',
                reasons: props.item.content?.reasons || [],
                limitations: props.item.content?.limitations || [],
            },
            is_active: props.item.is_active ?? true,
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    Object.keys(serverErrors).forEach((key) => (serverErrors[key] = null))

    const { valid } = await formRef.value.validate()
    if (!valid) return

    try {
        loading.value = true
        const resp = await updateTravelMonthApi(form.id, {
            season: form.season,
            conditions_note: form.conditions_note,
            summary: form.summary,
            description: form.description,
            content: form.content,
            is_active: form.is_active,
        })

        showSuccess(resp.data?.message ?? resp.message ?? 'Travel month updated successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to update travel month')
        }
        console.error('Update travel month failed', error)
    } finally {
        loading.value = false
    }
}
</script>
