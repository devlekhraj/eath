<template>
  <div class="summernote-viewer note-editable-content" v-html="value || ''"></div>
</template>

<script setup lang="ts">
defineProps<{
  value?: string | null;
}>();
</script>

<style scoped>
.summernote-viewer :deep(img) {
  max-width: 100%;
  height: auto;
}
.summernote-viewer :deep(table) {
  width: 100%;
  border-collapse: collapse;
}
.summernote-viewer :deep(th),
.summernote-viewer :deep(td) {
  border: 1px solid rgba(0, 0, 0, 0.12);
  padding: 8px;
}
</style>
