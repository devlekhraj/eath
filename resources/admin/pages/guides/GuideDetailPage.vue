<template>
    <v-container class="py-8">
        <div v-if="guide">
            <!-- Guide Header -->
            <v-card elevation="0" class="pa-6 mb-6">
                <div class="d-flex flex-column flex-md-row align-center gap-6">
                    <v-avatar size="120">
                        <v-img :src="guide.photo || '/images/default-user.jpg'" />
                    </v-avatar>
                    <div>
                        <h2 class="mb-1 text-uppercase">{{ guide.name }}</h2>
                        <p class="text-subtitle-1 text-grey">{{ guide.username }}</p>
                        <v-chip :color="statusColor(guide.status)" size="small" label class="text-capitalize mt-2">
                            {{ guide.status }}
                        </v-chip>
                    </div>
                </div>
            </v-card>

            <!-- Tabs Section -->
            <v-card elevation="0" class="mb-6">
                <v-tabs v-model="activeTab" color="primary">
                    <v-tab value="bio">
                        <v-icon color="primary" start>mdi-account</v-icon>
                        Bio
                    </v-tab>
                    <v-tab value="ratings">
                        <v-icon color="primary" start>mdi-star</v-icon>
                        Ratings
                    </v-tab>
                    <v-tab value="trips">
                        <v-icon color="primary" start>mdi-map-marker</v-icon>
                        Trips
                    </v-tab>
                </v-tabs>

                <v-divider></v-divider>

                <v-card-text>
                    <!-- Bio Tab -->
                    <div v-if="activeTab === 'bio'">
                        <v-row dense>
                            <v-col cols="12" md="6">
                                <strong>Email:</strong><br />{{ guide.email || 'N/A' }}
                            </v-col>
                            <v-col cols="12" md="6">
                                <strong>Phone:</strong><br />{{ guide.phone_no || 'N/A' }}
                            </v-col>
                            <v-col cols="12" md="6">
                                <strong>License Number:</strong><br />{{ guide.license_number || 'N/A' }}
                            </v-col>
                            <v-col cols="12" md="6">
                                <strong>Languages Spoken:</strong>
                                <div class="mt-2 d-flex flex-wrap">
                                    <v-chip v-for="lang in guide.language_spoken" :key="lang" class="ma-1"
                                        color="primary" label>
                                        {{ lang }}
                                    </v-chip>
                                </div>
                            </v-col>
                            <v-col cols="12">
                                <strong>Bio:</strong>
                                <p class="mt-1 text-grey-darken-1">{{ guide.bio || 'No bio available.' }}</p>
                            </v-col>
                        </v-row>
                    </div>

                    <!-- Ratings Tab -->
                    <div v-else-if="activeTab === 'ratings'">
                        <p>Total Reviews: <strong>{{ guide.rating_count }}</strong></p>
                        <v-alert type="info" variant="tonal">Ratings list goes here.</v-alert>
                    </div>

                    <!-- Trips Tab -->
                    <div v-else-if="activeTab === 'trips'">
                        <p>Total Trips: <strong>{{ guide.trip_count }}</strong></p>
                        <v-alert type="info" variant="tonal">Trip history goes here.</v-alert>
                    </div>
                </v-card-text>
            </v-card>
        </div>

        <!-- Loading State -->
        <v-skeleton-loader v-else type="card" />
    </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

const guide = ref(null)
const activeTab = ref('bio')
const route = useRoute()

onMounted(async () => {
    try {
        const { data } = await axios.get(`/admin/guides/${route.params.id}`)
        guide.value = data
    } catch (error) {
        console.error('Error fetching guide details:', error)
    }
})

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
