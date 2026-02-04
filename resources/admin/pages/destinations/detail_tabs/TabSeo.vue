<template>
  <div>
    <v-row>
      <v-col cols="12" md="12" lg="8" offset-lg="2">
        <v-form v-if="destination" class="mt-4">
          <v-row>
            <v-col cols="12" md="12" class="py-0">
              <v-text-field v-model="destination.meta_title" label="Meta Title" variant="outlined" density="comfortable"
                placeholder="Enter meta title" />
            </v-col>

            <v-col cols="12" md="12" class="py-0">
              <v-text-field v-model="destination.meta_keywords" label="Meta Keywords" variant="outlined"
                density="comfortable" placeholder="keyword1, keyword2, keyword3" />
            </v-col>

            <v-col cols="12" md="12" class="py-0">
              <v-textarea v-model="destination.meta_description" label="Meta Description" variant="outlined"
                density="comfortable" rows="4" auto-grow placeholder="Write a concise meta description" />
            </v-col>

            <v-col cols="12" md="12" class="py-0">
              <v-text-field v-model="destination.canonical_url" label="Canonical URL" variant="outlined"
                density="comfortable" placeholder="https://example.com/destinations/slug" />
            </v-col>
          </v-row>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
const props = defineProps({
  destination: {
    type: Object,
    default: () => ({}),
  },
})
</script>
