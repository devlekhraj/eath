<template>
    <v-card flat>
        <v-card-title>
            <span class="font-medium">{{ title }}</span>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <div class="mb-4">
                    <label class="text-sm font-medium">Bio</label>
                    <RichTextEditor v-model="form.bio" />
                    <div v-if="!form.bio" class="text-red text-sm mt-1">This field is required</div>
                </div>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    bio: '',
})

const serverErrors = reactive({})

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    title: {
        type: String,
        default: 'Update Bio Form',
    },
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            bio: props.item.bio || '',
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    // Simple validation
    if (!form.bio) return

    handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true
        const resp = await axios.patch(`admin/guides/${props.item.id}/bio`, form)
        showSuccess(resp.message || 'Bio updated successfully')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to update bio')
        }
        console.error('Bio update failed', error)
    } finally {
        loading.value = false
    }
}
</script>
