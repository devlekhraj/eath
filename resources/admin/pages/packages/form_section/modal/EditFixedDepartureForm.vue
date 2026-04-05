<template>
	<v-card flat>
		<v-card-title class="text-h6 font-semibold">
			Edit Fixed Departure
		</v-card-title>
		<v-divider />
		<v-card-text class="px-14 pt-10">
			<v-form ref="formRef" @submit.prevent="submit">
				<v-row dense class="align-center">
					<v-col cols="12" md="6">
						<v-date-input
							v-model="formData.start_date"
							class="w-100"
							label="Start Date"
							variant="outlined"
							prepend-icon=""
							density="comfortable"
							:min="minStartIso"
							:rules="[rules.required]"
							:display-value="formatHuman(formData.start_date)"
							:menu-props="{ maxWidth: 360, minWidth: 0 }"
						/>
					</v-col>
					<v-col cols="12" md="6">
						<v-date-input
							v-model="formData.end_date"
							class="w-100"
							label="End Date"
							prepend-icon=""
							variant="outlined"
							density="comfortable"
							:min="formData.start_date || minStartIso"
							:rules="[rules.required, (v) => rules.endAfterStart(v, formData.start_date)]"
							:display-value="formatHuman(formData.end_date)"
							:menu-props="{ maxWidth: 360, minWidth: 0 }"
						/>
					</v-col>
					<v-col cols="12" md="6">
						<v-text-field
							v-model="formData.total_seat"
							type="number"
							min="0"
							label="Total Seat"
							variant="outlined"
							density="comfortable"
							:rules="[rules.required]"
						/>
					</v-col>
					<v-col cols="12" md="6">
						<v-text-field
							v-model="formData.cost"
							type="number"
							min="0"
							label="Cost"
							prefix="$"
							variant="outlined"
							density="comfortable"
							:rules="[rules.required]"
						/>
					</v-col>
					<v-col cols="12" md="6">
						<v-select
							v-model="formData.status"
							:items="statusOptions"
							label="Status"
							variant="outlined"
							density="comfortable"
							:rules="[rules.required]"
						/>
					</v-col>
				</v-row>
			</v-form>
		</v-card-text>
		<v-card-actions class="justify-end">
			<v-btn variant="text" @click="emit('close')">Cancel</v-btn>
			<v-btn color="primary" class="px-4" variant="flat" :loading="loading" @click="submit">
				<v-icon start>mdi-content-save</v-icon> Save Changes
			</v-btn>
		</v-card-actions>
	</v-card>
</template>

<script setup>
import { reactive, ref, computed } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { formatHuman, formatYmd } from './utils'
import { updateTrekDeparture } from '@/api/treks.api'

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

const formRef = ref(null)
const loading = ref(false)

const formData = reactive({
	start_date: props.item.start_date || '',
	end_date: props.item.end_date || '',
	total_seat: props.item.total_seat ?? props.item.available_seats ?? '',
	cost: props.item.cost || '',
	status: props.item.status || 'active',
})

const statusOptions = [
	{ title: 'Active', value: 'active' },
	{ title: 'Inactive', value: 'inactive' },
]

const minStartIso = computed(() => {
	const d = new Date()
	return d.toISOString().slice(0, 10)
})

const rules = {
	required: (v) => !!v || 'Required',
	endAfterStart: (v, start) => !v || !start || v > start || 'End date must be after start date',
}

const submit = async () => {
	const { valid } = await formRef.value.validate()
	if (!valid) return

	try {
		loading.value = true
		await updateTrekDeparture(props.travelPackageId, props.item.id, {
			start_date: formatYmd(formData.start_date),
			end_date: formatYmd(formData.end_date),
			total_seat: formData.total_seat,
			cost: formData.cost,
			status: formData.status,
		})
		showSuccess('Fixed departure updated')
		emit('saved')
		emit('close')
	} catch (error) {
		showError(error?.response?.data?.message || 'Unable to update fixed departure')
		console.error(error)
	} finally {
		loading.value = false
	}
}
</script>
