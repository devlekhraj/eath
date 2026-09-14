<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Media Asset Details</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text>
      <v-row dense>
        <v-col cols="12" md="6">
          <div class="border bg-slate-50 pa-2 d-flex flex-column align-center justify-center">
            <v-img
              :src="asset.url"
              max-height="280"
              contain
              class="w-100"
            />
          </div>

          <div class="mt-3 d-flex align-center ga-2">
            <div class="flex-grow-1">
                <v-text-field
                  :model-value="asset.url"
                  label="Direct Public URL"
                  readonly
                  hide-details
                />
            </div>
            <v-btn
              color="primary"
              variant="tonal"
              @click="copyUrl"
            >
              <v-icon start size="16">mdi-content-copy</v-icon> Copy
            </v-btn>
          </div>

          <div class="mt-3 text-caption text-slate-700 bg-slate-50 pa-3 border">
            <v-row dense>
              <v-col cols="6"><strong>Dimensions:</strong> {{ asset.width ? `${asset.width} × ${asset.height}px` : '—' }}</v-col>
              <v-col cols="6"><strong>File Size:</strong> {{ asset.formatted_size || formatBytes(asset.size_bytes) }}</v-col>
              <v-col cols="6"><strong>MIME Type:</strong> {{ asset.mime_type || 'image/jpeg' }}</v-col>
              <v-col cols="6"><strong>Attachments:</strong> {{ asset.attachments_count ?? 0 }} reference(s)</v-col>
              <v-col cols="12" class="text-truncate"><strong>Filename:</strong> {{ asset.filename }}</v-col>
            </v-row>
          </div>
        </v-col>

        <v-col cols="12" md="6">
          <v-form ref="formRef" @submit.prevent="handleSave">
            <div class="mb-2">
                <v-text-field
                  v-model="form.title"
                  label="Asset Title"
                  placeholder="Descriptive title"
                />
            </div>

            <div class="mb-2">
                <v-text-field
                  v-model="form.alt_text"
                  label="Alt Text (SEO & Accessibility)"
                  placeholder="Descriptive alt text for screen readers"
                />
            </div>

            <div class="mb-2">
                <v-textarea
                  v-model="form.caption"
                  label="Caption"
                  placeholder="Optional photo caption or editorial context"
                  rows="5"
                />
            </div>
          </v-form>
        </v-col>
      </v-row>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-btn
        color="primary"
        variant="flat"
        :loading="saving"
        @click="handleSave"
      >
        Save Changes
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { updateMediaAssetApi } from '@/http/media-assets.http'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const asset = ref({ ...props.item })
const saving = ref(false)

const form = reactive({
  title: '',
  alt_text: '',
  caption: '',
})

onMounted(() => {
  if (props.item) {
    form.title = props.item.title || ''
    form.alt_text = props.item.alt_text || ''
    form.caption = props.item.caption || ''
  }
})

function formatBytes(bytes) {
  if (!bytes) return '—'
  if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB'
  if (bytes >= 1024) return (bytes / 1024).toFixed(0) + ' KB'
  return bytes + ' B'
}

function copyUrl() {
  if (asset.value?.url) {
    navigator.clipboard.writeText(asset.value.url)
    showSuccess('Public image URL copied to clipboard')
  }
}

function handleCancel() {
  emit('close')
}

async function handleSave() {
  saving.value = true
  try {
    const payload = {
      title: form.title,
      alt_text: form.alt_text,
      caption: form.caption,
    }
    const resp = await updateMediaAssetApi(asset.value.id, payload)
    showSuccess('Media asset updated successfully')
    emit('saved', resp?.data)
    emit('close')
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to update media asset')
  } finally {
    saving.value = false
  }
}
</script>
