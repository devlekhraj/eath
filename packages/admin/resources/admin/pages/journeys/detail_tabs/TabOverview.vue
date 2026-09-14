<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-form ref="formRef" @submit.prevent="handleUpdate">
          <v-row>
            <!-- Basic Information -->
            <v-col cols="12" md="8">
              <div class="mb-2">
                <v-text-field
                  v-model="form.name"
                  label="Journey Name *"
                  placeholder="e.g. Everest Base Camp Trek"
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
                  label="URL Slug *"
                  placeholder="e.g. everest-base-camp-trek"
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
                  placeholder="e.g. The premier high-altitude adventure into Sagarmatha"
                  :error-messages="errors.subtitle"
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <v-col cols="12">
              <div class="mb-2">
                <v-textarea
                  v-model="form.summary"
                  label="Summary (Website Card & Teaser) *"
                  placeholder="Compelling 2-3 sentence overview highlighting the essence of this expedition."
                  :rules="[rules.required]"
                  rows="3"
                  auto-grow
                  :error-messages="errors.summary"
                  :disabled="submitting"
                  required
                />
              </div>
            </v-col>

            <!-- Classification: Destination & Guide -->
            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-select
                  v-model="form.destination_id"
                  :items="destinationList"
                  item-title="name"
                  item-value="id"
                  label="Destination Region *"
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
                  :items="guideList"
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
                  :items="experienceList"
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
                  :items="travelMonthList"
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

            <!-- Route Metrics & Specs -->
            <v-col cols="6" md="3">
              <div class="mb-2">
                <v-text-field
                  v-model.number="form.duration_days"
                  label="Duration Days *"
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
                  v-model.number="form.duration_nights"
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
                  label="Base Price (USD) *"
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
                  v-model.number="form.max_altitude_m"
                  label="Max Altitude (m)"
                  type="number"
                  min="0"
                  suffix="m"
                  :rules="[rules.numeric, rules.positive]"
                  :error-messages="errors.max_altitude_m"
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <v-col cols="6" md="3">
              <div class="mb-2">
                <v-text-field
                  v-model.number="form.walking_hours_min"
                  label="Walking Hours Min"
                  type="number"
                  min="0"
                  max="24"
                  suffix="hrs"
                  :rules="[rules.numeric, rules.positive]"
                  :error-messages="errors.walking_hours_min"
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <v-col cols="6" md="3">
              <div class="mb-2">
                <v-text-field
                  v-model.number="form.walking_hours_max"
                  label="Walking Hours Max"
                  type="number"
                  min="0"
                  max="24"
                  suffix="hrs"
                  :rules="[rules.numeric, rules.positive]"
                  :error-messages="errors.walking_hours_max"
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <v-col cols="6" md="3">
              <div class="mb-2">
                <v-text-field
                  v-model.number="form.featured_rank"
                  label="Featured Rank"
                  type="number"
                  min="0"
                  hint="Order on featured lists"
                  persistent-hint
                  :error-messages="errors.featured_rank"
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <!-- Route Logistics -->
            <v-col cols="12" md="4">
              <div class="mb-2">
                <v-select
                  v-model="form.difficulty"
                  :items="difficultyOptions"
                  label="Difficulty"
                  class="text-capitalize"
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
                  class="text-capitalize"
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
                  class="text-capitalize"
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
                  color="success"
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
                  color="primary"
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
                  color="info"
                  inset
                  :disabled="submitting"
                />
              </div>
            </v-col>

            <!-- Rich Text Description -->
            <v-col cols="12">
              <div class="text-subtitle-2 font-weight-medium mb-2 text-slate-700">
                Detailed Journey Description
              </div>
              <div class="mb-2">
                <SummarnoteEditor v-model="form.description" />
              </div>
            </v-col>

            <!-- Operational Notes Section -->
            <v-col cols="12">
              <v-divider class="my-4" />
              <div class="text-subtitle-1 font-weight-bold text-uppercase mb-3">
                Practical Notes & Operational Insights
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.accommodation_note"
                  label="Accommodation Notes"
                  placeholder="e.g. Standard teahouse twin sharing; attached bathrooms available up to Namche Bazaar."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.logistics_note"
                  label="Logistics & Transit Notes"
                  placeholder="e.g. Domestic mountain flight Lukla weather dependent; buffer days advised."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.safety_note"
                  label="Safety & Medical Notes"
                  placeholder="e.g. Oximeter monitoring twice daily; Gamow bag & emergency heli-evac coordination ready."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.route_map_note"
                  label="Route & Geography Notes"
                  placeholder="e.g. Traversing Dudh Koshi valley crossing suspension bridges into Khumbu glacier moraine."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.preparation_note"
                  label="Preparation & Training Notes"
                  placeholder="e.g. Cardio and endurance conditioning advised 8-12 weeks prior; include stair climbing with weighted daypack."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12" md="6">
              <div class="mb-2">
                <v-textarea
                  v-model="form.packing_note"
                  label="Gear & Packing Notes"
                  placeholder="e.g. 4-season down sleeping bag (-15°C rating), broken-in trekking boots, thermal base layers, and UV category 4 sunglasses."
                  rows="2"
                  auto-grow
                />
              </div>
            </v-col>

            <v-col cols="12">
              <div class="mb-2">
                <v-textarea
                  v-model="form.operational_notice"
                  label="Operational Notice / Advisory Banner (Optional)"
                  placeholder="e.g. Lukla mountain weather buffer days strongly recommended; local permit checks in Lukla require passport copy."
                  rows="2"
                  auto-grow
                  hint="If provided, this appears as an urgent advisory notice on the public trek detail page."
                  persistent-hint
                />
              </div>
            </v-col>

            <!-- Expedition Safety Protocols Repeater -->
            <v-col cols="12" class="mt-4">
              <v-card variant="outlined" class="pa-4">
                <div class="d-flex align-center justify-space-between mb-3">
                  <div>
                    <div class="text-subtitle-2 font-weight-bold text-uppercase text-slate-800">
                      Expedition Safety Protocols & Equipment
                    </div>
                    <div class="text-caption text-medium-emphasis">
                      Manage specific safety measures, medical readiness, and emergency protocols displayed in the Safety section.
                    </div>
                  </div>
                  <v-btn
                    size="small"
                    color="primary"
                    variant="tonal"
                    prepend-icon="mdi-plus"
                    @click="addSafetyItem"
                  >
                    Add Protocol
                  </v-btn>
                </div>

                <v-alert
                  v-if="!form.safety_items || !form.safety_items.length"
                  type="info"
                  variant="tonal"
                  density="compact"
                  class="my-2"
                >
                  No custom safety items defined. The public trek page will display standard expedition safety protocols.
                </v-alert>

                <div v-else class="d-flex flex-column ga-3">
                  <v-card
                    v-for="(item, index) in form.safety_items"
                    :key="index"
                    variant="outlined"
                    class="pa-3 bg-slate-50"
                  >
                    <div class="d-flex align-center justify-space-between mb-2">
                      <div class="d-flex align-center ga-2">
                        <v-chip size="x-small" label color="primary">Item #{{ index + 1 }}</v-chip>
                        <span class="text-caption font-weight-bold">{{ item.title || 'Untitled Protocol' }}</span>
                      </div>
                      <div class="d-flex align-center ga-1">
                        <v-btn
                          icon="mdi-arrow-up"
                          variant="text"
                          size="x-small"
                          :disabled="index === 0"
                          @click="moveSafetyItem(index, -1)"
                        />
                        <v-btn
                          icon="mdi-arrow-down"
                          variant="text"
                          size="x-small"
                          :disabled="index === form.safety_items.length - 1"
                          @click="moveSafetyItem(index, 1)"
                        />
                        <v-btn
                          icon="mdi-delete-outline"
                          variant="text"
                          color="error"
                          size="x-small"
                          @click="removeSafetyItem(index)"
                        />
                      </div>
                    </div>

                    <v-row dense>
                      <v-col cols="12" md="6">
                        <v-text-field
                          v-model="item.title"
                          label="Protocol Title *"
                          density="compact"
                          placeholder="e.g. Comprehensive Medical Kit & Oxygen"
                        />
                      </v-col>
                      <v-col cols="12" md="4">
                        <v-text-field
                          v-model="item.icon"
                          label="Icon (e.g. mdi-shield-check)"
                          density="compact"
                          placeholder="e.g. mdi-shield-cross"
                        />
                      </v-col>
                      <v-col cols="12" md="2">
                        <v-switch
                          v-model="item.is_active"
                          label="Active"
                          color="success"
                          density="compact"
                          hide-details
                        />
                      </v-col>
                      <v-col cols="12">
                        <v-textarea
                          v-model="item.description"
                          label="Description & Procedures *"
                          rows="2"
                          auto-grow
                          density="compact"
                          placeholder="Describe equipment readiness, evacuation coverage, and guide certifications."
                        />
                      </v-col>
                    </v-row>
                  </v-card>
                </div>
              </v-card>
            </v-col>

            <!-- Bottom CTA Banner Customization -->
            <v-col cols="12" class="mt-4">
              <v-card variant="outlined" class="pa-4">
                <div class="d-flex align-center justify-space-between mb-3">
                  <div>
                    <div class="text-subtitle-2 font-weight-bold text-uppercase text-slate-800">
                      Bottom Call-To-Action (CTA) Banner
                    </div>
                    <div class="text-caption text-medium-emphasis">
                      Customize the prominent expedition call-to-action block at the bottom of this trek detail page. Leave empty to use system defaults.
                    </div>
                  </div>
                </div>

                <v-row dense>
                  <v-col cols="12">
                    <v-text-field
                      v-model="form.cta_title"
                      label="CTA Banner Title"
                      :placeholder="`Ready to Trek ${form.name || 'this Route'}?`"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12">
                    <v-textarea
                      v-model="form.cta_description"
                      label="CTA Banner Description"
                      placeholder="Lock in guaranteed small-group departures or request a private bespoke departure tailored to your fitness and scheduling requirements."
                      rows="2"
                      auto-grow
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="form.cta_primary_btn_text"
                      label="Primary Button Text"
                      placeholder="Inquire / Book This Trek"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="form.cta_primary_btn_url"
                      label="Primary Button URL / Route"
                      placeholder="#departures"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="form.cta_secondary_btn_text"
                      label="Secondary Button Text"
                      placeholder="Custom Expedition Inquiry"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="form.cta_secondary_btn_url"
                      label="Secondary Button URL"
                      placeholder="/contact"
                      density="comfortable"
                    />
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
          </v-row>

          <div class="d-flex justify-end pt-6 pb-2 border-t">
            <v-btn
              color="primary"
              variant="flat"
              class="px-6"
              :loading="submitting"
              :disabled="submitting"
              @click="handleUpdate"
            >
              <v-icon start>mdi-content-save</v-icon>
              Save Overview Changes
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, reactive, watch, onMounted } from 'vue'
import SummarnoteEditor from '@/components/SummarnoteEditor.vue'
import { updateJourneyApi } from '@/api/journeys.api'
import { getDestinationsApi } from '@/api/destinations.api'
import { useSnackbar } from '@/composables/snackbar'
import http from '@/http.config'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { showSuccess, showError } = useSnackbar()

