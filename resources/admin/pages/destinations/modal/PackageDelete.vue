<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Are you sure?</h4>
        </v-card-text>
        <v-card-actions>
            <v-btn variant="text" @click="handleClose">No</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" :loading="submitting" @click="deleteCategory">Yes</v-btn>
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
        const resp = await http.delete(`/admin/travel-packages/${props.item.id}/delete`)
        console.log({resp});
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
