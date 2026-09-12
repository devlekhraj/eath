<template>
  <div>
    <v-row>
      <v-col cols="12" md="12" lg="8" offset-lg="2">
        <div>
          <v-form v-if="destination" class="mt-4">
            <v-row>
              <v-col cols="12" md="12">
                <div class="mb-2">
                  <v-text-field v-model="destination.name" label="Name" />
                </div>
              </v-col>
      
              <v-col cols="12" md="12">
                <div class="mb-2">
                  <v-text-field v-model="destination.slug" label="Slug" />
                </div>
              </v-col>
      
              <v-col cols="12" md="12">
                <div class="mb-2">
                  <v-text-field v-model="destination.best_season" label="Best Season" placeholder="Mar–May, Sep–Nov" />
                </div>
              </v-col>
      
              <v-col cols="12" md="12">
                <div class="d-flex align-center">
                  <div class="mb-2 mr-4">
                    <v-switch v-model="destination.is_active" label="Active" color="success" inset />
                  </div>
                  <div class="mb-2">
                    <v-switch v-model="destination.is_featured" label="Featured" color="success" inset />
                  </div>
                </div>
              </v-col>
      
              <v-col cols="12" md="12">
                <div class="mb-2">
                  <v-textarea v-model="destination.highlights" label="Highlights" rows="4" auto-grow placeholder="Enter highlights (one per line or JSON array)" />
                </div>
              </v-col>
            </v-row>
            <div class="text-center py-4">
              <v-btn color="primary" :loading="submitting" :disabled="submitting" @click="handleUpdate()">
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
import http from '@/http.config'
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
    const resp = await http.patch(`/admin/destinations/${props.destination.id}/update`, {
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
