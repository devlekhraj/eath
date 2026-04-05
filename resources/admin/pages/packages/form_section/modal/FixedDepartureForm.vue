<template>
	<v-card flat>
	<v-card-title class="text-h6 font-semibold">
			{{ isEditMode ? 'Edit Fixed Departure' : 'Add Fixed Departure' }}
		</v-card-title>
		<v-divider />
		<v-card-text>
			<v-form ref="formRef" @submit.prevent="submit">
				<div class="d-flex flex-column gap-3">
					<div class="mb-4" v-if="!isEditMode">
						<v-btn variant="tonal" color="primary" class="" @click="addRow">
							<v-icon start>mdi-plus</v-icon>Add Row
						</v-btn>
					</div>
					<v-row v-for="(row, idx) in departures" :key="idx" dense class="align-center">
						<v-col cols="12" md="3">
						<v-date-input
							v-model="row.start_date"
							class="w-100"
							label="Start Date"
							variant="outlined"
							prepend-icon=""
							density="comfortable"
							:min="minStartIso"
							:rules="[rules.required]"
							:display-value="formatHuman(row.start_date)"
							:menu-props="{ maxWidth: 360, minWidth: 0 }"
						/>
					</v-col>
						<v-col cols="12" md="3">
							<v-date-input
								v-model="row.end_date"
								class="w-100"
								label="End Date"
								prepend-icon=""
								variant="outlined"
								density="comfortable"
								:min="row.start_date || minStartIso"
								:rules="[rules.required, (v) => rules.endAfterStart(v, row.start_date)]"
								:display-value="formatHuman(row.end_date)"
								:menu-props="{ maxWidth: 360, minWidth: 0 }"
							/>
						</v-col>
						<v-col cols="12" md="2">
							<v-text-field v-model="row.total_seat"
						
							type="number" min="0" label="Total Seat" variant="outlined"
								density="comfortable" :rules="[rules.required]" />
						</v-col>
						<v-col cols="12" md="2">
							<v-text-field v-model="row.cost" type="number" min="0" 
						
							label="Cost" prefix="$" variant="outlined"
								density="comfortable" :rules="[rules.required]" />
						</v-col>
						<v-col cols="12" md="2" class="d-flex align-center justify-end" v-if="!isEditMode">
							<v-btn class="mb-5" color="error" size="large" variant="flat" @click="removeRow(idx)" :disabled="departures.length === 1">
								remove
							</v-btn>
						</v-col>
					</v-row>
				</div>
			</v-form>
		</v-card-text>
		<v-card-actions class="justify-end">
			<v-btn variant="text" @click="handleCancel">Cancel</v-btn>
			<v-btn color="primary" size="large" class="px-4" variant="flat" :loading="loading" @click="submit">
				<v-icon start>mdi-content-save</v-icon> Save
			</v-btn>
		</v-card-actions>
	</v-card>
</template>

<script setup>
import { reactive, ref, watch, computed } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { formatHuman, formatYmd } from './utils'
import { saveTrekDepartures, updateTrekDeparture } from '@/api/treks.api'

const emit = defineEmits(['close', 'saved'])

const props = defineProps({
	item: {
		type: Object,
		default: () => ({}),
	},
	travelPackageId: {
		type: [String, Number, null],
		default: null,
	},
	mode: {
		type: String,
		default: 'create',
	},
})

const { showSuccess, showError } = useSnackbar()

const formRef = ref(null)
const loading = ref(false)
const isEditMode = computed(() => props.mode === 'edit')

const departures = reactive([
	{
		start_date: '',
		end_date: '',
		total_seat: '',
		cost: '',
	},
])

const minStartIso = computed(() => {
	const d = new Date()
	return d.toISOString().slice(0, 10)
})

watch(
	() => props.item,
	(val) => {
		if (val && Object.keys(val).length) {
			departures.splice(0, departures.length, {
				start_date: val.start_date || '',
				end_date: val.end_date || '',
				total_seat: val.total_seat ?? val.available_seats ?? '',
				cost: val.cost || '',
			})
		}
	},
	{ immediate: true }
)

const rules = {
	required: (v) => !!v || 'Required',
	endAfterStart: (v, start) => !v || !start || v > start || 'End date must be after start date',
}


const handleCancel = () => {
	emit('close')
	resetRows()
}

const resetRows = () => {
	departures.splice(0, departures.length, {
		start_date: '',
		end_date: '',
		total_seat: '',
		cost: '',
	})
}

const addRow = () => {
	if (isEditMode.value) return
	departures.unshift({
		start_date: '',
		end_date: '',
		total_seat: '',
		cost: '',
	})
}

const removeRow = (idx) => {
	if (departures.length === 1) return
	departures.splice(idx, 1)
}

const submit = async () => {
	const { valid } = await formRef.value.validate()
	if (!valid) return

	try {
		loading.value = true
		if (isEditMode.value) {
			const row = departures[0]
			await updateTrekDeparture(props.travelPackageId, props.item?.id, {
				start_date: formatYmd(row.start_date),
				end_date: formatYmd(row.end_date),
				total_seat: row.total_seat,
				cost: row.cost,
			})
			showSuccess('Fixed departure updated')
		} else {
			const payload = {
				trek_id: props.travelPackageId ?? null,
				departures: departures.map((d) => ({
					...d,
					start_date: formatYmd(d.start_date),
					end_date: formatYmd(d.end_date),
				})),
			}
			console.log('Fixed departure payload:', payload)
			await saveTrekDepartures(props.travelPackageId, payload.departures)
			showSuccess('Fixed departures saved')
		}
		emit('saved')
		emit('close')
	} catch (error) {
		showError(error?.response?.data?.message || 'Unable to save fixed departure')
		console.error(error)
	} finally {
		loading.value = false
	}
}
</script>
