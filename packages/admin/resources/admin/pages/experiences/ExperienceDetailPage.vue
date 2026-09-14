<template>
  <div class="py-2">
    <div class="mb-4">
      <v-btn
        variant="text"
        color="secondary"
        :to="{ name: 'adminExperiencePage' }"
      >
        <v-icon start size="16">mdi-arrow-left</v-icon>
        Back to Experiences
      </v-btn>
    </div>

    <!-- Loading State -->
    <v-card v-if="loading && !formReady" class="pa-8 text-center">
      <v-progress-circular indeterminate color="primary" size="48" class="mb-4" />
      <div class="text-body-2 text-medium-emphasis">Loading experience details...</div>
    </v-card>

    <!-- Content State -->
    <div v-else-if="formReady">
      <!-- Detail Header Card -->
      <DetailHeader
        :title="experience?.name || 'Untitled Experience'"
        :url="experienceUrl"
        :image-url="headerImageUrl"
        class="mb-6"
      >
        <template #meta>
          <div class="d-flex align-center flex-wrap ga-2 mt-1">
            <v-chip
              size="small"
              label
              class="text-uppercase"
              :color="experience.is_active ? 'success' : 'secondary'"
            >
              {{ experience.is_active ? 'Active' : 'Draft' }}
            </v-chip>

            <v-chip
              v-if="experience.is_featured"
              size="small"
              label
              class="text-uppercase"
              color="primary"
            >
              Featured
            </v-chip>

            <span class="text-caption text-medium-emphasis ml-2">
              {{ experience.journeys_count ?? experience.journeys?.length ?? 0 }} Assigned Journeys
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
          <v-tab value="tab_highlights">
            <v-icon color="primary" start>mdi-star-outline</v-icon>
            Highlights & Prep
          </v-tab>
          <v-tab value="tab_media">
            <v-icon color="primary" start>mdi-image-multiple-outline</v-icon>
            Media & Visuals
          </v-tab>
          <v-tab value="tab_journeys">
            <v-icon color="primary" start>mdi-map-marker-path</v-icon>
            Journeys ({{ experience.journeys_count ?? experience.journeys?.length ?? 0 }})
          </v-tab>
          <v-tab value="tab_faqs">
            <v-icon color="primary" start>mdi-frequently-asked-questions</v-icon>
            Experience FAQs
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
              :experience="experience"
              @refresh="fetchExperience"
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
      Failed to load experience details. Please return to the list and try again.
    </v-alert>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import DetailHeader from '@/components/DetailHeader.vue'
import TabOverview from './detail_tabs/TabOverview.vue'
import TabHighlights from './detail_tabs/TabHighlights.vue'
import TabMedia from './detail_tabs/TabMedia.vue'
import TabJourneys from './detail_tabs/TabJourneys.vue'
import TabFaqs from './detail_tabs/TabFaqs.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import { getExperienceByIdApi } from '@/http/experiences.http'
import { useSnackbar } from '@/composables/snackbar'

const route = useRoute()
const experienceId = route.params.id || route.query.id
const { showError } = useSnackbar()

const experience = reactive({})
const formReady = ref(false)
const loading = ref(true)
const activeTab = ref('tab_overview')

const tabComponents = {
  tab_overview: TabOverview,
  tab_highlights: TabHighlights,
  tab_media: TabMedia,
  tab_journeys: TabJourneys,
  tab_faqs: TabFaqs,
  tab_seo: TabSeo,
}

const activeTabComponent = computed(() => tabComponents[activeTab.value] || TabOverview)

const publicBaseUrl = window?.location?.origin ?? ''
const experienceUrl = computed(() => {
  if (!experience?.slug) return ''
  return `${publicBaseUrl}/experiences/${experience.slug}`
})

const headerImageUrl = computed(() => {
  return experience?.media?.card?.url || experience?.media?.hero?.url || experience?.card_image?.url || experience?.hero_image?.url || ''
})

async function fetchExperience() {
  if (!experienceId) return
  try {
    loading.value = true
    const resp = await getExperienceByIdApi(experienceId)
    const data = resp.data?.data ?? resp.data ?? {}
    Object.assign(experience, data)
    formReady.value = true
  } catch (err) {
    console.error('Failed to fetch experience details:', err)
    showError('Failed to load experience details')
    formReady.value = false
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchExperience()
})
</script>
