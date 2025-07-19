<template>
  <v-app>
    <router-view />
  </v-app>
</template>
<style>

.v-dialog>.v-overlay__content>.v-card,
.v-dialog>.v-overlay__content>.v-sheet,
.v-dialog>.v-overlay__content>form>.v-card,
.v-dialog>.v-overlay__content>form>.v-sheet {
  --v-scrollbar-offset: 0px;
  border-radius: 2px;
  overflow-y: auto;
  flex: 1 1 100%;
  box-shadow: none !important;
}

</style>