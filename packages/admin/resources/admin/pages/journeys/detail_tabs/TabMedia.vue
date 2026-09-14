<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <!-- Hidden file inputs for direct upload -->
        <input
          ref="heroFileInputRef"
          type="file"
          accept="image/*"
          class="d-none"
          @change="handleDirectUpload('hero', $event)"
        />
        <input
          ref="cardFileInputRef"
          type="file"
          accept="image/*"
          class="d-none"
          @change="handleDirectUpload('card', $event)"
        />
        <input
          ref="routeMapFileInputRef"
          type="file"
          accept="image/*"
          class="d-none"
          @change="handleDirectUpload('route_map', $event)"
        />

        <v-row>
          <!-- Hero Banner Image Card -->
          <v-col cols="12" md="4">
            <v-card variant="outlined" class="h-100 pa-5 d-flex flex-column justify-space-between">
              <div>
                <div class="d-flex align-center justify-space-between mb-2">
                  <div class="text-subtitle-1 font-weight-bold text-uppercase">
                    Hero Banner Image
                  </div>
                  <v-chip size="x-small" color="primary" variant="tonal" label>
                    Panoramic / Header
                  </v-chip>
                </div>
                <p class="text-caption text-medium-emphasis mb-3">
                  High-resolution panoramic banner displayed on top of the journey detail page.
                </p>

                <!-- Visual Preview -->
                <div v-if="heroImage?.url" class="position-relative mb-4 border rounded overflow-hidden">
                  <v-img
                    :src="heroImage.url"
                    height="200"
                    cover
                    class="bg-grey-lighten-4"
                  >
                    <template #placeholder>
                      <div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
                        <v-progress-circular indeterminate size="24" color="primary" />
                      </div>
                    </template>
                  </v-img>

                  <div class="pa-2 bg-white d-flex align-center justify-space-between text-caption">
                    <span class="font-weight-medium text-truncate" :title="heroImage.filename">
                      {{ heroImage.filename || `Asset #${heroImage.id}` }}
                    </span>
                    <span v-if="heroImage.width && heroImage.height" class="text-medium-emphasis ml-2 flex-shrink-0">
                      {{ heroImage.width }}×{{ heroImage.height }}px
                    </span>
                  </div>
                  <div v-if="heroImage.alt_text" class="px-2 pb-2 bg-white text-caption text-truncate text-slate-600 border-t">
                    <strong class="text-slate-800">Alt:</strong> {{ heroImage.alt_text }}
                  </div>
                </div>

                <!-- Empty Dropzone -->
                <div
                  v-else
                  class="d-flex flex-column align-center justify-center pa-6 bg-grey-lighten-5 mb-4 cursor-pointer"
                  style="height: 200px; border: 2px dashed #cbd5e1; border-radius: 6px;"
                  @click="heroFileInputRef?.click()"
                >
                  <v-icon size="44" color="grey">mdi-cloud-upload-outline</v-icon>
                  <span class="text-body-2 font-weight-medium text-slate-700 mt-2">Upload Hero Banner</span>
                  <span class="text-caption text-medium-emphasis mt-1">Click to browse or drop an image file</span>
                </div>
              </div>

              <!-- Action buttons -->
              <div class="d-flex align-center justify-end flex-wrap ga-2 pt-2 border-t">
                <v-btn
                  v-if="heroImage?.url"
                  color="error"
                  variant="outlined"
                  :disabled="loadingHero"
                  @click="promptRemoveImage('hero', heroImage)"
                >
                  <v-icon start size="16">mdi-delete</v-icon>
                  Remove
                </v-btn>

                <v-btn
                  v-if="heroImage?.url"
                  color="primary"
                  variant="outlined"
                  :disabled="loadingHero"
                  @click="openEditModal('hero', heroImage)"
                >
                  <v-icon start size="16">mdi-pencil</v-icon>
                  Edit Alt Text
                </v-btn>

                <v-btn
                  variant="outlined"
                  color="secondary"
                  :disabled="loadingHero"
                  @click="openLibraryPicker('hero')"
                >
                  <v-icon start size="16">mdi-image-multiple</v-icon>
                  Media Library
                </v-btn>

                <v-btn
                  color="primary"
                  variant="flat"
                  :loading="loadingHero"
                  @click="heroFileInputRef?.click()"
                >
                  <v-icon start size="16">mdi-cloud-upload</v-icon>
                  {{ heroImage?.url ? 'Replace Image' : 'Upload Image' }}
                </v-btn>
              </div>
            </v-card>
          </v-col>

          <!-- Card Thumbnail Image Card -->
          <v-col cols="12" md="4">
            <v-card variant="outlined" class="h-100 pa-5 d-flex flex-column justify-space-between">
              <div>
                <div class="d-flex align-center justify-space-between mb-2">
                  <div class="text-subtitle-1 font-weight-bold text-uppercase">
                    Card Thumbnail Image
                  </div>
                  <v-chip size="x-small" color="secondary" variant="tonal" label>
                    Catalog Grid & Teasers
                  </v-chip>
                </div>
                <p class="text-caption text-medium-emphasis mb-3">
                  Featured across homepage journey grids, catalog cards, and search results.
                </p>

                <!-- Visual Preview -->
                <div v-if="cardImage?.url" class="position-relative mb-4 border rounded overflow-hidden">
                  <v-img
                    :src="cardImage.url"
                    height="200"
                    cover
                    class="bg-grey-lighten-4"
                  >
                    <template #placeholder>
                      <div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
                        <v-progress-circular indeterminate size="24" color="primary" />
                      </div>
                    </template>
                  </v-img>

                  <div class="pa-2 bg-white d-flex align-center justify-space-between text-caption">
                    <span class="font-weight-medium text-truncate" :title="cardImage.filename">
                      {{ cardImage.filename || `Asset #${cardImage.id}` }}
                    </span>
                    <span v-if="cardImage.width && cardImage.height" class="text-medium-emphasis ml-2 flex-shrink-0">
                      {{ cardImage.width }}×{{ cardImage.height }}px
                    </span>
                  </div>
                  <div v-if="cardImage.alt_text" class="px-2 pb-2 bg-white text-caption text-truncate text-slate-600 border-t">
                    <strong class="text-slate-800">Alt:</strong> {{ cardImage.alt_text }}
                  </div>
                </div>

                <!-- Empty Dropzone -->
                <div
                  v-else
                  class="d-flex flex-column align-center justify-center pa-6 bg-grey-lighten-5 mb-4 cursor-pointer"
                  style="height: 200px; border: 2px dashed #cbd5e1; border-radius: 6px;"
                  @click="cardFileInputRef?.click()"
                >
                  <v-icon size="44" color="grey">mdi-cloud-upload-outline</v-icon>
                  <span class="text-body-2 font-weight-medium text-slate-700 mt-2">Upload Card Thumbnail</span>
                  <span class="text-caption text-medium-emphasis mt-1">Click to browse or drop an image file</span>
                </div>
              </div>

              <!-- Action buttons -->
              <div class="d-flex align-center justify-end flex-wrap ga-2 pt-2 border-t">
                <v-btn
                  v-if="cardImage?.url"
                  color="error"
                  variant="outlined"
                  :disabled="loadingCard"
                  @click="promptRemoveImage('card', cardImage)"
                >
                  <v-icon start size="16">mdi-delete</v-icon>
                  Remove
                </v-btn>

                <v-btn
                  v-if="cardImage?.url"
                  color="primary"
                  variant="outlined"
                  :disabled="loadingCard"
                  @click="openEditModal('card', cardImage)"
                >
                  <v-icon start size="16">mdi-pencil</v-icon>
                  Edit Alt Text
                </v-btn>

                <v-btn
                  variant="outlined"
                  color="secondary"
                  :disabled="loadingCard"
                  @click="openLibraryPicker('card')"
                >
                  <v-icon start size="16">mdi-image-multiple</v-icon>
                  Media Library
                </v-btn>

                <v-btn
                  color="primary"
                  variant="flat"
                  :loading="loadingCard"
                  @click="cardFileInputRef?.click()"
                >
                  <v-icon start size="16">mdi-cloud-upload</v-icon>
                  {{ cardImage?.url ? 'Replace Image' : 'Upload Image' }}
                </v-btn>
              </div>
            </v-card>
          </v-col>

          <!-- Route Map Image Card -->
          <v-col cols="12" md="4">
            <v-card variant="outlined" class="h-100 pa-5 d-flex flex-column justify-space-between">
              <div>
                <div class="d-flex align-center justify-space-between mb-2">
                  <div class="text-subtitle-1 font-weight-bold text-uppercase">
                    Route Map Image
                  </div>
                  <v-chip size="x-small" color="info" variant="tonal" label>
                    Topography & Trails
                  </v-chip>
                </div>
                <p class="text-caption text-medium-emphasis mb-3">
                  Topographical route map, trail elevation profile, or expedition overview map.
                </p>

                <!-- Visual Preview -->
                <div v-if="routeMapImage?.url" class="position-relative mb-4 border rounded overflow-hidden">
                  <v-img
                    :src="routeMapImage.url"
                    height="200"
                    cover
                    class="bg-grey-lighten-4"
                  >
                    <template #placeholder>
                      <div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
                        <v-progress-circular indeterminate size="24" color="primary" />
                      </div>
                    </template>
                  </v-img>

                  <div class="pa-2 bg-white d-flex align-center justify-space-between text-caption">
                    <span class="font-weight-medium text-truncate" :title="routeMapImage.filename">
                      {{ routeMapImage.filename || `Asset #${routeMapImage.id}` }}
                    </span>
                    <span v-if="routeMapImage.width && routeMapImage.height" class="text-medium-emphasis ml-2 flex-shrink-0">
                      {{ routeMapImage.width }}×{{ routeMapImage.height }}px
                    </span>
                  </div>
                  <div v-if="routeMapImage.alt_text" class="px-2 pb-2 bg-white text-caption text-truncate text-slate-600 border-t">
                    <strong class="text-slate-800">Alt:</strong> {{ routeMapImage.alt_text }}
                  </div>
                </div>

                <!-- Empty Dropzone -->
                <div
                  v-else
                  class="d-flex flex-column align-center justify-center pa-6 bg-grey-lighten-5 mb-4 cursor-pointer"
                  style="height: 200px; border: 2px dashed #cbd5e1; border-radius: 6px;"
                  @click="routeMapFileInputRef?.click()"
                >
                  <v-icon size="44" color="grey">mdi-cloud-upload-outline</v-icon>
                  <span class="text-body-2 font-weight-medium text-slate-700 mt-2">Upload Route Map</span>
                  <span class="text-caption text-medium-emphasis mt-1">Click to browse or drop an image file</span>
                </div>
              </div>

              <!-- Action buttons -->
              <div class="d-flex align-center justify-end flex-wrap ga-2 pt-2 border-t">
                <v-btn
                  v-if="routeMapImage?.url"
                  color="error"
                  variant="outlined"
                  :disabled="loadingRouteMap"
                  @click="promptRemoveImage('route_map', routeMapImage)"
                >
                  <v-icon start size="16">mdi-delete</v-icon>
                  Remove
                </v-btn>

                <v-btn
                  v-if="routeMapImage?.url"
                  color="primary"
                  variant="outlined"
                  :disabled="loadingRouteMap"
                  @click="openEditModal('route_map', routeMapImage)"
                >
                  <v-icon start size="16">mdi-pencil</v-icon>
                  Edit Alt Text
                </v-btn>

                <v-btn
                  variant="outlined"
                  color="secondary"
                  :disabled="loadingRouteMap"
                  @click="openLibraryPicker('route_map')"
                >
                  <v-icon start size="16">mdi-image-multiple</v-icon>
                  Media Library
                </v-btn>

                <v-btn
                  color="primary"
                  variant="flat"
                  :loading="loadingRouteMap"
                  @click="routeMapFileInputRef?.click()"
                >
                  <v-icon start size="16">mdi-cloud-upload</v-icon>
                  {{ routeMapImage?.url ? 'Replace Image' : 'Upload Image' }}
                </v-btn>
              </div>
            </v-card>
          </v-col>

          <!-- Journey Gallery Section -->
          <v-col cols="12">
            <v-card variant="outlined" class="pa-5 mt-2">
              <div class="d-flex align-center justify-space-between flex-wrap ga-3 mb-4">
                <div>
                  <div class="text-subtitle-1 font-weight-bold text-uppercase">
                    Journey Gallery ({{ galleryList.length }})
                  </div>
                  <p class="text-caption text-medium-emphasis mb-0">
                    Additional expedition visual assets, trail perspectives, and mountain vistas.
                  </p>
                </div>

                <div class="d-flex align-center ga-2">
                  <input
                    ref="galleryFileInputRef"
                    type="file"
                    accept="image/*"
                    class="d-none"
                    multiple
                    @change="handleGalleryUpload"
                  />
                  <v-btn
                    variant="outlined"
                    color="secondary"
                    :disabled="loadingGallery"
                    @click="openLibraryPicker('gallery')"
                  >
                    <v-icon start size="16">mdi-image-multiple</v-icon>
                    Add from Library
                  </v-btn>
                  <v-btn
                    color="primary"
                    variant="flat"
                    :loading="loadingGallery"
                    @click="galleryFileInputRef?.click()"
                  >
                    <v-icon start size="16">mdi-cloud-upload</v-icon>
                    Upload Photos
                  </v-btn>
                </div>
              </div>

              <!-- Gallery Grid -->
              <v-row v-if="galleryList.length > 0">
                <v-col
                  v-for="item in galleryList"
                  :key="item.attachment_id || item.id"
                  cols="12"
                  sm="6"
                  md="4"
                  lg="3"
                >
                  <v-card variant="outlined" class="h-100 d-flex flex-column overflow-hidden">
                    <v-img
                      :src="item.url"
                      height="160"
                      cover
                      class="bg-grey-lighten-4"
                    >
                      <template #placeholder>
                        <div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
                          <v-progress-circular indeterminate size="20" color="primary" />
                        </div>
                      </template>
                    </v-img>

                    <div class="pa-3 d-flex flex-column justify-space-between flex-grow-1">
                      <div>
                        <div class="text-body-2 font-weight-medium text-truncate" :title="item.filename">
                          {{ item.filename || `Asset #${item.id}` }}
                        </div>
                        <div v-if="item.alt_text" class="text-caption text-slate-600 text-truncate mt-1">
                          <strong class="text-slate-800">Alt:</strong> {{ item.alt_text }}
                        </div>
                        <div v-else-if="item.caption || item.title" class="text-caption text-medium-emphasis text-truncate mt-1">
                          {{ item.caption || item.title }}
                        </div>
                      </div>

                      <div class="d-flex align-center justify-end ga-1 mt-2 pt-2 border-t">
                        <v-btn
                          color="primary"
                          variant="outlined"
                          @click="openEditModal('gallery', item)"
                        >
                          <v-icon start size="14">mdi-pencil</v-icon>
                          Edit
                        </v-btn>
                        <v-btn
                          color="error"
                          variant="outlined"
                          @click="promptRemoveGallery(item)"
                        >
                          <v-icon start size="14">mdi-delete-outline</v-icon>
                          Remove
                        </v-btn>
                      </div>
                    </div>
                  </v-card>
                </v-col>
              </v-row>

              <!-- Empty Gallery State -->
              <div
                v-else
                class="d-flex flex-column align-center justify-center pa-8 text-center bg-grey-lighten-5 rounded"
                style="border: 1px dashed #cbd5e1;"
              >
                <v-icon size="40" color="grey-lighten-1" class="mb-2">mdi-image-multiple-outline</v-icon>
                <div class="text-body-2 font-weight-medium text-slate-700">No Gallery Photos Attached</div>
                <div class="text-caption text-medium-emphasis mt-1">
                  Attach scenic photography for this journey via upload or library.
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from 'vue'
import {
  updateJourneyApi,
  attachJourneyMediaApi,
  detachJourneyMediaApi,
  updateJourneyMediaApi,
} from '@/http/journeys.http'
import { uploadMediaAssetApi } from '@/http/media-assets.http'
import { useGlobalModal } from '@/composables/globalModal'
import { useSnackbar } from '@/composables/snackbar'
import MediaAssetPickerModal from '@/modal-form/media/MediaAssetPickerModal.vue'
import MediaAttachmentEditModal from '@/modal-form/media/MediaAttachmentEditModal.vue'
import MediaAttachmentDeleteModal from '@/modal-form/media/MediaAttachmentDeleteModal.vue'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const globalModal = useGlobalModal()
const { showSuccess, showError } = useSnackbar()

