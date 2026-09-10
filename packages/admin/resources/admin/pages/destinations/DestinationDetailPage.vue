<template>
	<div>
		<div>
			<!-- Tabs Section -->
			<v-card class="mb-6 mt-2">
				<DetailHeader
					:title="destination?.name || ''"
					:url="destinationUrl"
					:image-url="firstImageUrl"
				>
					<template #meta>
						Total treks: {{ destination?.treks_count ?? 0 }}
					</template>
				</DetailHeader>
				<v-tabs v-model="activeTab" color="primary">
					<v-tab value="tab_overview">
						<v-icon color="primary" start>mdi-lightbulb-outline</v-icon>
						Overview
					</v-tab>
					<v-tab value="tab_description">
						<v-icon color="primary" start>mdi-map-check-outline</v-icon>
						Description
					</v-tab>
					<v-tab value="tab_gallery">
						<v-icon color="primary" start>mdi-image-multiple</v-icon>
						Gallery
					</v-tab>
					<v-tab value="tab_seo">
						<v-icon color="primary" start>mdi-currency-usd</v-icon>
						SEO
					</v-tab>
				</v-tabs>
				<v-divider />
				<div class="pa-4 pt-14" style="min-height: calc(100vh - 300px);">
					<component v-if="formReady" :is="activeTabComponent" :destination="destination"
						v-on="activeTabListeners" />
				</div>
			</v-card>
		</div>


	</div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import TabOverview from './detail_tabs/TabOverview.vue'
import TabGallery from './detail_tabs/TabGallery.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import TabDescription from './detail_tabs/TabDescription.vue'
import DetailHeader from '@/components/DetailHeader.vue'


// Get destination ID from route
const route = useRoute()
const destinationId = route.params.id || route.query.id

// Reactive state
const destination = reactive({})
const formReady = ref(false)
const activeTab = ref('tab_overview')

const tabComponents = {
	tab_overview: TabOverview,
	tab_gallery: TabGallery,
	tab_seo: TabSeo,
	tab_description: TabDescription,
}

const activeTabComponent = computed(() => tabComponents[activeTab.value] || TabOverview)

const activeTabListeners = {
	refresh: fetchDestination,
}
const publicBaseUrl = window?.location?.origin ?? ''
const destinationUrl = computed(() => {
	if (!destination?.slug) return ''
	return `${publicBaseUrl}/destinations/${destination.slug}`
})
const firstImageUrl = computed(() => destination?.images?.[0]?.url || '')

// Fetch single destination
async function fetchDestination() {
	try {
		if (!destinationId) return
		const { data } = await http.get(`/admin/destinations/${destinationId}`)
		Object.assign(destination, data?.data ?? data)
		formReady.value = true
	} catch (err) {
		console.error('Failed to fetch destination:', err)
		formReady.value = false
	}
}


// Fetch on load
onMounted(() => {
	if (destinationId) fetchDestination()
})
</script>
