<template>
  <v-card class="rounded-0 elevation-0">
    <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
      <div class="d-flex align-center ga-2">
        <span class="text-uppercase font-weight-medium text-slate-800">Inquiry Details</span>
        <v-chip size="small" variant="tonal" color="primary" class="rounded-0">
          {{ inquiry.reference_code }}
        </v-chip>
      </div>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" class="rounded-0" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="pt-4">
      <v-row dense>
        <!-- Contact Information -->
        <v-col cols="12" md="6">
          <div class="border pa-3 bg-slate-50 h-100">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-2">
              Sender Information
            </div>
            <div class="mb-1"><strong>Name:</strong> {{ inquiry.name }}</div>
            <div class="mb-1">
              <strong>Email:</strong>
              <a :href="`mailto:${inquiry.email}`" class="text-primary text-decoration-underline ml-1">
                {{ inquiry.email }}
              </a>
            </div>
            <div class="mb-1"><strong>Phone:</strong> {{ inquiry.phone || '—' }}</div>
            <div class="mb-1"><strong>Country:</strong> {{ inquiry.country || '—' }}</div>
            <div><strong>Received:</strong> {{ formatDate(inquiry.created_at) }}</div>
          </div>
        </v-col>

        <!-- Context & Status -->
        <v-col cols="12" md="6">
          <div class="border pa-3 bg-slate-50 h-100">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-2">
              Context & Inquiry Type
            </div>
            <div class="mb-2">
              <strong>Inquiry Type:</strong>
              <v-chip size="small" variant="flat" color="secondary" class="rounded-0 text-capitalize ml-2">
                {{ inquiry.inquiry_type }}
              </v-chip>
            </div>
            <div v-if="inquiry.journey" class="mb-2">
              <strong>Related Journey:</strong>
              <router-link :to="{ name: 'adminJourneyDetailPage', params: { id: inquiry.journey.id } }" class="text-primary text-decoration-underline ml-1">
                {{ inquiry.journey.name }}
              </router-link>
            </div>
            <div v-if="inquiry.departure" class="mb-2">
              <strong>Departure Code:</strong>
              <code>{{ inquiry.departure.code || inquiry.departure.id }}</code>
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
                  :disabled="currentStatus === inquiry.status || savingStatus"
                  @click="handleStatusUpdate"
                >
                  Update
                </v-btn>
              </div>
            </div>
          </div>
        </v-col>

        <!-- Message Body -->
        <v-col cols="12" class="mt-2">
          <div class="border pa-3">
            <div class="text-caption font-weight-bold text-primary text-uppercase mb-1">
              Subject: {{ inquiry.subject || '(No subject provided)' }}
            </div>
            <v-divider class="my-2" />
            <div class="text-body-1 text-slate-800" style="white-space: pre-wrap; line-height: 1.6;">
              {{ inquiry.message }}
            </div>
          </div>
        </v-col>

        <!-- Technical Metadata -->
        <v-col cols="12" class="mt-2">
          <div class="text-caption text-medium-emphasis">
            IP Address: {{ inquiry.ip_address || '—' }} · User Agent: {{ inquiry.user_agent ? inquiry.user_agent.slice(0, 80) + '...' : '—' }}
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
import { updateInquiryStatusApi } from '@/api/inquiries.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const inquiry = ref({ ...props.item })
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
    const resp = await updateInquiryStatusApi(inquiry.value.id, currentStatus.value)
    inquiry.value.status = currentStatus.value
    showSuccess(resp?.message || 'Status updated')
    emit('saved')
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to update status')
  } finally {
    savingStatus.value = false
  }
}
</script>
