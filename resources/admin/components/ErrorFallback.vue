<template>
    <div class="d-flex flex-column justify-center align-center" style="height: 200px; color: #e53935;">
        <v-icon size="48">mdi-alert-circle-outline</v-icon>
        <p class="mt-2">Failed to load component.</p>
        <v-btn color="error" @click="$emit('retry')">Retry</v-btn>
    </div>
</template>

<script setup>
</script>

<style scoped></style>
