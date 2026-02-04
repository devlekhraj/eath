<template>
	<v-row class="mt-2">
		<v-col cols="12" md="5">
			<div class="dropzone" :class="{ 'dropzone--active': isDragActive }" @dragover.prevent="handleDragOver"
				@dragleave="handleDragLeave" @drop.prevent="handleDrop">
				<v-file-input class="dropzone-input" :model-value="uploadFile" accept="image/*" label="Select Image"
					variant="outlined" prepend-icon="" hide-details="" density="comfortable"
					prepend-inner-icon="mdi-image" :error-messages="fieldErrors.image || []"
					@update:modelValue="(file) => emit('update:uploadFile', file)" />
				<v-img v-if="uploadPreviewUrl" :src="uploadPreviewUrl" aspect-ratio="16/9" contain
					class="dropzone-preview" />
				<v-btn v-if="uploadPreviewUrl" class="dropzone-remove" icon color="error" size="x-small" variant="flat"
					@click.stop="handleClear">
					<v-icon size="16">mdi-close</v-icon>
				</v-btn>
				<div v-else class="dropzone-placeholder d-flex align-center justify-center">
					<div class="text-center">
						<div class="text-subtitle-2">Drop image here</div>
						<div class="text-caption text-grey">or click to browse</div>
					</div>
				</div>
			</div>
			<div v-if="uploadFile" class="mt-2 text-caption text-grey">
				<!-- <div><strong>File:</strong> {{ formatUploadFilename?.() }}</div> -->
				<div>
					<strong>Size:</strong> {{ formatBytes?.(uploadInfo?.size) }}
					<span v-if="sizeError" class="text-error"> - {{ sizeError }}</span>
				</div>
				<div><strong>Type:</strong> {{ uploadInfo?.type || '-' }}</div>
				<div>
					<div>
						<strong>Dimensions:</strong> {{ formatUploadDimensions?.() }}
					</div>
					<div>
						<span v-if="dimensionWarning" class="text-warning">- {{ dimensionWarning }}</span>
					</div>
					<div>
						<span v-if="aspectRatioWarning" class="text-warning">- {{ aspectRatioWarning }}</span>
					</div>
				</div>
			</div>
		</v-col>

		<v-col cols="12" md="7">

			<v-text-field :model-value="meta?.alt_text" label="Alt Text - (SEO Friendly)"
				placeholder="e.g: Hikers at Everest Base Camp with Khumbu Glacier" variant="outlined"
				density="comfortable" :error-messages="fieldErrors.alt_text || []"
				@update:modelValue="(value) => updateMetaField('alt_text', value)" />
			<v-text-field :model-value="meta?.caption" label="Caption - (SEO Friendly)"
				placeholder="e.g: Morning view at Everest Base Camp" variant="outlined" density="comfortable"
				:error-messages="fieldErrors.caption || []"
				@update:modelValue="(value) => updateMetaField('caption', value)" />
			<v-textarea :model-value="meta?.description" label="Description - (SEO Friendly)"
				placeholder="e.g: A clear morning at Everest Base Camp with tents, prayer flags, and the Khumbu Glacier."
				variant="outlined" density="comfortable" rows="4" auto-grow
				:error-messages="fieldErrors.description || []"
				@update:modelValue="(value) => updateMetaField('description', value)" />
		</v-col>
	</v-row>
	<v-divider class="my-4" />
	<v-card-actions class="justify-space-around">
		<v-btn color="primary" :loading="uploading" :disabled="!uploadFile || uploading || Boolean(sizeError)"
			@click="handleUpload">
			Upload & Select
		</v-btn>
	</v-card-actions>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'

const props = defineProps({
	uploadFile: {
		type: [File, Object, null],
		default: null,
	},
	uploadPreviewUrl: {
		type: String,
		default: '',
	},
	uploadInfo: {
		type: Object,
		default: () => ({}),
	},
	meta: {
		type: Object,
		default: () => ({}),
	},
	formatUploadFilename: {
		type: Function,
		default: null,
	},
	formatBytes: {
		type: Function,
		default: null,
	},
	formatUploadDimensions: {
		type: Function,
		default: null,
	},
})

