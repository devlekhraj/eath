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
          <v-col cols="12" sm="6" md="4" lg="3">
            <v-text-field
              v-model="search"
              label="Search Planner Requests"
              clearable
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by code, traveler, email..."
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="4" md="3" lg="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedStatus"
              :items="statusFilterOptions"
              label="Filter Status"
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

      <template #item.contact_name="{ item }">
        <div>
          <span class="text-slate-800">{{ item.contact_name }}</span>
        </div>
      </template>

      <template #item.contact_email="{ item }">
        <div>
          <a :href="`mailto:${item.contact_email}`" class="text-primary text-decoration-underline">
            {{ item.contact_email }}
          </a>
        </div>
      </template>

      <template #item.country="{ item }">
        <div>
          {{ item.country || '—' }}
        </div>
      </template>

      <template #item.travelers="{ item }">
        <div>
          <v-chip size="small" variant="tonal" color="secondary">
            {{ item.adults }} adult{{ item.adults > 1 ? 's' : '' }}<template v-if="item.children">, {{ item.children }} child</template>
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
          <template v-else-if="item.destination">
            <span class="text-slate-700">{{ item.destination.name }}</span>
          </template>
          <template v-else>
            <span class="text-caption text-medium-emphasis">Custom Trip</span>
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
            title="Inspect Planner Request"
            @click="handleViewDetail(item)"
          >
            <v-icon start size="14">mdi-eye</v-icon>
            View
          </v-btn>
          <v-btn
            size="small"
            variant="outlined"
            color="error"
            title="Delete Request"
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
import { getPlannerSubmissionsApi } from '@/api/planner-submissions.api'
import PlannerDetailModal from '@/modal-form/planner-submissions/PlannerDetailModal.vue'
import PlannerDeleteModal from '@/modal-form/planner-submissions/PlannerDeleteModal.vue'

const loading = ref(false)
const search = ref('')
const selectedStatus = ref(null)
const submissions = ref([])

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Ref Code', key: 'reference_code', sortable: true },
  { title: 'Traveler', key: 'contact_name', sortable: true },
  { title: 'Email', key: 'contact_email', sortable: false },
  { title: 'Country', key: 'country', sortable: true },
  { title: 'Party', key: 'travelers', sortable: false },
  { title: 'Target Journey / Region', key: 'journey', sortable: false },
  { title: 'Status', key: 'status', sortable: true },
  { title: 'Submitted', key: 'created_at', sortable: true },
  { title: 'Action', key: 'actions', sortable: false, align: 'center' },
]

const statusFilterOptions = [
  { title: 'All Statuses', value: null },
  { title: 'New', value: 'new' },
  { title: 'Reviewing', value: 'reviewing' },
  { title: 'Replied', value: 'replied' },
  { title: 'Closed', value: 'closed' },
]

const filteredItems = computed(() => {
  let list = submissions.value

  if (selectedStatus.value) {
    list = list.filter(item => item.status === selectedStatus.value)
  }

  if (!search.value) return list

  const term = search.value.toLowerCase().trim()
  return list.filter(item => {
    return (
      (item.reference_code && item.reference_code.toLowerCase().includes(term)) ||
      (item.contact_name && item.contact_name.toLowerCase().includes(term)) ||
      (item.contact_email && item.contact_email.toLowerCase().includes(term)) ||
      (item.country && item.country.toLowerCase().includes(term)) ||
      (item.journey?.name && item.journey.name.toLowerCase().includes(term)) ||
      (item.destination?.name && item.destination.name.toLowerCase().includes(term)) ||
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
    title: `Planner Request ${item.reference_code}`,
    component: PlannerDetailModal,
    size: 'lg',
    props: {
      item,
    },
        onSaved: fetchSubmissions,
        onClose: fetchSubmissions,
    })
}

function handleDelete(item) {
  openModal({
    title: 'Delete Planner Request',
    component: PlannerDeleteModal,
    size: 'sm',
    props: {
      item,
    },
        onSaved: fetchSubmissions,
        onClose: fetchSubmissions,
    })
}

async function fetchSubmissions() {
  loading.value = true
  try {
    const resp = await getPlannerSubmissionsApi()
    submissions.value = resp?.data ?? []
  } catch (err) {
    console.error('Failed to load planner submissions:', err)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchSubmissions()
})
</script>
