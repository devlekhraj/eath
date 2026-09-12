<template>
	<v-card>
		<v-card-title class="d-flex align-center justify-space-between py-3">
			<span class="text-subtitle-1 font-weight-bold text-uppercase">Confirm Deletion</span>
			<v-btn icon variant="text" size="small" aria-label="Close dialog" @click="$emit('close')">
				<v-icon>mdi-close</v-icon>
			</v-btn>
		</v-card-title>
		<v-divider />
		<v-card-text class="py-6 text-center">
			<v-icon color="warning" size="56" class="mb-3">mdi-alert-circle-outline</v-icon>
			<div class="text-body-1 font-weight-medium mb-1">Are you sure you want to delete this departure?</div>
			<div class="text-caption text-slate-500">This action cannot be undone. All related departure records will be permanently removed.</div>
		</v-card-text>
		<v-divider />
		<v-card-actions class="justify-end px-4 py-3">
			<v-btn variant="text" @click="emit('close')" :disabled="loading">Cancel</v-btn>
			<v-btn color="error" variant="flat" :loading="loading" @click="handleDelete">
				Confirm Delete
			</v-btn>
		</v-card-actions>
	</v-card>
</template>

<script setup>
import { ref } from 'vue'
import { deleteTrekDeparture } from '@/api/journeys.api'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
	item: {
		type: Object,
		required: true,
	},
	journeyId: {
		type: [String, Number],
		required: true,
	},
})

const emit = defineEmits(['close', 'saved'])
const { showSuccess, showError } = useSnackbar()
const loading = ref(false)

const handleDelete = async () => {
	try {
		loading.value = true
		await deleteTrekDeparture(props.journeyId, props.item.id)
		showSuccess('Departure deleted successfully')
		emit('saved')
		emit('close')
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to delete departure')
		console.error(error)
	} finally {
		loading.value = false
	}
}
</script>
