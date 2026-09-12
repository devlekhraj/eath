<template>
  <div>
    <v-data-table
      :headers="headers"
      :loading="fetching_data"
      :items="filteredItems"
      :items-per-page="20"
      :sort-by="['title']"
      :sort-desc="[false]"
    >
      <template #top>
        <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
          <v-col cols="12" sm="6" md="4" lg="3" xl="3">
            <v-text-field
              v-model="search"
              label="Search Pages"
              clearable
              hide-details
              prepend-inner-icon="mdi-magnify"
              placeholder="Search by title, slug..."
            />
          </v-col>

          <v-col cols="auto">
            <v-btn color="primary" @click="addPage()">
              <v-icon start>mdi-plus</v-icon> Add New Page
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.title="{ item }">
        <div>
          <router-link :to="{ name: 'adminWebPageDetail', params: { id: item.id } }" class="text-primary text-decoration-underline text-capitalize">
            {{ item.title }}
          </router-link>
        </div>
      </template>

      <template #item.type="{ item }">
        <div>
          <v-chip size="small" label variant="tonal" color="primary" class="text-uppercase">
            {{ item.type || 'standard' }}
          </v-chip>
        </div>
      </template>

      <template #item.is_active="{ item }">
        <div>
          <v-switch
            v-model="item.is_active"
            color="success"
            hide-details
            @change="toggleActive(item)"
          />
        </div>
      </template>

      <template #item.is_published="{ item }">
        <div>
          <v-chip
            size="small"
            label
            :color="item.is_published ? 'success' : 'warning'"
          >
            <v-icon start size="14">
              {{ item.is_published ? 'mdi-check-circle' : 'mdi-alert-circle' }}
            </v-icon>
            {{ item.is_published ? 'Published' : 'Draft' }}
          </v-chip>
        </div>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn size="small" variant="outlined" color="primary" :to="{ name: 'adminWebPageDetail', params: { id: item.id } }" title="Edit website page">
            <v-icon start size="14">mdi-pencil</v-icon>
            Edit
          </v-btn>
          <v-btn size="small" variant="outlined" color="error" @click="deleteItem(item)" title="Delete website page">
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
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import PageForm from './modal/PageForm.vue'
import PageDelete from './modal/PageDelete.vue'

const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Title', key: 'title', sortable: false },
  { title: 'Type', key: 'type', sortable: false },
  { title: 'Active', key: 'is_active', sortable: false },
  { title: 'Published', key: 'is_published', sortable: false },
  { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const data_list = ref([])
const search = ref('')
const fetching_data = ref(false)

const filteredItems = computed(() => {
  if (!search.value) return data_list.value
  const term = search.value.toLowerCase()
  return data_list.value.filter(item =>
    item.title?.toLowerCase().includes(term) ||
    item.slug?.toLowerCase().includes(term) ||
    item.type?.toLowerCase().includes(term)
  )
})

function addPage(item = {}) {
  openModal({
    title: 'Add New Website Page',
    component: PageForm,
    size: 'md',
    props: {
      item,
    },
        onClose: fetchData,
    })
}

const fetchData = async () => {
  try {
    fetching_data.value = true
    const resp = await http.get('admin/website-pages')
    fetching_data.value = false
    data_list.value = resp.data || []
  } catch (error) {
    try {
      const fallback = await http.get('admin/pages')
      data_list.value = fallback.data || []
    } catch {
      data_list.value = []
    } finally {
      fetching_data.value = false
    }
  }
}

const deleteItem = (item) => {
  openModal({
    title: 'Delete ' + item.title,
    component: PageDelete,
    size: 'sm',
    props: {
      item,
    },
        onClose: fetchData,
    })
}

async function toggleActive(item) {
  try {
    const resp = await http.patch(`admin/website-pages/${item.id}/toggle-active`, {
      is_active: item.is_active
    })
    showSuccess(resp.message || 'Status updated successfully')
    fetchData()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to update status')
    item.is_active = !item.is_active
    console.error('Failed to update status:', error)
  }
}

onMounted(fetchData)
</script>

<style scoped></style>
