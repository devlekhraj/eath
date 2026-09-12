<template>
  <v-app>
    <router-view />
    <GlobalModalHost />
    <GlobalSnackbar />
  </v-app>
</template>
<script setup>
import { provideSnackbar } from '@/composables/snackbar'
import GlobalSnackbar from '@/components/GlobalSnackbar.vue'
import GlobalModalHost from '@/components/GlobalModalHost.vue'

provideSnackbar()
</script>