const heroFileInputRef = ref(null)
const cardFileInputRef = ref(null)
const routeMapFileInputRef = ref(null)
const galleryFileInputRef = ref(null)

const loadingHero = ref(false)
const loadingCard = ref(false)
const loadingRouteMap = ref(false)
const loadingGallery = ref(false)

const heroImage = computed(() => {
  return props.journey?.media?.hero || props.journey?.hero_image || null
})

const cardImage = computed(() => {
  return props.journey?.media?.card || props.journey?.card_image || null
})

const routeMapImage = computed(() => {
  return props.journey?.media?.route_map || props.journey?.route_map_image || null
})

const galleryList = computed(() => {
  return Array.isArray(props.journey?.media?.gallery)
    ? props.journey.media.gallery
    : (Array.isArray(props.journey?.gallery) ? props.journey.gallery : [])
})

async function handleDirectUpload(targetType, event) {
  const file = event.target?.files?.[0]
  if (!file || !props.journey?.id) return

  const isHero = targetType === 'hero'
  const isCard = targetType === 'card'
  const loadingRef = isHero ? loadingHero : isCard ? loadingCard : loadingRouteMap
  const label = isHero ? 'Hero banner' : isCard ? 'Card thumbnail' : 'Route map'

  try {
    loadingRef.value = true
    const formData = new FormData()
    formData.append('file', file)

    const uploadResp = await uploadMediaAssetApi(formData)
    const mediaAsset = uploadResp.data

    if (!mediaAsset?.id) {
      showError('Failed to process image upload.')
      return
    }

    const updateResp = await updateJourneyApi(props.journey.id, {
      media: {
        [targetType]: mediaAsset.id,
      },
    })

    showSuccess(updateResp.data?.message ?? `${label} updated successfully.`)
    emit('refresh')
  } catch (error) {
    console.error('Failed to upload and attach image:', error)
    showError(error?.response?.data?.message || 'Failed to upload image.')
  } finally {
    loadingRef.value = false
    if (event.target) event.target.value = ''
  }
}

