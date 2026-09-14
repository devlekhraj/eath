<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Confirm Delete Departure</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleClose">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />
    <v-card-text class="text-center pt-4">
      <div class="text-subtitle-1">Are you sure you want to delete this departure?</div>
      <div class="text-caption text-medium-emphasis mt-1">
        Departure <strong>{{ item?.code || item?.start_date }}</strong> for journey
        <strong>{{ item?.journey?.title || ('#' + item?.journey_id) }}</strong>
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
import { deleteJourneyDepartureApi } from '@/api/journey-departures.api'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
})

const submitting = ref(false)

function handleClose() {
  emit('close')
}

async function handleDelete() {
  submitting.value = true
  try {
    await deleteJourneyDepartureApi(props.item.id)
    showSuccess('Departure deleted successfully')
    emit('saved')
    handleClose()
  } catch (error) {
    showError(error?.response?.data?.message || 'Failed to delete departure')
  } finally {
    submitting.value = false
  }
}
</script>
