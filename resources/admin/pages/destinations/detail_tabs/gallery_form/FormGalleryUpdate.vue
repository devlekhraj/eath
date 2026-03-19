<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span class="font-medium">Edit Gallery Item</span>
      <v-btn size="small" icon variant="text" @click="handleClose">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>

    <v-divider />

    <v-card-text class="pa-0">
      <div class="px-6 py-4">
        <v-row>
          <v-col cols="12" md="4">
            <div>
              <!-- <pre>
                {{ imageItem }}
              </pre> -->
              <div class="mb-3">
                <div>
                  <v-img v-if="imageItem" :src="imageItem.url || imageItem.image_url" aspect-ratio="16/9" contain
                    rounded class="bordered preview-16x9" />
                  <div v-else class="preview-placeholder preview-16x9 rounded d-flex align-center justify-center">
                    <span>Select an image to preview</span>
                  </div>
                </div>
                <div v-if="imageItem" class="mt-2 text-caption text-grey">
                  <div><strong>Width:</strong> {{ imageItem.width }}px</div>
                  <div><strong>Height:</strong> {{ imageItem.height }}px</div>
                  <div><strong>Size:</strong> {{ imageItem.size }}</div>
                  <div><strong>Aspect Ratio:</strong> {{ formatAspectRatio(imageItem) }}</div>
                  <!-- <div><strong>Dimensions:</strong> {{ formatDimensions(imageItem) }}</div> -->
                </div>
              </div>

            </div>
          </v-col>
          <v-col cols="12" md="8">
            <div class="mb-3">
              <v-text-field :model-value="draftMeta.alt_text" label="Alt Text" variant="outlined" density="comfortable"
                :disabled="!imageItem" @update:modelValue="(value) => updateMetaField('alt_text', value)" />

            </div>
            <div class="mb-3">

              <v-text-field :model-value="draftMeta.caption" label="Caption" variant="outlined" density="comfortable"
                :disabled="!imageItem" @update:modelValue="(value) => updateMetaField('caption', value)" />
            </div>
            <div class="mb-3">

              <v-textarea :model-value="draftMeta.description" label="Description" variant="outlined"
                density="comfortable" rows="4" auto-grow :disabled="!imageItem"
                @update:modelValue="(value) => updateMetaField('description', value)" />
            </div>


            <div v-if="!imageItem" class="text-caption text-grey">
              Select an image to edit its meta info.
            </div>

          </v-col>
        </v-row>

      </div>
    </v-card-text>
    <v-card-actions class="justify-space-around">
      <v-btn color="primary" :loading="submitting" :disabled="submitting || !imageItem"
        @click="handleUpdate()">Update</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, watch } from 'vue'

const props = defineProps({
  imageItem: {
    type: Object,
    default: null,
  },
  onUpdated: {
    type: Function,
    default: null,
  },
})

const emit = defineEmits(['close'])
const submitting = ref(false)
const draftMeta = ref({
  alt_text: '',
  caption: '',
  description: '',
})

function handleClose() {
  emit('close')
}

function updateMetaField(key, value) {
  draftMeta.value = {
    ...draftMeta.value,
    [key]: value,
  }
}

function formatAspectRatio(item) {
  const width = item?.width ?? item?.image_width
  const height = item?.height ?? item?.image_height
  if (!width || !height) return '-'
  const ratio = width / height
  const target = 16 / 9
  const tolerance = 0.02
  const label = Math.abs(ratio - target) <= tolerance ? '16:9' : `${ratio.toFixed(2)}:1`
  return `${label}`
}

function slugifyName(input) {
  return input
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/(^-|-$)+/g, '')
}


async function handleUpdate() {
  if (!props.imageItem) return

  submitting.value = true
  try {
    await http.patch('/admin/media-usages/' + props.imageItem.id + '/update', {
      ...props.imageItem,
      ...draftMeta.value,
    })
    if (props.onUpdated) {
      props.onUpdated(props.imageItem)
    }
    handleClose()
  } catch (error) {
    console.error('Failed to update image', error)
  } finally {
    submitting.value = false
  }
}
watch(
  () => props.imageItem,
  (imageItem) => {
    draftMeta.value = {
      alt_text: imageItem?.alt_text ?? '',
      caption: imageItem?.caption ?? '',
      description: imageItem?.description ?? '',
    }
  },
  { immediate: true }
)
</script>
