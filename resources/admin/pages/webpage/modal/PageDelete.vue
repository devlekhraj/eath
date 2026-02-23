<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Delete Item?</h4>
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

async function handleDelete() {
    submitting.value = true
    try {
        const resp = await axios.delete(`/admin/pages/${props.item.id}/delete`)
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
