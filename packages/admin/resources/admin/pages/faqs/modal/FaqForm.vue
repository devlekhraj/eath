<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>
        {{ props.item?.id ? 'Edit FAQ' : 'Add FAQ' }}
      </span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit">
        <v-row dense>
          <v-col cols="12">
            <div class="mb-2">
                <v-text-field
                  v-model="form.question"
                  label="Question *"
                  placeholder="e.g. What is the best season for trekking in Nepal?"
                  :rules="[rules.required]"
                  :error-messages="serverErrors.question"
                  required
                />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
                <v-textarea
                  v-model="form.answer"
                  label="Answer *"
                  placeholder="Provide a thorough, comprehensive answer for travelers..."
                  rows="5"
                  auto-grow
                  :rules="[rules.required]"
                  :error-messages="serverErrors.answer"
                  required
                />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
                <v-combobox
                  v-model="form.category"
                  :items="categoryOptions"
                  label="Category"
                  placeholder="Select or type a category"
                  clearable
                  :error-messages="serverErrors.category"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
                <v-text-field
                  v-model.number="form.sort_order"
                  label="Sort Order"
                  type="number"
                  min="0"
                  :error-messages="serverErrors.sort_order"
                />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="text-caption font-weight-medium text-medium-emphasis mb-2">
              Association / Scope (Leave empty for global website FAQs)
            </div>
          </v-col>

          <v-col cols="12" sm="4">
            <div class="mb-2">
                <v-autocomplete
                  v-model="form.journey_id"
                  :items="journeyOptions"
                  item-title="name"
                  item-value="id"
                  label="Specific Journey"
                  clearable
                  :loading="loadingOptions"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="4">
            <div class="mb-2">
                <v-select
                  v-model="form.destination_id"
                  :items="destinationOptions"
                  item-title="name"
                  item-value="id"
                  label="Specific Destination"
                  clearable
                  :loading="loadingOptions"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="4">
            <div class="mb-2">
                <v-select
                  v-model="form.experience_id"
                  :items="experienceOptions"
                  item-title="name"
                  item-value="id"
                  label="Specific Experience"
                  clearable
                  :loading="loadingOptions"
                />
            </div>
          </v-col>

          <v-col cols="12" class="pt-2">
            <div class="mb-2">
                <v-switch
                  v-model="form.is_active"
                  label="Active (Visible on website)"
                  hide-details
                />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-spacer />
      <v-btn
        color="primary"
        variant="elevated"
        :loading="loading"
        :disabled="loading"
        @click="handleSubmit"
      >
        Save FAQ
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { createFaqApi, updateFaqApi, getFaqCategoriesApi } from '@/api/faqs.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    default: () => ({}),
  },
})

const formRef = ref(null)
const loading = ref(false)
const loadingOptions = ref(false)
const serverErrors = reactive({})

const categoryOptions = ref([
  'General',
  'Booking & Payment',
  'Gear & Equipment',
  'Health & Safety',
  'Permits & Visas',
  'Itinerary & Pacing',
  'Weather & Seasons',
])

const journeyOptions = ref([])
const destinationOptions = ref([])
const experienceOptions = ref([])

const form = reactive({
  id: null,
  question: '',
  answer: '',
  category: 'General',
  journey_id: null,
  destination_id: null,
  experience_id: null,
  sort_order: 0,
  is_active: true,
})

const rules = {
  required: v => !!v || 'This field is required',
}

onMounted(async () => {
  await fetchOptions()

  if (props.item?.id) {
    form.id = props.item.id
    form.question = props.item.question || ''
    form.answer = props.item.answer || ''
    form.category = props.item.category || ''
    form.journey_id = props.item.journey_id || null
    form.destination_id = props.item.destination_id || null
    form.experience_id = props.item.experience_id || null
    form.sort_order = props.item.sort_order ?? 0
    form.is_active = props.item.is_active ?? true
  }
})

async function fetchOptions() {
  try {
    loadingOptions.value = true
    const [catResp, journeysResp, destinationsResp, experiencesResp] = await Promise.all([
      getFaqCategoriesApi().catch(() => ({ data: [] })),
      http.get('/admin/journeys').catch(() => ({ data: [] })),
      http.get('/admin/destinations').catch(() => ({ data: [] })),
      http.get('/admin/experiences').catch(() => ({ data: [] })),
    ])

    if (Array.isArray(catResp?.data) && catResp.data.length) {
      categoryOptions.value = catResp.data
    }
    journeyOptions.value = journeysResp?.data ?? []
    destinationOptions.value = destinationsResp?.data ?? []
    experienceOptions.value = experiencesResp?.data ?? []
  } catch (err) {
    console.error('Failed to load FAQ select options:', err)
  } finally {
    loadingOptions.value = false
  }
}

function handleCancel() {
  emit('close')
}

async function handleSubmit() {
  Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))

  const { valid } = await formRef.value.validate()
  if (!valid) return

  loading.value = true
  try {
    const payload = {
      question: form.question,
      answer: form.answer,
      category: form.category || null,
      journey_id: form.journey_id ? Number(form.journey_id) : null,
      destination_id: form.destination_id ? Number(form.destination_id) : null,
      experience_id: form.experience_id ? Number(form.experience_id) : null,
      sort_order: Number(form.sort_order) || 0,
      is_active: Boolean(form.is_active),
    }

    if (form.id) {
      await updateFaqApi(form.id, payload)
      showSuccess('FAQ updated successfully')
    } else {
      await createFaqApi(payload)
      showSuccess('FAQ created successfully')
    }

    emit('saved')
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(serverErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to save FAQ')
    }
  } finally {
    loading.value = false
  }
}
</script>
