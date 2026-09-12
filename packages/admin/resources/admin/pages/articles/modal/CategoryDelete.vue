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
            <div class="text-subtitle-1">Are you sure you want to delete this category?</div>
            <div class="text-caption text-medium-emphasis mt-1">{{ item.name }}</div>
        </v-card-text>
        <v-divider />
        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" @click="handleClose">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="deleteCategory">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteArticleCategoryApi } from '@/api/articles.api'

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

async function deleteCategory() {
    submitting.value = true
    try {
        const resp = await deleteArticleCategoryApi(props.item.id)
        showSuccess(resp.message || 'Category deleted successfully')
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
