<template>
	<v-container>
		<v-row>
			<v-col cols="12" md="10" offset-md="1">

				<div>
					<FormDescription v-if="formReady" :travelPackage="travelPackage" @refresh="fetchPackage" />
				</div>
				<!-- Tabs Section -->
				<v-card elevation="0" class="mb-6">
					<v-tabs v-model="activeTab" color="primary">
						<v-tab value="highlight">
							<v-icon color="primary" start>mdi-lightbulb-outline</v-icon>
							Highlights
						</v-tab>
						<v-tab value="itinerary">
							<v-icon color="primary" start>mdi-map-check-outline</v-icon>
							Itinerary
						</v-tab>
						<v-tab value="price_list">
							<v-icon color="primary" start>mdi-currency-usd</v-icon>
							Price List
						</v-tab>
						<v-tab value="includes">
							<v-icon color="primary" start>mdi-checkbox-marked-circle-outline</v-icon>
							Includes
						</v-tab>
						<v-tab value="banners">
							<v-icon color="primary" start>mdi-image</v-icon>
							Banners
						</v-tab>
						<v-tab value="gallery">
							<v-icon color="primary" start>mdi-image-multiple</v-icon>
							Gallery
						</v-tab>
					</v-tabs>


					<v-divider></v-divider>

					<v-card-text>
						<!-- Bio Tab -->
						<div v-if="activeTab === 'highlight'">
							<div>
								<FormHighlights v-if="formReady" :travelPackage="travelPackage"
									@refresh="fetchPackage" />
							</div>
						</div>
						<div v-if="activeTab === 'itinerary'">
							<div>
								<FormPackageItinery v-if="formReady" :travelPackage="travelPackage"
									@refresh="fetchPackage" />
							</div>
						</div>
						<div v-if="activeTab === 'price_list'">
							<div>
								<FormPricing v-if="formReady" :travelPackage="travelPackage" @refresh="fetchPackage" />
							</div>
						</div>
						<div v-if="activeTab === 'includes'">
							<div>
								<FormPackageInclude v-if="formReady" :travelPackage="travelPackage"
									@refresh="fetchPackage" />
							</div>
						</div>
						<div v-if="activeTab === 'banners'">
							<div>
								<FormPackageBanner v-if="formReady" :travelPackage="travelPackage"
									@refresh="fetchPackage" />
							</div>
						</div>
						<div v-if="activeTab === 'gallery'">
							<div>
								<FormPackageGallery v-if="formReady" :travelPackage="travelPackage"
									@refresh="fetchPackage" />
							</div>
						</div>
					</v-card-text>
				</v-card>

			</v-col>
		</v-row>
	</v-container>
</template>

<script setup>
import { reactive, ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

import FormDescription from './form_section/FormDescription.vue'
import FormPackageItinery from './form_section/FormPackageItinery.vue'
import FormPackageInclude from './form_section/FormInclude.vue'
import FormHighlights from './form_section/FormHighlights.vue'
import FormPackageGallery from './form_section/FormPackageGallery.vue'
import FormPackageBanner from './form_section/FormPackageBanner.vue'
import FormPricing from './form_section/FormPricing.vue'

// Get package ID from route
const route = useRoute()
const packageId = route.query.id

// Reactive state
const travelPackage = reactive({})
const formReady = ref(false)
const activeTab = ref('highlight')

// Fetch single travel package
async function fetchPackage() {
	try {
		const { data } = await axios.get(`/admin/travel-packages/${packageId}`)
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
