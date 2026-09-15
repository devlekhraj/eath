<template>
  <div>
    <v-card>
      <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
        <div class="d-flex align-center ga-2">
          <v-avatar size="24" color="primary">
            <v-icon size="14">mdi-scale-balance</v-icon>
          </v-avatar>
          <span class="text-uppercase font-weight-medium text-slate-800" style="font-size: 0.82rem; letter-spacing: 0.03em;">
            Quick Comparison Presets
          </span>
        </div>
        <v-btn color="primary" variant="flat" @click="openForm()">
          <v-icon start>mdi-plus</v-icon>
          Add Comparison Preset
        </v-btn>
      </v-card-title>

      <v-divider />

      <v-card-text class="pa-0">
        <v-data-table
          :headers="headers"
          :items="presets"
          :loading="loading"
          hide-default-footer
          :items-per-page="-1"
        >
          <template #item.name="{ item }">
            <a href="#" class="text-primary text-decoration-underline" @click.prevent="openForm(item)">
              {{ item.name }}
            </a>
          </template>

          <template #item.slug="{ item }">
            <span>{{ item.slug }}</span>
          </template>

          <template #item.description="{ item }">
            <span class="text-caption text-slate-600">
              {{ item.description || '—' }}
            </span>
          </template>

          <template #item.trek_ids="{ item }">
            <div>
              <v-chip
                v-for="slug in (item.trek_ids || [])"
                :key="slug"
                class="mr-2"
                color="primary"
              >
                {{ journeyMap[slug] || slug }}
              </v-chip>
            </div>
          </template>

          <template #item.sort_order="{ item }">
            <span>{{ item.sort_order }}</span>
          </template>

          <template #item.is_active="{ item }">
            <v-chip :color="item.is_active ? 'success' : 'grey'">
              {{ item.is_active ? 'Active' : 'Inactive' }}
            </v-chip>
          </template>

          <template #item.actions="{ item }">
            <div class="d-flex align-center justify-center ga-1">
              <v-btn color="primary" variant="outlined" @click="openForm(item)" title="Edit preset">
                <v-icon start size="14">mdi-pencil</v-icon>
                Edit
              </v-btn>
              <v-btn color="error" variant="outlined" @click="openDelete(item)" title="Delete preset">
                <v-icon start size="14">mdi-delete</v-icon>
                Delete
              </v-btn>
            </div>
          </template>

          <template #no-data>
            <v-alert type="info" class="my-4">
              No comparison presets found.
            </v-alert>
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import { useSnackbar } from '@/composables/snackbar'
import { getComparisonPresetsApi } from '@/http/comparison-presets.http'
import ComparisonPresetForm from '@/modal-form/comparison_presets/ComparisonPresetForm.vue'
import ComparisonPresetDelete from '@/modal-form/comparison_presets/ComparisonPresetDelete.vue'

const { open: openModal } = useGlobalModal()
const { showError } = useSnackbar()

const loading = ref(false)
const presets = ref([])
const availableJourneys = ref([])

const headers = [
  { title: 'Preset Title', key: 'name', align: 'start' },
  { title: 'Trails Included', key: 'trek_ids' },
  { title: 'Slug', key: 'slug' },
  { title: 'Summary / Description', key: 'description' },
  { title: 'Sort Order', key: 'sort_order', align: 'center' },
  { title: 'Status', key: 'is_active', align: 'center' },
  { title: 'Actions', key: 'actions', align: 'center', sortable: false },
]

const journeyMap = computed(() => {
  const map = {}
  availableJourneys.value.forEach((j) => {
    map[j.slug] = j.name
  })
  return map
})

async function fetchData() {
  loading.value = true
  try {
    const resp = await getComparisonPresetsApi()
    presets.value = Array.isArray(resp?.data) ? resp.data : (resp?.data?.data || resp || [])
    availableJourneys.value = Array.isArray(resp?.journeys) ? resp.journeys : (resp?.data?.journeys || [])
  } catch (err) {
    showError(err?.response?.data?.message || err?.message || 'Failed to load comparison presets')
  } finally {
    loading.value = false
  }
}

function openForm(item = {}) {
  openModal({
    title: item?.id ? 'Edit Comparison Preset' : 'Add Comparison Preset',
    component: ComparisonPresetForm,
    size: 'md',
    props: {
      item,
      journeys: availableJourneys.value,
    },
    onClose: fetchData,
  })
}

function openDelete(item) {
  openModal({
    title: 'Delete Preset',
    component: ComparisonPresetDelete,
    size: 'sm',
    props: {
      item,
    },
    onClose: fetchData,
  })
}

onMounted(() => {
  fetchData()
})
</script>
