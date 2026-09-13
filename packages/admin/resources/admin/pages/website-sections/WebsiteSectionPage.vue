<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="filteredItems"
      :items-per-page="20"
      :loading="fetchingData"
    >
      <template #top>
        <v-row class="px-4 py-2 mb-2 mt-1" align="center" justify="space-between" no-gutters>
          <v-col cols="12" sm="5" md="4" lg="3">
            <v-text-field
              v-model="search"
              label="Search Sections"
              clearable
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by key, heading..."
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="4" md="3" lg="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedPageKey"
              :items="pageKeyOptions"
              label="Filter Page"
              clearable
              hide-details
            />
          </v-col>

          <v-col cols="auto" class="mt-2 mt-sm-0">
            <v-btn color="primary" variant="flat" @click="handleOpen()">
              <v-icon start>mdi-plus</v-icon> Add Section
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.page_key="{ item }">
        <div>
          <v-chip size="small" variant="tonal" color="secondary">
            {{ item.page_key }}
          </v-chip>
        </div>
      </template>

      <template #item.section_key="{ item }">
        <div>
          <code>{{ item.section_key }}</code>
        </div>
      </template>

      <template #item.heading="{ item }">
        <div>
          <span class="text-slate-800">{{ item.heading || '—' }}</span>
        </div>
      </template>

      <template #item.eyebrow="{ item }">
        <div>
          <span class="text-caption text-medium-emphasis">{{ item.eyebrow || '—' }}</span>
        </div>
      </template>

      <template #item.sort_order="{ item }">
        <div>{{ item.sort_order ?? 0 }}</div>
      </template>

      <template #item.is_active="{ item }">
        <div>
          <v-chip
            size="small"
            :color="item.is_active ? 'success' : 'default'"
            variant="flat"
            style="cursor: pointer;"
            @click="toggleActive(item)"
          >
            <v-icon start size="14">{{ item.is_active ? 'mdi-check' : 'mdi-pause' }}</v-icon>
            {{ item.is_active ? 'Active' : 'Inactive' }}
          </v-chip>
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn size="small" variant="outlined" color="primary" @click="handleOpen(item)" title="Edit section">
            <v-icon start size="14">mdi-pencil</v-icon>
            Edit
          </v-btn>
          <v-btn size="small" variant="outlined" color="error" @click="handleDelete(item)" title="Delete section">
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
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import { getWebsiteSectionsApi, toggleWebsiteSectionActiveApi } from '@/api/website-sections.api'
import WebsiteSectionForm from './modal/WebsiteSectionForm.vue'
import WebsiteSectionDelete from './modal/WebsiteSectionDelete.vue'

const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Page Key', key: 'page_key', sortable: true },
  { title: 'Section Key', key: 'section_key', sortable: true },
  { title: 'Heading', key: 'heading', sortable: false },
  { title: 'Eyebrow', key: 'eyebrow', sortable: false },
  { title: 'Order', key: 'sort_order', sortable: true },
  { title: 'Status', key: 'is_active', sortable: false },
  { title: 'Action', key: 'actions', sortable: false, align: 'center' },
]

const sections = ref([])
const search = ref('')
const selectedPageKey = ref(null)
const fetchingData = ref(false)

const pageKeyOptions = computed(() => {
  const keys = new Set()
  sections.value.forEach(s => {
    if (s.page_key) keys.add(s.page_key)
  })
  return Array.from(keys).sort()
})

const filteredItems = computed(() => {
  let list = sections.value

  if (selectedPageKey.value) {
    list = list.filter(item => item.page_key === selectedPageKey.value)
  }

  if (!search.value) return list

  const term = search.value.toLowerCase().trim()
  return list.filter(item => {
    return (
      (item.page_key && item.page_key.toLowerCase().includes(term)) ||
      (item.section_key && item.section_key.toLowerCase().includes(term)) ||
      (item.heading && item.heading.toLowerCase().includes(term)) ||
      (item.eyebrow && item.eyebrow.toLowerCase().includes(term)) ||
      (item.body && item.body.toLowerCase().includes(term))
    )
  })
})

function handleOpen(item = null) {
  openModal({
    title: item?.id ? 'Edit Website Section' : 'Add Website Section',
    component: WebsiteSectionForm,
    size: 'md',
    props: {
      item: item || {},
    },
  })
}

function handleDelete(item = {}) {
  openModal({
    title: 'Delete Website Section',
    component: WebsiteSectionDelete,
    size: 'sm',
    props: {
      item,
    },
        onSaved: fetchSections,
        onClose: fetchSections,
    })
}

async function fetchSections() {
  try {
    fetchingData.value = true
    const resp = await getWebsiteSectionsApi()
    sections.value = resp?.data ?? []
  } catch (error) {
    console.error('Failed to load website sections', error)
  } finally {
    fetchingData.value = false
  }
}

async function toggleActive(item) {
  const original = item.is_active
  item.is_active = !item.is_active
  try {
    const resp = await toggleWebsiteSectionActiveApi(item.id, item.is_active)
    showSuccess(resp?.message || 'Status updated')
  } catch (error) {
    item.is_active = original
    showError(error?.response?.data?.message || 'Failed to update status')
  }
}

onMounted(() => {
  fetchSections()
})
</script>
