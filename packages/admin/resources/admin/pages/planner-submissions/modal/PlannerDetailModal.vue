<template>
  <v-card class="rounded-0 elevation-0">
    <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
      <div class="d-flex align-center ga-2">
        <span class="text-uppercase font-weight-medium text-slate-800">Trip Planner Submission</span>
        <v-chip size="small" variant="tonal" color="primary" class="rounded-0">
          {{ submission.reference_code }}
        </v-chip>
      </div>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" class="rounded-0" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="pt-4">
      <v-row dense>
        <!-- Contact & Travelers Info -->
        <v-col cols="12" md="6">
          <div class="border pa-3 bg-slate-50 h-100">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-2">
              Traveler Information
            </div>
            <div class="mb-1"><strong>Name:</strong> {{ submission.contact_name }}</div>
            <div class="mb-1">
              <strong>Email:</strong>
              <a :href="`mailto:${submission.contact_email}`" class="text-primary text-decoration-underline ml-1">
                {{ submission.contact_email }}
              </a>
            </div>
            <div class="mb-1"><strong>Phone:</strong> {{ submission.contact_phone || '—' }}</div>
            <div class="mb-1"><strong>Country:</strong> {{ submission.country || '—' }}</div>
            <div class="mb-1">
              <strong>Party Size:</strong>
              {{ submission.adults }} Adult(s)<template v-if="submission.children">, {{ submission.children }} Child(ren)</template>
            </div>
            <div class="mb-1">
              <strong>Available Days:</strong> {{ submission.available_days ? `${submission.available_days} Days` : 'Flexible' }}
            </div>
            <div v-if="submission.budget_minor" class="mb-1">
              <strong>Estimated Budget:</strong> {{ submission.currency }} {{ (submission.budget_minor / 100).toLocaleString() }}
            </div>
            <div><strong>Submitted:</strong> {{ formatDate(submission.created_at) }}</div>
          </div>
        </v-col>

        <!-- Trip Preferences & Status -->
        <v-col cols="12" md="6">
          <div class="border pa-3 bg-slate-50 h-100">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-2">
              Trip Scope & Matching
            </div>
            <div v-if="submission.journey" class="mb-2">
              <strong>Journey:</strong>
              <router-link :to="{ name: 'adminJourneyDetailPage', params: { id: submission.journey.id } }" class="text-primary text-decoration-underline ml-1">
                {{ submission.journey.name }}
              </router-link>
            </div>
            <div v-if="submission.departure" class="mb-2">
              <strong>Departure:</strong>
              <code>{{ submission.departure.code || submission.departure.start_date }}</code>
            </div>
            <div v-if="submission.destination" class="mb-2">
              <strong>Destination:</strong> {{ submission.destination.name }}
            </div>
            <div v-if="submission.experience" class="mb-2">
              <strong>Experience:</strong> {{ submission.experience.name }}
            </div>
            <div v-if="submission.travel_month" class="mb-2">
              <strong>Preferred Timing:</strong> {{ submission.travel_month.name }} ({{ submission.travel_month.season }})
            </div>

            <div class="mt-3">
              <label class="text-caption font-weight-medium text-slate-700 d-block mb-1">Status</label>
              <div class="d-flex align-center ga-2">
                <v-select
                  v-model="currentStatus"
                  :items="statusOptions"
                  density="compact"
                  variant="outlined"
                  class="rounded-0 flex-grow-1"
                  hide-details
                />
                <v-btn
                  color="primary"
                  variant="elevated"
                  class="rounded-0"
                  :loading="savingStatus"
                  :disabled="currentStatus === submission.status || savingStatus"
                  @click="handleStatusUpdate"
                >
                  Update
                </v-btn>
              </div>
            </div>
          </div>
        </v-col>

        <!-- Custom Preferences & Note -->
        <v-col v-if="submission.preferences && Object.keys(submission.preferences).length" cols="12" class="mt-2">
          <div class="border pa-3 bg-slate-50">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-2">
              Selected Planner Preferences
            </div>
            <div class="d-flex flex-wrap ga-2">
              <v-chip
                v-for="(val, key) in submission.preferences"
                :key="key"
                size="small"
                variant="outlined"
                color="secondary"
                class="rounded-0"
              >
                <strong>{{ key }}:</strong>&nbsp;{{ typeof val === 'object' ? JSON.stringify(val) : val }}
              </v-chip>
            </div>
          </div>
        </v-col>

        <!-- Traveler Message -->
        <v-col v-if="submission.message" cols="12" class="mt-2">
          <div class="border pa-3">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-1">
              Custom Requests & Notes
            </div>
            <v-divider class="my-2" />
            <div class="text-body-1 text-slate-800" style="white-space: pre-wrap; line-height: 1.6;">
              {{ submission.message }}
            </div>
          </div>
        </v-col>
      </v-row>
    </v-card-text>

    <v-divider />
    <v-card-actions class="pa-3 justify-end">
      <v-btn variant="text" class="rounded-0" @click="handleClose">Close</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { updatePlannerSubmissionStatusApi } from '@/api/planner-submissions.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const submission = ref({ ...props.item })
const currentStatus = ref(props.item?.status || 'new')
const savingStatus = ref(false)

const statusOptions = [
  { title: 'New', value: 'new' },
  { title: 'Reviewing', value: 'reviewing' },
  { title: 'Replied', value: 'replied' },
  { title: 'Closed', value: 'closed' },
]

function formatDate(val) {
  if (!val) return '—'
  return new Date(val).toLocaleString()
}

function handleClose() {
  emit('close')
}

async function handleStatusUpdate() {
  savingStatus.value = true
  try {
    const resp = await updatePlannerSubmissionStatusApi(submission.value.id, currentStatus.value)
    submission.value.status = currentStatus.value
    showSuccess(resp?.message || 'Status updated')
    emit('saved')
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to update status')
  } finally {
    savingStatus.value = false
  }
}
</script>
