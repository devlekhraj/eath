<template>
	<v-card>
		<v-card-title class="d-flex align-center justify-space-between py-0">
			<span class="text-subtitle-1 font-weight-bold text-uppercase">Edit Fixed Departure</span>
			<v-btn icon variant="text" aria-label="Close dialog" @click="$emit('close')">
				<v-icon>mdi-close</v-icon>
			</v-btn>
		</v-card-title>
        <v-divider />
		<v-card-text class="pa-6">
			<v-form ref="formRef" @submit.prevent="submit">
				<v-row dense class="align-center">
					<v-col cols="12" md="6">
						<v-date-input
							v-model="formData.start_date"
							class="w-100"
							label="Start Date"
							prepend-icon=""
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
							:min="formData.start_date || minStartIso"
							:rules="[rules.required, (v) => rules.endAfterStart(v, formData.start_date)]"
							:display-value="formatHuman(formData.end_date)"
							:menu-props="{ maxWidth: 360, minWidth: 0 }"
						/>
					</v-col>
					<v-col cols="12" md="4">
						<div class="mb-2">
    						<v-text-field
    							v-model="formData.total_seat"
    							type="number"
    							min="0"
    							label="Total Seats"
    							:rules="[rules.required]"
    						/>
						</div>
					</v-col>
					<v-col cols="12" md="4">
						<div class="mb-2">
    						<v-text-field
    							v-model="formData.available_seats"
    							type="number"
    							min="0"
    							label="Available Seats"
    						/>
						</div>
					</v-col>
					<v-col cols="12" md="4">
						<div class="mb-2">
    						<v-text-field
    							v-model="formData.cost"
    							type="number"
    							min="0"
    							label="Cost ($)"
    							prefix="$"
    							:rules="[rules.required]"
    						/>
						</div>
					</v-col>
					<v-col cols="12" md="6">
						<div class="mb-2">
    						<v-select
    							v-model="formData.status"
    							:items="statusOptions"
    							label="Status"
    							:rules="[rules.required]"
    						/>
						</div>
					</v-col>
					<v-col cols="12" md="6">
						<div class="mb-2">
    						<v-text-field
    							v-model="formData.code"
    							label="Departure Code (optional)"
    							placeholder="e.g. DEP-2026-10"
    						/>
						</div>
					</v-col>
					<v-col cols="12">
						<div class="mb-2">
    						<v-textarea
    							v-model="formData.notes"
    							label="Notes / Special Instructions"
    							rows="2"
    						/>
						</div>
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
import { formatHuman, formatYmd } from '@/utils/utils'
import { updateTrekDeparture } from '@/http/journeys.http'

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

const formRef = ref(null)
const loading = ref(false)

const normalizeInitialStatus = (val) => {
	if (val === 'active') return 'open'
	if (val === 'inactive') return 'closed'
	return val || 'open'
}

const formData = reactive({
	start_date: props.item.start_date || '',
	end_date: props.item.end_date || '',
	total_seat: props.item.total_seats ?? props.item.total_seat ?? '',
	available_seats: props.item.available_seats ?? props.item.total_seats ?? props.item.total_seat ?? '',
	cost: props.item.cost ?? (props.item.price_minor !== undefined && props.item.price_minor !== null ? props.item.price_minor / 100 : ''),
	status: normalizeInitialStatus(props.item.status),
	code: props.item.code || '',
	notes: props.item.notes || '',
})

const statusOptions = [
	{ title: 'Open', value: 'open' },
	{ title: 'Limited', value: 'limited' },
	{ title: 'Full', value: 'full' },
	{ title: 'Closed', value: 'closed' },
	{ title: 'Cancelled', value: 'cancelled' },
]

const minStartIso = computed(() => {
	const d = new Date()
	return d.toISOString().slice(0, 10)
})

const rules = {
	required: (v) => !!v || 'Required',
	endAfterStart: (v, start) => !v || !start || v >= start || 'End date must be on or after start date',
}

const submit = async () => {
	const { valid } = await formRef.value.validate()
	if (!valid) return

	try {
		loading.value = true
		await updateTrekDeparture(props.journeyId, props.item.id, {
			start_date: formatYmd(formData.start_date),
			end_date: formatYmd(formData.end_date),
			total_seats: Number(formData.total_seat) || null,
			total_seat: Number(formData.total_seat) || null,
			available_seats: formData.available_seats !== '' ? Number(formData.available_seats) : null,
			cost: Number(formData.cost) || 0,
			price_minor: Math.round((Number(formData.cost) || 0) * 100),
			status: formData.status,
			code: formData.code || null,
			notes: formData.notes || null,
		})
		showSuccess('Fixed departure updated successfully')
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
