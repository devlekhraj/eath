<template>
  <div>
    <v-row>
      <v-col cols="12">
        <div v-if="destination">
          <RichTextEditor v-model="descriptionValue" />
        </div>
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

const descriptionValue = computed({
  get() {
    return props.destination?.description ?? ''
  },
  set(value) {
    if (props.destination) {
      props.destination.description = value ?? ''
    }
  },
})
</script>
