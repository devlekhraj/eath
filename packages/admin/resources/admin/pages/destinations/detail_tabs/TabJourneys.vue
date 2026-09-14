<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <div class="d-flex align-center justify-space-between mb-4">
          <div>
            <div class="text-subtitle-1 font-weight-bold text-uppercase">
              Associated Journeys ({{ journeys.length }})
            </div>
            <div class="text-caption text-medium-emphasis">
              Trekking routes and tour packages operating within this destination region.
            </div>
          </div>

          <v-btn
            color="primary"
            variant="flat"
            :to="{ name: 'adminJourneyForm', query: { destination_id: destination?.id } }"
          >
            <v-icon start>mdi-plus</v-icon>
            Add Journey to Destination
          </v-btn>
        </div>

        <v-card variant="outlined" class="overflow-hidden">
          <v-data-table
            :headers="headers"
            :items="journeys"
            :items-per-page="10"
            class="elevation-0"
          >
            <template #item.name="{ item }">
              <router-link
                :to="{ name: 'adminJourneyForm', query: { id: item.id } }"
                class="text-primary text-decoration-underline font-weight-medium"
              >
                {{ item.name }}
              </router-link>
            </template>

            <template #item.duration_days="{ item }">
              <span class="text-caption">{{ item.duration_days ? `${item.duration_days} Days` : '—' }}</span>
            </template>

            <template #item.price_minor="{ item }">
              <span class="text-caption">
                {{ item.price_minor ? `$${(item.price_minor / 100).toFixed(0)}` : '—' }}
              </span>
            </template>

            <template #item.is_active="{ item }">
              <v-chip
                size="x-small"
                label
                class="text-uppercase"
                :color="item.is_active ? 'success' : 'secondary'"
              >
                {{ item.is_active ? 'Active' : 'Draft' }}
              </v-chip>
            </template>

            <template #item.actions="{ item }">
              <div class="d-flex align-center justify-center">
                <v-btn
                  variant="outlined"
                  color="primary"
                  :to="{ name: 'adminJourneyForm', query: { id: item.id } }"
                  title="Manage journey details"
                >
                  <v-icon start size="14">mdi-pencil</v-icon>
                  Manage
                </v-btn>
              </div>
            </template>

            <template #no-data>
              <v-alert type="info" variant="tonal" border="start" class="my-4 mx-4">
                No journeys currently assigned to this destination.
              </v-alert>
            </template>
          </v-data-table>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})

const journeys = computed(() => {
  return Array.isArray(props.destination?.journeys) ? props.destination.journeys : []
})

const headers = [
  { title: 'Journey Name', key: 'name', sortable: true },
  { title: 'Slug', key: 'slug', sortable: true },
  { title: 'Duration', key: 'duration_days', sortable: true },
  { title: 'Price', key: 'price_minor', sortable: true },
  { title: 'Status', key: 'is_active', sortable: true },
  { title: 'Actions', key: 'actions', sortable: false, align: 'center' },
]
</script>
