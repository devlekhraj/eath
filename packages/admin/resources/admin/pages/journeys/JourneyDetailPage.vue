<template>
  <div class="py-2">
    <div class="mb-4">
      <v-btn
        variant="text"
        color="secondary"
        :to="{ name: 'adminJourneyPage' }"
      >
        <v-icon start size="16">mdi-arrow-left</v-icon>
        Back to Journeys
      </v-btn>
    </div>

    <!-- Loading State -->
    <v-card v-if="loading && !formReady" class="pa-8 text-center">
      <v-progress-circular indeterminate color="primary" size="48" class="mb-4" />
      <div class="text-body-2 text-medium-emphasis">Loading journey details...</div>
    </v-card>

    <!-- Content State -->
    <div v-else-if="formReady">
      <!-- Detail Header Card -->
      <DetailHeader
        :title="journey?.name || 'Untitled Journey'"
        :url="journeyUrl"
        :image-url="headerImageUrl"
        class="mb-6"
      >
        <template #meta>
          <div class="d-flex align-center flex-wrap ga-2 mt-1">
            <v-chip
              size="small"
              label
              class="text-uppercase"
              :color="journey.is_active ? 'success' : 'secondary'"
            >
              {{ journey.is_active ? 'Active' : 'Draft' }}
            </v-chip>

            <v-chip
              v-if="journey.is_featured"
              size="small"
              label
              class="text-uppercase"
              color="primary"
            >
              Featured
            </v-chip>

            <v-chip
              v-if="journey.destination?.name"
              size="small"
              label
              variant="outlined"
              color="secondary"
            >
              {{ journey.destination.name }}
            </v-chip>

            <v-chip
              v-if="journey.duration_days"
              size="small"
              label
              variant="tonal"
              color="primary"
            >
              {{ journey.duration_days }} Days / {{ journey.duration_nights ?? 0 }} Nights
            </v-chip>

            <v-chip
              v-if="journey.price || journey.price_minor"
              size="small"
              label
              variant="tonal"
              color="success"
            >
              ${{ journey.price ?? (journey.price_minor ? journey.price_minor / 100 : 0) }}
            </v-chip>
          </div>
        </template>
      </DetailHeader>

      <!-- Main Tabs Section -->
      <v-card>
        <v-tabs v-model="activeTab" color="primary">
          <v-tab value="tab_overview">
            <v-icon color="primary" start>mdi-view-dashboard-outline</v-icon>
            Overview & Content
          </v-tab>
          <v-tab value="tab_itinerary">
            <v-icon color="primary" start>mdi-map-marker-path</v-icon>
            Itinerary & Highlights ({{ journey.itinerary_days?.length ?? 0 }})
          </v-tab>
          <v-tab value="tab_pricing">
            <v-icon color="primary" start>mdi-currency-usd</v-icon>
            Pricing & Services
          </v-tab>
          <v-tab value="tab_departures">
            <v-icon color="primary" start>mdi-calendar-clock</v-icon>
            Departures ({{ journey.departures?.length ?? 0 }})
          </v-tab>
          <v-tab value="tab_media">
            <v-icon color="primary" start>mdi-image-multiple-outline</v-icon>
            Media & Visuals
          </v-tab>
          <v-tab value="tab_faqs">
            <v-icon color="primary" start>mdi-frequently-asked-questions</v-icon>
            FAQs
          </v-tab>
          <v-tab value="tab_seo">
            <v-icon color="primary" start>mdi-google</v-icon>
            SEO & Meta
          </v-tab>
        </v-tabs>

        <v-divider />

        <div class="pa-6" style="min-height: 500px;">
          <KeepAlive>
            <component
              :is="activeTabComponent"
              :journey="journey"
              @refresh="fetchJourney"
            />
          </KeepAlive>
        </div>
      </v-card>
    </div>

    <!-- Error State -->
    <v-alert
      v-else
      type="error"
      variant="tonal"
      class="mt-4"
    >
      Failed to load journey details. Please return to the list and try again.
    </v-alert>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import DetailHeader from '@/components/DetailHeader.vue'
import TabOverview from './detail_tabs/TabOverview.vue'
import TabItinerary from './detail_tabs/TabItinerary.vue'
import TabPricing from './detail_tabs/TabPricing.vue'
import TabDepartures from './detail_tabs/TabDepartures.vue'
import TabMedia from './detail_tabs/TabMedia.vue'
import TabFaqs from './detail_tabs/TabFaqs.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import { getJourney } from '@/api/journeys.api'
import { useSnackbar } from '@/composables/snackbar'

const route = useRoute()
const journeyId = computed(() => route.params.id || route.query.id)
const { showError } = useSnackbar()

const journey = reactive({})
const formReady = ref(false)
const loading = ref(true)
const activeTab = ref('tab_overview')

const tabComponents = {
  tab_overview: TabOverview,
  tab_itinerary: TabItinerary,
  tab_pricing: TabPricing,
  tab_departures: TabDepartures,
  tab_media: TabMedia,
  tab_faqs: TabFaqs,
  tab_seo: TabSeo,
}

const activeTabComponent = computed(() => tabComponents[activeTab.value] || TabOverview)

const publicBaseUrl = window?.location?.origin ?? ''
const journeyUrl = computed(() => {
  if (!journey?.slug) return ''
  return `${publicBaseUrl}/journeys/${journey.slug}`
})

const headerImageUrl = computed(() => {
  return journey?.card_image?.url || journey?.hero_image?.url || ''
})

async function fetchJourney() {
  const id = journeyId.value
  if (!id) return

  try {
    loading.value = true
    const resp = await getJourney(id)
    const data = resp.data?.data ?? resp.data ?? {}
    Object.assign(journey, data)
    formReady.value = true
  } catch (err) {
    console.error('Failed to fetch journey details:', err)
    showError('Failed to load journey details')
    formReady.value = false
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchJourney()
})
</script>
