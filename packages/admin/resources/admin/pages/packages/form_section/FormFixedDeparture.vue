<template>
<v-card>
	<v-card-title class="d-flex align-center justify-space-between py-0">
		<div>
			<div class="text-h6 font-semibold">Fixed Departure</div>
			<div class="text-body-2 text-slate-600">Manage fixed departure dates and pricing for this package.</div>
		</div>
		<v-btn color="primary" variant="flat" @click="addDeparture">
			<v-icon start>mdi-plus</v-icon>
			Add Departure
		</v-btn>
	</v-card-title>
	<v-divider class="my-4" />
	<v-data-table
		:headers="headers"
		:items="departures"
		class="elevation-0"
		:items-per-page="5"
		v-model:expanded="expanded"
	>
		<template #item.booking_count="{ item }"> {{ item.booking_count ?? item.bookings?.length ?? 0 }} </template>
		<template #item.start_date="{ item }"> {{ formatHuman(item.start_date) }} </template>
		<template #item.end_date="{ item }"> {{ formatHuman(item.end_date) }} </template>
		<template #item.cost="{ item }"> {{ item.cost ?? '—' }} </template>
		<template #item.available_seats="{ item }"> {{ item.available_seats ?? item.total_seat ?? '—' }} </template>
		<template #item.status="{ item }"> <v-chip :color="item.status === 'active' ? 'success' : 'warning'" size="small" label> {{ item.status || 'active' }} </v-chip> </template>
		<template #item.actions="{ item }"> <v-btn icon size="small" variant="text" color="secondary" @click="toggleExpand(item)"> <v-icon>{{ isExpanded(item) ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon> </v-btn> <v-btn icon size="small" variant="text" color="primary" @click="editDeparture(item)"> <v-icon>mdi-pencil</v-icon> </v-btn> <v-btn icon size="small" variant="text" color="error" @click="deleteDeparture(item)" :loading="deletingId===item.id"> <v-icon>mdi-delete</v-icon> </v-btn> </template>
		<template #no-data>
			<v-alert type="info" variant="tonal" border="start">
				No departures yet. Add one using the button above.
			</v-alert>
		</template>
		<template #expanded-row="{ columns, item }">
			<td :colspan="columns.length" class="bg-slate-50/50 pa-0">
				<div v-if="item.bookings?.length" class="pa-10">
					<div v-for="(booking, index) in item.bookings" :key="booking.id" :class="index < item.bookings.length - 1 ? 'mb-16' : ''">
						<div class="d-flex align-center gap-3 mb-8">
							<div class="text-h5  uppercase tracking-tighter">Booking Details</div>
							<span class="text-caption text-slate-400 font-mono">ID: #{{ booking.id }}</span>
						</div>

						<!-- Top Section: Contact & Other Details -->
						<v-row class="mb-10">
							<v-col cols="12" md="6">
								<div class="pa-4 border rounded h-100">
									<div class="text-overline mb-4 text-primary">Contact Information</div>
									<div class="d-flex align-start gap-6">
										<v-avatar color="primary" size="40">
											<span>{{ (booking.user?.name || 'G').charAt(0).toUpperCase() }}</span>
										</v-avatar>
										<div class="pl-2">
											<div class="text-h6  mb-1">{{ booking.user?.name || 'Guest User' }}</div>
											<div class="d-flex align-center text-body-2 text-slate-600 mb-1">
												<v-icon size="18" class="me-3 text-slate-400" icon="mdi-email-outline" />
												<span>{{ booking.user?.email || 'No email provided' }}</span>
											</div>
											<div class="d-flex align-center text-body-2 text-slate-600">
												<v-icon size="18" class="me-3 text-slate-400" icon="mdi-phone-outline" />
												<span>{{ booking.user?.phone || 'No phone provided' }}</span>
											</div>
										</div>
									</div>
								</div>
							</v-col>

							<v-col cols="12" md="6">
								<div class="pa-4 border rounded h-100">
									<div class="text-overline mb-4 text-primary">Other Details</div>
									<div class="text-body-2">
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400  uppercase text-caption">Booked On</v-col>
											<v-col cols="8">{{ booking.created_at || '—' }}</v-col>
										</v-row>
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400  uppercase text-caption">Flight</v-col>
											<v-col cols="8">{{ booking.flight || '—' }}</v-col>
										</v-row>
										<v-row no-gutters class="mb-2">
											<v-col cols="4" class="text-slate-400  uppercase text-caption">Insurance</v-col>
											<v-col cols="8">{{ booking.insurance || '—' }}</v-col>
										</v-row>
										<v-row no-gutters v-if="booking.special_requirements">
											<v-col cols="4" class="text-slate-400  uppercase text-caption">Notes</v-col>
											<v-col cols="8">{{ booking.special_requirements }}</v-col>
										</v-row>
									</div>
								</div>
							</v-col>
						</v-row>

						<!-- Bottom Section: Traveller Table -->
						<div class="border rounded pa-4">
							<div class="text-overline mb-4 text-primary">Travellers ({{ booking.total_travellers }})</div>
							<v-table density="comfortable" class="bg-transparent">
								<thead>
									<tr class="bg-slate-200">
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">#</th>
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">Full Name</th>
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">Email</th>
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">Phone</th>
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">Country</th>
										<th class="text-left  text-slate-700 uppercase tracking-widest text-caption">Passport</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(trav, tIdx) in booking.travellers" :key="tIdx" class="hover:bg-slate-200/50">
										<td class="text-slate-500">{{ tIdx + 1 }}</td>
										<td style="min-width: 200px;">{{ trav.name }}</td>
										<td class="text-caption  text-slate-600" style="min-width: 150px;">{{ trav.email }}</td>
										<td class="text-caption  text-slate-600" style="min-width: 100px;">{{ trav.phone }}</td>
										<td class="text-caption" style="min-width: 60px;">{{ trav.country }}</td>
										<td class="text-caption font-mono text-primary" style="min-width: 200px;">{{ trav.passport || '—' }}</td>
									</tr>
								</tbody>
							</v-table>
						</div>
					</div>
				</div>
				<div v-else class="pa-16 text-center bg-slate-100">
					<v-icon size="64" color="slate-300" class="mb-4">mdi-calendar-remove-outline</v-icon>
					<div class="text-h6 text-slate-400  uppercase tracking-widest">No Bookings Found</div>
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
import { deleteTrekDeparture } from '@/api/treks.api'
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
	{ title: 'Total Seat', key: 'available_seats' },
	{ title: 'Bookings', key: 'booking_count' },
	{ title: 'Status', key: 'status' },
	{ title: 'Actions', key: 'actions', sortable: false },
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
