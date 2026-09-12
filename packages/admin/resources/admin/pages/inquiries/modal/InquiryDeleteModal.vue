<template>
  <v-card class="rounded-0 elevation-0">
    <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
      <span class="text-uppercase font-weight-medium text-slate-800">Delete Inquiry</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" class="rounded-0" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="text-center pt-4">
      <div class="text-subtitle-1">Are you sure you want to delete this inquiry?</div>
      <div class="text-caption text-grey mt-2">
        Inquiry: <strong>{{ item?.reference_code }}</strong> · From: <strong>{{ item?.name }}</strong> ({{ item?.email }})
      </div>
    </v-card-text>

    <v-divider />
    <v-card-actions class="pa-3 justify-end">
      <v-btn variant="text" class="rounded-0" @click="handleClose">Cancel</v-btn>
      <v-btn color="error" variant="elevated" class="rounded-0" :loading="submitting" @click="handleDelete">
        Delete
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteInquiryApi } from '@/api/inquiries.api'

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
    await deleteInquiryApi(props.item.id)
    showSuccess('Inquiry deleted successfully')
    emit('saved')
    handleClose()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete inquiry')
  } finally {
    submitting.value = false
  }
}
</script>
