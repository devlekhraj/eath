<template>
	<v-container>
		<v-row>
			<v-col cols="12" md="10" offset-md="1">

				<div>
					<FormDescription v-if="formReady" :travelPackage="travelPackage" @refresh="fetchPackage" />
				</div>

				<div>
					<FormPackageItinery v-if="formReady" :travelPackage="travelPackage" @refresh="fetchPackage" />
				</div>
				
				<div>
					<FormPackageInclude v-if="formReady" :travelPackage="travelPackage" @refresh="fetchPackage" />
				</div>
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

// Get package ID from route
const route = useRoute()
const packageId = route.query.id

// Reactive state
const travelPackage = reactive({})
const formReady = ref(false)

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
