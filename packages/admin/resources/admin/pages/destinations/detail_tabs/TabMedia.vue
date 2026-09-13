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

        <v-row>
          <!-- Hero Banner Image Card -->
          <v-col cols="12" md="6">
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
                  High-resolution panoramic banner displayed on top of the destination detail page.
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
                  v-if="destination?.hero_image_id || destination?.hero_image"
                  color="error"
                  variant="outlined"
                  :disabled="loadingHero"
                  @click="promptRemoveImage('hero', heroImage)"
                >
                  <v-icon start size="16">mdi-delete</v-icon>
                  Remove
                </v-btn>

                <v-btn
                  v-if="destination?.hero_image_id || destination?.hero_image"
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
                  {{ (destination?.hero_image_id || destination?.hero_image) ? 'Replace Image' : 'Upload Image' }}
                </v-btn>
              </div>
            </v-card>
          </v-col>

          <!-- Card Thumbnail Image Card -->
          <v-col cols="12" md="6">
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
                  Featured across the public homepage destination carousel and catalog listing cards.
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
                  v-if="destination?.card_image_id || destination?.card_image"
                  color="error"
                  variant="outlined"
                  :disabled="loadingCard"
                  @click="promptRemoveImage('card', cardImage)"
                >
                  <v-icon start size="16">mdi-delete</v-icon>
                  Remove
                </v-btn>

                <v-btn
                  v-if="destination?.card_image_id || destination?.card_image"
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
                  {{ (destination?.card_image_id || destination?.card_image) ? 'Replace Image' : 'Upload Image' }}
                </v-btn>
              </div>
            </v-card>
          </v-col>

          <!-- Destination Gallery Section -->
          <v-col cols="12">
            <v-card variant="outlined" class="pa-5 mt-2">
              <div class="d-flex align-center justify-space-between flex-wrap ga-3 mb-4">
                <div>
                  <div class="text-subtitle-1 font-weight-bold text-uppercase">
                    Destination Gallery ({{ galleryList.length }})
                  </div>
                  <p class="text-caption text-medium-emphasis mb-0">
                    Additional destination visual assets and trail perspectives stored in media_attachments.
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
                          size="small"
                          color="primary"
                          variant="outlined"
                          @click="openEditModal('gallery', item)"
                        >
                          <v-icon start size="14">mdi-pencil</v-icon>
                          Edit
                        </v-btn>
                        <v-btn
                          size="small"
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
                  Attach scenic photography for this destination via upload or library.
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
    </v-row>

    <!-- Edit Image Details Dialog -->
    <v-dialog v-model="editDialog.open" max-width="540px" persistent>
      <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
          <span>Edit Image Details</span>
          <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="editDialog.open = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pa-4">
          <div v-if="editDialog.item?.url" class="d-flex align-center ga-3 mb-4 pa-2 bg-slate-50 border rounded">
            <v-img :src="editDialog.item.url" width="70" height="50" cover class="rounded flex-shrink-0" />
            <div class="overflow-hidden">
              <div class="text-body-2 font-weight-medium text-truncate">{{ editDialog.item.filename || 'Image Asset' }}</div>
              <div class="text-caption text-medium-emphasis text-capitalize">{{ editDialog.targetLabel }}</div>
            </div>
          </div>

          <v-form @submit.prevent="handleSaveEdit">
            <v-row dense>
              <v-col cols="12">
                <div class="mb-2">
                  <v-text-field
                    v-model="editDialog.form.alt_text"
                    label="Alt Text (SEO & Accessibility) *"
                    placeholder="Descriptive explanation for screen readers and SEO"
                    hint="Important for search engine ranking and accessibility"
                    persistent-hint
                  />
                </div>
              </v-col>

              <v-col cols="12">
                <div class="mb-2">
                  <v-text-field
                    v-model="editDialog.form.title"
                    label="Title (optional)"
                    placeholder="e.g. Scenic mountain vista"
                  />
                </div>
              </v-col>

              <v-col cols="12">
                <div class="mb-2">
                  <v-textarea
                    v-model="editDialog.form.caption"
                    label="Caption / Description (optional)"
                    placeholder="Optional editorial context"
                    rows="3"
                  />
                </div>
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="editDialog.open = false">Cancel</v-btn>
          <v-btn
            color="primary"
            variant="flat"
            :loading="editDialog.saving"
            @click="handleSaveEdit"
          >
            Save Changes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- Confirm Removal Dialog -->
    <v-dialog v-model="deleteDialog.open" max-width="440px">
      <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
          <span>Confirm Removal</span>
          <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="deleteDialog.open = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pt-4 text-center">
          <div v-if="deleteDialog.item?.url" class="mb-3 d-flex justify-center">
            <v-img :src="deleteDialog.item.url" max-width="180" height="110" cover class="border rounded" />
          </div>

          <div class="text-subtitle-1 font-weight-medium">
            Remove {{ deleteDialog.targetLabel }}?
          </div>
          <div class="text-caption text-grey mt-2">
            Are you sure you want to remove this image from the destination? This will unlink it from this collection.
          </div>
        </v-card-text>

        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="deleteDialog.open = false">Cancel</v-btn>
          <v-btn
            color="error"
            variant="flat"
            :loading="deleteDialog.loading"
            @click="executeRemove"
          >
            Remove
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from 'vue'
import {
  updateDestinationApi,
  attachDestinationMediaApi,
  detachDestinationMediaApi,
  updateDestinationMediaApi,
} from '@/api/destinations.api'
import { uploadMediaAssetApi } from '@/api/media-assets.api'
import { useGlobalModal } from '@/composables/globalModal'
import { useSnackbar } from '@/composables/snackbar'
import MediaAssetPickerModal from '@/components/media/MediaAssetPickerModal.vue'

