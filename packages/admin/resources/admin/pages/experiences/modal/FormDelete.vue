<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span class="text-subtitle-1 font-weight-bold text-uppercase">Confirm Deletion</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pa-6 text-center">
            <v-icon color="warning" size="48" class="mb-3">mdi-alert-circle-outline</v-icon>
            <div class="text-body-1 font-weight-medium mb-1">Are you sure you want to delete this experience?</div>
            <div class="text-caption text-slate-500">"{{ item.name }}" will be removed from all associated journeys and filters.</div>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel" :disabled="loading">Cancel</v-btn>
            <v-btn color="error" variant="flat" class="px-6 font-weight-medium" :loading="loading" @click="handleDelete">
                Delete Experience
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteExperienceApi } from '@/api/experiences.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const loading = ref(false)

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
})

function handleCancel() {
    emit('close')
}

async function handleDelete() {
    try {
        loading.value = true
        const resp = await deleteExperienceApi(props.item.id)
        showSuccess(resp.data?.message ?? resp.message ?? 'Experience deleted successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to delete experience')
        console.error('Delete experience failed', error)
    } finally {
        loading.value = false
    }
}
</script>
