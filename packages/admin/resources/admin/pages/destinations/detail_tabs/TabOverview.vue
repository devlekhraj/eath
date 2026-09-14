<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-form v-if="destination" class="mt-2" @submit.prevent="handleUpdate">
          <v-row>
            <v-col cols="12" md="8">
              <v-text-field
                v-model="destination.name"
                label="Destination Name"
                placeholder="e.g. Everest / Khumbu Region"
                :rules="[rules.required]"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                v-model="destination.slug"
                label="URL Slug"
                placeholder="e.g. everest"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="8">
              <v-text-field
                v-model="destination.region_label"
                label="Region Label"
                placeholder="e.g. Solukhumbu, Eastern Nepal"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                v-model.number="destination.sort_order"
                label="Sort Order"
                type="number"
                min="0"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="6">
              <v-switch
                v-model="destination.is_active"
                label="Active on Public Website"
                color="success"
                inset
                hide-details
              />
            </v-col>

            <v-col cols="12" md="6">
              <v-switch
                v-model="destination.is_featured"
                label="Featured Destination"
                color="primary"
                inset
                hide-details
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="destination.summary"
                label="Summary / Introduction"
                rows="3"
                auto-grow
                density="comfortable"
                placeholder="A compelling high-level summary of the region that appears on cards and teasers."
              />
            </v-col>

            <v-col cols="12">
              <div class="text-subtitle-2 font-weight-medium mb-2 text-slate-700">
                Detailed Destination Description
              </div>
              <SummarnoteEditor v-model="destination.description" />
            </v-col>

            <!-- Bottom CTA Banner Customization -->
            <v-col cols="12" class="mt-4">
              <v-card variant="outlined" class="pa-4">
                <div class="d-flex align-center justify-space-between mb-3">
                  <div>
                    <div class="text-subtitle-2 font-weight-bold text-uppercase text-slate-800">
                      Bottom Call-To-Action (CTA) Banner
                    </div>
                    <div class="text-caption text-medium-emphasis">
                      Customize the prominent call-to-action block at the bottom of the destination detail page. Leave empty to use system defaults.
                    </div>
                  </div>
                </div>

                <v-row dense>
                  <v-col cols="12">
                    <v-text-field
                      v-model="destination.cta_title"
                      label="CTA Banner Title"
                      :placeholder="`Ready to Plan Your ${destination.name || 'Destination'} Adventure?`"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12">
                    <v-textarea
                      v-model="destination.cta_description"
                      label="CTA Banner Description"
                      placeholder="Launch our interactive trek planner with this region pre-selected. Tailor your travel window, pacing, and group size to receive curated itinerary recommendations."
                      rows="2"
                      auto-grow
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="destination.cta_primary_btn_text"
                      label="Primary Button Text"
                      :placeholder="`Plan a ${destination.name || 'Region'} Trek →`"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="destination.cta_primary_btn_url"
                      label="Primary Button URL / Route"
                      placeholder="Default: /plan-my-trek?mode=discover&region=...&source=destination"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="destination.cta_secondary_btn_text"
                      label="Secondary Button Text"
                      placeholder="Ask a Planning Question"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" sm="6">
                    <v-text-field
                      v-model="destination.cta_secondary_btn_url"
                      label="Secondary Button URL"
                      placeholder="Default: /contact"
                      density="comfortable"
                    />
                  </v-col>
                </v-row>
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
              Save Overview Changes
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import SummarnoteEditor from '@/components/SummarnoteEditor.vue'
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

const rules = {
  required: (v) => !!v || 'This field is required',
}

async function handleUpdate() {
  if (!props.destination?.id) return
  submitting.value = true
  try {
    const payload = {
      name: props.destination.name,
      slug: props.destination.slug,
      region_label: props.destination.region_label,
      sort_order: parseInt(props.destination.sort_order, 10) || 0,
      is_active: Boolean(props.destination.is_active),
      is_featured: Boolean(props.destination.is_featured),
      summary: props.destination.summary || '',
      description: props.destination.description || '',
      cta_title: props.destination.cta_title || '',
      cta_description: props.destination.cta_description || '',
      cta_primary_btn_text: props.destination.cta_primary_btn_text || '',
      cta_primary_btn_url: props.destination.cta_primary_btn_url || '',
      cta_secondary_btn_text: props.destination.cta_secondary_btn_text || '',
      cta_secondary_btn_url: props.destination.cta_secondary_btn_url || '',
    }

    const resp = await updateDestinationApi(props.destination.id, payload)
    showSuccess(resp.data?.message ?? 'Destination overview updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update destination overview:', error)
    showError(error?.response?.data?.message || 'Failed to update destination overview.')
  } finally {
    submitting.value = false
  }
}
</script>
