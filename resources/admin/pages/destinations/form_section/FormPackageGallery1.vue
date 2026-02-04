<template>
    <div class="mb-4">
        <v-card elevation="0" class="pa-6">
            <v-card-title class="py-3">
                <div>
                    <h5>Package Images
                    </h5>
                </div>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text class="pt-10">
                <v-row>
                    <v-col cols="12">

                        <v-file-input prepend-icon="" v-model="selected_file" accept="image/*"
                        variant="outlined"
                            @change="handleUploadImage()" prepend-inner-icon="mdi-image"
                            label="File input"></v-file-input>
                        <div>
                            <v-row>
                                <v-col cols="6" md="4" v-for="(image, index) in travelPackage.images" :key="index">
                                    <div class="position-relative">
                                        <img :src="image.url" alt="Image" style="width: 100%; object-fit: contain;">

                                        <!-- Delete icon -->
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
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['refresh', 'close'])


const { showSuccess, showError } = useSnackbar()
const selected_file = ref(null);
const globalModal = ref(null);

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

import DeleteImage from '../modal/DeleteImage.vue'

function handleDelete(item = {}) {
    console.log({ item });
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

    const formData = new FormData();

    formData.append('usage_id', props.travelPackage.id);
    formData.append('usage_type', 'travel_packages');

    formData.append('image', selected_file.value);

    return axios.post('/admin/gallery-upload', formData)
        .then(response => {
            if (response && response.url) {
                showSuccess("Image uploaded");
                emit('refresh');
                return response.url; // must return URL string here!
            }
            return Promise.reject('Upload failed');
        })
        .catch(err => {
            showError(err?.response?.data?.message || 'An error occurred')
            console.error('Upload error:', err);
            return Promise.reject(err);
        });
}

</script>