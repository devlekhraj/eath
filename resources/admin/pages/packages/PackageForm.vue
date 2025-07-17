<script setup lang="ts">
import { ref } from 'vue'
const content = ref('')
</script>

<template>
  <VContainer>
    <RichTextEditor v-model="content" />
  </VContainer>
</template>
