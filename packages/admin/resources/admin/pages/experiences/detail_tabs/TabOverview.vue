<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-form v-if="experience" class="mt-2" @submit.prevent="handleUpdate">
          <v-row>
            <v-col cols="12" md="8">
              <v-text-field
                v-model="experience.name"
                label="Experience Name"
                placeholder="e.g. Mountain Scenery & Alpine Passes"
                :rules="[rules.required]"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                v-model="experience.slug"
                label="URL Slug"
                placeholder="e.g. mountain-scenery"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="6">
              <v-text-field
                v-model="experience.emphasis"
                label="Visual Emphasis / Kicker"
                placeholder="e.g. Panoramic peaks, glacial valleys, high-altitude ridgelines"
                density="comfortable"
                hint="Key thematic phrase shown on header and badges"
                persistent-hint
              />
            </v-col>

            <v-col cols="12" md="6">
              <v-text-field
                v-model="experience.cues"
                label="Experience Cues / Tags"
                placeholder="e.g. 8,000m summits, vantage points, sunrise vistas"
                density="comfortable"
                hint="Comma-separated cues or descriptors displayed across the detail layout"
                persistent-hint
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-text-field
                v-model.number="experience.sort_order"
                label="Sort Order"
                type="number"
                min="0"
                density="comfortable"
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-switch
                v-model="experience.is_active"
                label="Active on Public Website"
                color="success"
                inset
                hide-details
              />
            </v-col>

            <v-col cols="12" md="4">
              <v-switch
                v-model="experience.is_featured"
                label="Featured Experience"
                color="primary"
                inset
                hide-details
              />
            </v-col>

            <v-col cols="12">
              <v-textarea
                v-model="experience.summary"
                label="Summary / Introduction"
                rows="3"
                auto-grow
                density="comfortable"
                placeholder="A compelling high-level summary of the experience that appears on cards and teasers."
              />
            </v-col>

            <v-col cols="12">
              <div class="text-subtitle-2 font-weight-medium mb-2 text-slate-700">
                Detailed Experience Narrative / Description
              </div>
              <SummarnoteEditor v-model="experience.description" />
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
                      Customize the call-to-action block at the bottom of the experience detail page. Leave empty to use system defaults.
                    </div>
                  </div>
                </div>

                <v-row dense>
                  <v-col cols="12">
                    <v-text-field
                      v-model="experience.cta_title"
                      label="CTA Banner Title"
                      placeholder="e.g. Ready to Experience Himalayan Peaks Up Close?"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12">
                    <v-textarea
                      v-model="experience.cta_description"
                      label="CTA Description"
                      placeholder="e.g. Connect with our alpine expedition leaders to design a personalized Himalayan trekking itinerary tailored to your fitness and schedule."
                      rows="2"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="experience.cta_primary_btn_text"
                      label="Primary Button Text"
                      placeholder="e.g. Plan Your Expedition"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="experience.cta_primary_btn_url"
                      label="Primary Button URL"
                      placeholder="e.g. /plan-your-trip or https://..."
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="experience.cta_secondary_btn_text"
                      label="Secondary Button Text"
                      placeholder="e.g. Speak with an Expert"
                      density="comfortable"
                    />
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="experience.cta_secondary_btn_url"
                      label="Secondary Button URL"
                      placeholder="e.g. /contact"
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
              Save Experience
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
import { updateExperienceApi } from '@/api/experiences.api'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  experience: {
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
  if (!props.experience?.id) return
  submitting.value = true
  try {
    const payload = {
      name: props.experience.name,
      slug: props.experience.slug,
      summary: props.experience.summary || '',
      description: props.experience.description || '',
      emphasis: props.experience.emphasis || '',
      cues: props.experience.cues || '',
      sort_order: props.experience.sort_order ?? 0,
      is_active: Boolean(props.experience.is_active),
      is_featured: Boolean(props.experience.is_featured),
      cta_title: props.experience.cta_title || '',
      cta_description: props.experience.cta_description || '',
      cta_primary_btn_text: props.experience.cta_primary_btn_text || '',
      cta_primary_btn_url: props.experience.cta_primary_btn_url || '',
      cta_secondary_btn_text: props.experience.cta_secondary_btn_text || '',
      cta_secondary_btn_url: props.experience.cta_secondary_btn_url || '',
    }

    const resp = await updateExperienceApi(props.experience.id, payload)
    showSuccess(resp.data?.message ?? 'Experience updated successfully.')
    emit('refresh')
  } catch (err) {
    console.error('Failed to update experience:', err)
    showError(err?.response?.data?.message || 'Failed to update experience.')
  } finally {
    submitting.value = false
  }
}
</script>
