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
          Manage the dynamic <strong>Experiential Highlights</strong> and <strong>Suitability & Preparation Questions</strong> for this experience page. Empty sections fall back to contextual defaults on the public website.
        </v-alert>

        <v-form v-if="experience" @submit.prevent="handleUpdate">
          <!-- 1. Experience Highlights Repeater -->
          <div class="d-flex align-center justify-space-between mb-4">
            <div>
              <h3 class="text-subtitle-1 font-weight-bold text-slate-800 mb-1">
                Curated Experience Highlights ({{ highlights.length }})
              </h3>
              <p class="text-caption text-medium-emphasis mb-0">
                Key signature moments and scenic hallmarks displayed in prominent showcase cards.
              </p>
            </div>
            <v-btn
              color="primary"
              variant="outlined"
              size="small"
              @click="addHighlight"
            >
              <v-icon start size="16">mdi-plus</v-icon>
              Add Highlight
            </v-btn>
          </div>

          <div v-if="highlights.length === 0" class="pa-6 text-center border border-dashed rounded mb-6 text-medium-emphasis">
            <v-icon size="32" color="secondary" class="mb-2">mdi-star-outline</v-icon>
            <div class="text-body-2 font-weight-medium">No custom highlights defined yet.</div>
            <div class="text-caption mb-3">Add items such as "Sunrise Over Kala Patthar" or "Direct Views of Everest, Lhotse & Nuptse".</div>
            <v-btn color="primary" variant="tonal" size="small" @click="addHighlight">
              Add First Highlight
            </v-btn>
          </div>

          <div v-else class="mb-6 d-flex flex-column ga-3">
            <v-card
              v-for="(item, index) in highlights"
              :key="'h-' + index"
              variant="outlined"
              class="pa-4 bg-slate-50"
            >
              <div class="d-flex align-center justify-space-between mb-2">
                <div class="d-flex align-center ga-2">
                  <v-chip size="x-small" color="primary" variant="tonal" label>
                    Highlight #{{ index + 1 }}
                  </v-chip>
                  <span class="text-caption font-weight-bold text-slate-700">
                    {{ item.title || 'Untitled Highlight' }}
                  </span>
                </div>

                <div class="d-flex align-center ga-1">
                  <v-btn
                    icon
                    variant="text"
                    size="x-small"
                    :disabled="index === 0"
                    @click="moveHighlight(index, -1)"
                  >
                    <v-icon size="16">mdi-arrow-up</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    variant="text"
                    size="x-small"
                    :disabled="index === highlights.length - 1"
                    @click="moveHighlight(index, 1)"
                  >
                    <v-icon size="16">mdi-arrow-down</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    color="error"
                    variant="text"
                    size="x-small"
                    @click="removeHighlight(index)"
                  >
                    <v-icon size="16">mdi-trash-can-outline</v-icon>
                  </v-btn>
                </div>
              </div>

              <v-row dense>
                <v-col cols="12" md="9">
                  <v-text-field
                    v-model="item.title"
                    label="Highlight Title"
                    placeholder="e.g. Sunrise from High Alpine Vantage Points"
                    density="compact"
                    hide-details="auto"
                    class="mb-2"
                  />
                </v-col>

                <v-col cols="12" md="3" class="d-flex align-center">
                  <v-switch
                    v-model="item.is_active"
                    label="Active"
                    color="success"
                    density="compact"
                    hide-details
                  />
                </v-col>

                <v-col cols="12">
                  <v-textarea
                    v-model="item.description"
                    label="Highlight Description"
                    placeholder="Provide evocative sensory detail and context..."
                    rows="2"
                    density="compact"
                    hide-details="auto"
                  />
                </v-col>
              </v-row>
            </v-card>
          </div>

          <v-divider class="my-6" />

          <!-- 2. Preparation & Suitability Questions Repeater -->
          <div class="d-flex align-center justify-space-between mb-4">
            <div>
              <h3 class="text-subtitle-1 font-weight-bold text-slate-800 mb-1">
                Preparation & Suitability Questions ({{ prepQuestions.length }})
              </h3>
              <p class="text-caption text-medium-emphasis mb-0">
                Detailed guidance on pacing, equipment, physical preparation, and seasonal suitability.
              </p>
            </div>
            <v-btn
              color="primary"
              variant="outlined"
              size="small"
              @click="addPrepQuestion"
            >
              <v-icon start size="16">mdi-plus</v-icon>
              Add Question
            </v-btn>
          </div>

          <div v-if="prepQuestions.length === 0" class="pa-6 text-center border border-dashed rounded mb-6 text-medium-emphasis">
            <v-icon size="32" color="secondary" class="mb-2">mdi-help-circle-outline</v-icon>
            <div class="text-body-2 font-weight-medium">No custom preparation questions defined yet.</div>
            <div class="text-caption mb-3">Add items addressing physical readiness, photography conditions, and gear.</div>
            <v-btn color="primary" variant="tonal" size="small" @click="addPrepQuestion">
              Add First Question
            </v-btn>
          </div>

          <div v-else class="mb-6 d-flex flex-column ga-3">
            <v-card
              v-for="(item, index) in prepQuestions"
              :key="'pq-' + index"
              variant="outlined"
              class="pa-4 bg-slate-50"
            >
              <div class="d-flex align-center justify-space-between mb-2">
                <div class="d-flex align-center ga-2">
                  <v-chip size="x-small" color="secondary" variant="tonal" label>
                    Question #{{ index + 1 }}
                  </v-chip>
                  <span class="text-caption font-weight-bold text-slate-700">
                    {{ item.title || 'Untitled Question' }}
                  </span>
                </div>

                <div class="d-flex align-center ga-1">
                  <v-btn
                    icon
                    variant="text"
                    size="x-small"
                    :disabled="index === 0"
                    @click="movePrepQuestion(index, -1)"
                  >
                    <v-icon size="16">mdi-arrow-up</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    variant="text"
                    size="x-small"
                    :disabled="index === prepQuestions.length - 1"
                    @click="movePrepQuestion(index, 1)"
                  >
                    <v-icon size="16">mdi-arrow-down</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    color="error"
                    variant="text"
                    size="x-small"
                    @click="removePrepQuestion(index)"
                  >
                    <v-icon size="16">mdi-trash-can-outline</v-icon>
                  </v-btn>
                </div>
              </div>

              <v-row dense>
                <v-col cols="12" md="9">
                  <v-text-field
                    v-model="item.title"
                    label="Question / Heading"
                    placeholder="e.g. What physical conditioning is required for high panoramic passes?"
                    density="compact"
                    hide-details="auto"
                    class="mb-2"
                  />
                </v-col>

                <v-col cols="12" md="3" class="d-flex align-center">
                  <v-switch
                    v-model="item.is_active"
                    label="Active"
                    color="success"
                    density="compact"
                    hide-details
                  />
                </v-col>

                <v-col cols="12">
                  <v-textarea
                    v-model="item.body"
                    label="Answer / Guidance"
                    placeholder="Detailed recommendations, gear suggestions, and conditioning timeline..."
                    rows="3"
                    density="compact"
                    hide-details="auto"
                  />
                </v-col>
              </v-row>
            </v-card>
          </div>

          <!-- Save Button -->
          <div class="d-flex justify-end pt-4 pb-2">
            <v-btn
              color="primary"
              variant="flat"
              class="px-6"
              :loading="submitting"
              :disabled="submitting"
              @click="handleUpdate"
            >
              <v-icon start>mdi-content-save</v-icon>
              Save Highlights & Prep
            </v-btn>
          </div>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue'
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

