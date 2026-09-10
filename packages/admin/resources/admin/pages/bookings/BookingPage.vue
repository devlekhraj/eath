<template>
	<div>
		<div class="mb-5 d-flex align-center justify-space-between">
			<div class="text-h5 font-weight-bold">Bookings</div>
		</div>

		<v-data-table-server
			v-model:expanded="expanded"
			:items="bookings"
			:headers="headers"
			:loading="loading"
			:items-length="totalItems"
			v-model:page="page"
			v-model:items-per-page="itemsPerPage"
			class="elevation-0"
			@update:options="fetchData"
		>
			<template #top>
				<v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
					<v-col cols="12" sm="6" md="4" lg="3" xl="3">
						<v-text-field v-model="search" label="Search" clearable prepend-inner-icon="mdi-magnify" placeholder="Search by name or email" />
					</v-col>
				</v-row>
			</template>

			<template #item.sn="{ index }">
				<div style="min-width: max-content;">{{ (page - 1) * itemsPerPage + index + 1 }}</div>
			</template>

			<template #item.trek_name="{ item }">
				<div class="text-primary" style="min-width: max-content;">
					{{ item.trek_name }}
				</div>
			</template>

			<template #item.departure_date="{ item }">
				<div class="d-flex align-center" style="min-width: max-content;">
					<v-icon size="16" class="me-1">mdi-calendar-start</v-icon>
					{{ formatDate(item.departure_date) }}
				</div>
			</template>

			<template #item.traveller_count="{ item }">
				<div style="min-width: max-content;">
					<v-chip size="small" label variant="tonal" color="secondary">
						<v-icon start size="14">mdi-account-group</v-icon>
						{{ item.traveller_count }}
					</v-chip>
				</div>
			</template>

			<template #item.created_at="{ item }">
				<div class="text-caption text-slate-500" style="min-width: max-content;">
					{{ formatDate(item.created_at) }}
				</div>
			</template>

			<!-- Expanded Row -->
			<template #expanded-row="{ item, columns }">
				<tr>
					<td :colspan="columns.length" class="pa-4 bg-slate-50/50">
						<v-card class="pa-6 border-0 bg-transparent">
							<v-row>
								<v-col cols="12" md="4">
									<div>
										<div class="mb-4">
											<strong class="text-overline text-primary">Customer Details</strong>
										</div>
										<div class="d-flex align-center gap-4 mb-4">
											<v-avatar color="primary" size="48">
												<span class="text-h6">{{ (item.user?.name || 'G').charAt(0).toUpperCase() }}</span>
											</v-avatar>
											<div class="pl-2">
												<div>{{ item.user?.name || 'Guest User' }}</div>
												<div class="text-caption text-slate-500">{{ item.user?.email || 'N/A' }}</div>
												<div class="text-caption text-slate-500">{{ item.user?.phone || 'N/A' }}</div>
											</div>
										</div>
										<div class="text-caption">
											<div class="mb-1"><span>Booked On:</span> {{ item.created_at }}</div>
											<div v-if="item.flight" class="mb-1"><span>Flight:</span> {{ item.flight }}</div>
											<div v-if="item.insurance" class="mb-1"><span>Insurance:</span> {{ item.insurance }}</div>
										</div>
									</div>
								</v-col>
								<v-col cols="12" md="8">
									<div>
										<div class="mb-4">
											<strong class="text-overline text-primary">Travellers</strong>
										</div>
										<v-table density="comfortable" class="bg-white border rounded">
											<thead>
												<tr>
													<th class="text-left">Name</th>
													<th class="text-left">Email/Phone</th>
													<th class="text-left">Passport/Country</th>
												</tr>
											</thead>
											<tbody>
												<tr v-for="(trav, idx) in item.travellers" :key="idx">
													<td>{{ trav.name }}</td>
													<td>
														<div class="text-caption">{{ trav.email }}</div>
														<div class="text-caption text-slate-400">{{ trav.phone }}</div>
													</td>
													<td>
														<div class="text-caption">{{ trav.passport || '—' }}</div>
														<div class="text-caption text-slate-400">{{ trav.country }}</div>
													</td>
												</tr>
											</tbody>
										</v-table>
										<div v-if="item.special_requirements" class="mt-4 pa-3 bg-amber-50 text-caption rounded">
											<strong>Notes:</strong> {{ item.special_requirements }}
										</div>
									</div>
								</v-col>
							</v-row>
						</v-card>
					</td>
				</tr>
			</template>

			<template #item.actions="{ item }"> <div class="d-flex justify-end gap-2"> <v-btn icon size="x-small" color="primary" variant="tonal" @click="toggleExpand(item)"> <v-icon> {{ expanded.includes(item.id) ? 'mdi-chevron-up' : 'mdi-chevron-down' }} </v-icon> </v-btn> </div> </template>
		</v-data-table-server>
	</div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { formatDate } from '@utils/utils'
import { fetchBookings } from '@/api/bookings.api'

const loading = ref(false)
const search = ref('')
const bookings = ref([])
const expanded = ref([])

const page = ref(1)
const itemsPerPage = ref(20)
const totalItems = ref(0)

function toggleExpand(item) {
	const index = expanded.value.indexOf(item.id)
	if (index >= 0) {
		expanded.value.splice(index, 1)
	} else {
		expanded.value.push(item.id)
	}
}

const headers = [
	{ title: 'SN', key: 'sn', sortable: false, width: '60px' },
	{ title: 'Trek Name', key: 'trek_name', sortable: false },
	{ title: 'Departure Date', key: 'departure_date', sortable: false },
	{ title: 'Travellers', key: 'traveller_count', sortable: false },
	{ title: 'Booking Date', key: 'created_at', sortable: false },
	{ title: 'Actions', key: 'actions', sortable: false, align: 'end' },
]

async function fetchData({ page: p, itemsPerPage: ipp, search: s } = {}) {
	try {
		loading.value = true
		const params = {
			page: p || page.value,
			per_page: ipp || itemsPerPage.value,
			search: s ?? search.value,
		}
		const response = await fetchBookings(params)
		// Handle manual wrapping or Laravel Resource wrapping
        console.log({response});
		bookings.value = response.data || []
		totalItems.value = response.meta?.total || bookings.value.length
	} catch (err) {
		console.error('Failed to fetch bookings:', err)
	} finally {
		loading.value = false
	}
}

// Watch search to reset page and refetch
let searchTimeout = null
watch(search, (val) => {
	clearTimeout(searchTimeout)
	searchTimeout = setTimeout(() => {
		page.value = 1
		fetchData({ page: 1, search: val })
	}, 500)
})
</script>