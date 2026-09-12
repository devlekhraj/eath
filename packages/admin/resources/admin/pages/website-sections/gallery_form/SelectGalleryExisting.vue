<template>
	<v-row class="mt-2">
		<v-col cols="12" md="6">
			<div class="select-grid-scroll">
				<v-row>
					<v-col v-for="(image, index) in images" :key="image?.id || index" cols="6" sm="4" md="4">
						<div class="selectable-image" :class="{ selected: selectedImage?.id === image?.id }"
							@click="emitSelect(image)">
							<v-img :src="image.url || image.image_url" height="140" contain class="rounded" />
						</div>
					</v-col>
				</v-row>

				<div v-if="!images.length" class="text-center py-6">
					<p>No images found.</p>
				</div>
			</div>
		</v-col>

		<v-col cols="12" md="6">
			<div class="mb-3">
				<div>
					<v-img v-if="selectedImage" :src="selectedImage.url || selectedImage.image_url" aspect-ratio="16/9"
						contain class="bordered preview-16x9" />
					<div v-else class="preview-placeholder preview-16x9 rounded d-flex align-center justify-center">
						<span>Select an image to preview</span>
					</div>
				</div>
				<div v-if="selectedImage" class="mt-2 text-caption text-grey">
					<div><strong>File:</strong> {{ formatSelectedFilename?.() }}</div>
					<div><strong>Size:</strong> {{ selectedImage.size || '-' }}</div>
					<div><strong>Dimensions:</strong> {{ formatDimensions?.(selectedImage) }}</div>
				</div>
			</div>
			<div class="mb-3">
				<v-text-field :model-value="meta?.alt_text" label="Alt Text" :disabled="!selectedImage" :error-messages="fieldErrors.alt_text || []" @update:modelValue="(value) => updateMetaField('alt_text', value)" />
			</div>
			<div class="mb-3">
				<v-text-field :model-value="meta?.caption" label="Caption" :disabled="!selectedImage" :error-messages="fieldErrors.caption || []" @update:modelValue="(value) => updateMetaField('caption', value)" />
			</div>
			<div class="mb-3">
				<v-textarea :model-value="meta?.description" label="Description" rows="4" auto-grow :disabled="!selectedImage" :error-messages="fieldErrors.description || []" @update:modelValue="(value) => updateMetaField('description', value)" />
				<div v-if="!selectedImage" class="text-caption text-grey">
					Select an image to edit its meta info.
				</div>
			</div>
		</v-col>
	</v-row>
	<v-divider class="my-4" />
	<v-card-actions class="justify-space-around">
		<v-btn color="primary" :disabled="!selectedImage" :loading="uploading" @click="confirmSelect">
			Select
		</v-btn>
	</v-card-actions>
</template>

<script setup>
import http from '@/http.config'
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import { uploadGalleryImageApi, getGalleryImagesApi } from '@/api/gallery.api'
const props = defineProps({
	images: {
		type: Array,
		default: () => [],
	},
	selectedImage: {
		type: Object,
		default: null,
	},
	meta: {
		type: Object,
		default: () => ({}),
	},
	formatDimensions: {
		type: Function,
		default: null,
	},
	formatSelectedFilename: {
		type: Function,
		default: null,
	},
	errors: {
		type: Object,
		default: () => ({}),
	},
})

const emit = defineEmits(['select-image', 'update:meta', 'confirm'])
const fieldErrors = ref({})

const route = useRoute()
const sectionId = route.params.id || route.query.id || null
const uploading = ref(false)

function emitSelect(image) {
	emit('select-image', image)
}

function updateMetaField(key, value) {
	if (fieldErrors.value?.[key]) {
		fieldErrors.value = {
			...fieldErrors.value,
			[key]: [],
		}
	}
	emit('update:meta', {
		...(props.meta || {}),
		[key]: value,
	})
}

async function confirmSelect() {
	if (!props.selectedImage) return
	if (!props.meta?.alt_text || !props.meta.alt_text.trim()) {
		fieldErrors.value = {
			...fieldErrors.value,
			alt_text: ['The alt text field is required.'],
		}
		return
	}
	fieldErrors.value = {}

	try {
		uploading.value = true;
		const resp = await http.post(`/admin/banners/${sectionId}/use-image`, {
			gallery_id: props.selectedImage.id,
			alt_text: props.meta?.alt_text,
			caption: props.meta?.caption,
			description: props.meta?.description,
		})

		const uploaded = resp.data?.data ?? resp.data
		emit('confirm', {
			image: uploaded,
			meta: { ...(props.meta || {}) },
		})
	} catch (error) {
		const errors = error?.response?.data?.errors
		if (errors && typeof errors === 'object') {
			fieldErrors.value = errors
		}
		console.error('Failed to upload image', error)
	} finally {
		uploading.value = false
	}

}

watch(
	() => props.errors,
	(errors) => {
		if (errors && typeof errors === 'object') {
			fieldErrors.value = errors
		}
	},
	{ immediate: true }
)
</script>

<style scoped>
.selectable-image {
	border: 2px solid transparent;
	border-radius: 8px;
	cursor: pointer;
	transition: border-color 0.2s ease;
}

.selectable-image.selected {
	border-color: #1976d2;
}

.preview-placeholder {
	background: #f5f5f5;
	color: #666;
	border: 1px dashed #cfcfcf;
}

.preview-16x9 {
	aspect-ratio: 16 / 9;
	width: 100%;
}

.select-grid-scroll {
	max-height: 500px;
	overflow-y: auto;
	padding-right: 8px;
}
</style>
