<template>
	<div class="pa-4">
		<v-card class="rounded-0 border" elevation="0">
			<v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
				<div class="d-flex align-center ga-2">
					<v-avatar size="24" rounded="0" variant="tonal" color="primary">
						<v-icon size="14">mdi-calendar-check</v-icon>
					</v-avatar>
					<span class="text-uppercase font-weight-medium text-slate-800">Journey Departures</span>
				</div>
				<v-btn
					color="primary"
					variant="outlined"
					size="small"
					class="rounded-0"
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
							density="compact"
							variant="outlined"
							hide-details
							class="rounded-0"
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
							density="compact"
							variant="outlined"
							hide-details
							class="rounded-0"
						/>
					</v-col>
				</v-row>

				<v-data-table
					:headers="headers"
					:items="filteredItems"
					:loading="fetchingData"
					:items-per-page="25"
					class="rounded-0"
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
							class="rounded-0 text-uppercase"
							:color="statusColor(item.status)"
							variant="tonal"
						>
							{{ item.status }}
						</v-chip>
					</template>

					<template #item.is_active="{ item }">
						<v-switch
							v-model="item.is_active"
							color="success"
							density="compact"
							hide-details
							@change="toggleActive(item)"
						/>
					</template>

					<template #item.actions="{ item }">
						<div class="d-flex align-center justify-center ga-1">
							<v-btn
								size="x-small"
								icon
								variant="tonal"
								color="primary"
								class="rounded-0"
								title="Edit in Journey detail"
								:to="{ name: 'adminJourneyDetailPage', params: { id: item.journey_id } }"
							>
								<v-icon size="14">mdi-open-in-new</v-icon>
							</v-btn>
							<v-btn
								size="x-small"
								icon
								variant="tonal"
								color="error"
								class="rounded-0"
								title="Delete departure"
								@click="openDeleteDialog(item)"
							>
								<v-icon size="14">mdi-delete-outline</v-icon>
							</v-btn>
						</div>
					</template>
				</v-data-table>
			</v-card-text>
		</v-card>

		<!-- Confirmation Dialog -->
		<v-dialog v-model="deleteDialogOpen" max-width="450" class="rounded-0">
			<v-card class="rounded-0" elevation="0">
				<v-card-title class="d-flex align-center justify-space-between pa-3 text-error">
					<div class="d-flex align-center ga-2">
						<v-avatar size="24" rounded="0" variant="tonal" color="error">
							<v-icon size="14">mdi-alert-outline</v-icon>
						</v-avatar>
						<span class="text-uppercase font-weight-medium">Delete Departure</span>
					</div>
					<v-btn icon="mdi-close" variant="text" size="small" class="rounded-0" @click="deleteDialogOpen = false" />
				</v-card-title>
				<v-divider />
				<v-card-text class="pt-4">
					<p>
						Are you sure you want to delete departure
						<strong>{{ activeItem?.code || activeItem?.start_date }}</strong> for journey
						<strong>{{ activeItem?.journey?.title || ('#' + activeItem?.journey_id) }}</strong>?
					</p>
				</v-card-text>
				<v-divider />
				<v-card-actions class="pa-3 justify-end ga-2">
					<v-btn variant="outlined" class="rounded-0" @click="deleteDialogOpen = false">
						Cancel
					</v-btn>
					<v-btn color="error" class="rounded-0" :loading="deleting" @click="confirmDelete">
						Delete Departure
					</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
	</div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import http from '@/http.config';
import { useSnackbar } from '@/composables/snackbar';

const { showSuccess, showError } = useSnackbar();

const headers = [
	{ title: 'SN', key: 'sn', sortable: false, width: '50px' },
	{ title: 'Journey', key: 'journey', sortable: false },
	{ title: 'Code', key: 'code', sortable: true },
	{ title: 'Start Date', key: 'start_date', sortable: true },
	{ title: 'End Date', key: 'end_date', sortable: true },
	{ title: 'Total Seats', key: 'total_seats', sortable: false },
	{ title: 'Available Seats', key: 'available_seats', sortable: false },
	{ title: 'Price', key: 'price', sortable: false },
	{ title: 'Status', key: 'status', sortable: true },
	{ title: 'Active', key: 'is_active', sortable: false },
	{ title: 'Actions', key: 'actions', sortable: false, align: 'center', width: '90px' },
];

const dataList = ref([]);
const fetchingData = ref(false);
const search = ref('');
const statusFilter = ref(null);

const deleteDialogOpen = ref(false);
const deleting = ref(false);
const activeItem = ref(null);

const statusOptions = [
	{ label: 'Open', value: 'open' },
	{ label: 'Guaranteed', value: 'guaranteed' },
	{ label: 'Limited', value: 'limited' },
	{ label: 'Closed', value: 'closed' },
	{ label: 'Cancelled', value: 'cancelled' },
];

function statusColor(status) {
	switch (status) {
		case 'open':
			return 'info';
		case 'guaranteed':
			return 'success';
		case 'limited':
			return 'warning';
		case 'closed':
			return 'secondary';
		case 'cancelled':
			return 'error';
		default:
			return 'primary';
	}
}

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
		const resp = await http.get('admin/departures');
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
		await http.patch(`admin/departures/${item.id}/toggle-active`, {
			is_active: item.is_active,
		});
		showSuccess(`Departure ${item.is_active ? 'activated' : 'deactivated'}`);
	} catch (error) {
		showError('Failed to update departure status');
		item.is_active = !item.is_active;
	}
}

function openDeleteDialog(item) {
	activeItem.value = item;
	deleteDialogOpen.value = true;
}

async function confirmDelete() {
	if (!activeItem.value) return;
	try {
		deleting.value = true;
		await http.delete(`admin/journey-departures/${activeItem.value.id}/delete`);
		showSuccess('Departure deleted successfully');
		deleteDialogOpen.value = false;
		dataList.value = dataList.value.filter((dep) => dep.id !== activeItem.value.id);
		activeItem.value = null;
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to delete departure');
	} finally {
		deleting.value = false;
	}
}

onMounted(() => {
	fetchData();
});
</script>

<style scoped>
:deep(.v-btn),
:deep(.v-card),
:deep(.v-chip),
:deep(.v-field) {
	border-radius: 0 !important;
}
</style>
