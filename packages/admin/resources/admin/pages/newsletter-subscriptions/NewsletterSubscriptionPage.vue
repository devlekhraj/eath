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
              label="Search Subscribers"
              clearable
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by email, name..."
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

          <v-col cols="auto" class="mt-2 mt-sm-0">
            <v-btn color="primary" variant="flat" @click="promptAddSubscriber">
              <v-icon start>mdi-plus</v-icon> Add Subscriber
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.email="{ item }">
        <div>
          <a :href="`mailto:${item.email}`" class="text-primary text-decoration-underline">
            {{ item.email }}
          </a>
        </div>
      </template>

      <template #item.name="{ item }">
        <div>
          <span class="text-slate-800">{{ item.name || '—' }}</span>
        </div>
      </template>

      <template #item.is_subscribed="{ item }">
        <div>
          <v-chip
            size="small"
            :color="item.is_subscribed ? 'success' : 'default'"
            variant="flat"
            style="cursor: pointer;"
            @click="toggleStatus(item)"
          >
            <v-icon start size="14">{{ item.is_subscribed ? 'mdi-check' : 'mdi-pause' }}</v-icon>
            {{ item.is_subscribed ? 'Subscribed' : 'Unsubscribed' }}
          </v-chip>
        </div>
      </template>

      <template #item.subscribed_at="{ item }">
        <div>
          {{ formatDate(item.subscribed_at || item.created_at) }}
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn
            variant="outlined"
            color="error"
            title="Delete Subscriber"
            @click="confirmDelete(item)"
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
import { ref, computed, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import {
  getNewsletterSubscriptionsApi,
  toggleNewsletterSubscriptionApi,
} from '@/http/newsletter-subscriptions.http'
import SubscriberForm from '@/modal-form/newsletter-subscriptions/SubscriberForm.vue'
import SubscriberDelete from '@/modal-form/newsletter-subscriptions/SubscriberDelete.vue'

const { showSuccess, showError } = useSnackbar()
const globalModal = useGlobalModal()

const subscribers = ref([])
const loading = ref(false)
const search = ref('')
const selectedStatus = ref(null)

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Email Address', key: 'email', sortable: true },
  { title: 'Name', key: 'name', sortable: true },
  { title: 'Status', key: 'is_subscribed', sortable: true },
  { title: 'Subscribed On', key: 'subscribed_at', sortable: true },
  { title: 'Action', key: 'actions', sortable: false, align: 'center' },
]

const statusFilterOptions = [
  { title: 'All Statuses', value: null },
  { title: 'Subscribed', value: 'subscribed' },
  { title: 'Unsubscribed', value: 'unsubscribed' },
]

const filteredItems = computed(() => {
  let list = subscribers.value

  if (selectedStatus.value === 'subscribed') {
    list = list.filter(item => item.is_subscribed)
  } else if (selectedStatus.value === 'unsubscribed') {
    list = list.filter(item => !item.is_subscribed)
  }

  if (!search.value) return list

  const term = search.value.toLowerCase().trim()
  return list.filter(item => {
    return (
      (item.email && item.email.toLowerCase().includes(term)) ||
      (item.name && item.name.toLowerCase().includes(term))
    )
  })
})

function formatDate(val) {
  if (!val) return '—'
  return new Date(val).toLocaleDateString()
}

async function fetchSubscribers() {
  loading.value = true
  try {
    const resp = await getNewsletterSubscriptionsApi()
    subscribers.value = resp?.data ?? []
  } catch (error) {
    console.error('Failed to load subscribers', error)
  } finally {
    loading.value = false
  }
}

async function toggleStatus(item) {
  const original = item.is_subscribed
  item.is_subscribed = !item.is_subscribed
  try {
    const resp = await toggleNewsletterSubscriptionApi(item.id, item.is_subscribed)
    showSuccess(resp?.message || 'Status updated')
  } catch (error) {
    item.is_subscribed = original
    showError(error?.response?.data?.message || 'Failed to update status')
  }
}

function promptAddSubscriber() {
  globalModal.open({
    title: 'Add Newsletter Subscriber',
    component: SubscriberForm,
    size: 'sm',
    onSaved: () => fetchSubscribers(),
  })
}

function confirmDelete(item) {
  globalModal.open({
    title: 'Delete Subscriber',
    component: SubscriberDelete,
    size: 'sm',
    props: {
      item,
    },
    onSaved: () => fetchSubscribers(),
  })
}

onMounted(() => {
  fetchSubscribers()
})
</script>
