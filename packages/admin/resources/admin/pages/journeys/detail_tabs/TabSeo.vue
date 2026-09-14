<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <v-form v-if="journey" @submit.prevent="handleUpdate">
          <v-row>
            <v-col cols="12">
              <div class="mb-2">
                <v-text-field
                  v-model="form.meta_title"
                  label="Meta Title"
                  placeholder="e.g. Everest Base Camp Trek (14 Days) | E.A.T.H. Travels"
                  hint="Optimal length: 50–60 characters"
                  persistent-hint
                  counter="60"
                  density="comfortable"
                />
              </div>
            </v-col>

            <v-col cols="12">
              <div class="mb-2">
                <v-textarea
                  v-model="form.meta_description"
                  label="Meta Description"
                  placeholder="Experience the iconic 14-day trek to Everest Base Camp (5,364m) and Kala Patthar. Expert Sherpa guides, comprehensive acclimatization, and high-altitude safety."
                  rows="3"
                  auto-grow
                  hint="Optimal length: 140–160 characters (max 300)"
                  persistent-hint
                  counter="300"
                  density="comfortable"
                />
              </div>
            </v-col>

            <!-- Live Google SERP Preview -->
            <v-col cols="12">
              <v-card variant="outlined" class="pa-4 bg-grey-lighten-5">
                <div class="text-caption text-uppercase font-weight-bold text-slate-600 mb-2">
                  Search Engine Snippet Preview
                </div>
                <div class="pa-3 bg-white border" style="border-radius: 4px; max-width: 650px;">
                  <div class="text-caption text-grey-darken-1 mb-1 text-truncate">
                    https://eathtravels.com/journeys/{{ journey?.slug || 'slug' }}
                  </div>
                  <div class="text-subtitle-1 font-weight-medium text-primary text-truncate mb-1">
                    {{ form.meta_title || journey?.name || 'Journey Title' }} | E.A.T.H. Travels
                  </div>
                  <div class="text-body-2 text-slate-700" style="line-height: 1.4;">
                    {{ form.meta_description || journey?.summary || 'No description provided yet for this journey. Add a meta description to improve search engine rankings and click-through rates.' }}
                  </div>
                </div>
              </v-card>
            </v-col>
          </v-row>

          <div class="d-flex justify-end pt-6 pb-2 border-t">
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
import { ref, reactive, watch } from 'vue'
import { updateJourneyApi } from '@/http/journeys.http'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { showSuccess, showError } = useSnackbar()

const submitting = ref(false)

const form = reactive({
  meta_title: '',
  meta_description: '',
})

watch(
  () => props.journey,
  (newVal) => {
    if (newVal) {
      form.meta_title = newVal.meta_title || ''
      form.meta_description = newVal.meta_description || ''
    }
  },
  { immediate: true }
)

async function handleUpdate() {
  if (!props.journey?.id) return

  try {
    submitting.value = true
    await updateJourneyApi(props.journey.id, {
      meta_title: form.meta_title,
      meta_description: form.meta_description,
    })
    showSuccess('SEO metadata updated successfully.')
    emit('refresh')
  } catch (error) {
    console.error('Failed to update SEO settings:', error)
    showError(error?.response?.data?.message || 'Failed to update SEO metadata.')
  } finally {
    submitting.value = false
  }
}
</script>
