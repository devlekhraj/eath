<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <!-- Pricing Tiers Section -->
        <v-card variant="outlined" class="pa-5 mb-6">
          <div class="d-flex align-center justify-space-between flex-wrap ga-2 mb-4">
            <div>
              <div class="text-subtitle-1 font-weight-bold text-uppercase">
                Custom Pricing Tiers & Group Rates
              </div>
              <p class="text-caption text-medium-emphasis mb-0">
                Define seasonal rates, group size discounts, or private departure package pricing.
              </p>
            </div>

            <v-btn color="primary" variant="flat" @click="openPriceModal()">
              <v-icon start>mdi-plus</v-icon>
              Add Price Tier
            </v-btn>
          </div>

          <v-table v-if="journey?.prices?.length" class="border rounded">
            <thead>
              <tr>
                <th class="text-left font-weight-bold">Price Tier Name</th>
                <th class="text-left font-weight-bold">Price (USD)</th>
                <th class="text-left font-weight-bold">Primary</th>
                <th class="text-left font-weight-bold">Description</th>
                <th class="text-right font-weight-bold">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in journey.prices" :key="item.id">
                <td class="font-weight-medium text-slate-800">
                  {{ item.name || item.title }}
                </td>
                <td class="font-weight-bold text-primary">
                  {{ formatAmount(item.price) }}
                </td>
                <td>
                  <v-chip
                    size="x-small"
                    :color="item.is_primary || item.is_default ? 'primary' : 'secondary'"
                    variant="tonal"
                    label
                  >
                    {{ item.is_primary || item.is_default ? 'Primary' : 'Secondary' }}
                  </v-chip>
                </td>
                <td class="text-caption text-medium-emphasis">
                  {{ item.description || '—' }}
                </td>
                <td class="text-right">
                  <div class="d-flex align-center justify-end ga-1">
                    <v-btn
                      size="small"
                      color="primary"
                      variant="outlined"
                      @click="openPriceModal(item)"
                    >
                      <v-icon start size="14">mdi-pencil</v-icon>
                      Edit
                    </v-btn>
                    <v-btn
                      size="small"
                      color="error"
                      variant="outlined"
                      @click="deletePriceModal(item)"
                    >
                      <v-icon start size="14">mdi-delete</v-icon>
                      Delete
                    </v-btn>
                  </div>
                </td>
              </tr>
            </tbody>
          </v-table>

          <div
            v-else
            class="text-center pa-8 bg-grey-lighten-5 rounded"
            style="border: 1px dashed #cbd5e1;"
          >
            <v-icon size="40" color="grey" class="mb-2">mdi-currency-usd-circle-outline</v-icon>
            <div class="text-body-2 font-weight-medium text-slate-700">No Custom Price Tiers Defined</div>
            <div class="text-caption text-medium-emphasis mt-1">
              Base journey price (${{ journey?.price ?? (journey?.price_minor ? journey.price_minor / 100 : 0) }}) is active.
            </div>
          </div>
        </v-card>

        <!-- Inclusions & Exclusions Section -->
        <v-card variant="outlined" class="pa-5">
          <div class="d-flex align-center justify-space-between flex-wrap ga-2 mb-4">
            <div>
              <div class="text-subtitle-1 font-weight-bold text-uppercase">
                Expedition Services (Inclusions & Exclusions)
              </div>
              <p class="text-caption text-medium-emphasis mb-0">
                Detailed breakdown of services included and excluded from this expedition package.
              </p>
            </div>
          </div>

          <!-- Quick Add Service Field -->
          <v-card variant="tonal" color="slate" class="pa-4 mb-5 border">
            <v-form @submit.prevent="handleAddService">
              <v-row dense align="center">
                <v-col cols="12" md="7">
                  <div class="mb-2">
                    <v-text-field
                      v-model="serviceForm.title"
                      label="Service Item Title *"
                      placeholder="e.g. Airport transfers by private vehicle"
                      :disabled="serviceLoading"
                      hide-details="auto"
                    />
                  </div>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <div class="mb-2">
                    <v-switch
                      v-model="serviceForm.is_excluded"
                      label="Exclude this item?"
                      :color="serviceForm.is_excluded ? 'error' : 'success'"
                      inset
                      hide-details
                      :disabled="serviceLoading"
                    />
                  </div>
                </v-col>
                <v-col cols="12" sm="6" md="2" class="text-right">
                  <div class="mb-2">
                    <v-btn
                      color="primary"
                      variant="flat"
                      class="w-100"
                      :loading="serviceLoading"
                      :disabled="!serviceForm.title?.trim() || serviceLoading"
                      @click="handleAddService"
                    >
                      <v-icon start>mdi-plus</v-icon>
                      Add Item
                    </v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-form>
          </v-card>

          <v-row>
            <!-- Inclusions Column -->
            <v-col cols="12" md="6">
              <v-card variant="outlined" class="pa-4 h-100">
                <div class="d-flex align-center ga-2 mb-3">
                  <v-avatar size="24" color="success" variant="tonal">
                    <v-icon size="14">mdi-check</v-icon>
                  </v-avatar>
                  <span class="text-subtitle-2 font-weight-bold text-uppercase">
                    Included in Package ({{ inclusionsList.length }})
                  </span>
                </div>

                <div v-if="inclusionsList.length" class="d-flex flex-column ga-2">
                  <div
                    v-for="item in inclusionsList"
                    :key="item.id"
                    class="d-flex align-center justify-space-between pa-2 bg-slate-50 border rounded"
                  >
                    <div class="d-flex align-center ga-2 text-body-2 text-slate-800">
                      <v-icon color="success" size="18">mdi-check-circle-outline</v-icon>
                      <span>{{ item.title }}</span>
                    </div>
                    <v-btn
                      icon
                      size="x-small"
                      variant="text"
                      color="error"
                      @click="handleDeleteService(item)"
                    >
                      <v-icon size="16">mdi-delete-outline</v-icon>
                    </v-btn>
                  </div>
                </div>

                <div v-else class="text-caption text-medium-emphasis pa-4 text-center">
                  No inclusion items added yet.
                </div>
              </v-card>
            </v-col>

            <!-- Exclusions Column -->
            <v-col cols="12" md="6">
              <v-card variant="outlined" class="pa-4 h-100">
                <div class="d-flex align-center ga-2 mb-3">
                  <v-avatar size="24" color="error" variant="tonal">
                    <v-icon size="14">mdi-close</v-icon>
                  </v-avatar>
                  <span class="text-subtitle-2 font-weight-bold text-uppercase">
                    Excluded from Package ({{ exclusionsList.length }})
                  </span>
                </div>

                <div v-if="exclusionsList.length" class="d-flex flex-column ga-2">
                  <div
                    v-for="item in exclusionsList"
                    :key="item.id"
                    class="d-flex align-center justify-space-between pa-2 bg-slate-50 border rounded"
                  >
                    <div class="d-flex align-center ga-2 text-body-2 text-slate-800">
                      <v-icon color="error" size="18">mdi-close-circle-outline</v-icon>
                      <span>{{ item.title }}</span>
                    </div>
                    <v-btn
                      icon
                      size="x-small"
                      variant="text"
                      color="error"
                      @click="handleDeleteService(item)"
                    >
                      <v-icon size="16">mdi-delete-outline</v-icon>
                    </v-btn>
                  </div>
                </div>

                <div v-else class="text-caption text-medium-emphasis pa-4 text-center">
                  No exclusion items added yet.
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { computed, reactive, ref } from 'vue'
import { useGlobalModal } from '@/composables/globalModal'
import { useSnackbar } from '@/composables/snackbar'
import JourneyPriceForm from '../modal/JourneyPriceForm.vue'
import JourneyPriceDelete from '../modal/JourneyPriceDelete.vue'
import http from '@/http.config'

