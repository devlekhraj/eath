<template>
  <div>
    <v-row>
      <v-col cols="12" md="12" lg="8" offset-lg="2">
        <v-form v-if="destination" class="mt-4">
          <RichTextEditor v-model="descriptionValue" />
          <div class="mt-4">
             <VuetifyViewer :value="descriptionValue" />
          </div>
          <div class="text-center py-4">
            <v-btn
              size="large"
              color="primary"
              :loading="submitting"
              :disabled="submitting"
              @click="handleUpdate()"
              rounded
            >
              Update Description
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import http from '@/http.config'
import { computed, ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['refresh'])
const submitting = ref(false)

const descriptionValue = computed({
  get() {
    return props.destination?.description ?? ''
  },
  set(value) {
    if (props.destination) {
      props.destination.description = value ?? ''
    }
  },
})

async function handleUpdate() {
  if (!props.destination?.id) return
  submitting.value = true
  try {
    const resp = await http.patch(`/admin/destinations/${props.destination.id}/update`, {
      description: props.destination.description ?? '',
    })
    showSuccess(resp.message)
    emit('refresh')
  } catch (error) {
    console.log({ error })
    showError('Failed to update description')
  } finally {
    submitting.value = false
  }
}
</script>
