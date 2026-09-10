<template>
    <div>
        <h2>Schema</h2>
        <div v-if="destination">
            <div class="mb-3"><strong>Meta Title:</strong> {{ destination.meta_title || '-' }}</div>
            <div class="mb-3"><strong>Meta Keywords:</strong> {{ destination.meta_keywords || '-' }}</div>
            <div class="mb-3"><strong>Meta Description:</strong> {{ destination.meta_description || '-' }}</div>
            <div class="mb-3"><strong>Canonical URL:</strong> {{ destination.canonical_url || '-' }}</div>
        </div>
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