const formRef = ref(null)
const submitting = ref(false)
const destinationList = ref([])
const guideList = ref([])
const experienceList = ref([])
const travelMonthList = ref([])
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
  accommodation_note: '',
  logistics_note: '',
  safety_note: '',
  route_map_note: '',
  preparation_note: '',
  packing_note: '',
  operational_notice: '',
  cta_title: '',
  cta_description: '',
  cta_primary_btn_text: '',
  cta_primary_btn_url: '',
  cta_secondary_btn_text: '',
  cta_secondary_btn_url: '',
  safety_items: [],
})

const rules = {
  required: (v) => !!v || 'This field is required',
  numeric: (v) => v === '' || v === null || !isNaN(v) || 'Must be a valid number',
  positive: (v) => v === '' || v === null || Number(v) >= 0 || 'Must be greater than or equal to 0',
  slug: (v) => !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) || 'Use lowercase letters, numbers, and hyphens',
}

const difficultyOptions = ['easy', 'moderate', 'challenging', 'strenuous']
const accommodationOptions = ['standard', 'comfort', 'luxury', 'mixed']
const paceOptions = ['relaxed', 'balanced', 'active', 'intense']
const pricingBasisOptions = [
  { title: 'Per Person', value: 'per_person' },
  { title: 'Per Group', value: 'group' },
]

