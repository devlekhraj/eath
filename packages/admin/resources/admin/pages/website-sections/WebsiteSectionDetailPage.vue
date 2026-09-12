<template>
	<div>
		<div class="d-flex align-center justify-space-between mb-4">

			<v-btn color="primary" @click="openSelectModal">
				<v-icon start>mdi-plus</v-icon>
				Add Image
			</v-btn>
		</div>
		<div v-if="galleryItems.length">
			<v-data-table :headers="tableHeaders" :items="galleryItems" item-key="id">
				<template #item.image="{ item }">
					<div class="py-2">
						<v-img :src="item?.url || item?.image_url || item" height="60" width="100" cover class="rounded" />
					</div>
				</template>
				<template #item.size="{ item }">
					<span class="text-caption">{{ formatDimensions(item) }}</span>
				</template>
				<template #item.alt_text="{ item }">
					<div class="text-caption">
						{{ resolveMeta(item, 'alt_text') }}
					</div>
				</template>
				<template #item.caption="{ item }">
					<div class="text-caption">
						{{ resolveMeta(item, 'caption') }}
					</div>
				</template>
				<template #item.description="{ item }">
					<div class="text-caption">
						{{ resolveMeta(item, 'description') }}
					</div>
				</template>
				<template #item.actions="{ item }">
					<div class="d-flex align-center justify-center ga-1">
						<v-btn size="small" variant="outlined" color="primary" @click="handleEdit(item)" title="Edit image">
							<v-icon start size="14">mdi-pencil</v-icon>
							Edit
						</v-btn>
						<v-btn size="small" variant="outlined" color="error" @click="handleDelete(item)" title="Delete image">
							<v-icon start size="14">mdi-delete</v-icon>
							Delete
						</v-btn>
					</div>
				</template>
			</v-data-table>
		</div>
		<div v-else>
			<p>No gallery items found.</p>
		</div>

	</div>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import SelectGalleryImage from '@components/gallery/SelectGalleryImage.vue'
import FormGalleryUpdate from '@components/gallery/FormGalleryUpdate.vue'
import FormImageDelete from '@components/gallery/FormImageDelete.vue'
import { getBannerByIdApi } from '@/api/website-sections.api'
import { useGlobalModal } from '@/composables/globalModal'

const emit = defineEmits(['refresh'])
const globalModal = useGlobalModal()
const route = useRoute()
const sectionId = route.params.id || route.query.id || null
const banner = ref({})

const galleryItems = computed(() => {
	if (Array.isArray(banner.value?.images)) return banner.value.images
	return []
})

const tableHeaders = [
	{ title: 'Image', key: 'image', sortable: false },
	{ title: 'Size', key: 'size', sortable: false },
	{ title: 'Alt Text', key: 'alt_text', sortable: false },
	{ title: 'Caption', key: 'caption', sortable: false },
	{ title: 'Description', key: 'description', sortable: false },
	{ title: 'Action', key: 'actions', sortable: false },
]

function openSelectModal() {
	globalModal.open({
		title: 'Select Image',
		component: SelectGalleryImage,
		size: 'lg',
		props: {
			onSelect: handleSelectImage,
		},
	})
}

function handleEdit(item = {}) {
	globalModal.open({
		title: item ? 'Edit Category' : 'Add New Category',
		component: FormGalleryUpdate,
		size: 'lg',
		props: {
			imageItem: item,
			onUpdated: fetchBanner,
		},
	});
}
function handleDelete(item = {}) {
	globalModal.open({
		title: 'Delete Photo',
		component: FormImageDelete,
		size: 'sm',
		props: {
			imageItem: item,
			onDeleted: () => {
				removeImage(item)
				fetchBanner()
			},
		},
	});
}

async function fetchBanner() {
	if (!sectionId) return
	try {
		const resp = await getBannerByIdApi(sectionId)
		banner.value = resp?.data ?? resp ?? {}
	} catch (error) {
		console.error('Failed to fetch banner', error)
	}
}

function handleSelectImage(payload) {
	const image = payload?.image ?? payload
	const meta = payload?.meta
	if (!image) return

	const listKey = 'images'
	if (!Array.isArray(banner.value[listKey])) {
		banner.value[listKey] = []
	}

	const imageUrl = image.url || image.image_url || image
	const exists = banner.value[listKey].some((item) => {
		const existingUrl = item?.url || item?.image_url || item
		return item?.id === image?.id || existingUrl === imageUrl
	})

	if (!exists) {
		if (meta) {
			image.custom_attributes = {
				...(image.custom_attributes || {}),
				alt_text: meta.alt_text || '',
				caption: meta.caption || '',
				description: meta.description || '',
			}
		}
		banner.value[listKey].push(image)
	}

	fetchBanner()
	emit('refresh')
}

function resolveMeta(item, key) {
	return (
		item?.[key] ||
		item?.custom_attributes?.[key] ||
		item?.meta?.[key] ||
		'-'
	)
}

function formatDimensions(item) {
	const width = item?.width ?? item?.image_width
	const height = item?.height ?? item?.image_height
	if (!width || !height) return '-'
	return `${width} × ${height}px`
}

function formatAspectRatio(item) {
	const width = item?.width ?? item?.image_width
	const height = item?.height ?? item?.image_height
	if (!width || !height) return '-'
	const ratio = width / height
	const target = 16 / 9
	const tolerance = 0.02
	const label = Math.abs(ratio - target) <= tolerance ? '16:9' : `${ratio.toFixed(2)}:1`
	return `Aspect: ${label}`
}

function removeImage(item) {
	const listKey = 'images'
	if (!Array.isArray(banner.value[listKey])) return
	banner.value[listKey] = banner.value[listKey].filter((entry) => {
		if (entry?.id && item?.id) return entry.id !== item.id
		const entryUrl = entry?.url || entry?.image_url || entry
		const itemUrl = item?.url || item?.image_url || item
		return entryUrl !== itemUrl
	})

	emit('refresh')
}

onMounted(() => {
	fetchBanner()
})
</script>
