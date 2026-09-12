<template>
  <div>
    <v-data-table
      :headers="headers"
      :loading="fetching_data"
      :items="filteredItems"
      :items-per-page="20"
      :sort-by="['traveled_on']"
      :sort-desc="[true]"
    >
      <template #top>
        <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
          <v-col cols="12" sm="6" md="4" lg="3" xl="3">
            <v-text-field
              v-model="search"
              label="Search Stories"
              clearable
              hide-details
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by title, traveler, country..."
            />
          </v-col>

          <v-col cols="auto">
            <v-btn color="primary" @click="handleOpen()">
              <v-icon start>mdi-plus</v-icon> Add Traveler Story
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.title="{ item }">
        <div>
          <a href="#" class="text-primary text-decoration-underline" @click.prevent="handleOpen(item)">
            {{ item.title }}
          </a>
        </div>
      </template>

      <template #item.traveler_name="{ item }">
        <div>
          <span>{{ item.traveler_name || '—' }}</span>
        </div>
      </template>

      <template #item.traveler_country="{ item }">
        <div>
          <span>{{ item.traveler_country || '—' }}</span>
        </div>
      </template>

      <template #item.traveled_on="{ item }">
        <div>
          <span>{{ item.traveled_on || '—' }}</span>
        </div>
      </template>

      <template #item.journey="{ item }">
        <div>
          <span v-if="item.journey">{{ item.journey.title || item.journey.slug }}</span>
          <span v-else class="text-medium-emphasis">—</span>
        </div>
      </template>

      <template #item.status="{ item }">
        <div>
          <v-chip
            size="small"
            label
            class="text-uppercase"
            :color="item.is_active ? 'success' : 'warning'"
          >
            <v-icon start size="14">
              {{ item.is_active ? 'mdi-check-circle' : 'mdi-alert-circle' }}
            </v-icon>
            {{ item.is_active ? 'Active' : 'Draft' }}
          </v-chip>
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn size="small" color="primary" variant="outlined" @click="handleOpen(item)" title="Edit story">
            <v-icon start size="14">mdi-pencil</v-icon>
            Edit
          </v-btn>
          <v-btn size="small" color="error" variant="outlined" @click="handleDelete(item)" title="Delete story">
            <v-icon start size="14">mdi-delete</v-icon>
            Delete
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </div>
</template>

<script setup>
import http from '@/http.config'
import { ref, onMounted, computed } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import TravelerStoryForm from './modal/TravelerStoryForm.vue'
import TravelerStoryDelete from './modal/TravelerStoryDelete.vue'


const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Title', key: 'title', sortable: false },
  { title: 'Traveler', key: 'traveler_name', sortable: false },
  { title: 'Country', key: 'traveler_country', sortable: false },
  { title: 'Traveled On', key: 'traveled_on', sortable: false },
  { title: 'Journey', key: 'journey', sortable: false },
  { title: 'Status', key: 'status', sortable: false },
  { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const stories = ref([])
const globalModal = useGlobalModal()
const search = ref('')
const fetching_data = ref(false)

const filteredItems = computed(() => {
  if (!search.value) return stories.value
  const term = search.value.toLowerCase()
  return stories.value.filter(item =>
    item.title?.toLowerCase().includes(term) ||
    item.traveler_name?.toLowerCase().includes(term) ||
    item.traveler_country?.toLowerCase().includes(term) ||
    item.journey?.title?.toLowerCase().includes(term)
  )
})

function handleOpen(item = {}) {
  globalModal.open({
    title: item?.id ? 'Edit Traveler Story' : 'Add Traveler Story',
    component: TravelerStoryForm,
    size: 'lg',
    props: {
      item,
    },
    onSaved: fetchStories,
    onClose: fetchStories,
  })
}

function handleDelete(item = {}) {
  globalModal.open({
    title: 'Delete Story',
    component: TravelerStoryDelete,
    size: 'sm',
    props: {
      item,
    },
    onSaved: fetchStories,
    onClose: fetchStories,
  })
}

async function fetchStories() {
  try {
    fetching_data.value = true
    const resp = await http.get('admin/traveler-stories')
    stories.value = resp.data || []
    fetching_data.value = false
  } catch (error) {
    fetching_data.value = false
    console.error('Failed to load traveler stories:', error)
  }
}

onMounted(() => {
  fetchStories()
})
</script>

<style scoped></style>
