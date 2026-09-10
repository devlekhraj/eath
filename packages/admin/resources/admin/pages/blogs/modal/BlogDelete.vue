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
            <h4>Delete Blog Item?</h4>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleClose">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="deleteBlog">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
})

const emit = defineEmits(['close'])

const submitting = ref(false)

function handleClose() {
    emit('close')
}

async function deleteBlog() {
    submitting.value = true
    try {
        const resp = await http.delete(`/admin/blogs/${props.item.id}/delete`)
        showSuccess(resp.message || 'success');
        submitting.value = false
        handleClose()
    } catch (error) {
        showError(error?.response?.data?.message || 'An error occurred')
        console.error(error)
        submitting.value = false
    }
}
</script>

<style scoped></style>