async function handleGalleryUpload(event) {
  const files = event.target?.files
  if (!files || files.length === 0 || !props.journey?.id) return

  try {
    loadingGallery.value = true
    let uploadedCount = 0

    for (let i = 0; i < files.length; i++) {
      const file = files[i]
      const formData = new FormData()
      formData.append('file', file)

      const uploadResp = await uploadMediaAssetApi(formData)
      const mediaAsset = uploadResp.data

      if (mediaAsset?.id) {
        await attachJourneyMediaApi(props.journey.id, {
          media_asset_id: mediaAsset.id,
          collection: 'gallery',
        })
        uploadedCount++
      }
    }

    showSuccess(`Attached ${uploadedCount} photos to journey gallery.`)
    emit('refresh')
  } catch (error) {
    console.error('Failed to upload gallery photos:', error)
    showError(error?.response?.data?.message || 'Failed to upload gallery photos.')
  } finally {
    loadingGallery.value = false
    if (event.target) event.target.value = ''
  }
}

function openLibraryPicker(targetType) {
  if (targetType === 'gallery') {
    globalModal.open({
      title: 'Add Photo to Journey Gallery',
      component: MediaAssetPickerModal,
      size: 'lg',
      props: {
        onSelect: async (asset) => {
          if (!asset?.id || !props.journey?.id) return
          if (galleryList.value.some((item) => item.id === asset.id || item.media_asset_id === asset.id)) {
            showError('This photo is already in the journey gallery.')
            return
          }
          try {
            await attachJourneyMediaApi(props.journey.id, {
              media_asset_id: asset.id,
              collection: 'gallery',
            })
            showSuccess('Photo added to gallery.')
            emit('refresh')
          } catch (error) {
            console.error('Failed to attach gallery photo:', error)
            showError(error?.response?.data?.message || 'Failed to add photo.')
          }
        },
      },
    })
    return
  }

  const isHero = targetType === 'hero'
  const isCard = targetType === 'card'
  const currentId = isHero ? heroImage.value?.id : isCard ? cardImage.value?.id : routeMapImage.value?.id
  const label = isHero ? 'Hero banner' : isCard ? 'Card thumbnail' : 'Route map'
  const loadingRef = isHero ? loadingHero : isCard ? loadingCard : loadingRouteMap
  const pickerTitle = isHero
    ? 'Select Hero Banner from Library'
    : isCard
    ? 'Select Card Thumbnail from Library'
    : 'Select Route Map from Library'

  globalModal.open({
    title: pickerTitle,
    component: MediaAssetPickerModal,
    size: 'lg',
    props: {
      initialSelectedId: currentId,
      onSelect: async (asset) => {
        if (!asset?.id || !props.journey?.id || loadingRef.value) return
        if (asset.id === currentId) return
        try {
          loadingRef.value = true
          const resp = await updateJourneyApi(props.journey.id, {
            media: {
              [targetType]: asset.id,
            },
          })
          showSuccess(resp.data?.message ?? `${label} updated successfully.`)
          emit('refresh')
        } catch (error) {
          console.error('Failed to update journey image:', error)
          showError(error?.response?.data?.message || 'Failed to update image.')
        } finally {
          loadingRef.value = false
        }
      },
    },
  })
}

