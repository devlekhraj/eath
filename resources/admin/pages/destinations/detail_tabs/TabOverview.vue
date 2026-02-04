<template>
  <div>
    <v-row>
      <v-col cols="12" md="12" lg="8" offset-lg="2">
        <div>
          <v-form v-if="destination" class="mt-4">
            <v-row>
              <v-col cols="12" md="12" class="py-0">
                <v-text-field
                  v-model="destination.name"
                  label="Name"
                  variant="outlined"
                  density="comfortable"
                />
              </v-col>
      
              <v-col cols="12" md="12" class="py-0">
                <v-text-field
                  v-model="destination.slug"
                  label="Slug"
                  variant="outlined"
                  density="comfortable"
                />
              </v-col>
      
              <!-- <v-col cols="12" md="12">
                <v-text-field
                  v-model="destination.region"
                  label="Region"
                  variant="outlined"
                  density="comfortable"
                />
              </v-col>
      
              <v-col cols="12" md="12">
                <v-text-field
                  v-model="destination.district"
                  label="District"
                  variant="outlined"
                  density="comfortable"
                />
              </v-col> -->
      
              <v-col cols="12" md="12" class="py-0">
                <v-text-field
                  v-model="destination.best_season"
                  label="Best Season"
                  variant="outlined"
                  density="comfortable"
                  placeholder="Mar–May, Sep–Nov"
                />
              </v-col>
      
              <v-col cols="12" md="12" class="d-flex align-center">
                <v-switch
                  v-model="destination.is_active"
                  label="Active"
                  color="success"
                  inset
                />
                <v-switch
                  v-model="destination.is_featured"
                  label="Featured"
                  color="success"
                  inset
                  class="ml-4"
                />
              </v-col>
      
              <v-col cols="12" md="12" class="py-0">
                <v-textarea
                  v-model="destination.highlights"
                  label="Highlights"
                  variant="outlined"
                  density="comfortable"
                  rows="4"
                  auto-grow
                  placeholder="Enter highlights (one per line or JSON array)"
                />
              </v-col>
            </v-row>
            <div class="text-center py-4">
              <v-btn
                size="large"
                color="primary"
                :loading="submitting"
                :disabled="submitting"
                @click="handleUpdate()"
                rounded
              >
                Update
              </v-btn>
            </div>
          </v-form>
        </div>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})
const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['refresh'])
const submitting = ref(false)

async function handleUpdate() {
  if (!props.destination?.id) return
  submitting.value = true
  try {
    const resp = await axios.patch(`/admin/destinations/${props.destination.id}/update`, {
      name: props.destination.name,
      slug: props.destination.slug,
      best_season: props.destination.best_season,
      is_active: props.destination.is_active,
      is_featured: props.destination.is_featured,
      highlights: props.destination.highlights,
    })
    showSuccess(resp.message);
    emit('refresh')
  } catch (error) {
    console.log({error});
    showError('Failed to update destination')
  } finally {
    submitting.value = false
  }
}
</script>
