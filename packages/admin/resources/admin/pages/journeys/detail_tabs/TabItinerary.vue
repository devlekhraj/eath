<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <!-- Day-by-Day Itinerary Section -->
        <v-card variant="outlined" class="pa-5 mb-6">
          <div class="d-flex align-center justify-space-between flex-wrap ga-2 mb-4">
            <div>
              <div class="text-subtitle-1 font-weight-bold text-uppercase">
                Day-by-Day Route Itinerary ({{ itineraryDays.length }})
              </div>
              <p class="text-caption text-medium-emphasis mb-0">
                Detailed day-by-day expedition schedule, altitude checkpoints, and trekking milestones.
              </p>
            </div>

            <v-btn color="primary" variant="flat" @click="handleOpenDay()">
              <v-icon start>mdi-plus</v-icon>
              Add Day
            </v-btn>
          </div>

          <v-expansion-panels v-if="itineraryDays.length" multiple flat elevation="0">
            <v-expansion-panel v-for="itinerary in itineraryDays" :key="itinerary.id" elevation="0"
              class="mb-2 border rounded elevation-0">
              <v-expansion-panel-title class="font-weight-medium">
                <span class="text-primary font-weight-bold mr-2">Day {{ itinerary.day_number }}:</span>
                <span>{{ itinerary.title }}</span>
                <v-chip v-if="itinerary.altitude_m || itinerary.altitude_label" size="x-small" variant="tonal"
                  color="secondary" class="ml-3">
                  {{ itinerary.altitude_label || `${itinerary.altitude_m}m` }}
                </v-chip>
                <v-chip v-if="itinerary.walking_hours || itinerary.walking_hours_label" size="x-small"
                  variant="outlined" class="ml-2">
                  {{ itinerary.walking_hours_label || `${itinerary.walking_hours} hrs` }}
                </v-chip>
              </v-expansion-panel-title>

              <v-expansion-panel-text>
                <div class="pt-2">
                  <div class="d-flex align-center justify-space-between mb-3">
                    <div class="text-caption text-slate-600">
                      <span v-if="itinerary.route" class="font-weight-medium text-slate-800">
                        {{ itinerary.route }}
                      </span>
                    </div>

                    <div class="d-flex ga-2">
                      <v-btn color="primary" variant="outlined" @click="handleOpenDay(itinerary)">
                        <v-icon start size="14">mdi-pencil</v-icon>
                        Edit Day
                      </v-btn>
                      <v-btn color="primary" variant="tonal" @click="handleHighlights(itinerary)">
                        <v-icon start size="14">mdi-star-outline</v-icon>
                        Add Highlight
                      </v-btn>
                    </div>
                  </div>

                  <div v-if="itinerary.description" class="text-body-2 mb-4">
                    <SummarnoteViewer :value="itinerary.description" />
                  </div>

                  <!-- Day Highlights Grid -->
                  <div v-if="itinerary.highlights?.length" class="mt-4 pt-3 border-t">
                    <div class="text-caption font-weight-bold text-uppercase text-slate-600 mb-2">
                      Day Highlights
                    </div>
                    <v-row dense>
                      <v-col v-for="(highlight, hIdx) in itinerary.highlights" :key="highlight.id || hIdx" cols="12">
                        <v-card variant="outlined" class="pa-3 h-100 bg-slate-50">
                          <div class="d-flex align-start justify-space-between">
                            <div>
                              <div class="text-body-2 font-weight-bold text-primary">
                                {{ highlight.title }}
                              </div>
                              <div class="text-caption text-medium-emphasis mt-1">
                                {{ highlight.description }}
                              </div>
                            </div>
                            <v-btn icon variant="text" color="primary" @click="handleHighlights(itinerary, highlight)">
                              <v-icon size="14">mdi-pencil</v-icon>
                            </v-btn>
                          </div>
                        </v-card>
                      </v-col>
                    </v-row>
                  </div>
                </div>
              </v-expansion-panel-text>
            </v-expansion-panel>
          </v-expansion-panels>

          <div v-else class="text-center pa-8 bg-grey-lighten-5 rounded" style="border: 1px dashed #cbd5e1;">
            <v-icon size="40" color="grey" class="mb-2">mdi-map-marker-path</v-icon>
            <div class="text-body-2 font-weight-medium text-slate-700">No Itinerary Days Created</div>
            <div class="text-caption text-medium-emphasis mt-1">
              Add the first day of this journey's route schedule.
            </div>
          </div>
        </v-card>

        <!-- Expedition Highlights Section -->
        <v-card variant="outlined" class="pa-5">
          <div class="d-flex align-center justify-space-between flex-wrap ga-2 mb-4">
            <div>
              <div class="text-subtitle-1 font-weight-bold text-uppercase">
                Trip Highlights ({{ journeyHighlights.length }})
              </div>
              <p class="text-caption text-medium-emphasis mb-0">
                Key selling points, scenic highlights, and cultural landmarks featured on the trip page.
              </p>
            </div>

            <v-btn color="primary" variant="flat" @click="openHighlightForm()">
              <v-icon start>mdi-plus</v-icon>
              Add Highlight
            </v-btn>
          </div>

          <v-list v-if="journeyHighlights.length" class="bg-transparent" style="font-size: 14px;">
            <template v-for="(highlight, index) in journeyHighlights" :key="highlight.id || index">
              <v-list-item class="px-0 py-3">
                <template #prepend>
                  <v-avatar size="36" color="primary" variant="tonal" class="mr-3">
                    <v-icon size="20">{{ highlight.icon || 'mdi-star' }}</v-icon>
                  </v-avatar>
                </template>

                <v-list-item-title class="text-primary" style="font-size: 14px !important; font-weight: 400; line-height: 1.5; white-space: normal;">
                  {{ highlight.title || highlight.highlight_name }}
                </v-list-item-title>

                <v-list-item-subtitle v-if="highlight.description" class="text-slate-600 mt-1"
                  style="font-size: 14px !important; white-space: normal; line-height: 1.4;">
                  {{ highlight.description }}
                </v-list-item-subtitle>

                <template #append>
                  <v-btn variant="outlined" color="primary" @click="openHighlightForm(highlight)">
                    <v-icon start size="14">mdi-pencil</v-icon>
                    Edit
                  </v-btn>
                </template>
              </v-list-item>
              <v-divider v-if="index < journeyHighlights.length - 1" />
            </template>
          </v-list>

          <div v-else class="text-center pa-8 bg-grey-lighten-5 rounded" style="border: 1px dashed #cbd5e1;">
            <v-icon size="40" color="grey" class="mb-2">mdi-star-outline</v-icon>
            <div class="text-body-2 font-weight-medium text-slate-700">No Highlights Added</div>
            <div class="text-caption text-medium-emphasis mt-1">
              Add primary highlights to showcase what makes this trip unique.
            </div>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import SummarnoteViewer from '@/components/SummarnoteViewer.vue'
