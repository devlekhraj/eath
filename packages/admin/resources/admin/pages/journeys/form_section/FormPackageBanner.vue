<template>
    <div class="mb-4">
        <v-card>
            <v-card-text>
                <v-row>
                    <v-col cols="12">
                        <v-file-input prepend-icon="" v-model="selected_file" accept="image/*" @change="handleUploadImage" prepend-inner-icon="mdi-image" label="Select Image" :error="Boolean(imageError)" :error-messages="imageError"></v-file-input>

                        <div>
                            <v-row>
                                <v-col cols="6" md="4" v-for="(image, index) in journey.images" :key="index">
                                    <div class="position-relative">
                                        <img :src="image.url" alt="Image" style="width: 100%; object-fit: contain;" />
                                        <v-icon color="red" small class="position-absolute"
                                            style="top: 8px; right: 8px; cursor: pointer; padding: 2px;"
                                            @click="handleDelete(image)" title="Delete Image">
                                            mdi-close-thick
                                        </v-icon>
                                    </div>
                                </v-col>
                            </v-row>
                        </div>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>

        <!-- Modal -->
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'

const emit = defineEmits(['refresh', 'close'])
const { open: openModal } = useGlobalModal()

const { showSuccess } = useSnackbar()

const selected_file = ref(null)
const imageError = ref('') // For validation error message


const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})

import DeleteImage from '../modal/DeleteImage.vue'
import http from '@/http.config'

function handleDelete(item = {}) {
    openModal({
        title: 'Delete Item',
        component: DeleteImage,
        size: 'sm',
        props: {
            imageItem: item,
        },
        onClose: handleClose,
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

function handleUploadImage() {
    imageError.value = '' // reset previous error

    if (!selected_file.value) return

    const file = selected_file.value
    const img = new Image()
    const objectUrl = URL.createObjectURL(file)

    img.onload = () => {
        const width = img.naturalWidth
        const height = img.naturalHeight
        const aspectRatio = width / height

        URL.revokeObjectURL(objectUrl)

        if ((width === 1920 && height === 1080) || Math.abs(aspectRatio - 2.4) < 0.01) {
            // Passed validation - proceed with upload
            const formData = new FormData()
            formData.append('usage_id', props.journey.id)
            formData.append('usage_type', 'travel_packages')
            formData.append('image', file)

            http
                .post('/admin/gallery-upload', formData)
                .then(response => {
                    if (response && response.data && response.data.url) {
                        showSuccess('Image uploaded')
                        emit('refresh')
                        selected_file.value = null // reset file input
                    } else {
                        imageError.value = 'Upload failed: No URL returned'
                    }
                })
                .catch(err => {
                    imageError.value = err?.response?.data?.message || 'An error occurred'
                    console.error('Upload error:', err)
                })
        } else {
            imageError.value = 'Image must be exactly 1920x800 pixels or have 2.4:1 aspect ratio'
            selected_file.value = null // reset file input
        }
    }

    img.onerror = () => {
        URL.revokeObjectURL(objectUrl)
        imageError.value = 'Failed to load image for validation'
        selected_file.value = null
    }

    img.src = objectUrl
}
</script>
