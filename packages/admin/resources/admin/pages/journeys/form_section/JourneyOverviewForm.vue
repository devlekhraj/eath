<template>
    <div class="mb-4">
        <v-card class="pa-4">
            <v-card-text class="pt-2">
                <v-row dense>
                    <v-col cols="12" md="8">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.name"
                                label="Journey Name"
                                :rules="[rules.required]"
                                :error-messages="errors.name"
                                :disabled="submitting"
                                required
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.slug"
                                label="URL Slug"
                                :rules="[rules.required, rules.slug]"
                                :error-messages="errors.slug"
                                :disabled="submitting"
                                required
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.subtitle"
                                label="Subtitle / Tagline"
                                :error-messages="errors.subtitle"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.summary"
                                label="Summary (Website Card & Hero Intro)"
                                :rules="[rules.required]"
                                rows="3"
                                auto-grow
                                :error-messages="errors.summary"
                                :disabled="submitting"
                                required
                            />
                        </div>
                    </v-col>

                    <!-- Destination & Guide -->
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-select
                                v-model="form.destination_id"
                                :items="destination_list"
                                item-title="name"
                                item-value="id"
                                label="Destination Region"
                                :rules="[rules.required]"
                                :error-messages="errors.destination_id"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-select
                                v-model="form.guide_id"
                                :items="guide_list"
                                item-title="name"
                                item-value="id"
                                label="Lead Guide"
                                clearable
                                :error-messages="errors.guide_id"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <!-- Experiences & Travel Months -->
                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-select
                                v-model="form.experience_ids"
                                :items="experience_list"
                                item-title="name"
                                item-value="id"
                                label="Experiences / Themes"
                                multiple
                                chips
                                closable-chips
                                :error-messages="errors.experience_ids"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-select
                                v-model="form.travel_month_ids"
                                :items="travel_month_list"
                                item-title="name"
                                item-value="id"
                                label="Best Travel Months"
                                multiple
                                chips
                                closable-chips
                                :error-messages="errors.travel_month_ids"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <!-- Duration, Pricing, Altitude -->
                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.duration_days"
                                label="Duration Days"
                                type="number"
                                min="1"
                                :rules="[rules.required, rules.numeric, rules.positive]"
                                :error-messages="errors.duration_days"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.duration_nights"
                                label="Duration Nights"
                                type="number"
                                min="0"
                                :rules="[rules.numeric, rules.positive]"
                                :error-messages="errors.duration_nights"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.price"
                                label="Base Price (USD)"
                                type="number"
                                min="0"
                                prefix="$"
                                :rules="[rules.numeric, rules.positive]"
                                :error-messages="errors.price"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-select
                                v-model="form.pricing_basis"
                                :items="pricingBasisOptions"
                                item-title="title"
                                item-value="value"
                                label="Pricing Basis"
                                :error-messages="errors.pricing_basis"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.max_altitude_m"
                                label="Max Altitude (m)"
                                type="number"
                                min="0"
                                :rules="[rules.numeric, rules.positive]"
                                :error-messages="errors.max_altitude_m"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.walking_hours_min"
                                label="Walking Hours Min"
                                type="number"
                                min="0"
                                max="24"
                                :rules="[rules.numeric, rules.positive]"
                                :error-messages="errors.walking_hours_min"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.walking_hours_max"
                                label="Walking Hours Max"
                                type="number"
                                min="0"
                                max="24"
                                :rules="[rules.numeric, rules.positive]"
                                :error-messages="errors.walking_hours_max"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="6" md="3">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.featured_rank"
                                label="Featured Rank"
                                type="number"
                                min="0"
                                :error-messages="errors.featured_rank"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <!-- Selects: Difficulty, Accommodation, Pace -->
                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-select
                                v-model="form.difficulty"
                                :items="difficultyOptions"
                                label="Difficulty"
                                :error-messages="errors.difficulty"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-select
                                v-model="form.accommodation_style"
                                :items="accommodationOptions"
                                label="Accommodation Style"
                                clearable
                                :error-messages="errors.accommodation_style"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-select
                                v-model="form.pace"
                                :items="paceOptions"
                                label="Pace"
                                clearable
                                :error-messages="errors.pace"
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <!-- Status Switches -->
                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_active"
                                label="Active (Enabled in System)"
                                inset
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_featured"
                                label="Featured (Homepage & Highlights)"
                                inset
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_published"
                                label="Published (Visible on Website)"
                                inset
                                :disabled="submitting"
                            />
                        </div>
                    </v-col>
                </v-row>

                <v-divider class="my-6" />

                <div class="d-flex justify-end">
                    <v-btn
                        color="primary"
                        variant="flat"
                        size="large"
                        class="px-8 font-weight-medium"
                        :loading="submitting"
                        :disabled="submitting"
                        @click="submitJourney"
                    >
                        <v-icon start>mdi-check</v-icon>
                        {{ journeyId ? 'Update Journey Overview' : 'Create Journey' }}
                    </v-btn>
                </div>
            </v-card-text>
        </v-card>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})

