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
            <v-btn color="primary" variant="flat" @click="openAddDialog = true">
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
            size="small"
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

    <!-- Quick Add Dialog -->
    <v-dialog v-model="openAddDialog" max-width="460">
      <v-card>
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
          <span class="text-uppercase font-weight-medium text-slate-800">Add Newsletter Subscriber</span>
          <v-btn icon variant="text" size="small" @click="openAddDialog = false">
            <v-icon size="18">mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="pa-4">
          <div class="mb-2">
            <v-text-field
              v-model="addForm.email"
              label="Email Address *"
              type="email"
              :error-messages="addErrors.email"
            />
          </div>
          <div class="mb-2">
            <v-text-field
              v-model="addForm.name"
              label="Subscriber Name"
              placeholder="e.g. John Doe"
              :error-messages="addErrors.name"
            />
          </div>
        </v-card-text>
        <v-card-actions class="pa-3 justify-end">
          <v-btn variant="text" @click="openAddDialog = false">Cancel</v-btn>
          <v-btn
            color="primary"
            variant="flat"
            :loading="adding"
            @click="handleAddSubscriber"
          >
            Save Subscriber
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- Delete Confirmation Dialog -->
    <v-dialog v-model="openDeleteDialog" max-width="420">
      <v-card>
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
          <span class="text-uppercase font-weight-medium text-slate-800">Delete Subscriber</span>
          <v-btn icon variant="text" size="small" @click="openDeleteDialog = false">
            <v-icon size="18">mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="text-center pt-4">
          <div class="text-subtitle-1">Are you sure you want to remove this subscriber?</div>
          <div class="text-caption text-grey mt-2">
            <strong>{{ itemToDelete?.email }}</strong>
          </div>
        </v-card-text>
        <v-divider />
        <v-card-actions class="pa-3 justify-end">
          <v-btn variant="text" @click="openDeleteDialog = false">Cancel</v-btn>
          <v-btn
            color="error"
            variant="flat"
            :loading="deleting"
            @click="handleDeleteSubscriber"
          >
            Delete
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import {
  getNewsletterSubscriptionsApi,
  createNewsletterSubscriptionApi,
  toggleNewsletterSubscriptionApi,
  deleteNewsletterSubscriptionApi,
} from '@/api/newsletter-subscriptions.api'

const { showSuccess, showError } = useSnackbar()

const subscribers = ref([])
const loading = ref(false)
const search = ref('')
const selectedStatus = ref(null)

const openAddDialog = ref(false)
const adding = ref(false)
const addErrors = reactive({})
const addForm = reactive({ email: '', name: '' })

const openDeleteDialog = ref(false)
const deleting = ref(false)
const itemToDelete = ref(null)

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

async function handleAddSubscriber() {
  Object.keys(addErrors).forEach(key => (addErrors[key] = null))
  if (!addForm.email) {
    addErrors.email = ['Email is required']
    return
  }

  adding.value = true
  try {
    await createNewsletterSubscriptionApi({
      email: addForm.email,
      name: addForm.name || null,
    })
    showSuccess('Subscriber added successfully')
    openAddDialog.value = false
    addForm.email = ''
    addForm.name = ''
    fetchSubscribers()
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(addErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to add subscriber')
    }
  } finally {
    adding.value = false
  }
}

function confirmDelete(item) {
  itemToDelete.value = item
  openDeleteDialog.value = true
}

async function handleDeleteSubscriber() {
  if (!itemToDelete.value) return
  deleting.value = true
  try {
    await deleteNewsletterSubscriptionApi(itemToDelete.value.id)
    showSuccess('Subscriber deleted successfully')
    openDeleteDialog.value = false
    fetchSubscribers()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete subscriber')
  } finally {
    deleting.value = false
  }
}

onMounted(() => {
  fetchSubscribers()
})
</script>
