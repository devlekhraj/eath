<template>
	<div class="px-0">
		<v-row>
			<v-col cols="12">

				<DetailHeader
					v-if="formReady"
					:title="journeyTitle"
					:url="journeyUrl"
					:image-url="journeyImageUrl"
				>
					<template #meta>
						<v-chip size="small" color="primary" variant="tonal" label>
							{{ journey?.destination?.name || '-' }}
						</v-chip>
					</template>
				</DetailHeader>
				<!-- Tabs Section -->
				<v-card class="mb-6">
					<v-tabs v-model="activeTab" color="primary">
						<v-tab v-for="tab in tabs" :key="tab.value" :value="tab.value">
							<v-icon color="primary" start>{{ tab.icon }}</v-icon>
							{{ tab.label }}
						</v-tab>
					</v-tabs>


					<v-divider />

					<v-card-text>
						<KeepAlive v-if="formReady && activeComponent">
							<component
								:is="activeComponent"
								:key="activeTab"
								:journey="journey"
								@refresh="fetchJourney"
							/>
						</KeepAlive>
					</v-card-text>
				</v-card>

			</v-col>
		</v-row>
	</div>
</template>

<script setup>
import { computed, reactive, ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import DetailHeader from '@/components/DetailHeader.vue'

import JourneyOverviewForm from './form_section/JourneyOverviewForm.vue'
import JourneyDescriptionForm from './form_section/JourneyDescriptionForm.vue'
import JourneyItineraryForm from './form_section/JourneyItineraryForm.vue'
import JourneyIncludeForm from './form_section/JourneyIncludeForm.vue'
import JourneyHighlightsForm from './form_section/JourneyHighlightsForm.vue'
import JourneyGalleryForm from './form_section/JourneyGalleryForm.vue'
import JourneyPricingForm from './form_section/JourneyPricingForm.vue'
import JourneyFixedDepartureForm from './form_section/JourneyFixedDepartureForm.vue'
import { getJourney } from '@/http/journeys.http'

// Get journey ID from route
const route = useRoute()
const journeyId = route.query.id

// Reactive state
const journey = reactive({})
const formReady = ref(false)
const activeTab = ref('overview')
const tabs = [
	{ value: 'overview', label: 'Overview', icon: 'mdi-view-dashboard-outline' },
	{ value: 'description', label: 'Description', icon: 'mdi-lightbulb-outline' },
	{ value: 'highlight', label: 'Highlights', icon: 'mdi-lightbulb-outline' },
	{ value: 'itinerary', label: 'Itinerary', icon: 'mdi-map-check-outline' },
	{ value: 'price_list', label: 'Price List', icon: 'mdi-currency-usd' },
	{ value: 'includes', label: 'Includes', icon: 'mdi-checkbox-marked-circle-outline' },
	{ value: 'gallery', label: 'Gallery', icon: 'mdi-image-multiple' },
	{ value: 'fixed_departure', label: 'Fixed Departure', icon: 'mdi-calendar-clock' },
]
const tabComponents = {
	overview: JourneyOverviewForm,
	description: JourneyDescriptionForm,
	highlight: JourneyHighlightsForm,
	itinerary: JourneyItineraryForm,
	price_list: JourneyPricingForm,
	includes: JourneyIncludeForm,
	gallery: JourneyGalleryForm,
	fixed_departure: JourneyFixedDepartureForm,
}
const activeComponent = computed(() => tabComponents[activeTab.value] || null)
const publicBaseUrl = window?.location?.origin ?? ''
const journeyTitle = computed(() => journey?.name || '')
const journeyUrl = computed(() => {
	if (!journey?.slug) return ''
	return `${publicBaseUrl}/journeys/${journey.slug}`
})
const journeyImageUrl = computed(() =>
	journey?.thumb
	|| journey?.cover_image
	|| journey?.featured_image
	|| journey?.galleries?.[0]?.url
	|| journey?.images?.[0]?.url
	|| ''
)

// Fetch single journey
async function fetchJourney() {
	try {
		const { data } = await getJourney(journeyId)
		Object.assign(journey, data)
		formReady.value = true
	} catch (err) {
		console.error('Failed to fetch journey:', err)
		formReady.value = false
	}
}


// Fetch on load
onMounted(() => {
	if (journeyId) fetchJourney()
})
</script>
