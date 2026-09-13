<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-alert
          type="info"
          variant="tonal"
          border="start"
          class="mb-6"
        >
          These logistics fields directly power the <strong>Regional Practical Guide & Logistics Notes</strong> section on the public destination preview page.
        </v-alert>

        <v-form v-if="destination" @submit.prevent="handleUpdate">
          <v-row>
            <v-col cols="12">
              <v-textarea
                v-model="destination.gateway"
                label="Gateway & Transit Connection"
                placeholder="e.g. Lukla mountain flight (2840m) from Ramechhap or Kathmandu"
                hint="Main entry point, airport, or city transit link"
                persistent-hint
                rows="2"
                auto-grow
                density="comfortable"
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="destination.trailheads"
                label="Regional Trailheads & Access Routes"
                placeholder="e.g. Lukla airstrip, Salleri overland jeep road, Jiri classical trek trailhead"
                hint="Starting and ending trailheads accessible for this region"
                persistent-hint
                rows="3"
                auto-grow
                density="comfortable"
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="destination.permits"
                label="Permits & Local Regulations"
                placeholder="e.g. Sagarmatha National Park Entry Permit (NPR 3,000) and Khumbu Pasang Lhamu Rural Municipality fee (NPR 2,000). No TIMS card required."
                hint="Required permits, conservation fees, or restricted area rules"
                persistent-hint
                rows="3"
                auto-grow
                density="comfortable"
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="destination.pacing_note"
                label="Pacing & Altitude Advice"
                placeholder="e.g. Daily ascents capped at 400–500m above 3,000m. Built-in acclimatization days at Namche Bazaar and Dingboche are mandatory."
                hint="Recommended acclimatization schedule and elevation pacing"
                persistent-hint
                rows="3"
                auto-grow
                density="comfortable"
              />
            </v-col>
          </v-row>

          <div class="d-flex justify-end pt-6 pb-2">
            <v-btn
              color="primary"
              variant="flat"
              class="px-6"
              :loading="submitting"
              :disabled="submitting"
              @click="handleUpdate"
            >
              <v-icon start>mdi-content-save</v-icon>
              Save Logistics Notes
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { updateDestinationApi } from '@/api/destinations.api'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { showSuccess, showError } = useSnackbar()
const submitting = ref(false)

async function handleUpdate() {
  if (!props.destination?.id) return
  submitting.value = true
  try {
    const payload = {
      gateway: props.destination.gateway || '',
      trailheads: props.destination.trailheads || '',
      permits: props.destination.permits || '',
      pacing_note: props.destination.pacing_note || '',
    }

    const resp = await updateDestinationApi(props.destination.id, payload)
    showSuccess(resp.data?.message ?? 'Logistics notes updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update logistics notes:', error)
    showError(error?.response?.data?.message || 'Failed to update logistics notes.')
  } finally {
    submitting.value = false
  }
}
</script>
