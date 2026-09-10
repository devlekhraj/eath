<template>
	<v-card>
		<v-card-title class="d-flex align-center justify-space-between py-0">
            Add Fixed Departure
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />
		<v-card-text>
			<v-form ref="formRef" @submit.prevent="submit">
				<div class="d-flex flex-column gap-3">
					<div class="mb-4">
						<v-btn variant="tonal" color="primary" @click="addRow">
							<v-icon start>mdi-plus</v-icon>Add Row
						</v-btn>
					</div>
					<v-row v-for="(row, idx) in departures" :key="idx" dense class="align-center">
						<v-col cols="12" md="3">
							<v-date-input v-model="row.start_date" class="w-100" label="Start Date" prepend-icon="" :min="minStartIso" :rules="[rules.required]" :display-value="formatHuman(row.start_date)" :menu-props="{ maxWidth: 360, minWidth: 0 }" />
						</v-col>
						<v-col cols="12" md="3">
							<v-date-input v-model="row.end_date" class="w-100" label="End Date" prepend-icon="" :min="row.start_date || minStartIso" :rules="[rules.required, (v) => rules.endAfterStart(v, row.start_date)]"
								:display-value="formatHuman(row.end_date)"
								:menu-props="{ maxWidth: 360, minWidth: 0 }"
							/>
						</v-col>
						<v-col cols="12" md="2">
							<v-text-field v-model="row.total_seat" type="number" min="0" label="Total Seat" :rules="[rules.required]" />
						</v-col>
						<v-col cols="12" md="2">
							<v-text-field v-model="row.cost" type="number" min="0" label="Cost" prefix="$" :rules="[rules.required]" />
						</v-col>
						<v-col cols="12" md="2" class="d-flex align-center justify-end">
							<v-btn class="mb-5" color="error" variant="flat" @click="removeRow(idx)" :disabled="departures.length === 1">
								remove
							</v-btn>
						</v-col>
					</v-row>
				</div>
			</v-form>
		</v-card-text>
		<v-card-actions class="justify-end">
			<v-btn variant="text" @click="handleCancel">Cancel</v-btn>
			<v-btn color="primary" class="px-4" variant="flat" :loading="loading" @click="submit">
				<v-icon start>mdi-content-save</v-icon> Save Departures
			</v-btn>
		</v-card-actions>
	</v-card>
</template>

<script setup>
import { reactive, ref, computed } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { formatHuman, formatYmd } from './utils'
import { saveTrekDepartures } from '@/api/treks.api'

const emit = defineEmits(['close', 'saved'])

const props = defineProps({
	travelPackageId: {
		type: [String, Number, null],
		default: null,
	},
})

const { showSuccess, showError } = useSnackbar()

const formRef = ref(null)
const loading = ref(false)

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

const rules = {
	required: (v) => !!v || 'Required',
	endAfterStart: (v, start) => !v || !start || v > start || 'End date must be after start date',
}

const handleCancel = () => {
	emit('close')
}

const addRow = () => {
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
		const payloadDepartures = departures.map((d) => ({
			...d,
			start_date: formatYmd(d.start_date),
			end_date: formatYmd(d.end_date),
		}))

		await saveTrekDepartures(props.travelPackageId, payloadDepartures)
		showSuccess('Fixed departures saved')
		emit('saved')
		emit('close')
	} catch (error) {
		showError(error?.response?.data?.message || 'Unable to save fixed departures')
		console.error(error)
	} finally {
		loading.value = false
	}
}
</script>