const highlights = ref([])
const prepQuestions = ref([])

function syncFromProps() {
  highlights.value = (props.experience?.highlights || []).map((h, i) => ({
    id: h.id || null,
    title: h.title || '',
    description: h.description || '',
    sort_order: h.sort_order ?? i,
    is_active: h.is_active !== undefined ? Boolean(h.is_active) : true,
  }))

  prepQuestions.value = (props.experience?.prep_questions || []).map((q, i) => ({
    id: q.id || null,
    title: q.title || '',
    body: q.body || '',
    sort_order: q.sort_order ?? i,
    is_active: q.is_active !== undefined ? Boolean(q.is_active) : true,
  }))
}

watch(() => props.experience, syncFromProps, { deep: true, immediate: true })

// Highlights functions
function addHighlight() {
  highlights.value.push({
    id: null,
    title: '',
    description: '',
    sort_order: highlights.value.length,
    is_active: true,
  })
}

function removeHighlight(index) {
  highlights.value.splice(index, 1)
}

function moveHighlight(index, delta) {
  const target = index + delta
  if (target < 0 || target >= highlights.value.length) return
  const item = highlights.value.splice(index, 1)[0]
  highlights.value.splice(target, 0, item)
}

// Prep Questions functions
function addPrepQuestion() {
  prepQuestions.value.push({
    id: null,
    title: '',
    body: '',
    sort_order: prepQuestions.value.length,
    is_active: true,
  })
}

function removePrepQuestion(index) {
  prepQuestions.value.splice(index, 1)
}

function movePrepQuestion(index, delta) {
  const target = index + delta
  if (target < 0 || target >= prepQuestions.value.length) return
  const item = prepQuestions.value.splice(index, 1)[0]
  prepQuestions.value.splice(target, 0, item)
}

async function handleUpdate() {
  if (!props.experience?.id) return
  submitting.value = true
  try {
    const payload = {
      highlights: highlights.value.map((h, i) => ({
        id: h.id || null,
        title: (h.title || '').trim(),
        description: (h.description || '').trim(),
        sort_order: i,
        is_active: Boolean(h.is_active),
      })),
      prep_questions: prepQuestions.value.map((q, i) => ({
        id: q.id || null,
        title: (q.title || '').trim(),
        body: (q.body || '').trim(),
        sort_order: i,
        is_active: Boolean(q.is_active),
      })),
    }

    const resp = await updateExperienceApi(props.experience.id, payload)
    showSuccess(resp.data?.message ?? 'Highlights and preparation questions updated successfully.')
    emit('refresh')
  } catch (err) {
    console.error('Failed to update highlights & prep questions:', err)
    showError(err?.response?.data?.message || 'Failed to save highlights & prep questions.')
  } finally {
    submitting.value = false
  }
}
</script>
