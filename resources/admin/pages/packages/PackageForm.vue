<template>
	<div class="px-0">
		<v-row>
			<v-col cols="12">

				<DetailHeader
					v-if="formReady"
					:title="packageTitle"
					:url="travelPackage?.full_url ? travelPackage.full_url : ''"
					:image-url="packageImageUrl"
				>
					<template #meta>
						<v-chip size="small" color="primary" variant="tonal" label>
							{{ travelPackage?.destination?.name || '-' }}
						</v-chip>
					</template>
				</DetailHeader>
				<!-- Tabs Section -->
				<v-card elevation="0" class="mb-6">
					<v-tabs v-model="activeTab" color="primary">
						<v-tab v-for="tab in tabs" :key="tab.value" :value="tab.value">
							<v-icon color="primary" start>{{ tab.icon }}</v-icon>
							{{ tab.label }}
						</v-tab>
					</v-tabs>


					<v-divider></v-divider>

					<v-card-text>
						<KeepAlive v-if="formReady && activeComponent">
							<component
								:is="activeComponent"
								:key="activeTab"
								:travelPackage="travelPackage"
								@refresh="fetchPackage"
							/>
						</KeepAlive>
					</v-card-text>
				</v-card>

			</v-col>
		</v-row>
	</div>
</template>

<script setup>
import http from '@/http.config'
import { computed, reactive, ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import DetailHeader from '@/components/DetailHeader.vue'

import FormOverview from './form_section/FormOverview.vue'
import FormDescription from './form_section/FormDescription.vue'
import FormPackageItinery from './form_section/FormPackageItinery.vue'
import FormPackageInclude from './form_section/FormInclude.vue'
import FormHighlights from './form_section/FormHighlights.vue'
import FormPackageGallery from './form_section/FormPackageGallery.vue'
// import FormPackageBanner from './form_section/FormPackageBanner.vue'
import FormPricing from './form_section/FormPricing.vue'
import FormFixedDeparture from './form_section/FormFixedDeparture.vue'

// Get package ID from route
const route = useRoute()
const packageId = route.query.id

// Reactive state
const travelPackage = reactive({})
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
const packageTitle = computed(() => travelPackage?.name || '')
const packageUrl = computed(() => {
	if (!travelPackage?.full_url?.slug || !travelPackage?.slug) return ''
	return `${publicBaseUrl}/treks/${travelPackage.full_url.slug}/${travelPackage.slug}`
})
const packageImageUrl = computed(() =>
	travelPackage?.thumb
	|| travelPackage?.cover_image
	|| travelPackage?.featured_image
	|| travelPackage?.galleries?.[0]?.url
	|| travelPackage?.images?.[0]?.url
	|| ''
)

// Fetch single travel package
async function fetchPackage() {
	try {
		const { data } = await http.get(`/admin/travel-packages/${packageId}`)
		Object.assign(travelPackage, data)
		formReady.value = true
	} catch (err) {
		console.error('Failed to fetch package:', err)
		formReady.value = false
	}
}


// Fetch on load
onMounted(() => {
	if (packageId) fetchPackage()
})
</script>
