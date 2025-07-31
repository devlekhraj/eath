<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Are you sure?</h4>
        </v-card-text>
        <v-card-actions>
            <v-btn variant="text" @click="handleClose">No</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" :loading="submitting" @click="handleDelete">Yes</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar' // optional, if you're showing feedback
import axios from 'axios'
import { defineProps, defineEmits } from 'vue'

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
        await axios.delete(`/admin/galleries/${props.item.id}/delete`)
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
