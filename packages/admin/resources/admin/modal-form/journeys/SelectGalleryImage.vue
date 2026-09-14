<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span class="font-medium">Select Image</span>
      <v-btn size="small" icon variant="text" @click="handleClose">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text class="pa-0">
      <v-tabs v-model="activeTab" color="primary">
        <v-tab value="select">
          <v-icon color="primary" start>mdi-image-multiple</v-icon>
          Select Existing
        </v-tab>
        <v-tab value="upload">
          <v-icon color="primary" start>mdi-upload</v-icon>
          Upload New
        </v-tab>
      </v-tabs>

      <v-divider />

      <div class="px-6">
        <keep-alive>
          <component :is="activeTabComponent" v-bind="activeTabProps" v-on="activeTabListeners" />
        </keep-alive>
      </div>
    </v-card-text>

  </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, onMounted, onUnmounted, watch, computed } from 'vue'
import SelectGalleryExisting from './SelectGalleryExisting.vue'
import SelectGalleryUpload from './SelectGalleryUpload.vue'

const props = defineProps({
  onSelect: {
    type: Function,
    default: null,
  },
})

const emit = defineEmits(['close'])

const images = ref([])
const selectedImage = ref(null)
const activeTab = ref('select')
const uploadFile = ref(null)
const uploadPreviewUrl = ref('')
const uploadInfo = ref({
  size: null,
  type: '',
  width: null,
  height: null,
})
const selectMeta = ref({
  alt_text: '',
  caption: '',
  description: '',
})
const uploadMeta = ref({
  name: '',
  alt_text: '',
  caption: '',
  description: '',
})

const tabComponents = {
  select: SelectGalleryExisting,
  upload: SelectGalleryUpload,
}

const activeTabComponent = computed(() => tabComponents[activeTab.value] || SelectGalleryExisting)

const activeTabProps = computed(() => {
  if (activeTab.value === 'upload') {
    return {
      uploadFile: uploadFile.value,
      uploadPreviewUrl: uploadPreviewUrl.value,
      uploadInfo: uploadInfo.value,
      meta: uploadMeta.value,
      formatUploadFilename,
      formatBytes,
      formatUploadDimensions,
    }
  }
  return {
    images: images.value,
    selectedImage: selectedImage.value,
    meta: selectMeta.value,
    formatDimensions,
    formatSelectedFilename,
  }
})

const activeTabListeners = computed(() => {
  if (activeTab.value === 'upload') {
    return {
      'update:upload-file': setUploadFile,
      'update:meta': updateUploadMeta,
      confirm: handleConfirmUpload,
    }
  }
  return {
    'select-image': selectImage,
    'update:meta': updateSelectMeta,
    confirm: handleConfirmSelect,
  }
})

async function fetchImages() {
  try {
    const resp = await http.get('/admin/galleries')
    images.value = resp.data?.data ?? resp.data ?? []
  } catch (error) {
    console.error('Failed to load gallery images', error)
    images.value = []
  }
}

function selectImage(image) {
  selectedImage.value = image
}

function updateSelectMeta(value) {
  selectMeta.value = value
}

function updateUploadMeta(value) {
  uploadMeta.value = value
}

function setUploadFile(value) {
  uploadFile.value = value
}

function handleConfirmSelect(payload) {
  if (props.onSelect) {
    props.onSelect({
      image: payload?.image ?? selectedImage.value,
      meta: { ...(payload?.meta ?? selectMeta.value) },
    })
  }
  handleClose()
}

function handleConfirmUpload(payload) {
  const image = payload?.image ?? payload
  if (image) {
    images.value.unshift(image)
  }
  if (props.onSelect) {
    props.onSelect({
      image,
      meta: { ...(payload?.meta ?? uploadMeta.value) },
    })
  }
  handleClose()
}

function handleClose() {
  emit('close')
}

onMounted(() => {
  fetchImages()
})

watch(
  () => selectedImage.value,
  (image) => {
    if (!image) return
    selectMeta.value = {
      alt_text: image.alt_text || '',
      caption: image.title || image.caption || '',
      description: image.description || '',
    }
  }
)

function formatDimensions(image) {
  if (!image) return '-'
  const width = image.width ?? image.image_width
  const height = image.height ?? image.image_height
  if (width && height) return `${width} × ${height}px`
  return '-'
}

function formatUploadDimensions() {
  const width = uploadInfo.value.width
  const height = uploadInfo.value.height
  if (width && height) return `${width} × ${height}px`
  return '-'
}

function slugifyName(input) {
  return input
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/(^-|-$)+/g, '')
}

function formatSelectedFilename() {
  const filename = selectedImage.value?.filename || ''
  const rawTitle =
    selectedImage.value?.name ||
    selectedImage.value?.title ||
    selectedImage.value?.caption ||
    ''
  const ext = filename.includes('.') ? filename.split('.').pop() : ''
  const baseSource = rawTitle || filename.split('.').slice(0, -1).join('.')
  const base = baseSource ? slugifyName(baseSource.trim()) : ''
  if (!base && !ext) return '-'
  if (!ext) return base || '-'
  return `${base || 'image'}.${ext}`
}

function formatUploadFilename() {
  const original = uploadFile.value?.name || ''
  const input = (uploadMeta.value.name || '').trim()
  const base = input
    ? slugifyName(input)
    : (original.split('.').slice(0, -1).join('.') || original).trim()
  const ext = original.includes('.') ? original.split('.').pop() : ''
  if (!base && !ext) return '-'
  if (!ext) return base || '-'
  return `${base || 'image'}.${ext}`
}

function formatBytes(bytes) {
  if (!Number.isFinite(bytes)) return '-'
  const units = ['B', 'KB', 'MB', 'GB']
  let value = bytes
  let unitIndex = 0
  while (value >= 1024 && unitIndex < units.length - 1) {
    value /= 1024
    unitIndex += 1
  }
  const decimals = value >= 10 || unitIndex === 0 ? 0 : 1
  return `${value.toFixed(decimals)} ${units[unitIndex]}`
}

watch(
  () => uploadFile.value,
  (file) => {
    if (uploadPreviewUrl.value) {
      URL.revokeObjectURL(uploadPreviewUrl.value)
      uploadPreviewUrl.value = ''
    }
    if (file instanceof File) {
      uploadPreviewUrl.value = URL.createObjectURL(file)
      uploadMeta.value = {
        ...uploadMeta.value,
        name: file.name || '',
      }
      uploadInfo.value = {
        size: file.size ?? null,
        type: file.type || '',
        width: null,
        height: null,
      }
      const img = new Image()
      const probeUrl = URL.createObjectURL(file)
      img.onload = () => {
        uploadInfo.value = {
          ...uploadInfo.value,
          width: img.naturalWidth || null,
          height: img.naturalHeight || null,
        }
        URL.revokeObjectURL(probeUrl)
      }
      img.src = probeUrl
      return
    }
    uploadMeta.value = {
      ...uploadMeta.value,
      name: '',
    }
    uploadInfo.value = {
      size: null,
      type: '',
      width: null,
      height: null,
    }
  }
)

onUnmounted(() => {
  if (uploadPreviewUrl.value) {
    URL.revokeObjectURL(uploadPreviewUrl.value)
  }
})
</script>
