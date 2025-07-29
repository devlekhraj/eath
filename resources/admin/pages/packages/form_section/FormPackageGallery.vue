<template>
    <div class="mb-4">
        <v-card elevation="0" class="pa-6">
            <v-card-title class="py-3">
                <div>
                    <h5>Package Images</h5>
                </div>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text class="pt-10">
                <v-row>
                    <v-col cols="12">
                        <v-file-input prepend-icon="" v-model="selected_file" accept="image/*" variant="outlined"
                            @change="handleUploadImage" prepend-inner-icon="mdi-image" label="File input"
                            :error="Boolean(imageError)" :error-messages="imageError"></v-file-input>

                        <div>
                            <v-row>
                                <v-col cols="6" md="4" v-for="(image, index) in travelPackage.images" :key="index">
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
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const emit = defineEmits(['refresh', 'close'])
const { showSuccess, showError } = useSnackbar()

const selected_file = ref(null)
const imageError = ref('') // For validation error message

const globalModal = ref(null)

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

import DeleteImage from '../modal/DeleteImage.vue'

function handleDelete(item = {}) {
    globalModal.value.open({
        title: 'Delete Item',
        component: DeleteImage,
        size: 'sm',
        props: {
            imageItem: item,
        },
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

        if ((width === 1920 && height === 800) || Math.abs(aspectRatio - 2.4) < 0.01) {
            // Passed validation - proceed with upload
            const formData = new FormData()
            formData.append('usage_id', props.travelPackage.id)
            formData.append('usage_type', 'travel_packages')
            formData.append('image', file)

            axios
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
