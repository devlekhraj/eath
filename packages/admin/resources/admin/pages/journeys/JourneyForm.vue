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

import FormOverview from './form_section/FormOverview.vue'
import FormDescription from './form_section/FormDescription.vue'
import FormPackageItinery from './form_section/FormPackageItinery.vue'
import FormPackageInclude from './form_section/FormInclude.vue'
import FormHighlights from './form_section/FormHighlights.vue'
import FormPackageGallery from './form_section/FormPackageGallery.vue'
import FormPricing from './form_section/FormPricing.vue'
import FormFixedDeparture from './form_section/FormFixedDeparture.vue'
import { getJourney } from '@/api/journeys.api'

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
	overview: FormOverview,
	description: FormDescription,
	highlight: FormHighlights,
	itinerary: FormPackageItinery,
	price_list: FormPricing,
	includes: FormPackageInclude,
	// banners: FormPackageBanner,
	gallery: FormPackageGallery,
	fixed_departure: FormFixedDeparture,
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
