<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <div class="d-flex align-center justify-space-between mb-4 flex-wrap ga-2">
          <div>
            <div class="text-subtitle-1 font-weight-bold text-uppercase">
              Experience FAQs ({{ faqs.length }})
            </div>
            <div class="text-caption text-medium-emphasis">
              Frequently asked questions specific to {{ experience?.name || 'this experience' }}. If empty, standard contextual defaults are shown on the website.
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
                @click="toggleActive(item)"
              >
                {{ item.is_active ? 'Active' : 'Draft' }}
              </v-chip>
            </template>

            <template #item.actions="{ item }">
              <div class="d-flex align-center justify-center ga-1">
                <v-btn
                  variant="outlined"
                  color="primary"
                  title="Edit FAQ"
                  @click="openEditDialog(item)"
                >
                  <v-icon start size="14">mdi-pencil</v-icon>
                  Edit
                </v-btn>
                <v-btn
                  variant="outlined"
                  color="error"
                  title="Delete FAQ"
                  @click="confirmDelete(item)"
                >
                  <v-icon start size="14">mdi-delete</v-icon>
                  Delete
                </v-btn>
              </div>
            </template>

            <template #no-data>
              <div class="pa-8 text-center text-medium-emphasis">
                <v-icon size="40" color="secondary" class="mb-2">mdi-frequently-asked-questions</v-icon>
                <div class="text-body-2 font-weight-medium">No experience-specific FAQs found.</div>
                <div class="text-caption">Add FAQs for this experience to address practical details, preparation, and pacing.</div>
              </div>
            </template>
          </v-data-table>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { getFaqsApi, toggleFaqActiveApi } from '@/http/faqs.http'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import FaqForm from '@/modal-form/faqs/FaqForm.vue'
import FaqDelete from '@/modal-form/faqs/FaqDelete.vue'

const props = defineProps({
  experience: {
    type: Object,
    default: () => ({}),
  },
})

const { showSuccess, showError } = useSnackbar()
const globalModal = useGlobalModal()

const faqs = ref([])
const loading = ref(false)

const headers = [
  { title: 'SN', key: 'sn', sortable: false, width: '60px' },
  { title: 'Question & Answer', key: 'question', sortable: true },
  { title: 'Category', key: 'category', sortable: true, width: '130px' },
  { title: 'Sort', key: 'sort_order', sortable: true, width: '90px' },
  { title: 'Status', key: 'is_active', sortable: true, width: '110px' },
  { title: 'Actions', key: 'actions', sortable: false, align: 'center', width: '110px' },
]

async function loadFaqs() {
  if (!props.experience?.id) return
  loading.value = true
  try {
    const res = await getFaqsApi({ faqable_type: 'experience', faqable_id: props.experience.id })
    faqs.value = res.data ?? []
  } catch (err) {
    console.error('Failed to load FAQs:', err)
    showError('Failed to load experience FAQs')
  } finally {
    loading.value = false
  }
}

function openCreateDialog() {
  globalModal.open({
    title: 'Add Experience FAQ',
    component: FaqForm,
    size: 'md',
    props: {
      item: {
        faqable_type: 'experience',
        faqable_id: props.experience.id,
        sort_order: faqs.value.length + 1,
      },
      lockEntity: true,
    },
    onSaved: () => loadFaqs(),
  })
}

function openEditDialog(item) {
  globalModal.open({
    title: 'Edit Experience FAQ',
    component: FaqForm,
    size: 'md',
    props: {
      item: {
        ...item,
        faqable_type: 'experience',
        faqable_id: props.experience.id,
      },
      lockEntity: true,
    },
    onSaved: () => loadFaqs(),
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
    onSaved: () => loadFaqs(),
  })
}

async function toggleActive(item) {
  try {
    const newStatus = !item.is_active
    await toggleFaqActiveApi(item.id, newStatus)
    item.is_active = newStatus
    showSuccess(`FAQ marked as ${newStatus ? 'Active' : 'Draft'}.`)
  } catch (err) {
    console.error('Failed to toggle FAQ status:', err)
    showError('Failed to toggle FAQ status')
  }
}

watch(() => props.experience?.id, (newId) => {
  if (newId) loadFaqs()
}, { immediate: true })
</script>
