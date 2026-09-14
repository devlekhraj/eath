<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-form v-if="destination" @submit.prevent="handleUpdate">
          <v-row>
            <v-col cols="12">
              <v-text-field
                v-model="destination.meta_title"
                label="Meta Title"
                placeholder="e.g. Everest Region Treks & High Passes | E.A.T.H. Travels"
                hint="Optimal length: 50–60 characters"
                persistent-hint
                counter="60"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="destination.meta_description"
                label="Meta Description"
                placeholder="Explore iconic Himalayan trekking routes in the Everest Khumbu region with E.A.T.H. Travels. Professional Sherpa guides, custom itineraries, and high-altitude safety."
                rows="3"
                auto-grow
                hint="Optimal length: 140–160 characters (max 300)"
                persistent-hint
                counter="300"
                density="comfortable"
              />
            </v-col>

            <!-- Live Google SERP Preview -->
            <v-col cols="12">
              <v-card variant="outlined" class="pa-4 bg-grey-lighten-5">
                <div class="text-caption text-uppercase font-weight-bold text-slate-600 mb-2">
                  Search Engine Snippet Preview
                </div>
                <div class="pa-3 bg-white border" style="border-radius: 4px; max-width: 650px;">
                  <div class="text-caption text-grey-darken-1 mb-1 text-truncate">
                    https://eathtravels.com/destinations/{{ destination?.slug || 'slug' }}
                  </div>
                  <div class="text-subtitle-1 font-weight-medium text-primary text-truncate mb-1">
                    {{ destination?.meta_title || destination?.name || 'Destination Title' }} | E.A.T.H. Travels
                  </div>
                  <div class="text-body-2 text-slate-700" style="line-height: 1.4;">
                    {{ destination?.meta_description || destination?.summary || 'No description provided yet for this destination. Add a meta description to improve search engine rankings and click-through rates.' }}
                  </div>
                </div>
              </v-card>
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
              Save SEO Settings
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { updateDestinationApi } from '@/http/destinations.http'
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
      meta_title: props.destination.meta_title || '',
      meta_description: props.destination.meta_description || '',
    }

    const resp = await updateDestinationApi(props.destination.id, payload)
    showSuccess(resp.data?.message ?? 'SEO metadata updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update SEO settings:', error)
    showError(error?.response?.data?.message || 'Failed to update SEO settings.')
  } finally {
    submitting.value = false
  }
}
</script>