const props = defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
const { open: openModal } = useGlobalModal()
const { showSuccess, showError } = useSnackbar()

const serviceLoading = ref(false)
const serviceForm = reactive({
  title: '',
  is_excluded: false,
})

const inclusionsList = computed(() => {
  return Array.isArray(props.journey?.inclusions) ? props.journey.inclusions : []
})

const exclusionsList = computed(() => {
  return Array.isArray(props.journey?.exclusions) ? props.journey.exclusions : []
})

function formatAmount(val) {
  if (val === null || val === undefined || val === '') return '—'
  const num = Number(val)
  return isNaN(num) ? val : `$${num.toLocaleString()}`
}

function handleRefresh() {
  emit('refresh')
}

function openPriceModal(item = null) {
  openModal({
    title: item?.id ? `Edit ${item.name || item.title}` : 'Add New Price Tier',
    component: JourneyPriceForm,
    size: 'md',
    props: {
      item,
      journeyId: props.journey?.id,
    },
    onClose: handleRefresh,
  })
}

function deletePriceModal(item) {
  openModal({
    title: 'Delete Price Tier',
    component: JourneyPriceDelete,
    size: 'sm',
    props: {
      item,
    },
    onClose: handleRefresh,
  })
}

async function handleAddService() {
  if (!serviceForm.title?.trim() || !props.journey?.id) return
  serviceLoading.value = true

  try {
    await http.post(`/admin/journeys/${props.journey.id}/services`, {
      title: serviceForm.title.trim(),
      is_excluded: serviceForm.is_excluded,
    })
    serviceForm.title = ''
    serviceForm.is_excluded = false
    showSuccess('Service item added.')
    handleRefresh()
  } catch (err) {
    console.error('Failed to add service:', err)
    showError(err?.response?.data?.message || 'Failed to add service item.')
  } finally {
    serviceLoading.value = false
  }
}

async function handleDeleteService(item) {
  if (!item?.id) return
  try {
    await http.delete(`/admin/journey-services/${item.id}`)
    showSuccess('Service item removed.')
    handleRefresh()
  } catch (err) {
    console.error('Failed to delete service:', err)
    showError(err?.response?.data?.message || 'Failed to remove service item.')
  }
}
</script>
