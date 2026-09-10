<template>
	<v-card class="elevation-0">
		<div class="pa-4 d-flex align-center">
			<div class="mr-4 detail-header-thumb">
				<v-img :src="imageUrl" cover class="rounded" style="width: 100%; height: 100%;" />
			</div>
			<div>
				<h2 class="mb-1">{{ title }}</h2>
				<div class="d-flex align-center">
					<span class="text-medium-emphasis">
						{{ url }}
					</span>
					<v-btn size="x-small" class="ml-2" color="primary" icon variant="tonal" :href="url" target="_blank" rel="noopener">
						<v-icon>mdi-open-in-new</v-icon>
					</v-btn>
				</div>
				<div v-if="$slots.meta" class="text-caption text-medium-emphasis mt-1">
					<slot name="meta" />
				</div>
			</div>
		</div>
	</v-card>
</template>

<script setup>
defineProps({
	title: {
		type: String,
		required: true,
	},
	url: {
		type: String,
		required: true,
	},
	imageUrl: {
		type: String,
		required: true,
	},
})
</script>

<style scoped>
.detail-header-thumb {
	width: 160px;
	height: 90px;
}
</style>