import ItineraryForm from '@/modal-form/journeys/ItineraryForm.vue'
import ItineraryHighlightsForm from '@/modal-form/journeys/ItineraryHighlightsForm.vue'
import JourneyHighlightForm from '@/modal-form/journeys/JourneyHighlightForm.vue'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { open: openModal } = useGlobalModal()

const itineraryDays = computed(() => {
  return Array.isArray(props.journey?.itinerary_days) ? props.journey.itinerary_days : []
})

const journeyHighlights = computed(() => {
  return Array.isArray(props.journey?.highlights) ? props.journey.highlights : []
})

function handleRefresh() {
  emit('refresh')
}

function handleOpenDay(item = {}) {
  openModal({
    title: item?.id ? 'Edit Itinerary Day' : 'Add Itinerary Day',
    component: ItineraryForm,
    size: 'xl',
    props: {
      item,
      journeyId: props.journey?.id,
    },
    onClose: handleRefresh,
  })
}

function handleHighlights(itinerary = {}, item = {}) {
  openModal({
    title: item?.id ? 'Edit Day Highlight' : 'Add Day Highlight',
    component: ItineraryHighlightsForm,
    size: 'lg',
    props: {
      itinerary,
      item,
    },
    onClose: handleRefresh,
  })
}

function openHighlightForm(item = {}) {
  openModal({
    title: item?.id ? `Edit ${item.title || item.highlight_name}` : 'Add Trip Highlight',
    component: JourneyHighlightForm,
    size: 'lg',
    props: {
      item,
      journey: props.journey,
    },
    onClose: handleRefresh,
  })
}
</script>

<style scoped>
:deep(.v-expansion-panels),
:deep(.v-expansion-panel),
:deep(.v-expansion-panel-title),
:deep(.v-expansion-panel__shadow) {
  box-shadow: none !important;
}
</style>
