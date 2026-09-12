<template>
  <div>
    <!-- Top Actions & Filters -->
    <v-row class="px-4 py-2 mb-3 mt-1" align="center" justify="space-between" no-gutters>
      <v-col cols="12" sm="6" md="4" lg="3">
        <v-text-field
          v-model="search"
          label="Search Media"
          clearable
          prepend-inner-icon="mdi-magnify"
          placeholder="Search by title, filename, alt..."
          variant="outlined"
          density="compact"
          class="rounded-0"
          hide-details
        />
      </v-col>

      <v-col cols="auto" class="d-flex align-center ga-2 mt-2 mt-sm-0">
        <!-- View Toggle -->
        <v-btn-toggle
          v-model="viewMode"
          mandatory
          density="compact"
          color="primary"
          class="rounded-0"
        >
          <v-btn value="grid" variant="outlined" size="small" class="rounded-0">
            <v-icon size="18">mdi-view-grid-outline</v-icon>
          </v-btn>
          <v-btn value="table" variant="outlined" size="small" class="rounded-0">
            <v-icon size="18">mdi-view-list</v-icon>
          </v-btn>
        </v-btn-toggle>

        <!-- Upload Button -->
        <v-btn color="primary" variant="elevated" class="rounded-0" @click="handleOpenUpload">
          <v-icon start>mdi-cloud-upload-outline</v-icon> Upload Media
        </v-btn>
      </v-col>
    </v-row>

    <!-- Loading Skeleton -->
    <template v-if="loading">
      <v-row class="px-2">
        <v-col v-for="n in 8" :key="n" cols="12" sm="6" md="4" lg="3">
          <v-skeleton-loader type="card" class="rounded-0 border" />
        </v-col>
      </v-row>
    </template>

    <!-- Empty State -->
    <template v-else-if="filteredItems.length === 0">
      <v-card class="rounded-0 elevation-0 border pa-12 text-center my-4 mx-4">
        <v-icon size="56" color="grey-lighten-1" class="mb-3">mdi-image-multiple-outline</v-icon>
        <div class="text-h6 text-slate-800 font-weight-medium">No media assets found</div>
        <p class="text-body-2 text-medium-emphasis mt-1 mb-4">
          {{ search ? 'No results matched your search query.' : 'Upload photos, banners, and hero assets to get started.' }}
        </p>
        <v-btn color="primary" variant="elevated" class="rounded-0" @click="handleOpenUpload">
          <v-icon start>mdi-cloud-upload</v-icon> Upload First Media Asset
        </v-btn>
      </v-card>
    </template>

    <!-- Grid View Mode -->
    <template v-else-if="viewMode === 'grid'">
      <v-row class="px-2">
        <v-col
          v-for="asset in filteredItems"
          :key="asset.id"
          cols="12"
          sm="6"
          md="4"
          lg="3"
        >
          <v-card class="rounded-0 elevation-0 border h-100 d-flex flex-column media-card">
            <div class="media-thumb-container position-relative bg-slate-100" style="aspect-ratio: 16/9; overflow: hidden;">
              <v-img
                :src="asset.url"
                height="100%"
                width="100%"
                cover
                class="rounded-0"
              >
                <template #placeholder>
                  <div class="d-flex align-center justify-center fill-height bg-slate-100">
                    <v-progress-circular indeterminate size="24" color="primary" />
                  </div>
                </template>
              </v-img>

              <div class="position-absolute d-flex ga-1" style="top: 8px; right: 8px; z-index: 2;">
                <v-chip
                  v-if="asset.attachments_count > 0"
                  size="x-small"
                  color="info"
                  variant="flat"
                  class="rounded-0 font-weight-medium"
                >
                  {{ asset.attachments_count }} used
                </v-chip>
              </div>
            </div>

            <v-card-text class="pa-3 flex-grow-1">
              <div class="font-weight-medium text-truncate text-slate-800" :title="asset.title || asset.filename">
                {{ asset.title || asset.filename }}
              </div>
              <div class="text-caption text-truncate text-medium-emphasis mt-0" :title="asset.filename">
                {{ asset.filename }}
              </div>
              <div class="d-flex align-center ga-2 mt-2">
                <span v-if="asset.width" class="text-caption text-slate-600 bg-slate-100 px-1 border">
                  {{ asset.width }} × {{ asset.height }}px
                </span>
                <span class="text-caption text-slate-600 bg-slate-100 px-1 border">
                  {{ asset.formatted_size }}
                </span>
              </div>
            </v-card-text>

            <v-divider />
            <div class="pa-2 d-flex align-center justify-space-between bg-slate-50">
              <v-btn
                size="x-small"
                variant="text"
                color="primary"
                class="rounded-0"
                @click="copyAssetUrl(asset)"
              >
                <v-icon start size="14">mdi-content-copy</v-icon> Copy URL
              </v-btn>

              <div class="d-flex ga-1">
                <v-btn
                  size="x-small"
                  icon
                  variant="tonal"
                  color="warning"
                  class="rounded-0"
                  title="Inspect / Edit Metadata"
                  @click="handleOpenDetail(asset)"
                >
                  <v-icon size="14">mdi-pencil</v-icon>
                </v-btn>
                <v-btn
                  size="x-small"
                  icon
                  variant="tonal"
                  color="error"
                  class="rounded-0"
                  title="Delete Media"
                  @click="handleOpenDelete(asset)"
                >
                  <v-icon size="14">mdi-delete</v-icon>
                </v-btn>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </template>

    <!-- Table View Mode -->
    <template v-else>
      <v-data-table
        :headers="tableHeaders"
        :items="filteredItems"
        :items-per-page="25"
        class="border"
      >
        <template #item.sn="{ index }">
          <div>{{ index + 1 }}</div>
        </template>

        <template #item.preview="{ item }">
          <div class="py-1">
            <v-img
              :src="item.url"
              width="64"
              height="40"
              cover
              class="rounded-0 border bg-slate-100 cursor-pointer"
              @click="handleOpenDetail(item)"
            />
          </div>
        </template>

        <template #item.title="{ item }">
          <div>
            <div class="text-slate-800">{{ item.title || item.filename }}</div>
            <div class="text-caption text-medium-emphasis">{{ item.filename }}</div>
          </div>
        </template>

        <template #item.dimensions="{ item }">
          <div>
            {{ item.width ? `${item.width} × ${item.height}px` : '—' }}
          </div>
        </template>

        <template #item.formatted_size="{ item }">
          <div>{{ item.formatted_size || '—' }}</div>
        </template>

        <template #item.attachments_count="{ item }">
          <div>
            <v-chip
              size="small"
              :color="item.attachments_count ? 'info' : 'default'"
              variant="tonal"
              class="rounded-0"
            >
              {{ item.attachments_count ? `${item.attachments_count} use(s)` : 'Unattached' }}
            </v-chip>
          </div>
        </template>

        <template #item.actions="{ item }">
          <div class="d-flex align-center justify-center ga-1">
            <v-btn
              size="x-small"
              icon
              variant="tonal"
              color="primary"
              class="rounded-0"
              title="Copy URL"
              @click="copyAssetUrl(item)"
            >
              <v-icon size="15">mdi-content-copy</v-icon>
            </v-btn>
            <v-btn
              size="x-small"
              icon
              variant="tonal"
              color="warning"
              class="rounded-0"
              title="Edit Metadata"
              @click="handleOpenDetail(item)"
            >
              <v-icon size="15">mdi-pencil</v-icon>
            </v-btn>
            <v-btn
              size="x-small"
              icon
              variant="tonal"
              color="error"
              class="rounded-0"
              title="Delete"
              @click="handleOpenDelete(item)"
            >
              <v-icon size="15">mdi-delete</v-icon>
            </v-btn>
          </div>
        </template>
      </v-data-table>
    </template>

    <modal-template ref="globalModal" @saved="fetchMedia" @close="fetchMedia" />
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { getMediaAssetsApi } from '@/api/media-assets.api'
import MediaUploadModal from './modal/MediaUploadModal.vue'
import MediaDetailModal from './modal/MediaDetailModal.vue'
import MediaDeleteModal from './modal/MediaDeleteModal.vue'

