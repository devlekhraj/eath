<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>{{ item?.id ? 'Edit Comparison Preset' : 'Add Comparison Preset' }}</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="$emit('close')">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text>
      <v-form ref="formRef" lazy-validation>
        <v-row>
          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.name"
                label="Preset Title *"
                placeholder="e.g. Classic Trio: EBC vs ABC vs Langtang"
                :rules="[rules.required]"
                :error-messages="serverErrors.name"
                @update:model-value="onNameChange"
              />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
              <v-text-field
                v-model="form.slug"
                label="URL Slug"
                placeholder="e.g. classic-trio"
                :error-messages="serverErrors.slug"
              />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
              <v-text-field
                v-model.number="form.sort_order"
                type="number"
                label="Sort Order"
                :error-messages="serverErrors.sort_order"
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-textarea
                v-model="form.description"
                label="Summary / Editorial Note"
                rows="2"
                placeholder="Explain the purpose or contrast of this comparison preset..."
                :error-messages="serverErrors.description"
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-autocomplete
                v-model="form.trek_ids"
                :items="availableJourneys"
                item-title="name"
                item-value="slug"
                label="Journeys to Compare (Select 1 to 3 trails) *"
                multiple
                chips
                closable-chips
                :rules="[rules.trekIds]"
                :error-messages="serverErrors.trek_ids"
                hint="Select up to 3 active Himalayan journeys for side-by-side evaluation"
                persistent-hint
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-switch
                v-model="form.is_active"
                label="Active on Website"
              />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="$emit('close')">Cancel</v-btn>
      <v-btn color="primary" variant="flat" :loading="loading" :disabled="loading" @click="submitForm">
        Save Preset
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted, computed } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { saveComparisonPresetApi } from '@/http/comparison-presets.http'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    default: () => ({}),
  },
  journeys: {
    type: Array,
    default: () => [],
  },
})

const formRef = ref(null)
const loading = ref(false)
const serverErrors = reactive({})
const internalJourneys = ref([])

const availableJourneys = computed(() => {
  if (Array.isArray(props.journeys) && props.journeys.length > 0) {
    return props.journeys
  }
  return internalJourneys.value
})

const form = reactive({
  id: null,
  name: '',
  slug: '',
  description: '',
  trek_ids: [],
  sort_order: 0,
  is_active: true,
})

const rules = {
  required: (v) => !!v || 'This field is required',
  trekIds: (v) => {
    if (!v || v.length === 0) return 'Select at least 1 journey'
    if (v.length > 3) return 'Maximum 3 journeys allowed in a comparison preset'
    return true
  },
}

function slugify(text) {
  return text
    .toString()
    .toLowerCase()
    .trim()
    .replace(/\s+/g, '-')
    .replace(/[^\w-]+/g, '')
    .replace(/--+/g, '-')
}

function onNameChange(value) {
  if (!props.item?.id && !form.slug) {
    form.slug = slugify(value || '')
  }
}

async function fetchJourneysIfMissing() {
  if (Array.isArray(props.journeys) && props.journeys.length > 0) return
  try {
    const resp = await getComparisonPresetsApi()
    const journeysList = Array.isArray(resp?.journeys) ? resp.journeys : (resp?.data?.journeys || [])
    if (journeysList.length > 0) {
      internalJourneys.value = journeysList
    }
  } catch (err) {
    console.error('Failed to load journeys in ComparisonPresetForm', err)
  }
}

onMounted(() => {
  fetchJourneysIfMissing()
  if (props.item?.id) {
    form.id = props.item.id
    form.name = props.item.name || ''
    form.slug = props.item.slug || ''
    form.description = props.item.description || ''
    form.trek_ids = Array.isArray(props.item.trek_ids) ? [...props.item.trek_ids] : []
    form.sort_order = props.item.sort_order ?? 0
    form.is_active = props.item.is_active ?? true
  }
})

async function submitForm() {
  const { valid } = await formRef.value.validate()
  if (!valid) return

  if (form.trek_ids.length > 3) {
    showError('Maximum 3 journeys can be compared in a preset')
    return
  }

  loading.value = true
  Object.keys(serverErrors).forEach((key) => delete serverErrors[key])

  try {
    const payload = {
      ...form,
    }
    const resp = await saveComparisonPresetApi(payload)
    showSuccess(resp?.data?.message || 'Preset saved successfully')
    emit('saved')
    emit('close')
  } catch (error) {
    if (error?.response?.status === 422 && error?.response?.data?.errors) {
      Object.assign(serverErrors, error.response.data.errors)
    } else {
      showError(error?.response?.data?.message || 'Failed to save preset')
    }
  } finally {
    loading.value = false
  }
}
</script>
