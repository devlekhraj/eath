<template>
	<v-card flat>
		<v-card-title class="text-h6 font-semibold py-4">
			Confirm Deletion
		</v-card-title>
		<v-divider />
		<v-card-text class="py-6 text-center">
			<v-icon color="warning" size="64" class="mb-4">mdi-alert-circle-outline</v-icon>
			<div class="text-body-1 font-weight-medium mb-1">Are you sure you want to delete this departure?</div>
			<div class="text-caption text-slate-500">This action cannot be undone. All related data will be permanently removed.</div>
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
import { deleteTrekDeparture } from '@/api/treks.api'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
	item: {
		type: Object,
		required: true,
	},
	travelPackageId: {
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
		await deleteTrekDeparture(props.travelPackageId, props.item.id)
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
