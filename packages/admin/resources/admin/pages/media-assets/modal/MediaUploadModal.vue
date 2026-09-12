<template>
  <v-card class="rounded-0 elevation-0">
    <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
      <span class="text-uppercase font-weight-medium text-slate-800">Upload Media Asset</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" class="rounded-0" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text>
      <v-row dense>
        <v-col cols="12" md="6">
          <div
            class="media-dropzone d-flex flex-column align-center justify-center text-center pa-4"
            :class="{ 'media-dropzone--active': isDragActive }"
            @dragover.prevent="isDragActive = true"
            @dragleave="isDragActive = false"
            @drop.prevent="handleDrop"
            @click="triggerFileInput"
          >
            <input
              ref="fileInputRef"
              type="file"
              accept="image/jpeg,image/png,image/webp,image/avif,image/svg+xml"
              class="d-none"
              @change="handleFileSelected"
            >

            <template v-if="previewUrl">
              <div class="position-relative w-100" style="max-height: 240px; overflow: hidden;">
                <v-img :src="previewUrl" height="220" cover class="rounded-0 border" />
                <v-btn
                  icon
                  size="x-small"
                  color="error"
                  variant="elevated"
                  class="position-absolute rounded-0"
                  style="top: 8px; right: 8px; z-index: 5;"
                  @click.stop="clearFile"
                >
                  <v-icon size="14">mdi-close</v-icon>
                </v-btn>
              </div>
            </template>
            <template v-else>
              <v-icon size="48" color="primary" class="mb-2">mdi-cloud-upload-outline</v-icon>
              <div class="text-subtitle-2 font-weight-medium text-slate-800">
                Drag and drop image here
              </div>
              <div class="text-caption text-medium-emphasis mt-1">
                Supports JPG, PNG, WebP, AVIF up to 25 MB
              </div>
              <v-btn
                variant="outlined"
                color="primary"
                size="small"
                class="mt-3 rounded-0"
                @click.stop="triggerFileInput"
              >
                Browse File
              </v-btn>
            </template>
          </div>

          <div v-if="selectedFile" class="text-caption text-medium-emphasis mt-2 px-1">
            <div><strong>File:</strong> {{ selectedFile.name }}</div>
            <div><strong>Size:</strong> {{ formatBytes(selectedFile.size) }}</div>
            <div v-if="dimensions.width">
              <strong>Dimensions:</strong> {{ dimensions.width }} × {{ dimensions.height }}px
            </div>
          </div>
        </v-col>

        <v-col cols="12" md="6">
          <v-form ref="formRef" @submit.prevent="handleUpload">
            <v-text-field
              v-model="form.title"
              label="Asset Title"
              placeholder="e.g. Everest Base Camp Sunrise"
              variant="outlined"
              density="compact"
              class="rounded-0 mb-2"
              :error-messages="serverErrors.title"
            />

            <v-text-field
              v-model="form.alt_text"
              label="Alt Text (SEO & Accessibility)"
              placeholder="Descriptive alt text for screen readers and SEO"
              variant="outlined"
              density="compact"
              class="rounded-0 mb-2"
              :error-messages="serverErrors.alt_text"
            />

            <v-textarea
              v-model="form.caption"
              label="Caption / Description"
              placeholder="Optional photo caption or editorial context"
              rows="4"
              variant="outlined"
              density="compact"
              class="rounded-0 mb-2"
              :error-messages="serverErrors.caption"
            />
          </v-form>
        </v-col>
      </v-row>
    </v-card-text>

    <v-divider />
    <v-card-actions class="pa-3">
      <v-btn variant="text" class="rounded-0" @click="handleCancel">Cancel</v-btn>
      <v-spacer />
      <v-btn
        color="primary"
        variant="elevated"
        class="rounded-0"
        :loading="uploading"
        :disabled="!selectedFile || uploading"
        @click="handleUpload"
      >
        <v-icon start size="16">mdi-upload</v-icon> Upload Media
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onUnmounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { uploadMediaAssetApi } from '@/api/media-assets.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const fileInputRef = ref(null)
const selectedFile = ref(null)
const previewUrl = ref('')
const isDragActive = ref(false)
const uploading = ref(false)
const serverErrors = reactive({})
const dimensions = reactive({ width: null, height: null })

const form = reactive({
  title: '',
  alt_text: '',
  caption: '',
})

function triggerFileInput() {
  fileInputRef.value?.click()
}

function handleFileSelected(event) {
  const file = event.target.files?.[0]
  if (file) setFile(file)
}

function handleDrop(event) {
  isDragActive.value = false
  const file = event.dataTransfer?.files?.[0]
  if (file) setFile(file)
}

function setFile(file) {
  selectedFile.value = file
  if (previewUrl.value) URL.revokeObjectURL(previewUrl.value)
  previewUrl.value = URL.createObjectURL(file)

  // Auto-fill title from filename
  if (!form.title) {
    const rawName = file.name.replace(/\.[^/.]+$/, '').replace(/[-_]/g, ' ')
    form.title = rawName.charAt(0).toUpperCase() + rawName.slice(1)
  }
  if (!form.alt_text) {
    form.alt_text = form.title
  }

  // Probe natural image dimensions
  const img = new Image()
  img.onload = () => {
    dimensions.width = img.naturalWidth
    dimensions.height = img.naturalHeight
  }
  img.src = previewUrl.value
}

function clearFile() {
  selectedFile.value = null
  if (previewUrl.value) {
    URL.revokeObjectURL(previewUrl.value)
    previewUrl.value = ''
  }
  dimensions.width = null
  dimensions.height = null
  if (fileInputRef.value) fileInputRef.value.value = ''
}

function formatBytes(bytes) {
  if (!bytes) return '-'
  if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB'
  if (bytes >= 1024) return (bytes / 1024).toFixed(0) + ' KB'
  return bytes + ' B'
}

function handleCancel() {
  clearFile()
  emit('close')
}

async function handleUpload() {
  if (!selectedFile.value) return

  Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))
  uploading.value = true

  try {
    const formData = new FormData()
    formData.append('image', selectedFile.value)
    if (form.title) formData.append('title', form.title)
    if (form.alt_text) formData.append('alt_text', form.alt_text)
    if (form.caption) formData.append('caption', form.caption)

    const resp = await uploadMediaAssetApi(formData)

    if (resp?.deduped) {
      showSuccess('Image already exists; reused existing asset.')
    } else {
      showSuccess(resp?.message || 'Media uploaded successfully')
    }

    emit('saved', resp?.data)
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(serverErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to upload media')
    }
  } finally {
    uploading.value = false
  }
}

onUnmounted(() => {
  if (previewUrl.value) URL.revokeObjectURL(previewUrl.value)
})
</script>

<style scoped>
.media-dropzone {
  border: 1px dashed #cbd5e1;
  background: #f8fafc;
  cursor: pointer;
  min-height: 240px;
  transition: all 0.2s ease;
}

.media-dropzone:hover,
.media-dropzone--active {
  border-color: #0284c7;
  background: #f0f9ff;
}
</style>
