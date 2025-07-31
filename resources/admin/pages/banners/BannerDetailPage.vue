<template>
    <div>
        <div v-if="banner">
            <v-card elevation="0" class="pa-6 mb-4">
                <!-- Upload Button -->
                <div class="pb-4">
                    <v-btn size="large" color="primary" rounded @click="uploadImage">
                        <v-icon>mdi-image-plus-outline</v-icon>
                        Upload Image
                    </v-btn>
                </div>

                <v-divider></v-divider>

                <!-- Images Grid -->
                <v-row>
                    <v-col cols="12" md="3" v-for="(image, index) in banner.images" :key="index">
                        <div class="py-2">
                            <div class="image-wrapper position-relative">
                                <v-img :src="image.url" :lazy-src="image.url" aspect-ratio="2.4"
                                    class="bg-grey-lighten-2" contain>
                                    <template #placeholder>
                                        <v-row align="center" justify="center" class="fill-height ma-0">
                                            <v-progress-circular color="grey lighten-5" indeterminate />
                                        </v-row>
                                    </template>
                                </v-img>

                                <div class="hover-actions position-absolute top-0 right-0">
                                    <v-btn icon color="red" variant="text" size="x-small"
                                        @click.stop="deleteImage(image)">
                                        <v-icon>mdi-delete</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </div>
                    </v-col>
                </v-row>
            </v-card>

            <!-- Global Modal -->
            <modal-template ref="globalModal" @saved="fetchBanner" @close="fetchBanner" />
        </div>

        <!-- Loading Skeleton -->
        <v-skeleton-loader v-else type="card" />
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { useSnackbar } from '@/composables/snackbar'
import axios from 'axios'

const { showSuccess, showError } = useSnackbar()

const banner = ref(null)
const globalModal = ref(null);
const route = useRoute()

import BannerImageForm from './modal/BannerImageForm.vue';
import DeleteImage from './modal/DeleteImage.vue';

function uploadImage(item = {}) {
    globalModal.value.open({
        title: item ? 'Edit Banner' : 'Upload Image',
        component: BannerImageForm,
        size: 'md',
        props: {
            banner,
            item, // <-- correctly passed as a prop
        },
    });
}


function deleteImage(item) {
    globalModal.value.open({
        title: 'Delete Image',
        component: DeleteImage,
        size: 'sm',
        props: {
            item, // <-- correctly passed as a prop
        },
    });
}


const fetchBanner = async () => {
    try {
        const { data } = await axios.get(`/admin/banners/${route.params.id}`)
        banner.value = data
    } catch (error) {
        console.error('Error fetching banner details:', error)
        showError('Failed to load banner details.')
    }
}

onMounted(() => {
    fetchBanner()
})
</script>

<style scoped></style>
