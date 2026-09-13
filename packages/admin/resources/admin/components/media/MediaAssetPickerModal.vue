<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Media Asset Library</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="$emit('close')">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>

    <v-divider />

    <v-card-text class="pa-4">
      <!-- Search & Upload Bar -->
      <v-row dense align="center" justify="space-between" class="mb-3">
        <v-col cols="12" sm="7" md="8">
          <v-text-field
            v-model="search"
            label="Search media assets..."
            prepend-inner-icon="mdi-magnify"
            clearable
          />
        </v-col>

        <v-col cols="12" sm="auto" class="d-flex align-center justify-end">
          <input
            ref="fileInputRef"
            type="file"
            accept="image/*"
            class="d-none"
            @change="handleDirectUpload"
          />
          <v-btn
            color="primary"
            variant="tonal"
            :loading="uploading"
            @click="fileInputRef?.click()"
          >
            <v-icon start size="16">mdi-cloud-upload</v-icon>
            Upload New Photo
          </v-btn>
        </v-col>
      </v-row>

      <!-- Loading skeleton -->
      <v-row v-if="loading" dense>
        <v-col v-for="n in 8" :key="n" cols="6" sm="4" md="3">
          <v-skeleton-loader type="image" class="border" height="120" />
        </v-col>
      </v-row>

      <!-- Empty state -->
      <div v-else-if="filteredAssets.length === 0" class="text-center py-12">
        <v-icon size="48" color="grey-lighten-1" class="mb-2">mdi-image-off-outline</v-icon>
        <div class="text-body-1 font-weight-medium text-slate-700">No media assets found</div>
        <p class="text-caption text-medium-emphasis mb-4">
          {{ search ? 'No assets matched your search term.' : 'Your media library is currently empty. Upload photos to get started.' }}
        </p>
        <v-btn
          color="primary"
          variant="outlined"
          :loading="uploading"
          @click="fileInputRef?.click()"
        >
          <v-icon start>mdi-cloud-upload</v-icon> Upload Image Now
        </v-btn>
      </div>

      <!-- Assets grid -->
      <v-row v-else dense>
        <v-col
          v-for="asset in filteredAssets"
          :key="asset.id"
          cols="6"
          sm="4"
          md="3"
        >
          <v-card
            class="position-relative cursor-pointer h-100"
            :color="selectedId === asset.id ? 'primary' : undefined"
            :variant="selectedId === asset.id ? 'tonal' : 'outlined'"
            @click="selectedId = asset.id"
            @dblclick="confirmSelection(asset)"
          >
            <div class="position-relative" style="aspect-ratio: 16/9; overflow: hidden;">
              <v-img
                :src="asset.url"
                height="100%"
                cover
                class="bg-grey-lighten-3"
              >
                <template #placeholder>
                  <div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
                    <v-progress-circular indeterminate size="20" color="primary" />
                  </div>
                </template>
              </v-img>

              <v-avatar
                v-if="selectedId === asset.id"
                size="22"
                color="primary"
                class="position-absolute"
                style="top: 6px; right: 6px; z-index: 2;"
              >
                <v-icon size="14" color="white">mdi-check</v-icon>
              </v-avatar>
            </div>

            <div class="pa-2">
              <div class="text-caption font-weight-medium text-truncate text-slate-800" :title="asset.filename">
                {{ asset.filename }}
              </div>
              <div class="d-flex align-center justify-space-between text-caption text-medium-emphasis" style="font-size: 11px;">
                <span>{{ formatDimensions(asset) }}</span>
                <span>{{ asset.formatted_size || '' }}</span>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="$emit('close')">Cancel</v-btn>
      <v-btn
        color="primary"
        :disabled="!selectedAsset"
        @click="confirmSelection(selectedAsset)"
      >
        Select Image
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { getMediaAssetsApi, uploadMediaAssetApi } from '@/api/media-assets.api'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  initialSelectedId: {
    type: [Number, String],
    default: null,
  },
  onSelect: {
    type: Function,
    default: null,
  },
})

const emit = defineEmits(['close', 'select'])
const { showSuccess, showError } = useSnackbar()

const assets = ref([])
const loading = ref(true)
const uploading = ref(false)
const search = ref('')
const selectedId = ref(props.initialSelectedId || null)
const fileInputRef = ref(null)

const filteredAssets = computed(() => {
  if (!search.value) return assets.value
  const term = search.value.toLowerCase()
  return assets.value.filter((a) =>
    a.filename?.toLowerCase().includes(term) ||
    a.title?.toLowerCase().includes(term) ||
    a.alt_text?.toLowerCase().includes(term)
  )
})

const selectedAsset = computed(() => {
  return assets.value.find((a) => a.id === selectedId.value) || null
})

function formatDimensions(asset) {
  if (asset.width && asset.height) {
    return `${asset.width}×${asset.height}`
  }
  return ''
}

async function fetchAssets() {
  try {
    loading.value = true
    const resp = await getMediaAssetsApi()
    assets.value = resp.data || []
  } catch (err) {
    console.error('Failed to load media assets:', err)
    showError('Failed to load media library.')
  } finally {
    loading.value = false
  }
}

async function handleDirectUpload(event) {
  const file = event.target?.files?.[0]
  if (!file) return

  try {
    uploading.value = true
    const formData = new FormData()
    formData.append('file', file)

    const resp = await uploadMediaAssetApi(formData)
    const newAsset = resp.data
    showSuccess(resp.message || 'Image uploaded successfully.')

    await fetchAssets()
    if (newAsset?.id) {
      selectedId.value = newAsset.id
      confirmSelection(newAsset)
    }
  } catch (err) {
    console.error('Failed to upload image:', err)
    showError(err?.response?.data?.message || 'Failed to upload image.')
  } finally {
    uploading.value = false
    if (event.target) event.target.value = ''
  }
}

const confirming = ref(false)

function confirmSelection(asset) {
  if (!asset || confirming.value) return
  confirming.value = true
  if (props.onSelect) {
    props.onSelect(asset)
  }
  emit('select', asset)
  emit('close')
}

onMounted(() => {
  fetchAssets()
})
</script>