// ── Edit Alt Text & Metadata Dialog ──────────────────────────────────────────

function openEditModal(targetType, item) {
  if (!item) return
  const targetLabel = targetType === 'hero'
    ? 'Hero Banner'
    : targetType === 'card'
    ? 'Card Thumbnail'
    : targetType === 'route_map'
    ? 'Route Map'
    : 'Gallery Photo'

  globalModal.open({
    title: `Edit ${targetLabel} Details`,
    component: MediaAttachmentEditModal,
    size: 'sm',
    props: {
      attachment: item,
      showTitle: true,
      showCaption: true,
      showSortOrder: false,
      onSave: async (payload) => {
        const attachmentId = item.attachment_id
        if (attachmentId) {
          await updateJourneyMediaApi(props.journey.id, attachmentId, {
            alt_text: payload.alt_text,
            title: payload.title,
            caption: payload.caption,
          })
        } else {
          await attachJourneyMediaApi(props.journey.id, {
            media_asset_id: item.id,
            collection: targetType,
            alt_text: payload.alt_text,
            title: payload.title,
            caption: payload.caption,
          })
        }
      },
    },
    onSaved: () => emit('refresh'),
  })
}

// ── Confirm Delete / Removal Dialog ─────────────────────────────────────────

function promptRemoveImage(targetType, item) {
  if (!item) return
  const isHero = targetType === 'hero'
  const isCard = targetType === 'card'
  const label = isHero ? 'Hero Banner' : isCard ? 'Card Thumbnail' : 'Route Map'

  globalModal.open({
    title: `Remove ${label}`,
    component: MediaAttachmentDeleteModal,
    size: 'sm',
    props: {
      attachment: item,
      title: `Remove ${label}`,
      onDelete: async () => {
        await updateJourneyApi(props.journey.id, {
          media: {
            [targetType]: null,
          },
        })
      },
    },
    onSaved: () => emit('refresh'),
  })
}

function promptRemoveGallery(item) {
  if (!item) return
  globalModal.open({
    title: 'Remove Gallery Photo',
    component: MediaAttachmentDeleteModal,
    size: 'sm',
    props: {
      attachment: item,
      title: 'Remove Gallery Photo',
      onDelete: async () => {
        await detachJourneyMediaApi(props.journey.id, item.attachment_id)
      },
    },
    onSaved: () => emit('refresh'),
  })
}
</script>
