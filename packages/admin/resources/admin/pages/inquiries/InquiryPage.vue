<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="filteredItems"
      :items-per-page="25"
      :loading="loading"
    >
      <template #top>
        <v-row class="px-4 py-2 mb-2 mt-1" align="center" justify="space-between" no-gutters>
          <v-col cols="12" sm="5" md="4" lg="3">
            <v-text-field
              v-model="search"
              label="Search Inquiries"
              clearable
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by code, name, email..."
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="3" md="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedStatus"
              :items="statusFilterOptions"
              label="Filter Status"
              clearable
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="3" md="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedType"
              :items="typeFilterOptions"
              label="Filter Type"
              clearable
              hide-details
            />
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.reference_code="{ item }">
        <div>
          <code>{{ item.reference_code }}</code>
        </div>
      </template>

      <template #item.name="{ item }">
        <div>
          <span class="text-slate-800">{{ item.name }}</span>
        </div>
      </template>

      <template #item.email="{ item }">
        <div>
          <a :href="`mailto:${item.email}`" class="text-primary text-decoration-underline">
            {{ item.email }}
          </a>
        </div>
      </template>

      <template #item.country="{ item }">
        <div>
          {{ item.country || '—' }}
        </div>
      </template>

      <template #item.inquiry_type="{ item }">
        <div>
          <v-chip size="small" variant="tonal" color="secondary" class="text-uppercase">
            {{ item.inquiry_type }}
          </v-chip>
        </div>
      </template>

      <template #item.journey="{ item }">
        <div>
          <template v-if="item.journey">
            <router-link
              :to="{ name: 'adminJourneyDetailPage', params: { id: item.journey.id } }"
              class="text-primary text-decoration-underline"
            >
              {{ item.journey.name }}
            </router-link>
          </template>
          <template v-else>
            <span class="text-caption text-medium-emphasis">General Inquiry</span>
          </template>
        </div>
      </template>

      <template #item.status="{ item }">
        <div>
          <v-chip
            size="small"
            class="text-uppercase"
            :color="getStatusColor(item.status)"
            variant="flat"
          >
            {{ item.status }}
          </v-chip>
        </div>
      </template>

      <template #item.created_at="{ item }">
        <div>
          {{ formatDate(item.created_at) }}
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn
            size="small"
            variant="outlined"
            color="primary"
            title="Inspect Inquiry"
            @click="handleViewDetail(item)"
          >
            <v-icon start size="14">mdi-eye</v-icon>
            View
          </v-btn>
          <v-btn
            size="small"
            variant="outlined"
            color="error"
            title="Delete Inquiry"
            @click="handleDelete(item)"
          >
            <v-icon start size="14">mdi-delete</v-icon>
            Delete
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import { getStatusColor } from '@/utils/utils'
const { open: openModal } = useGlobalModal()
import { getInquiriesApi } from '@/api/inquiries.api'
import InquiryDetailModal from './modal/InquiryDetailModal.vue'
import InquiryDeleteModal from './modal/InquiryDeleteModal.vue'

const loading = ref(false)
const search = ref('')
const selectedStatus = ref(null)
const selectedType = ref(null)
const inquiries = ref([])

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Ref Code', key: 'reference_code', sortable: true },
  { title: 'Traveller', key: 'name', sortable: true },
  { title: 'Email', key: 'email', sortable: false },
  { title: 'Country', key: 'country', sortable: true },
  { title: 'Type', key: 'inquiry_type', sortable: true },
  { title: 'Journey', key: 'journey', sortable: false },
  { title: 'Status', key: 'status', sortable: true },
  { title: 'Received', key: 'created_at', sortable: true },
  { title: 'Action', key: 'actions', sortable: false, align: 'center' },
]

const statusFilterOptions = [
  { title: 'All Statuses', value: null },
  { title: 'New', value: 'new' },
  { title: 'Reviewing', value: 'reviewing' },
  { title: 'Replied', value: 'replied' },
  { title: 'Closed', value: 'closed' },
]

const typeFilterOptions = [
  { title: 'All Types', value: null },
  { title: 'General', value: 'general' },
  { title: 'Journey', value: 'journey' },
  { title: 'Departure', value: 'departure' },
  { title: 'Custom', value: 'custom' },
]

const filteredItems = computed(() => {
  let list = inquiries.value

  if (selectedStatus.value) {
    list = list.filter(item => item.status === selectedStatus.value)
  }

  if (selectedType.value) {
    list = list.filter(item => item.inquiry_type === selectedType.value)
  }

  if (!search.value) return list

  const term = search.value.toLowerCase().trim()
  return list.filter(item => {
    return (
      (item.reference_code && item.reference_code.toLowerCase().includes(term)) ||
      (item.name && item.name.toLowerCase().includes(term)) ||
      (item.email && item.email.toLowerCase().includes(term)) ||
      (item.country && item.country.toLowerCase().includes(term)) ||
      (item.subject && item.subject.toLowerCase().includes(term)) ||
      (item.message && item.message.toLowerCase().includes(term))
    )
  })
})

function formatDate(val) {
  if (!val) return '—'
  return new Date(val).toLocaleDateString()
}

function handleViewDetail(item) {
  openModal({
    title: `Inquiry ${item.reference_code}`,
    component: InquiryDetailModal,
    size: 'lg',
    props: {
      item,
    },
        onSaved: fetchInquiries,
        onClose: fetchInquiries,
    })
}

function handleDelete(item) {
  openModal({
    title: 'Delete Inquiry',
    component: InquiryDeleteModal,
    size: 'sm',
    props: {
      item,
    },
        onSaved: fetchInquiries,
        onClose: fetchInquiries,
    })
}

async function fetchInquiries() {
  loading.value = true
  try {
    const resp = await getInquiriesApi()
    inquiries.value = resp?.data ?? []
  } catch (err) {
    console.error('Failed to load inquiries:', err)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchInquiries()
})
</script>
