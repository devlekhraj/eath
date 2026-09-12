<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Delete FAQ</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text class="text-center pt-4">
      <div class="text-subtitle-1">Are you sure you want to delete this FAQ?</div>
      <div class="text-caption text-grey mt-2">
        Question: <strong>{{ item?.question }}</strong>
      </div>
    </v-card-text>
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleClose">Cancel</v-btn>
      <v-btn color="error" variant="elevated" :loading="submitting" @click="handleDelete">
        Delete
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteFaqApi } from '@/api/faqs.api'

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
    await deleteFaqApi(props.item.id)
    showSuccess('FAQ deleted successfully')
    emit('saved')
    handleClose()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete FAQ')
  } finally {
    submitting.value = false
  }
}
</script>
