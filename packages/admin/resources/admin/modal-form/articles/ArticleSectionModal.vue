<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>{{ form.id ? 'Edit Article Section' : 'Add Article Section' }}</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit">
        <v-row dense>
          <v-col cols="12" sm="9">
            <div class="mb-2">
              <v-text-field
                v-model="form.heading"
                label="Section Heading *"
                placeholder="e.g. Flora and Fauna Along the Route"
                :rules="[rules.required]"
              />
            </div>
          </v-col>

          <v-col cols="12" sm="3">
            <div class="mb-2">
              <v-text-field
                v-model.number="form.sort_order"
                label="Sort Order"
                type="number"
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <label class="text-caption mb-1 d-block font-weight-medium">Section Body</label>
              <SummarnoteEditor v-model="form.body" minHeight="220" />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-btn
        color="primary"
        variant="flat"
        :loading="loading"
        @click="handleSubmit"
      >
        Save Section
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import http from '@/http.config'
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
  section: {
    type: Object,
    default: () => ({}),
  },
  articleId: {
    type: [String, Number],
    default: null,
  },
})

const emit = defineEmits(['close', 'saved'])

const formRef = ref(null)
const loading = ref(false)

const form = reactive({
  id: null,
  heading: '',
  body: '',
  sort_order: 0,
})

const rules = {
  required: (v) => !!v || 'This field is required',
}

onMounted(() => {
  if (props.section) {
    form.id = props.section.id || null
    form.heading = props.section.heading || ''
    form.body = props.section.body || ''
    form.sort_order = props.section.sort_order ?? 0
  }
})

function handleCancel() {
  emit('close')
}

async function handleSubmit() {
  if (!form.heading) {
    showError('Section heading is required')
    return
  }

  if (!props.articleId) {
    // Local memory draft update
    emit('saved', { ...form })
    emit('close')
    return
  }

  loading.value = true
  try {
    const payload = {
      heading: form.heading,
      body: form.body,
      sort_order: form.sort_order,
    }

    if (form.id) {
      await http.put(`/admin/articles/${props.articleId}/sections/${form.id}`, payload)
      showSuccess('Section updated successfully')
    } else {
      await http.post(`/admin/articles/${props.articleId}/sections`, payload)
      showSuccess('Section added successfully')
    }

    emit('saved', { ...form })
    emit('close')
  } catch (error) {
    console.error('Failed to save article section:', error)
    showError(error?.response?.data?.message || 'Failed to save section')
  } finally {
    loading.value = false
  }
}
</script>
