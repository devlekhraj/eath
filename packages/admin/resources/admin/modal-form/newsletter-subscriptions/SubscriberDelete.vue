<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Delete Subscriber</span>
      <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="text-center pt-4">
      <div class="text-subtitle-1">Are you sure you want to remove this subscriber?</div>
      <div class="text-caption text-medium-emphasis mt-2 font-weight-medium">
        {{ item?.email }}
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
        Delete
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { deleteNewsletterSubscriptionApi } from '@/http/newsletter-subscriptions.http'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const loading = ref(false)

function handleCancel() {
  emit('close')
}

async function handleDelete() {
  if (!props.item?.id) return
  loading.value = true
  try {
    await deleteNewsletterSubscriptionApi(props.item.id)
    showSuccess('Subscriber deleted successfully')
    emit('saved')
    handleCancel()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete subscriber')
  } finally {
    loading.value = false
  }
}
</script>
