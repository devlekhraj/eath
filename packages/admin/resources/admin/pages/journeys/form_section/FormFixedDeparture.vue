<template>
<v-card class="rounded-0 elevation-0">
	<v-card-title class="d-flex align-center justify-space-between py-3">
		<div>
			<div class="text-h6 font-semibold">Fixed Departures</div>
			<div class="text-body-2 text-slate-600">Manage fixed departure dates, capacity, status, and pricing for this journey.</div>
		</div>
		<v-btn color="primary" variant="flat" class="rounded-0" @click="addDeparture">
			<v-icon start>mdi-plus</v-icon>
			Add Departure
		</v-btn>
	</v-card-title>
	<v-divider />
	<v-data-table
		:headers="headers"
		:items="departures"
		class="elevation-0"
		:items-per-page="10"
		v-model:expanded="expanded"
	>
		<template #item.start_date="{ item }">
			<span>{{ formatHuman(item.start_date) }}</span>
		</template>
		<template #item.end_date="{ item }">
			<span>{{ formatHuman(item.end_date) }}</span>
		</template>
		<template #item.cost="{ item }">
			<span>{{ item.cost !== null && item.cost !== undefined ? `$${item.cost}` : '—' }}</span>
		</template>
		<template #item.total_seats="{ item }">
			<span>{{ item.total_seats ?? item.total_seat ?? '—' }}</span>
		</template>
		<template #item.available_seats="{ item }">
			<span>{{ item.available_seats ?? item.total_seats ?? item.total_seat ?? '—' }}</span>
		</template>
		<template #item.booking_count="{ item }">
			<span>{{ item.booking_count ?? item.bookings?.length ?? 0 }}</span>
		</template>
		<template #item.status="{ item }">
			<v-chip :color="getStatusColor(item.status)" size="small" label class="rounded-0 text-uppercase font-weight-medium">
				{{ item.status || 'open' }}
			</v-chip>
		</template>
		<template #item.actions="{ item }">
			<div class="d-flex align-center justify-center">
				<v-btn icon size="small" variant="text" color="secondary" class="rounded-0" @click="toggleExpand(item)" :title="isExpanded(item) ? 'Collapse bookings' : 'View bookings'">
					<v-icon>{{ isExpanded(item) ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
				</v-btn>
				<v-btn icon size="small" variant="text" color="primary" class="rounded-0" @click="editDeparture(item)" title="Edit departure">
					<v-icon>mdi-pencil</v-icon>
				</v-btn>
				<v-btn icon size="small" variant="text" color="error" class="rounded-0" @click="deleteDeparture(item)" :loading="deletingId === item.id" title="Delete departure">
					<v-icon>mdi-delete</v-icon>
				</v-btn>
			</div>
		</template>
		<template #no-data>
			<v-alert type="info" variant="tonal" border="start" class="rounded-0 my-4">
				No departures configured yet. Click "Add Departure" above to create scheduled dates.
			</v-alert>
		</template>
		<template #expanded-row="{ columns, item }">
			<td :colspan="columns.length" class="bg-slate-50/50 pa-0">
				<div v-if="item.bookings?.length" class="pa-6">
					<div v-for="(booking, index) in item.bookings" :key="booking.id" :class="index < item.bookings.length - 1 ? 'mb-8' : ''">
						<div class="d-flex align-center gap-3 mb-4">
							<div class="text-subtitle-1 font-weight-bold uppercase tracking-wider">Booking Record</div>
							<span class="text-caption text-slate-400 font-mono">Ref: #{{ booking.reference_code || booking.id }}</span>
						</div>

						<!-- Top Section: Contact & Booking Details -->
						<v-row class="mb-4">
							<v-col cols="12" md="6">
								<div class="pa-4 border rounded-0 h-100 bg-white">
									<div class="text-overline mb-3 text-primary font-weight-bold">Contact Information</div>
									<div class="d-flex align-start gap-4">
										<v-avatar color="primary" size="40" class="rounded-0 text-white font-weight-bold">
											<span>{{ (booking.user?.name || 'G').charAt(0).toUpperCase() }}</span>
										</v-avatar>
										<div>
											<div class="text-subtitle-2 font-weight-bold mb-1">{{ booking.user?.name || 'Guest Traveler' }}</div>
											<div class="d-flex align-center text-body-2 text-slate-600 mb-1">
												<v-icon size="16" class="me-2 text-slate-400" icon="mdi-email-outline" />
												<span>{{ booking.user?.email || 'No email provided' }}</span>
											</div>
											<div class="d-flex align-center text-body-2 text-slate-600">
												<v-icon size="16" class="me-2 text-slate-400" icon="mdi-phone-outline" />
												<span>{{ booking.user?.phone || 'No phone provided' }}</span>
											</div>
										</div>
									</div>
								</div>
							</v-col>

							<v-col cols="12" md="6">
								<div class="pa-4 border rounded-0 h-100 bg-white">
									<div class="text-overline mb-3 text-primary font-weight-bold">Logistics & Notes</div>
									<div class="text-body-2">
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400 uppercase text-caption">Booked On</v-col>
											<v-col cols="8">{{ booking.created_at || '—' }}</v-col>
										</v-row>
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400 uppercase text-caption">Flight</v-col>
											<v-col cols="8">{{ booking.flight || '—' }}</v-col>
										</v-row>
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400 uppercase text-caption">Insurance</v-col>
											<v-col cols="8">{{ booking.insurance || '—' }}</v-col>
										</v-row>
										<v-row no-gutters v-if="booking.special_requirements">
											<v-col cols="4" class="text-slate-400 uppercase text-caption">Notes</v-col>
											<v-col cols="8">{{ booking.special_requirements }}</v-col>
										</v-row>
									</div>
								</div>
							</v-col>
						</v-row>

						<!-- Bottom Section: Traveler Table -->
						<div class="border rounded-0 pa-4 bg-white">
							<div class="text-overline mb-3 text-primary font-weight-bold">Travelers ({{ booking.total_travellers }})</div>
							<v-table density="comfortable" class="bg-transparent rounded-0">
								<thead>
									<tr class="bg-slate-100">
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">#</th>
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">Full Name</th>
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">Email</th>
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">Phone</th>
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">Country</th>
										<th class="text-left text-slate-700 uppercase tracking-wider text-caption font-weight-bold">Passport</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(trav, tIdx) in booking.travellers" :key="tIdx">
										<td class="text-slate-500">{{ tIdx + 1 }}</td>
										<td style="min-width: 180px;">{{ trav.name }}</td>
										<td class="text-caption text-slate-600" style="min-width: 140px;">{{ trav.email }}</td>
										<td class="text-caption text-slate-600" style="min-width: 100px;">{{ trav.phone }}</td>
										<td class="text-caption" style="min-width: 60px;">{{ trav.country }}</td>
										<td class="text-caption font-mono text-primary" style="min-width: 120px;">{{ trav.passport || '—' }}</td>
									</tr>
								</tbody>
							</v-table>
						</div>
					</div>
				</div>
				<div v-else class="pa-10 text-center bg-slate-50 border rounded-0">
					<v-icon size="48" color="slate-400" class="mb-2">mdi-calendar-remove-outline</v-icon>
					<div class="text-body-2 text-slate-500 uppercase tracking-wider">No Bookings Found for this Departure</div>
				</div>
			</td>
		</template>
	</v-data-table>
	<modal-template ref="globalModal" @saved="emit('refresh')" @close="emit('refresh')" />
</v-card>
</template>

<script setup>
import { computed, ref } from 'vue'
import { formatHuman } from './modal/utils'
import { deleteTrekDeparture } from '@/api/journeys.api'
import { useSnackbar } from '@/composables/snackbar'
import FixedDepartureForm from './modal/FixedDepartureForm.vue'
import EditFixedDepartureForm from './modal/EditFixedDepartureForm.vue'
import ConfirmDeleteModal from './modal/ConfirmDeleteModal.vue'

const props = defineProps({
	travelPackage: {
		type: Object,
		required: false,
		default: () => ({}),
	},
})

const emit = defineEmits(['refresh'])

const globalModal = ref(null)
const deletingId = ref(null)
const { showSuccess, showError } = useSnackbar()

const headers = [
	{ title: 'Start Date', key: 'start_date' },
	{ title: 'End Date', key: 'end_date' },
	{ title: 'Cost', key: 'cost' },
	{ title: 'Total Seats', key: 'total_seats' },
	{ title: 'Available Seats', key: 'available_seats' },
	{ title: 'Bookings', key: 'booking_count' },
	{ title: 'Status', key: 'status' },
	{ title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]

const departures = computed(() => props.travelPackage?.departures ?? [])
const expanded = ref([])

const isExpanded = (item) => expanded.value.includes(item.id)
const toggleExpand = (item) => {
	const id = item.id
	if (!id) return
	if (expanded.value.includes(id)) {
		expanded.value = expanded.value.filter((i) => i !== id)
	} else {
		expanded.value = [...expanded.value, id]
	}
}

const getStatusColor = (status) => {
	switch (status) {
		case 'open':
		case 'active':
			return 'success'
		case 'limited':
			return 'warning'
		case 'full':
		case 'cancelled':
			return 'error'
		case 'closed':
		case 'inactive':
			return 'secondary'
		default:
			return 'primary'
	}
}

const openDepartureModal = (item = {}, mode = 'create') => {
	const isEdit = mode === 'edit'
	globalModal.value?.open({
		title: isEdit ? 'Edit Fixed Departure' : 'Add Fixed Departure',
		component: isEdit ? EditFixedDepartureForm : FixedDepartureForm,
		size: 'lg',
		props: {
			item: isEdit ? item : undefined,
			travelPackageId: props.travelPackage?.id ?? null,
		},
	})
}

const addDeparture = () => openDepartureModal({}, 'create')
const editDeparture = (item = {}) => openDepartureModal(item, 'edit')

const deleteDeparture = (item) => {
	if (!item?.id || !props.travelPackage?.id) return
	globalModal.value?.open({
		title: 'Confirm Deletion',
		component: ConfirmDeleteModal,
		size: 'md',
		props: {
			item,
			travelPackageId: props.travelPackage.id,
		},
	})
}
</script>