function addSafetyItem() {
  form.safety_items.push({
    title: '',
    description: '',
    icon: 'mdi-shield-check',
    sort_order: form.safety_items.length + 1,
    is_active: true,
  })
}

function removeSafetyItem(index) {
  form.safety_items.splice(index, 1)
}

function moveSafetyItem(index, delta) {
  const target = index + delta
  if (target < 0 || target >= form.safety_items.length) return
  const item = form.safety_items.splice(index, 1)[0]
  form.safety_items.splice(target, 0, item)
  form.safety_items.forEach((it, idx) => {
    it.sort_order = idx + 1
  })
}

watch(
  () => props.journey,
  (newVal) => {
    if (newVal && Object.keys(newVal).length) {
      Object.assign(form, {
        id: newVal.id,
        name: newVal.name || '',
        slug: newVal.slug || '',
        subtitle: newVal.subtitle || '',
        summary: newVal.summary || '',
        description: newVal.description || '',
        duration_days: newVal.duration_days ?? 1,
        duration_nights: newVal.duration_nights ?? 0,
        price: newVal.price ?? (newVal.price_minor ? newVal.price_minor / 100 : ''),
        pricing_basis: newVal.pricing_basis || 'per_person',
        max_altitude_m: newVal.max_altitude_m ?? '',
        walking_hours_min: newVal.walking_hours_min ?? '',
        walking_hours_max: newVal.walking_hours_max ?? '',
        difficulty: newVal.difficulty || 'moderate',
        accommodation_style: newVal.accommodation_style || 'standard',
        pace: newVal.pace || 'balanced',
        featured_rank: newVal.featured_rank ?? 0,
        is_active: Boolean(newVal.is_active),
        is_featured: Boolean(newVal.is_featured),
        is_published: Boolean(newVal.is_published),
        destination_id: newVal.destination_id ?? null,
        guide_id: newVal.guide_id ?? null,
        experience_ids: Array.isArray(newVal.experience_ids)
          ? [...newVal.experience_ids]
          : newVal.experiences ? newVal.experiences.map((e) => e.id) : [],
        travel_month_ids: Array.isArray(newVal.travel_month_ids)
          ? [...newVal.travel_month_ids]
          : newVal.travel_months ? newVal.travel_months.map((m) => m.id) : [],
        accommodation_note: newVal.accommodation_note || '',
        logistics_note: newVal.logistics_note || '',
        safety_note: newVal.safety_note || '',
        route_map_note: newVal.route_map_note || '',
        preparation_note: newVal.preparation_note || '',
        packing_note: newVal.packing_note || '',
        operational_notice: newVal.operational_notice || '',
        cta_title: newVal.cta_title || '',
        cta_description: newVal.cta_description || '',
        cta_primary_btn_text: newVal.cta_primary_btn_text || '',
        cta_primary_btn_url: newVal.cta_primary_btn_url || '',
        cta_secondary_btn_text: newVal.cta_secondary_btn_text || '',
        cta_secondary_btn_url: newVal.cta_secondary_btn_url || '',
        safety_items: Array.isArray(newVal.safety_items)
          ? newVal.safety_items.map((item) => ({ ...item }))
          : [],
      })
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
    const resp = await getDestinationsApi({ per_page: 100 })
    destinationList.value = resp.data?.data ?? resp.data ?? []
  } catch (error) {
    console.error('Failed to fetch destinations', error)
  }
}

async function fetchGuides() {
  try {
    const resp = await http.get('/admin/guides', { params: { per_page: 100 } })
    guideList.value = resp.data?.data ?? resp.data ?? []
  } catch (error) {
    console.error('Failed to fetch guides', error)
  }
}

async function fetchExperiences() {
  try {
    const resp = await http.get('/admin/experiences', { params: { per_page: 100 } })
    experienceList.value = resp.data?.data ?? resp.data ?? []
  } catch (error) {
    console.error('Failed to fetch experiences', error)
  }
}

async function fetchTravelMonths() {
  try {
    const resp = await http.get('/admin/travel-months', { params: { per_page: 100 } })
    travelMonthList.value = resp.data?.data ?? resp.data ?? []
  } catch (error) {
    console.error('Failed to fetch travel months', error)
  }
}

async function handleUpdate() {
  errors.value = {}
  if (!form.id) return

  const { valid } = await formRef.value?.validate()
  if (!valid) return

  try {
    submitting.value = true
    const resp = await updateJourneyApi(form.id, form)
    showSuccess(resp.data?.message ?? 'Journey overview updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update journey overview:', error)
    if (error.response?.status === 422) {
      errors.value = error.response.data?.errors || {}
      showError('Please check the validation errors and try again.')
    } else {
      showError(error?.response?.data?.message || 'Failed to update journey.')
    }
  } finally {
    submitting.value = false
  }
}
</script>
