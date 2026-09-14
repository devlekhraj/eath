<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>{{ title || 'Edit Media Attachment' }}</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text>
      <!-- Preview thumbnail if available -->
      <div v-if="previewUrl" class="d-flex align-center ga-3 pa-2 mb-3 bg-slate-50 border">
        <v-img
          :src="previewUrl"
          width="64"
          height="48"
          cover
          class="bg-grey-lighten-2 flex-shrink-0"
        />
        <div class="text-caption text-slate-700 text-truncate">
          <div class="font-weight-medium text-truncate">{{ previewTitle || 'Attachment' }}</div>
          <div class="text-slate-500 text-truncate">ID: #{{ form.id }}</div>
        </div>
      </div>

      <v-form ref="formRef" @submit.prevent="handleSubmit">
        <v-row dense>
          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.alt_text"
                label="Alt Text (Accessibility & SEO)"
                placeholder="Describe image for screen readers and SEO..."
                hint="Descriptive text for accessibility and search engines"
                persistent-hint
              />
            </div>
          </v-col>

          <v-col v-if="showTitle" cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.title"
                label="Title (optional)"
                placeholder="e.g. Scenic mountain vista"
              />
            </div>
          </v-col>

          <v-col v-if="showCaption" cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.caption"
                label="Caption"
                placeholder="Optional public visible caption..."
              />
            </div>
          </v-col>

          <v-col v-if="showSortOrder" cols="12">
            <div class="mb-2">
              <v-text-field
                v-model.number="form.sort_order"
                label="Display Order"
                type="number"
                hint="Lower numbers appear first"
                persistent-hint
              />
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
        Save Changes
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
  title: {
    type: String,
    default: 'Edit Media Attachment',
  },
  attachment: {
    type: Object,
    required: true,
  },
  updateUrl: {
    type: String,
    default: '',
  },
  showTitle: {
    type: Boolean,
    default: false,
  },
  showCaption: {
    type: Boolean,
    default: true,
  },
  showSortOrder: {
    type: Boolean,
    default: true,
  },
  onSave: {
    type: Function,
    default: null,
  },
})

const emit = defineEmits(['close', 'saved'])

const loading = ref(false)

const form = reactive({
  id: null,
  alt_text: '',
  title: '',
  caption: '',
  sort_order: 0,
})

const previewUrl = computed(() => {
  return (
    props.attachment?.media_asset?.file_url ||
    props.attachment?.media_asset?.url ||
    props.attachment?.url ||
    props.attachment?.file_url ||
    ''
  )
})

const previewTitle = computed(() => {
  return (
    props.attachment?.media_asset?.title ||
    props.attachment?.media_asset?.filename ||
    props.attachment?.alt_text ||
    ''
  )
})

onMounted(() => {
  if (props.attachment) {
    form.id = props.attachment.id
    form.alt_text = props.attachment.alt_text || ''
    form.title = props.attachment.title || ''
    form.caption = props.attachment.caption || ''
    form.sort_order = props.attachment.sort_order ?? 0
  }
})

function handleCancel() {
  emit('close')
}

async function handleSubmit() {
  loading.value = true
  try {
    const payload = {
      alt_text: form.alt_text,
      caption: form.caption,
      sort_order: form.sort_order,
    }
    if (props.showTitle) {
      payload.title = form.title
    }

    let responseData = null

    if (typeof props.onSave === 'function') {
      responseData = await props.onSave(payload, form.id)
    } else if (props.updateUrl) {
      const resp = await http.put(props.updateUrl, payload)
      responseData = resp?.data || resp
    } else {
      throw new Error('No update URL or onSave callback provided')
    }

    showSuccess('Media attachment updated successfully')
    emit('saved', { id: form.id, ...payload, responseData })
    emit('close')
  } catch (error) {
    showError(error?.response?.data?.message || error?.message || 'Failed to update media attachment')
  } finally {
    loading.value = false
  }
}
</script>
