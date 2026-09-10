<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Confirm Delete</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleClose">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="text-center pt-4">
            <div class="text-subtitle-1 font-weight-medium">Are you sure?</div>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleClose">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="handleDelete">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar' // optional, if you're showing feedback
import http from '@/http.config'

const props = defineProps({
    item: {
        type: Object,
        required: true,
    }
})

const emit = defineEmits(['close'])

const submitting = ref(false)
const { showSuccess, showError } = useSnackbar()

const handleClose = () => {
    emit('close')
}

const handleDelete = async () => {
    try {
        submitting.value = true
        await http.delete(`/admin/galleries/${props.item.id}/delete`)
        showSuccess('Image deleted successfully') // optional
        emit('close')
    } catch (error) {
        console.error('Delete failed:', error)
        showError('Failed to delete image') // optional
    } finally {
        submitting.value = false
    }
}
</script>

<style scoped></style>
