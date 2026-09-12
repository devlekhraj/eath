<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
            <span class="text-uppercase font-weight-medium text-slate-800">Confirm Delete</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleClose">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="text-center pt-4">
            <div class="text-subtitle-1">Are you sure you want to delete this page?</div>
            <div class="text-caption text-medium-emphasis mt-1">{{ item?.title }}</div>
        </v-card-text>
        <v-divider />
        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" @click="handleClose">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="handleDelete">Delete</v-btn>
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

const emit = defineEmits(['close', 'saved'])
const submitting = ref(false)

function handleClose() {
    emit('close')
}

async function handleDelete() {
    submitting.value = true
    try {
        const resp = await http.delete(`/admin/website-pages/${props.item.id}/delete`)
        showSuccess(resp.message || 'Page deleted successfully')
        submitting.value = false
        emit('saved')
        handleClose()
    } catch (error) {
        showError(error?.response?.data?.message || 'An error occurred')
        console.error(error)
        submitting.value = false
    }
}
</script>

<style scoped></style>
