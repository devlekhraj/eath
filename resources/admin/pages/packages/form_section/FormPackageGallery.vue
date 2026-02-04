<template>
	<div>
		<div class="d-flex align-center justify-space-between mb-4">

			<v-btn color="primary" rounded size="large" variant="elevated" @click="openSelectModal">
				<v-icon start>mdi-plus</v-icon>
				Add Image
			</v-btn>
		</div>
		<div v-if="galleryItems.length">
			<v-data-table :headers="tableHeaders" :items="galleryItems" item-key="id">
				<template #item.image="{ item }">
					<div class="py-4">
						<v-img :src="item?.url || item?.image_url || item" height="60" width="100" contain
							class="rounded" />
					</div>
				</template>
				<template #item.size="{ item }">
					<div class="text-caption" style="min-width: 100px;">
						<div>{{ formatDimensions(item) }}</div>
						<div>{{ formatAspectRatio(item) }}</div>
					</div>
				</template>
				<template #item.alt_text="{ item }">
					<div class="text-caption" style="min-width: 240px;">
						{{ resolveMeta(item, 'alt_text') }}
					</div>

				</template>
				<template #item.caption="{ item }">
					<div class="text-caption" style="min-width: 290px;">
						{{ resolveMeta(item, 'caption') }}
					</div>
				</template>
				<template #item.description="{ item }">
					<div class="text-caption" style="min-width: 350px;">
						{{ resolveMeta(item, 'description') }}
					</div>
				</template>
				<template #item.actions="{ item }">
					<div style="min-width: 100px;">
						<v-btn size="x-small" icon variant="tonal" color="primary"
							@click="handleEdit(item)"><v-icon>mdi-pencil</v-icon></v-btn>
						<v-btn size="x-small" icon variant="tonal" color="error" class="ml-2"
							@click="handleDelete(item)"><v-icon>mdi-delete</v-icon></v-btn>
					</div>
				</template>
			</v-data-table>
		</div>
		<div v-else>
			<p>No gallery items found.</p>
		</div>

		<modal-template ref="globalModal" />
	</div>
</template>

<script setup>
import { computed, ref } from 'vue'
import SelectGalleryImage from './gallery_form/SelectGalleryImage.vue'
import FormGalleryUpdate from './gallery_form/FormGalleryUpdate.vue'
import FormImageDelete from './gallery_form/FormImageDelete.vue'

const props = defineProps({
	 travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

const emit = defineEmits(['refresh'])
const globalModal = ref(null)

const galleryItems = computed(() => {
	// if (Array.isArray(props.travelPackage?.galleries)) return props.travelPackage.galleries
	if (Array.isArray(props.travelPackage?.images)) return props.travelPackage.images
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
	globalModal.value.open({
		title: 'Select Image',
		component: SelectGalleryImage,
		size: 'lg',
		props: {
			onSelect: handleSelectImage,
		},
	})
}

function handleEdit(item = {}) {
	globalModal.value.open({
		title: item ? 'Edit Category' : 'Add New Category',
		component: FormGalleryUpdate,
		size: 'lg',
		props: {
			imageItem: item,
			onUpdated: () => emit('refresh'),
		},
	});
}
function handleDelete(item = {}) {
	globalModal.value.open({
		title: 'Delete Photo',
		component: FormImageDelete,
		size: 'sm',
		props: {
			imageItem: item,
			onDeleted: removeImage,
		},
	});
}


function handleSelectImage(payload) {
	const image = payload?.image ?? payload
	const meta = payload?.meta
	if (!image) return

	const listKey = 'images'
	if (!Array.isArray(props.travelPackage[listKey])) {
		props.travelPackage[listKey] = []
	}

	const imageUrl = image.url || image.image_url || image
	const exists = props.travelPackage[listKey].some((item) => {
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
		props.travelPackage[listKey].push(image)
	}

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
	if (!Array.isArray(props.travelPackage[listKey])) return
	props.travelPackage[listKey] = props.travelPackage[listKey].filter((entry) => {
		if (entry?.id && item?.id) return entry.id !== item.id
		const entryUrl = entry?.url || entry?.image_url || entry
		const itemUrl = item?.url || item?.image_url || item
		return entryUrl !== itemUrl
	})

	emit('refresh')
}
</script>
