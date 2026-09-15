<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-alert
          type="info"
          variant="tonal"
          border="start"
          class="mb-6"
        >
          Manage the dynamic <strong>Trailhead Logistics & Practical Guide</strong> facts for this destination. Each destination can have a custom number of practical facts (flight hubs, permits, baggage limits, trailheads, pacing advice, etc.).
        </v-alert>

        <v-form v-if="destination" @submit.prevent="handleUpdate">
          <!-- 1. Dynamic Logistics Items Repeater -->
          <div class="d-flex align-center justify-space-between mb-4">
            <div>
              <h3 class="text-subtitle-1 font-weight-bold text-slate-800 mb-1">
                Practical Facts & Trailhead Logistics
              </h3>
              <p class="text-caption text-medium-emphasis mb-0">
                Display as structured cards on the destination page. Add as many items as needed.
              </p>
            </div>
            <v-btn
              color="primary"
              variant="outlined"
              @click="addLogisticsItem"
            >
              <v-icon start size="16">mdi-plus</v-icon>
              Add Practical Fact
            </v-btn>
          </div>

          <div v-if="logisticsItems.length === 0" class="pa-6 text-center border border-dashed rounded mb-6 text-medium-emphasis">
            <v-icon size="32" color="secondary" class="mb-2">mdi-clipboard-text-outline</v-icon>
            <div class="text-body-2 font-weight-medium">No logistics facts defined yet.</div>
            <div class="text-caption mb-3">Add items like Transit Gateway, Permits, Baggage Limits, or Acclimatization Pacing.</div>
            <v-btn color="primary" variant="tonal" @click="addLogisticsItem">
              Add First Fact
            </v-btn>
          </div>

          <div v-else class="mb-6 d-flex flex-column ga-3">
            <v-card
              v-for="(item, index) in logisticsItems"
              :key="index"
              variant="outlined"
              class="pa-4 bg-slate-50"
            >
              <div class="d-flex align-center justify-space-between mb-2">
                <div class="d-flex align-center ga-2">
                  <v-chip size="x-small" color="primary" variant="tonal" label>
                    Fact #{{ index + 1 }}
                  </v-chip>
                  <span class="text-caption font-weight-bold text-slate-700">
                    {{ item.label || 'Untitled Fact' }}
                  </span>
                </div>

                <div class="d-flex align-center ga-1">
                  <v-btn
                    icon
                    variant="text"
                    :disabled="index === 0"
                    @click="moveItem(index, -1)"
                  >
                    <v-icon size="16">mdi-arrow-up</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    variant="text"
                    :disabled="index === logisticsItems.length - 1"
                    @click="moveItem(index, 1)"
                  >
                    <v-icon size="16">mdi-arrow-down</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    color="error"
                    variant="text"
                    @click="removeItem(index)"
                  >
                    <v-icon size="16">mdi-trash-can-outline</v-icon>
                  </v-btn>
                </div>
              </div>

              <v-row dense>
                <v-col cols="12" sm="5">
                  <div class="mb-2">
                    <v-text-field
                      v-model="item.label"
                      label="Fact Title / Label *"
                      placeholder="e.g. Transit Gateway, Permits, Baggage Limit"
                      density="compact"
                      hide-details="auto"
                    />
                  </div>
                </v-col>
                <v-col cols="12" sm="7">
                  <div class="mb-2">
                    <v-textarea
                      v-model="item.value"
                      label="Description / Fact Content *"
                      placeholder="Provide clear, actionable logistical advice..."
                      rows="2"
                      auto-grow
                      density="compact"
                      hide-details="auto"
                    />
                  </div>
                </v-col>
              </v-row>
            </v-card>
          </div>

          <v-divider class="my-6" />

          <!-- 2. Operational Notice Advisory Banner -->
          <div class="mb-6">
            <h3 class="text-subtitle-1 font-weight-bold text-slate-800 mb-1">
              Operational Advisory Notice
            </h3>
            <p class="text-caption text-medium-emphasis mb-3">
              Displayed in the warning box at the bottom of the logistics section on the website.
            </p>
            <div class="mb-2">
              <v-textarea
                v-model="operationalNotice"
                label="Advisory Text"
                placeholder="Leave blank to use default fallback notice..."
                hint="Leave blank to use global default advisory text."
                persistent-hint
                rows="2"
                auto-grow
                density="comfortable"
              />
            </div>
          </div>

          <v-divider class="my-6" />

          <!-- 3. Bottom CTA Banner -->
          <div class="mb-6">
            <h3 class="text-subtitle-1 font-weight-bold text-slate-800 mb-1">
              Bottom Call-To-Action (CTA) Banner
            </h3>
            <p class="text-caption text-medium-emphasis mb-3">
              Configure the interactive trip planner conversion banner displayed at the base of the destination page.
            </p>

            <v-row dense>
              <v-col cols="12">
                <div class="mb-2">
                  <v-text-field
                    v-model="ctaTitle"
                    label="CTA Banner Title"
                    placeholder="e.g. Ready to Plan Your Everest Adventure?"
                    density="comfortable"
                  />
                </div>
              </v-col>

              <v-col cols="12">
                <div class="mb-2">
                  <v-textarea
                    v-model="ctaDescription"
                    label="CTA Description"
                    placeholder="e.g. Launch our interactive trek planner with the Everest region pre-selected..."
                    rows="2"
                    auto-grow
                    density="comfortable"
                  />
                </div>
              </v-col>

              <v-col cols="12" sm="6">
                <div class="mb-2">
                  <v-text-field
                    v-model="ctaPrimaryBtnText"
                    label="Primary Button Text"
                    placeholder="e.g. Plan an Everest Trek →"
                    density="compact"
                  />
                </div>
              </v-col>

              <v-col cols="12" sm="6">
                <div class="mb-2">
                  <v-text-field
                    v-model="ctaPrimaryBtnUrl"
                    label="Primary Button URL (Optional)"
                    placeholder="Leave empty for default trip planner shortcut"
                    density="compact"
                  />
                </div>
              </v-col>

              <v-col cols="12" sm="6">
                <div class="mb-2">
                  <v-text-field
                    v-model="ctaSecondaryBtnText"
                    label="Secondary Button Text"
                    placeholder="e.g. Ask a Planning Question"
                    density="compact"
                  />
                </div>
              </v-col>

              <v-col cols="12" sm="6">
                <div class="mb-2">
                  <v-text-field
                    v-model="ctaSecondaryBtnUrl"
                    label="Secondary Button URL (Optional)"
                    placeholder="Leave empty for default /contact page"
                    density="compact"
                  />
                </div>
              </v-col>
            </v-row>
          </div>

          <div class="d-flex justify-end pt-4 pb-2">
            <v-btn
              color="primary"
              variant="flat"
              class="px-6"
              :loading="submitting"
              :disabled="submitting"
              @click="handleUpdate"
            >
              <v-icon start>mdi-content-save</v-icon>
              Save Logistics &amp; CTA
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue'
import { updateDestinationApi } from '@/http/destinations.http'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { showSuccess, showError } = useSnackbar()
const submitting = ref(false)

