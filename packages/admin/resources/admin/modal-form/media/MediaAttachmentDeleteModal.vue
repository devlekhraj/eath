<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>{{ title || 'Delete Media Attachment' }}</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="text-center pt-4">
      <div v-if="previewUrl" class="d-flex justify-center mb-3">
        <v-img
          :src="previewUrl"
          max-width="140"
          height="90"
          cover
          class="border bg-grey-lighten-2"
        />
      </div>

      <div class="text-subtitle-1">Are you sure you want to remove this media attachment?</div>
      <div class="text-caption text-medium-emphasis mt-1">
        {{ previewTitle || 'This image will be detached from this page/entity.' }}
      </div>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-btn
        color="error"
        variant="flat"
        :loading="loading"
        @click="handleDelete"
      >
        Delete Attachment
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, computed } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
  title: {
    type: String,
    default: 'Delete Media Attachment',
  },
  attachment: {
    type: Object,
    required: true,
  },
  deleteUrl: {
    type: String,
    default: '',
  },
  onDelete: {
    type: Function,
    default: null,
  },
})

const emit = defineEmits(['close', 'saved'])
const loading = ref(false)

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

function handleCancel() {
  emit('close')
}

async function handleDelete() {
  loading.value = true
  try {
    if (typeof props.onDelete === 'function') {
      await props.onDelete(props.attachment)
    } else if (props.deleteUrl) {
      await http.delete(props.deleteUrl)
    } else {
      throw new Error('No delete URL or onDelete callback provided')
    }

    showSuccess('Media attachment removed successfully')
    emit('saved', props.attachment)
    emit('close')
  } catch (error) {
    showError(error?.response?.data?.message || error?.message || 'Failed to remove media attachment')
  } finally {
    loading.value = false
  }
}
</script>
