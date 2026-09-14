<template>
	<div class="pa-4">
		<v-card>
			<v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
				<div class="d-flex align-center ga-2">
					<v-avatar size="24" rounded variant="tonal" color="primary">
						<v-icon size="14">mdi-calendar-check</v-icon>
					</v-avatar>
					<span class="text-uppercase font-weight-medium text-slate-800">Journey Departures</span>
				</div>
				<v-btn
					color="primary"
					variant="outlined"
					:to="{ name: 'adminJourneyPage' }"
					prepend-icon="mdi-map-search-outline"
				>
					View Journeys
				</v-btn>
			</v-card-title>
			<v-divider />

			<v-card-text>
				<v-row class="mb-3" align="center" justify="space-between">
					<v-col cols="12" sm="6" md="4">
						<v-text-field
							v-model="search"
							label="Search departures"
							placeholder="Search by journey or code"
							clearable
							prepend-inner-icon="mdi-magnify"
							hide-details
						/>
					</v-col>
					<v-col cols="12" sm="6" md="3">
						<v-select
							v-model="statusFilter"
							label="Status filter"
							:items="statusOptions"
							item-title="label"
							item-value="value"
							clearable
							hide-details
						/>
					</v-col>
				</v-row>

				<v-data-table
					:headers="headers"
					:items="filteredItems"
					:loading="fetchingData"
					:items-per-page="25"
					hover
				>
					<template #item.sn="{ index }">
						<span>{{ index + 1 }}</span>
					</template>

					<template #item.journey="{ item }">
						<router-link
							v-if="item.journey"
							:to="{ name: 'adminJourneyDetailPage', params: { id: item.journey.id } }"
							class="text-primary text-decoration-underline"
						>
							{{ item.journey.title }}
						</router-link>
						<span v-else class="text-medium-emphasis">Journey #{{ item.journey_id }}</span>
					</template>

					<template #item.code="{ item }">
						<code>{{ item.code || '—' }}</code>
					</template>

					<template #item.start_date="{ item }">
						<span>{{ item.start_date }}</span>
					</template>

					<template #item.end_date="{ item }">
						<span>{{ item.end_date }}</span>
					</template>

					<template #item.total_seats="{ item }">
						<span>{{ item.total_seats ?? '—' }}</span>
					</template>

					<template #item.available_seats="{ item }">
						<span :class="item.available_seats === 0 ? 'text-error' : ''">
							{{ item.available_seats ?? '—' }}
						</span>
					</template>

					<template #item.price="{ item }">
						<span>{{ item.currency }} {{ item.cost ?? (item.price_minor ? item.price_minor / 100 : '—') }}</span>
					</template>

					<template #item.status="{ item }">
						<v-chip
							size="x-small"
							class="text-uppercase"
							:color="getStatusColor(item.status)"
							variant="tonal"
						>
							{{ item.status }}
						</v-chip>
					</template>

					<template #item.is_active="{ item }">
						<v-switch
							v-model="item.is_active"
							color="success"
							hide-details
							@change="toggleActive(item)"
						/>
					</template>

					<template #item.actions="{ item }">
						<div class="d-flex align-center justify-center ga-1">
							<v-btn
								variant="outlined"
								color="primary"
								title="Edit in Journey detail"
								:to="{ name: 'adminJourneyDetailPage', params: { id: item.journey_id } }"
							>
								<v-icon start size="14">mdi-open-in-new</v-icon>
								Edit
							</v-btn>
							<v-btn
								variant="outlined"
								color="error"
								title="Delete departure"
								@click="openDeleteDialog(item)"
							>
								<v-icon start size="14">mdi-delete-outline</v-icon>
								Delete
							</v-btn>
						</div>
					</template>
				</v-data-table>
			</v-card-text>
		</v-card>
	</div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useSnackbar } from '@/composables/snackbar';
import { useGlobalModal } from '@/composables/globalModal';
import { getStatusColor } from '@/utils/utils';
import { getDeparturesApi, toggleDepartureActiveApi } from '@/http/journey-departures.http';
import FormDelete from '@/modal-form/journey-departures/FormDelete.vue'

const { showSuccess, showError } = useSnackbar();
const globalModal = useGlobalModal();

const headers = [
	{ title: 'SN', key: 'sn', sortable: false },
	{ title: 'Journey', key: 'journey', sortable: false },
	{ title: 'Code', key: 'code', sortable: true },
	{ title: 'Start Date', key: 'start_date', sortable: true },
	{ title: 'End Date', key: 'end_date', sortable: true },
	{ title: 'Total Seats', key: 'total_seats', sortable: false },
	{ title: 'Available Seats', key: 'available_seats', sortable: false },
	{ title: 'Price', key: 'price', sortable: false },
	{ title: 'Status', key: 'status', sortable: true },
	{ title: 'Active', key: 'is_active', sortable: false },
	{ title: 'Actions', key: 'actions', sortable: false, align: 'center' },
];

const dataList = ref([]);
const fetchingData = ref(false);
const search = ref('');
const statusFilter = ref(null);

const statusOptions = [
	{ label: 'Open', value: 'open' },
	{ label: 'Guaranteed', value: 'guaranteed' },
	{ label: 'Limited', value: 'limited' },
	{ label: 'Closed', value: 'closed' },
	{ label: 'Cancelled', value: 'cancelled' },
];

const filteredItems = computed(() => {
	return dataList.value.filter((item) => {
		const matchesStatus = !statusFilter.value || item.status === statusFilter.value;
		if (!matchesStatus) return false;

		if (!search.value) return true;
		const term = search.value.toLowerCase();
		const journeyTitle = item.journey?.title?.toLowerCase() || '';
		const code = item.code?.toLowerCase() || '';
		const notes = item.notes?.toLowerCase() || '';
		return journeyTitle.includes(term) || code.includes(term) || notes.includes(term);
	});
});

async function fetchData() {
	try {
		fetchingData.value = true;
		const resp = await getDeparturesApi();
		dataList.value = resp.data || [];
	} catch (error) {
		console.error('Failed to load departures', error);
		showError('Failed to load departures list');
	} finally {
		fetchingData.value = false;
	}
}

async function toggleActive(item) {
	try {
		await toggleDepartureActiveApi(item.id, item.is_active);
		showSuccess(`Departure ${item.is_active ? 'activated' : 'deactivated'}`);
	} catch (error) {
		showError('Failed to update departure status');
		item.is_active = !item.is_active;
	}
}

function openDeleteDialog(item) {
	globalModal.open({
		title: 'Confirm Delete Departure',
		component: FormDelete,
		size: 'sm',
		props: {
			item,
		},
		onSaved: () => fetchData(),
	});
}

onMounted(() => {
	fetchData();
});
</script>
