<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Are you sure?</h4>
            <div class="text-caption text-grey mt-2">
                This will delete: <strong>{{ item.title }}</strong>
            </div>
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
    }
})

const emit = defineEmits(['close'])

const submitting = ref(false)

function handleClose() {
    emit('close')
}

async function handleDelete() {
    submitting.value = true;

    console.log(props.item);
    try {
        const resp = await axios.delete(`/admin/package-prices/${props.item.id}/delete`)
        submitting.value = false
        showSuccess(resp.message || 'success');
        handleClose()
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to delete');
        console.error(error)
        submitting.value = false
    }
}
</script>
