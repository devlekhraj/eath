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
            <v-btn color="error" :loading="submitting" @click="deleteCategory">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close'])

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
})

const submitting = ref(false)

const handleClose = () => {
    emit('close')
}

const deleteCategory = async () => {
    submitting.value = true
    try {
        const resp = await http.delete(`/admin/journeys/${props.item.id}/delete`)
        showSuccess(resp.message || "Deleted successfully");
        submitting.value = false
        handleClose()
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to delete');
        console.error(error)
        submitting.value = false
    }
}
</script>

<style scoped></style>
