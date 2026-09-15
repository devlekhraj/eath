<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Delete Comparison Preset</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="text-center pt-4">
      <div class="text-subtitle-1">Are you sure you want to delete this preset?</div>
      <div class="text-caption text-grey mt-2">
        Preset: <strong>{{ item?.name }}</strong>
      </div>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleClose">Cancel</v-btn>
      <v-btn color="error" variant="flat" :loading="submitting" @click="handleDelete">
        Delete
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteComparisonPresetApi } from '@/http/comparison-presets.http'

const { showSuccess, showError } = useSnackbar()
const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const emit = defineEmits(['close', 'saved'])
const submitting = ref(false)

function handleClose() {
  emit('close')
}

async function handleDelete() {
  submitting.value = true
  try {
    await deleteComparisonPresetApi(props.item.id)
    showSuccess('Preset deleted successfully')
    emit('saved')
    handleClose()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete preset')
  } finally {
    submitting.value = false
  }
}
</script>
