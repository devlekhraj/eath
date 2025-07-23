<template>
  <v-snackbar v-model="show" :color="color" timeout="3000" location="top end" absolute elevation="10"
    style="z-index: 9999; border-radius: 10px;">
    <div class="d-flex align-center gap-2">
      <v-icon size="24" class="me-2">{{ icon }}</v-icon>
      <div>
        <div class="font-weight-bold">{{ title }}</div>
        <div>{{ message }}</div>
      </div>
    </div>
  </v-snackbar>
</template>

<script setup>
import { computed } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { show, message, color } = useSnackbar()

const icon = computed(() => {
  switch (color.value) {
    case 'success':
      return 'mdi-check-outline'
    case 'error':
      return 'mdi-alert-circle'
    case 'warning':
      return 'mdi-alert'
    case 'info':
      return 'mdi-information'
    default:
      return 'mdi-bell'
  }
})

const title = computed(() => {
  switch (color.value) {
    case 'success':
      return '🎉 Success!'
    case 'error':
      return '🚫 Oops!'
    case 'warning':
      return '⚠️ Attention!'
    case 'info':
      return 'ℹ️ Note'
    default:
      return '🔔'
  }
})
</script>

<style scoped>
.gap-2 {
  gap: 8px;
}
</style>