const emit = defineEmits(['refresh'])

const submitting = ref(false)
const destination_list = ref([])
const guide_list = ref([])
const experience_list = ref([])
const travel_month_list = ref([])
const errors = ref({})

const form = reactive({
    id: null,
    name: '',
    slug: '',
    subtitle: '',
    summary: '',
    description: '',
    duration_days: 1,
    duration_nights: 0,
    price: '',
    pricing_basis: 'per_person',
    max_altitude_m: '',
    walking_hours_min: '',
    walking_hours_max: '',
    difficulty: 'moderate',
    accommodation_style: 'standard',
    pace: 'balanced',
    featured_rank: 0,
    is_active: true,
    is_featured: false,
    is_published: false,
    destination_id: null,
    guide_id: null,
    experience_ids: [],
    travel_month_ids: [],
    published_at: null,
})

const rules = {
    required: (v) => !!v || 'This field is required',
    numeric: (v) => !v || !isNaN(v) || 'Must be a number',
    positive: (v) => !v || Number(v) >= 0 || 'Must be positive',
    slug: (v) => !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) || 'Use lowercase letters, numbers, and hyphens',
}

const difficultyOptions = ['easy', 'moderate', 'challenging', 'strenuous']
const accommodationOptions = ['standard', 'comfort', 'luxury', 'mixed']
const paceOptions = ['relaxed', 'balanced', 'active', 'intense']
const pricingBasisOptions = [
    { title: 'Per Person', value: 'per_person' },
    { title: 'Per Group', value: 'group' },
]

const journeyId = ref(null)

watch(
    () => props.journey,
    (newVal) => {
        if (newVal && Object.keys(newVal).length) {
            Object.assign(form, {
                ...newVal,
                destination_id: newVal.destination_id ?? null,
                guide_id: newVal.guide_id ?? null,
                experience_ids: Array.isArray(newVal.experience_ids) ? [...newVal.experience_ids] : (newVal.experiences ? newVal.experiences.map(e => e.id) : []),
                travel_month_ids: Array.isArray(newVal.travel_month_ids) ? [...newVal.travel_month_ids] : (newVal.travel_months ? newVal.travel_months.map(m => m.id) : []),
                pricing_basis: newVal.pricing_basis ?? 'per_person',
                summary: newVal.summary ?? '',
                description: newVal.description ?? '',
                price: newVal.price ?? (newVal.price_minor ? newVal.price_minor / 100 : ''),
                walking_hours_min: newVal.walking_hours_min ?? '',
                walking_hours_max: newVal.walking_hours_max ?? '',
                featured_rank: newVal.featured_rank ?? 0,
                is_active: Boolean(newVal.is_active),
                is_featured: Boolean(newVal.is_featured),
                is_published: Boolean(newVal.is_published),
            })
            journeyId.value = newVal.id
        }
    },
    { immediate: true }
)

onMounted(() => {
    fetchDestinations()
    fetchGuides()
    fetchExperiences()
    fetchTravelMonths()
})

async function fetchDestinations() {
    try {
        const resp = await http.get('/admin/destinations')
        destination_list.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to fetch destinations', error)
    }
}

async function fetchGuides() {
    try {
        const resp = await http.get('/admin/guides')
        guide_list.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to fetch guides', error)
    }
}

async function fetchExperiences() {
    try {
        const resp = await http.get('/admin/experiences')
        experience_list.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to fetch experiences', error)
    }
}

async function fetchTravelMonths() {
    try {
        const resp = await http.get('/admin/travel-months')
        travel_month_list.value = resp.data?.data ?? resp.data ?? []
    } catch (error) {
        console.error('Failed to fetch travel months', error)
    }
}

async function submitJourney() {
    submitting.value = true
    errors.value = {}

    try {
        const payload = {
            ...form,
            price_minor: form.price ? Math.round(Number(form.price) * 100) : 0,
        }

        const resp = await http.post('/admin/journeys', payload)

        showSuccess(resp.data?.message ?? resp.message ?? 'Journey saved successfully')
        emit('refresh')
    } catch (error) {
        showError(error?.response?.data?.message || 'An error occurred while saving journey')
        errors.value = error?.response?.data?.errors || {}
    } finally {
        submitting.value = false
    }
}
</script>