const { showSuccess, showError } = useSnackbar()

const mediaAssets = ref([])
const loading = ref(false)
const search = ref('')
const viewMode = ref('grid')
const globalModal = ref(null)

const tableHeaders = [
  { title: 'SN', key: 'sn', sortable: false, width: '50px' },
  { title: 'Preview', key: 'preview', sortable: false, width: '80px' },
  { title: 'Title & Filename', key: 'title', sortable: true },
  { title: 'Dimensions', key: 'dimensions', sortable: false, width: '130px' },
  { title: 'File Size', key: 'formatted_size', sortable: false, width: '100px' },
  { title: 'Attachments', key: 'attachments_count', sortable: true, width: '120px' },
  { title: 'Action', key: 'actions', sortable: false, align: 'center', width: '120px' },
]

const filteredItems = computed(() => {
  if (!search.value) return mediaAssets.value

  const term = search.value.toLowerCase().trim()
  return mediaAssets.value.filter(item => {
    return (
      (item.title && item.title.toLowerCase().includes(term)) ||
      (item.filename && item.filename.toLowerCase().includes(term)) ||
      (item.alt_text && item.alt_text.toLowerCase().includes(term)) ||
      (item.caption && item.caption.toLowerCase().includes(term))
    )
  })
})

function handleOpenUpload() {
  globalModal.value.open({
    title: 'Upload Media Asset',
    component: MediaUploadModal,
    size: 'lg',
    props: {},
  })
}

function handleOpenDetail(asset) {
  globalModal.value.open({
    title: 'Media Asset Details',
    component: MediaDetailModal,
    size: 'lg',
    props: {
      item: asset,
    },
  })
}

function handleOpenDelete(asset) {
  globalModal.value.open({
    title: 'Delete Media Asset',
    component: MediaDeleteModal,
    size: 'sm',
    props: {
      item: asset,
    },
  })
}

function copyAssetUrl(asset) {
  if (asset?.url) {
    navigator.clipboard.writeText(asset.url)
    showSuccess('Image URL copied to clipboard')
  }
}

async function fetchMedia() {
  loading.value = true
  try {
    const resp = await getMediaAssetsApi()
    mediaAssets.value = resp?.data ?? []
  } catch (error) {
    console.error('Failed to load media assets', error)
    showError('Failed to load media assets')
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchMedia()
})
</script>

<style scoped>
.media-card {
  transition: border-color 0.15s ease;
}
.media-card:hover {
  border-color: #0284c7 !important;
}
</style>
