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
              label="Search FAQs"
              clearable
              prepend-inner-icon="mdi-magnify"
              placeholder="Search question, answer..."
              variant="outlined"
              density="compact"
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="4" md="3" lg="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedCategory"
              :items="categoryOptions"
              label="Filter Category"
              clearable
              variant="outlined"
              density="compact"
              hide-details
            />
          </v-col>

          <v-col cols="12" sm="3" md="2" class="mt-2 mt-sm-0 px-sm-2">
            <v-select
              v-model="selectedScope"
              :items="scopeOptions"
              label="Filter Scope"
              clearable
              variant="outlined"
              density="compact"
              hide-details
            />
          </v-col>

          <v-col cols="auto" class="mt-2 mt-sm-0">
            <v-btn color="primary" variant="elevated" @click="handleOpen()">
              <v-icon start>mdi-plus</v-icon> Add FAQ
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.question="{ item }">
        <div>
          <span class="text-slate-800">{{ item.question }}</span>
        </div>
      </template>

      <template #item.category="{ item }">
        <div>
          <v-chip size="small" variant="tonal" color="primary">
            {{ item.category || 'General' }}
          </v-chip>
        </div>
      </template>

      <template #item.scope="{ item }">
        <div>
          <template v-if="item.journey">
            <v-chip size="small" variant="outlined" color="secondary">
              <v-icon start size="12">mdi-hiking</v-icon>
              {{ item.journey.name }}
            </v-chip>
          </template>
          <template v-else-if="item.destination">
            <v-chip size="small" variant="outlined" color="info">
              <v-icon start size="12">mdi-map-marker</v-icon>
              {{ item.destination.name }}
            </v-chip>
          </template>
          <template v-else-if="item.experience">
            <v-chip size="small" variant="outlined" color="warning">
              <v-icon start size="12">mdi-compass</v-icon>
              {{ item.experience.name }}
            </v-chip>
          </template>
          <template v-else>
            <span class="text-caption text-medium-emphasis">Global Website</span>
          </template>
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
            {{ item.is_active ? 'Active' : 'Draft' }}
          </v-chip>
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn size="small" variant="outlined" color="primary" @click="handleOpen(item)" title="Edit FAQ">
            <v-icon start size="14">mdi-pencil</v-icon>
            Edit
          </v-btn>
          <v-btn size="small" variant="outlined" color="error" @click="handleDelete(item)" title="Delete FAQ">
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
import { getFaqsApi, toggleFaqActiveApi, getFaqCategoriesApi } from '@/api/faqs.api'
import FaqForm from './modal/FaqForm.vue'
import FaqDelete from './modal/FaqDelete.vue'

const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const headers = [
  { title: 'SN', key: 'sn', sortable: false, width: '60px' },
  { title: 'Question', key: 'question', sortable: true },
  { title: 'Category', key: 'category', sortable: true, width: '150px' },
  { title: 'Association / Scope', key: 'scope', sortable: false },
  { title: 'Order', key: 'sort_order', sortable: true, width: '80px' },
  { title: 'Status', key: 'is_active', sortable: false, width: '100px' },
  { title: 'Action', key: 'actions', sortable: false, align: 'center', width: '160px' },
]

const faqs = ref([])
const search = ref('')
const selectedCategory = ref(null)
const selectedScope = ref(null)
const fetchingData = ref(false)
const categoryOptions = ref([])

const scopeOptions = [
  { title: 'All Scopes', value: null },
  { title: 'Global Website', value: 'global' },
  { title: 'Journey-Specific', value: 'journey' },
  { title: 'Destination-Specific', value: 'destination' },
  { title: 'Experience-Specific', value: 'experience' },
]

const filteredItems = computed(() => {
  let list = faqs.value

  if (selectedCategory.value) {
    list = list.filter(item => (item.category || 'General') === selectedCategory.value)
  }

  if (selectedScope.value) {
    if (selectedScope.value === 'global') {
      list = list.filter(item => !item.journey_id && !item.destination_id && !item.experience_id)
    } else if (selectedScope.value === 'journey') {
      list = list.filter(item => !!item.journey_id)
    } else if (selectedScope.value === 'destination') {
      list = list.filter(item => !!item.destination_id)
    } else if (selectedScope.value === 'experience') {
      list = list.filter(item => !!item.experience_id)
    }
  }

  if (!search.value) return list

  const term = search.value.toLowerCase().trim()
  return list.filter(item => {
    return (
      (item.question && item.question.toLowerCase().includes(term)) ||
      (item.answer && item.answer.toLowerCase().includes(term)) ||
      (item.category && item.category.toLowerCase().includes(term)) ||
      (item.journey?.name && item.journey.name.toLowerCase().includes(term)) ||
      (item.destination?.name && item.destination.name.toLowerCase().includes(term)) ||
      (item.experience?.name && item.experience.name.toLowerCase().includes(term))
    )
  })
})

function handleOpen(item = null) {
  openModal({
    title: item?.id ? 'Edit FAQ' : 'Add FAQ',
    component: FaqForm,
    size: 'lg',
    props: {
      item: item || {},
    },
  })
}

function handleDelete(item = {}) {
  openModal({
    title: 'Delete FAQ',
    component: FaqDelete,
    size: 'sm',
    props: {
      item,
    },
        onSaved: fetchFaqs,
        onClose: fetchFaqs,
    })
}

async function fetchFaqs() {
  try {
    fetchingData.value = true
    const [faqResp, catResp] = await Promise.all([
      getFaqsApi(),
      getFaqCategoriesApi().catch(() => ({ data: [] })),
    ])
    faqs.value = faqResp?.data ?? []
    if (Array.isArray(catResp?.data) && catResp.data.length) {
      categoryOptions.value = catResp.data
    }
  } catch (error) {
    console.error('Failed to load FAQs', error)
  } finally {
    fetchingData.value = false
  }
}

async function toggleActive(item) {
  const original = item.is_active
  item.is_active = !item.is_active
  try {
    const resp = await toggleFaqActiveApi(item.id, item.is_active)
    showSuccess(resp?.message || 'Status updated')
  } catch (error) {
    item.is_active = original
    showError(error?.response?.data?.message || 'Failed to update status')
  }
}

onMounted(() => {
  fetchFaqs()
})
</script>
