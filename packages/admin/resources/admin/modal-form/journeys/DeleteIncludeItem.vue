<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Confirm Delete</span>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleClose">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="text-center pt-4">
            <div class="text-subtitle-1 font-weight-medium">Are you sure?</div>
            <div class="text-caption text-grey mt-2">
                This will delete: <strong>{{ item.title }}</strong>
            </div>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleClose">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="handleDelete">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { deleteJourneyService } from '@/http/journeys.http'

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
        const resp = await deleteJourneyService(props.item.id)
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
