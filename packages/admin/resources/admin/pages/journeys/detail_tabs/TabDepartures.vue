<template>
  <div>
    <v-row>
      <v-col cols="12" lg="10" offset-lg="1">
        <JourneyFixedDepartureForm
          :journey="journey"
          @refresh="emit('refresh')"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script setup>
import JourneyFixedDepartureForm from '../form_section/JourneyFixedDepartureForm.vue'

defineProps({
  journey: {
    type: Object,
    default: () => ({}),
  },
})

const emit = defineEmits(['refresh'])
</script>
