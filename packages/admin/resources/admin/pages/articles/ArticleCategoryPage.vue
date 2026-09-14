<template>
  <div>
    <v-data-table
      :headers="headers"
      :loading="fetching_data"
      :items="filteredItems"
      :items-per-page="20"
      :sort-by="['sort_order', 'name']"
      :sort-desc="[false, false]"
    >
      <template #top>
        <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
          <v-col cols="12" sm="6" md="4" lg="3" xl="3">
            <v-text-field
              v-model="search"
              label="Search Categories"
              clearable
              hide-details
              prepend-inner-icon="mdi-magnify"
              placeholder="Search category name..."
            />
          </v-col>

          <v-col cols="auto">
            <v-btn color="primary" @click="handleOpen()">
              <v-icon start>mdi-plus</v-icon> Add Category
            </v-btn>
          </v-col>
        </v-row>
      </template>

      <template #item.sn="{ index }">
        <div>{{ index + 1 }}</div>
      </template>

      <template #item.name="{ item }">
        <div>
          <a href="#" class="text-primary text-decoration-underline" @click.prevent="handleOpen(item)">
            {{ item.name }}
          </a>
        </div>
      </template>

      <template #item.articles_count="{ item }">
        <div>
          <span>{{ item.articles_count ?? 0 }}</span>
        </div>
      </template>

      <template #item.sort_order="{ item }">
        <div>
          <span>{{ item.sort_order ?? 0 }}</span>
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

      <template #item.actions="{ item }">
        <div class="d-flex align-center justify-center ga-1">
          <v-btn color="primary" variant="outlined" @click="handleOpen(item)" title="Edit category">
            <v-icon start size="14">mdi-pencil</v-icon>
            Edit
          </v-btn>
          <v-btn color="error" variant="outlined" @click="handleDelete(item)" title="Delete category">
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
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import CategoryForm from '@/modal-form/articles/CategoryForm.vue'
import CategoryDelete from '@/modal-form/articles/CategoryDelete.vue'

const { showSuccess, showError } = useSnackbar()

const headers = [
  { title: 'SN', key: 'sn', sortable: false },
  { title: 'Category Name', key: 'name', sortable: false },
  { title: 'Articles', key: 'articles_count', sortable: false },
  { title: 'Seq#', key: 'sort_order', sortable: false },
  { title: 'Active', key: 'is_active', sortable: false },
  { title: 'Action', key: 'actions', sortable: false, align: 'center' },
]

const categories = ref([])
const globalModal = useGlobalModal()
const search = ref('')
const fetching_data = ref(false)

const filteredItems = computed(() => {
  if (!search.value) return categories.value
  const term = search.value.toLowerCase()
  return categories.value.filter(item =>
    item.name?.toLowerCase().includes(term) ||
    item.slug?.toLowerCase().includes(term)
  )
})

function handleOpen(item = {}) {
  globalModal.open({
    title: item?.id ? 'Edit Category' : 'Add New Category',
    component: CategoryForm,
    size: 'lg',
    props: {
      item,
    },
    onSaved: fetchCategories,
    onClose: fetchCategories,
  })
}

function handleDelete(item = {}) {
  globalModal.open({
    title: 'Delete Category',
    component: CategoryDelete,
    size: 'sm',
    props: {
      item,
    },
    onSaved: fetchCategories,
    onClose: fetchCategories,
  })
}

async function fetchCategories() {
  try {
    fetching_data.value = true
    const resp = await http.get('admin/article-categories')
    categories.value = resp.data || []
    fetching_data.value = false
  } catch (error) {
    try {
      const fallback = await http.get('admin/blog-categories')
      categories.value = fallback.data || []
    } catch {
      categories.value = []
    } finally {
      fetching_data.value = false
    }
  }
}

async function toggleActive(item) {
  try {
    const resp = await http.patch(`admin/article-categories/${item.id}/toggle-active`, {
      is_active: item.is_active
    })
    showSuccess(resp.message || 'Updated status')
    fetchCategories()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to update')
    item.is_active = !item.is_active
    console.error('Failed to update status:', error)
  }
}

onMounted(() => {
  fetchCategories()
})
</script>

<style scoped></style>
