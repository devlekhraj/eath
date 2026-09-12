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
import http from '@/http.config'
import { computed } from 'vue'
import SelectGalleryImage from '@components/gallery/SelectGalleryImage.vue'
import FormGalleryUpdate from '@components/gallery/FormGalleryUpdate.vue'
import FormImageDelete from '@components/gallery/FormImageDelete.vue'
import { useGlobalModal } from '@/composables/globalModal'

const props = defineProps({
    form: {
        type: Object,
        default: () => ({}),
    },
    articleId: {
        type: [String, Number],
        default: null,
    },
    submitting: {
        type: Boolean,
        default: false,
    },
})

const emit = defineEmits(['saved'])
const globalModal = useGlobalModal()

const galleryItems = computed(() => {
    if (Array.isArray(props.form?.galleries)) return props.form.galleries
    if (Array.isArray(props.form?.images)) return props.form.images
    if (Array.isArray(props.form?.gallery)) return props.form.gallery
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
            onUpdated: () => emit('saved', { message: 'Gallery item updated' }),
        },
    })
}

function handleDelete(item = {}) {
    globalModal.open({
        title: 'Delete Photo',
        component: FormImageDelete,
        size: 'sm',
        props: {
            imageItem: item,
            onDeleted: removeImage,
        },
    })
}

async function handleSelectImage(payload) {
    const meta = payload?.meta || {}
    const file = payload?.file
    let image = payload?.image ?? payload
    const articleId = props.articleId

    if (!articleId) return

    if (file instanceof File) {
        const formData = new FormData()
        formData.append('image', file)
        formData.append('alt_text', meta.alt_text || '')
        formData.append('caption', meta.caption || '')
        formData.append('description', meta.description || '')

        const response = await http.post(`/admin/blogs/${articleId}/save-image`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        })

        const uploaded = response?.data?.data ?? response?.data ?? {}
        image = {
            ...uploaded,
            url: uploaded?.url || response?.data?.url || uploaded?.image_url || '',
            image_url: uploaded?.image_url || uploaded?.url || response?.data?.url || '',
        }
    } else {
        if (!image?.id) return
        await http.post(`/admin/blogs/${articleId}/use-image`, {
            gallery_id: image.id,
            alt_text: meta.alt_text || '',
            caption: meta.caption || '',
            description: meta.description || '',
        })
    }
    if (!image) return

    const listKey = Array.isArray(props.form?.galleries)
        ? 'galleries'
        : Array.isArray(props.form?.images)
            ? 'images'
            : Array.isArray(props.form?.gallery)
                ? 'gallery'
                : 'galleries'

    if (!Array.isArray(props.form[listKey])) {
        props.form[listKey] = []
    }

    const imageUrl = image.url || image.image_url || image
    const exists = props.form[listKey].some((item) => {
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
        props.form[listKey].push(image)
    }

    emit('saved', { message: file instanceof File ? 'Image uploaded' : 'Image selected' })
}

function resolveMeta(item, key) {
    return item?.[key] || item?.custom_attributes?.[key] || item?.meta?.[key] || '-'
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
    const listKey = Array.isArray(props.form?.galleries)
        ? 'galleries'
        : Array.isArray(props.form?.images)
            ? 'images'
            : Array.isArray(props.form?.gallery)
                ? 'gallery'
                : 'galleries'

    if (!Array.isArray(props.form[listKey])) return
    props.form[listKey] = props.form[listKey].filter((entry) => {
        if (entry?.id && item?.id) return entry.id !== item.id
        const entryUrl = entry?.url || entry?.image_url || entry
        const itemUrl = item?.url || item?.image_url || item
        return entryUrl !== itemUrl
    })

    emit('saved', { message: 'Image removed' })
}
</script>
