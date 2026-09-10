<template>
    <div class="">
        <div v-if="guide">
            <!-- Guide Header -->
            <v-card class="pa-6 mb-4 position-relative">
                <div class="d-flex flex-column flex-md-row align-center gap-6">
                    <!-- Avatar Upload -->
                    <div class="avatar-upload-wrapper" @click="triggerPhotoUpload">
                        <v-avatar size="120" class="position-relative hoverable-avatar">
                            <v-img :src="guide.avatar" contain />
                            <!-- Overlay on hover -->
                            <div class="avatar-overlay d-flex align-center justify-center">
                                <v-icon color="white" size="28" class="me-2">mdi-camera</v-icon>
                                <span class="text-white text-caption">Change Photo</span>
                            </div>
                        </v-avatar>

                        <!-- Hidden File Input -->
                        <input ref="photoInput" type="file" accept="image/*" @change="handlePhotoChange"
                            style="display: none" />
                    </div>
                    <!-- Guide Info -->
                    <div class="pl-4">
                        <h2 class="mb-1 text-uppercase">{{ guide.name }}</h2>
                        <p class="text-subtitle-1 text-grey">{{ guide.username }}</p>
                        <v-chip :color="statusColor(guide.status)" size="small" label class="text-capitalize mt-2">
                            {{ guide.status }}
                        </v-chip>
                    </div>
                </div>
                <v-btn icon size="small" variant="tonal" color="primary" style="position: absolute;top:10px; right: 10px;" @click="openForm(guide)"><v-icon>mdi-pencil</v-icon></v-btn>
            </v-card>


            <!-- Tabs Section -->
            <v-card class="mb-6">
                <v-tabs v-model="activeTab" color="primary">
                    <v-tab value="bio">
                        <v-icon color="primary" start>mdi-account</v-icon>
                        Bio
                    </v-tab>
                    <v-tab value="reviews">
                        <v-icon color="primary" start>mdi-star</v-icon>
                        Reviews
                    </v-tab>
                    <v-tab value="trips">
                        <v-icon color="primary" start>mdi-map-marker</v-icon>
                        Trips
                    </v-tab>
                </v-tabs>

                <v-divider />

                <v-card-text>
                    <div>
                        <component :is="currentTabComponent" @close="fetchData" :guide="guide" />
                    </div>
                </v-card-text>
            </v-card>
            <modal-template ref="globalModal" @close="fetchData"></modal-template>
        </div>

        <!-- Loading State -->
        <v-skeleton-loader v-else type="card" />
    </div>
</template>

<script setup>
import { ref, onMounted, defineAsyncComponent, computed } from 'vue'
import { useRoute } from 'vue-router'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import GuideForm from './modal/GuideForm.vue'

const { showSuccess, showError } = useSnackbar()

const guide = ref(null)
const activeTab = ref('bio')
const route = useRoute()

const photoInput = ref(null)

const triggerPhotoUpload = () => {
    photoInput.value?.click()
}

const handlePhotoChange = async (event) => {
    const file = event.target.files[0]
    if (!file) return

    const formData = new FormData()
    formData.append('image', file);
    formData.append('usage_id', route.params.id);
    formData.append('usage_type', 'guides');


    try {
        const { url, filename } = await http.post(`/admin/gallery-upload`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })

        // Assuming `data.photo` is the new image URL
        guide.value.avatar = url;
        guide.value.photo = filename;
    } catch (error) {
        showError(error?.response?.data?.message || 'Photo upload failed');
        console.error('Photo upload failed:', error)
    }
}

// Dynamically resolve component based on activeTab
const tabComponents = {
    bio: defineAsyncComponent(() => import('./tabs/TabBio.vue')),
    reviews: defineAsyncComponent(() => import('./tabs/TabReviews.vue')),
    trips: defineAsyncComponent(() => import('./tabs/TabTrip.vue'))
}

const currentTabComponent = computed(() => tabComponents[activeTab.value])

onMounted(async () => {
    await fetchData();
})
async function fetchData(){
    try {
        const { data } = await http.get(`/admin/guides/${route.params.id}`)
        guide.value = data
    } catch (error) {
        console.error('Error fetching guide details:', error)
    }
}
const globalModal = ref(null);

function openForm(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: GuideForm,
        size: 'md',
        props: {
            item,
        },
    })
}

const statusColor = (status) => {
    switch (status) {
        case 'active': return 'green'
        case 'inactive': return 'grey'
        case 'pending': return 'orange'
        case 'deleted':
        case 'suspended': return 'red'
        default: return 'grey'
    }
}
</script>
<style scoped>
.avatar-upload-wrapper {
    position: relative;
    cursor: pointer;
    display: inline-block;
}

.hoverable-avatar {
    transition: box-shadow 0.3s ease;
}

.hoverable-avatar:hover {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.4);
}

.avatar-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(33, 33, 33, 0.55);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 50%;
    z-index: 2;
}

.avatar-upload-wrapper:hover .avatar-overlay {
    opacity: 1;
}
</style>