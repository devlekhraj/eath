<template>
  <div class="py-2">
    <div class="mb-4">
      <v-btn
        variant="text"
        color="secondary"
        :to="{ name: 'adminDestinationPage' }"
      >
        <v-icon start size="16">mdi-arrow-left</v-icon>
        Back to Destinations
      </v-btn>
    </div>

    <!-- Loading State -->
    <v-card v-if="loading && !formReady" class="pa-8 text-center">
      <v-progress-circular indeterminate color="primary" size="48" class="mb-4" />
      <div class="text-body-2 text-medium-emphasis">Loading destination details...</div>
    </v-card>

    <!-- Content State -->
    <div v-else-if="formReady">
      <!-- Detail Header Card -->
      <DetailHeader
        :title="destination?.name || 'Untitled Destination'"
        :url="destinationUrl"
        :image-url="headerImageUrl"
        class="mb-6"
      >
        <template #meta>
          <div class="d-flex align-center flex-wrap ga-2 mt-1">
            <v-chip
              size="small"
              label
              class="text-uppercase"
              :color="destination.is_active ? 'success' : 'secondary'"
            >
              {{ destination.is_active ? 'Active' : 'Draft' }}
            </v-chip>

            <v-chip
              v-if="destination.is_featured"
              size="small"
              label
              class="text-uppercase"
              color="primary"
            >
              Featured
            </v-chip>

            <v-chip
              v-if="destination.region_label"
              size="small"
              label
              variant="outlined"
              color="secondary"
            >
              {{ destination.region_label }}
            </v-chip>

            <span class="text-caption text-medium-emphasis ml-2">
              {{ destination.journeys_count ?? 0 }} Assigned Journeys
            </span>
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
          <v-tab value="tab_logistics">
            <v-icon color="primary" start>mdi-compass-outline</v-icon>
            Logistics & Guide
          </v-tab>
          <v-tab value="tab_media">
            <v-icon color="primary" start>mdi-image-multiple-outline</v-icon>
            Media & Visuals
          </v-tab>
          <v-tab value="tab_journeys">
            <v-icon color="primary" start>mdi-map-marker-path</v-icon>
            Journeys ({{ destination.journeys_count ?? destination.journeys?.length ?? 0 }})
          </v-tab>
          <v-tab value="tab_faqs">
            <v-icon color="primary" start>mdi-frequently-asked-questions</v-icon>
            Regional FAQs
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
              :destination="destination"
              @refresh="fetchDestination"
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
      Failed to load destination details. Please return to the list and try again.
    </v-alert>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import DetailHeader from '@/components/DetailHeader.vue'
import TabOverview from './detail_tabs/TabOverview.vue'
import TabLogistics from './detail_tabs/TabLogistics.vue'
import TabMedia from './detail_tabs/TabMedia.vue'
import TabJourneys from './detail_tabs/TabJourneys.vue'
import TabFaqs from './detail_tabs/TabFaqs.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import { getDestinationByIdApi } from '@/http/destinations.http'
import { useSnackbar } from '@/composables/snackbar'

const route = useRoute()
const destinationId = route.params.id || route.query.id
const { showError } = useSnackbar()

const destination = reactive({})
const formReady = ref(false)
const loading = ref(true)
const activeTab = ref('tab_overview')

const tabComponents = {
  tab_overview: TabOverview,
  tab_logistics: TabLogistics,
  tab_media: TabMedia,
  tab_journeys: TabJourneys,
  tab_faqs: TabFaqs,
  tab_seo: TabSeo,
}

const activeTabComponent = computed(() => tabComponents[activeTab.value] || TabOverview)

const publicBaseUrl = window?.location?.origin ?? ''
const destinationUrl = computed(() => {
  if (!destination?.slug) return ''
  return `${publicBaseUrl}/destinations/${destination.slug}`
})

const headerImageUrl = computed(() => {
  return destination?.card_image?.url || destination?.hero_image?.url || ''
})

async function fetchDestination() {
  if (!destinationId) return
  try {
    loading.value = true
    const resp = await getDestinationByIdApi(destinationId)
    const data = resp.data?.data ?? resp.data ?? {}
    Object.assign(destination, data)
    formReady.value = true
  } catch (err) {
    console.error('Failed to fetch destination details:', err)
    showError('Failed to load destination details')
    formReady.value = false
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchDestination()
})
</script>
