<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Delete Media Asset</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text class="pt-4">
      <div class="d-flex align-center ga-3 mb-3">
        <v-img :src="item?.url" width="70" height="70" cover class="border flex-shrink-0" />
        <div>
          <div class="font-weight-medium text-slate-800">{{ item?.title || item?.filename }}</div>
          <div class="text-caption text-medium-emphasis">{{ item?.filename }}</div>
          <div class="text-caption text-medium-emphasis">
            {{ item?.width }} × {{ item?.height }}px · {{ item?.formatted_size }}
          </div>
        </div>
      </div>

      <v-alert
        v-if="item?.attachments_count > 0"
        type="warning"
        variant="tonal"
        class="mb-3"
        density="compact"
      >
        This media asset is currently attached in <strong>{{ item.attachments_count }}</strong> place(s). Deleting it will unlink it.
      </v-alert>

      <div class="text-subtitle-2 text-slate-700">
        Are you sure you want to delete this media asset?
      </div>

      <div v-if="item?.attachments_count > 0" class="mt-2">
        <div class="mb-2">
            <v-checkbox
              v-model="forceDelete"
              label="Force delete and unlink all references"
              color="error"
              hide-details
            />
        </div>
      </div>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleClose">Cancel</v-btn>
      <v-btn
        color="error"
        variant="flat"
        :loading="submitting"
        :disabled="item?.attachments_count > 0 && !forceDelete"
        @click="handleDelete"
      >
        Delete Media
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteMediaAssetApi } from '@/http/media-assets.http'

const { showSuccess, showError } = useSnackbar()
const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const emit = defineEmits(['close', 'saved'])
const submitting = ref(false)
const forceDelete = ref(false)

function handleClose() {
  emit('close')
}

async function handleDelete() {
  submitting.value = true
  try {
    await deleteMediaAssetApi(props.item.id, forceDelete.value)
    showSuccess('Media asset deleted successfully')
    emit('saved')
    handleClose()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete media asset')
  } finally {
    submitting.value = false
  }
}
</script>