const logisticsItems = ref([])
const operationalNotice = ref('')
const ctaTitle = ref('')
const ctaDescription = ref('')
const ctaPrimaryBtnText = ref('')
const ctaPrimaryBtnUrl = ref('')
const ctaSecondaryBtnText = ref('')
const ctaSecondaryBtnUrl = ref('')

function initData() {
  if (!props.destination) return

  operationalNotice.value = props.destination.operational_notice || ''
  ctaTitle.value = props.destination.cta_title || ''
  ctaDescription.value = props.destination.cta_description || ''
  ctaPrimaryBtnText.value = props.destination.cta_primary_btn_text || ''
  ctaPrimaryBtnUrl.value = props.destination.cta_primary_btn_url || ''
  ctaSecondaryBtnText.value = props.destination.cta_secondary_btn_text || ''
  ctaSecondaryBtnUrl.value = props.destination.cta_secondary_btn_url || ''

  if (Array.isArray(props.destination.logistics) && props.destination.logistics.length > 0) {
    logisticsItems.value = props.destination.logistics.map(item => ({
      id: item.id || null,
      label: item.label || '',
      value: item.value || '',
      icon: item.icon || '',
      sort_order: item.sort_order ?? 0,
      is_active: item.is_active ?? true,
    }))
  } else {
    // Populate default structure from legacy fields if existing
    const defaults = []
    if (props.destination.gateway) {
      defaults.push({ label: 'Transit Gateway', value: props.destination.gateway })
    }
    if (props.destination.trailheads) {
      defaults.push({ label: 'Typical Trailheads', value: props.destination.trailheads })
    }
    if (props.destination.permits) {
      defaults.push({ label: 'Conservation & Entry Permits', value: props.destination.permits })
    }
    if (props.destination.pacing_note || props.destination.pacing) {
      defaults.push({ label: 'Recommended Pacing', value: props.destination.pacing_note || props.destination.pacing })
    }

    if (defaults.length === 0) {
      defaults.push(
        { label: 'Transit Gateway', value: '' },
        { label: 'Typical Trailheads', value: '' },
        { label: 'Conservation & Entry Permits', value: '' },
        { label: 'Recommended Pacing', value: '' }
      )
    }
    logisticsItems.value = defaults
  }
}

onMounted(() => {
  initData()
})

watch(() => props.destination, () => {
  initData()
}, { deep: true })

function addLogisticsItem() {
  logisticsItems.value.push({
    id: null,
    label: '',
    value: '',
    icon: '',
    sort_order: logisticsItems.value.length + 1,
    is_active: true,
  })
}

function removeItem(index) {
  logisticsItems.value.splice(index, 1)
}

function moveItem(index, offset) {
  const targetIndex = index + offset
  if (targetIndex < 0 || targetIndex >= logisticsItems.value.length) return
  const item = logisticsItems.value.splice(index, 1)[0]
  logisticsItems.value.splice(targetIndex, 0, item)
}

async function handleUpdate() {
  if (!props.destination?.id) return
  submitting.value = true
  try {
    const payload = {
      logistics: logisticsItems.value.map((item, idx) => ({
        id: item.id,
        label: item.label,
        value: item.value,
        icon: item.icon,
        sort_order: idx + 1,
        is_active: true,
      })),
      operational_notice: operationalNotice.value,
      cta_title: ctaTitle.value,
      cta_description: ctaDescription.value,
      cta_primary_btn_text: ctaPrimaryBtnText.value,
      cta_primary_btn_url: ctaPrimaryBtnUrl.value,
      cta_secondary_btn_text: ctaSecondaryBtnText.value,
      cta_secondary_btn_url: ctaSecondaryBtnUrl.value,
    }

    const resp = await updateDestinationApi(props.destination.id, payload)
    showSuccess(resp.data?.message ?? 'Logistics and CTA updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update logistics and CTA:', error)
    showError(error?.response?.data?.message || 'Failed to update logistics and CTA.')
  } finally {
    submitting.value = false
  }
}
</script>