const emit = defineEmits(['update:uploadFile', 'update:meta', 'confirm'])

const uploading = ref(false)
const isDragActive = ref(false)
const fieldErrors = ref({})
const maxUploadBytes = 2 * 1024 * 1024
const sizeError = computed(() => {
	const file = props.uploadFile
	if (!(file instanceof File)) return ''
	if (!Number.isFinite(file.size)) return ''
	return file.size > maxUploadBytes ? 'Image must be less than 2 MB.' : ''
})
const dimensionWarning = computed(() => {
	const width = props.uploadInfo?.width
	if (!Number.isFinite(width)) return ''
	if (width < 1920) return 'Recommended width is 1920x1080px or larger.'
	return ''
})

const aspectRatioWarning = computed(() => {
	const width = props.uploadInfo?.width
	const height = props.uploadInfo?.height
	if (!Number.isFinite(width) || !Number.isFinite(height) || height === 0) return ''
	const ratio = width / height
	const target = 16 / 9
	const tolerance = 0.02
	return Math.abs(ratio - target) > tolerance ? 'Recommended aspect ratio is 16:9.' : ''
})
const route = useRoute()
const bannerId = route.params.id || route.query.id

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

function handleClear() {
	if (fieldErrors.value?.image) {
		fieldErrors.value = {
			...fieldErrors.value,
			image: [],
		}
	}
	emit('update:uploadFile', null)
}

function handleDragOver(event) {
	if (!event?.dataTransfer) return
	const hasFiles = Array.from(event.dataTransfer.types || []).includes('Files')
	if (hasFiles) {
		isDragActive.value = true
	}
}

function handleDragLeave() {
	isDragActive.value = false
}

function handleDrop(event) {
	isDragActive.value = false
	const files = event?.dataTransfer?.files
	if (!files || files.length === 0) return
	const [file] = files
	if (!(file instanceof File)) return
	if (fieldErrors.value?.image) {
		fieldErrors.value = {
			...fieldErrors.value,
			image: [],
		}
	}
	emit('update:uploadFile', file)
}

async function handleUpload() {
	if (!props.uploadFile) return
	if (sizeError.value) return

	try {
		uploading.value = true
		const formData = new FormData()
		formData.append('image', props.uploadFile)
		formData.append('alt_text', props.meta?.alt_text || '')
		formData.append('caption', props.meta?.caption || '')
		formData.append('description', props.meta?.description || '')

		const resp = await axios.post(`/admin/banners/${bannerId}/save-image`, formData)
		const uploaded = resp.data?.data ?? resp.data
		console.log('Uploaded image', { uploaded })
		if (uploaded) {
			fieldErrors.value = {}
			emit('confirm', {
				image: uploaded,
				meta: { ...(props.meta || {}) },
			})
		}
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
</script>

<style scoped>
.dropzone {
	position: relative;
	border: 1px dashed #cfcfcf;
	border-radius: 8px;
	padding: 12px;
	background: #fafafa;
	transition: border-color 0.15s ease, background 0.15s ease;
	overflow: hidden;
}

.dropzone--active {
	border-color: #1976d2;
	background: #eef4ff;
}

.dropzone-input {
	position: absolute;
	inset: 0;
	opacity: 0;
	z-index: 2;
}

.dropzone-preview {
	aspect-ratio: 16 / 9;
	width: 100%;
	border-radius: 4px;
}

.dropzone-placeholder {
	aspect-ratio: 16 / 9;
	width: 100%;
	border-radius: 4px;
	background: #f5f5f5;
	color: #666;
	border: 1px dashed #cfcfcf;
}

.dropzone-remove {
	position: absolute;
	top: 8px;
	right: 8px;
	z-index: 3;
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
</style>
