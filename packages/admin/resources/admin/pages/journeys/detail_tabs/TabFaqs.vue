<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <div class="d-flex align-center justify-space-between mb-4 flex-wrap ga-2">
          <div>
            <div class="text-subtitle-1 font-weight-bold text-uppercase">
              Journey FAQs ({{ faqs.length }})
            </div>
            <div class="text-caption text-medium-emphasis">
              Frequently asked questions specific to {{ journey?.name || 'this journey' }}. Displayed in the FAQ section on the public trek page.
            </div>
          </div>

          <v-btn
            color="primary"
            variant="flat"
            @click="openCreateDialog"
          >
            <v-icon start>mdi-plus</v-icon>
            Add FAQ
          </v-btn>
        </div>

        <v-card variant="outlined" class="overflow-hidden">
          <v-data-table
            :headers="headers"
            :items="faqs"
            :loading="loading"
            :items-per-page="10"
            class="elevation-0"
          >
            <template #item.sn="{ index }">
              <span class="text-caption">{{ index + 1 }}</span>
            </template>

            <template #item.question="{ item }">
              <div class="py-1">
                <div class="text-body-2 text-slate-800">{{ item.question }}</div>
                <div class="text-caption text-medium-emphasis text-truncate" style="max-width: 420px;">
                  {{ item.answer }}
                </div>
              </div>
            </template>

            <template #item.category="{ item }">
              <v-chip
                size="x-small"
                variant="tonal"
                color="primary"
                label
              >
                {{ item.category || 'General' }}
              </v-chip>
            </template>

            <template #item.sort_order="{ item }">
              <span class="text-caption">{{ item.sort_order ?? 0 }}</span>
            </template>

            <template #item.is_active="{ item }">
              <v-chip
                size="x-small"
                label
                class="text-uppercase"
                :color="item.is_active ? 'success' : 'secondary'"
                style="cursor: pointer;"
                @click="handleToggleActive(item)"
              >
                {{ item.is_active ? 'Active' : 'Draft' }}
              </v-chip>
            </template>

            <template #item.actions="{ item }">
              <div class="d-flex align-center justify-center ga-1">
                <v-btn
                  variant="text"
                  color="primary"
                  icon="mdi-pencil"
                  title="Edit FAQ"
                  @click="openEditDialog(item)"
                />
                <v-btn
                  variant="text"
                  color="error"
                  icon="mdi-delete"
                  title="Delete FAQ"
                  @click="confirmDelete(item)"
                />
              </div>
            </template>

            <template #no-data>
              <div class="py-6 text-center text-medium-emphasis">
                <v-icon size="36" color="secondary" class="mb-2">mdi-help-circle-outline</v-icon>
                <div class="text-body-2">No custom FAQs defined yet for this journey.</div>
                <div class="text-caption text-medium-emphasis mt-1">
                  Add specific answers about fitness, gear, altitude, or route highlights.
                </div>
              </div>
            </template>
          </v-data-table>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue'
import { getFaqsApi, updateFaqApi } from '@/http/faqs.http'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import FaqForm from '@/modal-form/faqs/FaqForm.vue'
import FaqDelete from '@/modal-form/faqs/FaqDelete.vue'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const { showSuccess, showError } = useSnackbar()
const globalModal = useGlobalModal()

const loading = ref(false)
const faqs = ref([])

const headers = [
  { title: '#', key: 'sn', width: '50px', sortable: false },
  { title: 'Question & Answer', key: 'question', sortable: false },
  { title: 'Category', key: 'category', width: '120px' },
  { title: 'Sort Order', key: 'sort_order', width: '100px', align: 'center' },
  { title: 'Status', key: 'is_active', width: '90px', align: 'center' },
  { title: 'Actions', key: 'actions', width: '90px', align: 'center', sortable: false },
]

async function fetchFaqs() {
  if (!props.journey?.id) return
  loading.value = true
  try {
    const resp = await getFaqsApi({
      faqable_type: 'journey',
      faqable_id: props.journey.id,
      per_page: 50,
    })
    faqs.value = resp.data?.data || []
  } catch (error) {
    console.error('Failed to load journey FAQs:', error)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchFaqs()
})

watch(() => props.journey?.id, () => {
  fetchFaqs()
})

function openCreateDialog() {
  globalModal.open({
    title: 'Add Journey FAQ',
    component: FaqForm,
    size: 'md',
    props: {
      item: {
        faqable_type: 'journey',
        faqable_id: props.journey.id,
        sort_order: faqs.value.length + 1,
      },
      lockEntity: true,
    },
    onSaved: () => fetchFaqs(),
  })
}

function openEditDialog(item) {
  globalModal.open({
    title: 'Edit Journey FAQ',
    component: FaqForm,
    size: 'md',
    props: {
      item: {
        ...item,
        faqable_type: 'journey',
        faqable_id: props.journey.id,
      },
      lockEntity: true,
    },
    onSaved: () => fetchFaqs(),
  })
}

function confirmDelete(item) {
  globalModal.open({
    title: 'Delete FAQ',
    component: FaqDelete,
    size: 'sm',
    props: {
      item,
    },
    onSaved: () => fetchFaqs(),
  })
}

async function handleToggleActive(item) {
  try {
    await updateFaqApi(item.id, {
      ...item,
      is_active: !item.is_active,
      faqable_type: 'journey',
      faqable_id: props.journey.id,
    })
    showSuccess(`FAQ marked as ${!item.is_active ? 'Active' : 'Draft'}.`)
    await fetchFaqs()
  } catch (error) {
    showError('Failed to toggle FAQ status.')
  }
}
</script>
