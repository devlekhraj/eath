<template>
  <v-main class="app-auth-main">
    <div class="auth-card-wrap">
      <router-view />
    </div>
  </v-main>
</template>

<style scoped lang="scss">
.app-auth-main {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background:
    radial-gradient(circle at top left, rgba(79, 70, 229, 0.08), transparent 30%),
    radial-gradient(circle at top right, rgba(14, 165, 233, 0.08), transparent 24%),
    linear-gradient(180deg, #f8fbff 0%, #ffffff 56%, #f7f9fc 100%);
}

.auth-card-wrap {
  width: 100%;
  max-width: 480px;
  padding: 16px;
}
</style>
