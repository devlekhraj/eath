<template>
    <div>
        <div class="text-right pb-4">
            <v-btn variant="tonal" color="primary" @click="openForm">
                <v-icon left>mdi-pencil</v-icon> Add Review
            </v-btn>
        </div>

        <v-row dense>
            <v-col v-for="(review, index) in guide.reviews" :key="review.id || index" cols="12" md="6">
                <v-card elevation="0" class="pa-4">
                    <v-row align="center" no-gutters>
                        <v-avatar size="48" class="me-4">
                            <v-icon size="32">mdi-account-circle</v-icon>
                        </v-avatar>


                        <div>
                            <div class="font-medium text-subtitle-1">{{ review.reviewer.name || 'Anonymous' }}</div>

                            <v-rating v-model="review.rating" color="amber" background-color="grey lighten-2" length="5"
                                size="20" readonly />
                        </div>
                    </v-row>

                    <v-divider class="my-3"></v-divider>

                    <div class="text-body-2" v-html="review.comment"></div>

                    <div class="text-caption grey--text mt-3">
                        {{ new Date(review.created_at).toLocaleDateString() }}
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <modal-template ref="globalModal" @close="handleClose" />
    </div>
</template>

<script setup>
import { ref } from 'vue'
import ReviewForm from './modal/ReviewForm.vue'
import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['close', 'saved'])
const { showSuccess, showError } = useSnackbar()
const props = defineProps({
    guide: {
        type: Object,
        default: () => ({}),
    },
})

const globalModal = ref(null)


function openForm() {
    globalModal.value.open({
        component: ReviewForm,
        size: 'md',
        props: {
            item: props.guide,
        },
    })
}

function handleClose() {
    // You can refresh data or show a message here after modal closes
    emit('close')
}
</script>

<style scoped>
/* Optional: limit card max height and add scroll if needed */
.v-card {
    min-height: 140px;
}
</style>