const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const globalModal = useGlobalModal()
const { showSuccess, showError } = useSnackbar()

const heroFileInputRef = ref(null)
const cardFileInputRef = ref(null)
const galleryFileInputRef = ref(null)

const loadingHero = ref(false)
const loadingCard = ref(false)
const loadingGallery = ref(false)

const heroImage = computed(() => {
  return props.destination?.hero_image || null
})

const cardImage = computed(() => {
  return props.destination?.card_image || null
})

const galleryList = computed(() => {
  return Array.isArray(props.destination?.gallery) ? props.destination.gallery : []
})

async function handleDirectUpload(targetType, event) {
  const file = event.target?.files?.[0]
  if (!file || !props.destination?.id) return

  const isHero = targetType === 'hero'
  const loadingRef = isHero ? loadingHero : loadingCard
  const fieldKey = isHero ? 'hero_image_id' : 'card_image_id'
  const label = isHero ? 'Hero banner' : 'Card thumbnail'

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

    const updateResp = await updateDestinationApi(props.destination.id, {
      [fieldKey]: mediaAsset.id,
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
  if (!files || files.length === 0 || !props.destination?.id) return

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
        await attachDestinationMediaApi(props.destination.id, {
          media_asset_id: mediaAsset.id,
          collection: 'gallery',
        })
        uploadedCount++
      }
    }

    showSuccess(`Attached ${uploadedCount} photos to destination gallery.`)
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
      title: 'Add Photo to Destination Gallery',
      component: MediaAssetPickerModal,
      size: 'lg',
      props: {
        onSelect: async (asset) => {
          if (!asset?.id || !props.destination?.id) return
          if (galleryList.value.some((item) => item.id === asset.id || item.media_asset_id === asset.id)) {
            showError('This photo is already in the destination gallery.')
            return
          }
          try {
            await attachDestinationMediaApi(props.destination.id, {
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
  const currentId = isHero ? props.destination?.hero_image_id : props.destination?.card_image_id
  const fieldKey = isHero ? 'hero_image_id' : 'card_image_id'
  const label = isHero ? 'Hero banner' : 'Card thumbnail'
  const loadingRef = isHero ? loadingHero : loadingCard

  globalModal.open({
    title: isHero ? 'Select Hero Banner from Library' : 'Select Card Thumbnail from Library',
    component: MediaAssetPickerModal,
    size: 'lg',
    props: {
      initialSelectedId: currentId,
      onSelect: async (asset) => {
        if (!asset?.id || !props.destination?.id || loadingRef.value) return
        if (asset.id === currentId) return
        try {
          loadingRef.value = true
          const resp = await updateDestinationApi(props.destination.id, {
            [fieldKey]: asset.id,
          })
          showSuccess(resp.data?.message ?? `${label} updated successfully.`)
          emit('refresh')
        } catch (error) {
          console.error('Failed to update destination image:', error)
          showError(error?.response?.data?.message || 'Failed to update image.')
        } finally {
          loadingRef.value = false
        }
      },
    },
  })
}

// ── Edit Alt Text & Metadata Dialog ──────────────────────────────────────────

const editDialog = reactive({
  open: false,
  saving: false,
  targetType: null,
  targetLabel: '',
  item: null,
  form: {
    alt_text: '',
    title: '',
    caption: '',
  },
})

function openEditModal(targetType, item) {
  if (!item) return
  editDialog.targetType = targetType
  editDialog.targetLabel = targetType === 'hero' ? 'Hero Banner' : targetType === 'card' ? 'Card Thumbnail' : 'Gallery Photo'
  editDialog.item = item
  editDialog.form.alt_text = item.alt_text || ''
  editDialog.form.title = item.title || ''
  editDialog.form.caption = item.caption || ''
  editDialog.open = true
}

async function handleSaveEdit() {
  if (!props.destination?.id || !editDialog.item) return
  editDialog.saving = true

  try {
    const attachmentId = editDialog.item.attachment_id
    if (attachmentId) {
      await updateDestinationMediaApi(props.destination.id, attachmentId, {
        alt_text: editDialog.form.alt_text,
        title: editDialog.form.title,
        caption: editDialog.form.caption,
      })
    } else {
      await attachDestinationMediaApi(props.destination.id, {
        media_asset_id: editDialog.item.id,
        collection: editDialog.targetType,
        alt_text: editDialog.form.alt_text,
        title: editDialog.form.title,
        caption: editDialog.form.caption,
      })
    }

    showSuccess(`${editDialog.targetLabel} details updated.`)
    editDialog.open = false
    emit('refresh')
  } catch (error) {
    console.error('Failed to update image details:', error)
    showError(error?.response?.data?.message || 'Failed to update image details.')
  } finally {
    editDialog.saving = false
  }
}

// ── Confirm Delete / Removal Dialog ─────────────────────────────────────────

const deleteDialog = reactive({
  open: false,
  loading: false,
  targetType: null,
  targetLabel: '',
  item: null,
})

function promptRemoveImage(targetType, item) {
  if (!item) return
  deleteDialog.targetType = targetType
  deleteDialog.targetLabel = targetType === 'hero' ? 'Hero Banner' : 'Card Thumbnail'
  deleteDialog.item = item
  deleteDialog.open = true
}

function promptRemoveGallery(item) {
  if (!item) return
  deleteDialog.targetType = 'gallery'
  deleteDialog.targetLabel = 'Gallery Photo'
  deleteDialog.item = item
  deleteDialog.open = true
}

async function executeRemove() {
  if (!props.destination?.id) return
  deleteDialog.loading = true

  try {
    if (deleteDialog.targetType === 'gallery') {
      await detachDestinationMediaApi(props.destination.id, deleteDialog.item.attachment_id)
      showSuccess('Photo removed from gallery.')
    } else {
      const isHero = deleteDialog.targetType === 'hero'
      const fieldKey = isHero ? 'hero_image_id' : 'card_image_id'
      const label = isHero ? 'Hero banner' : 'Card thumbnail'
      await updateDestinationApi(props.destination.id, {
        [fieldKey]: null,
      })
      showSuccess(`${label} removed.`)
    }
    deleteDialog.open = false
    emit('refresh')
  } catch (error) {
    console.error('Failed to remove image:', error)
    showError(error?.response?.data?.message || 'Failed to remove image.')
  } finally {
    deleteDialog.loading = false
  }
}
</script>
