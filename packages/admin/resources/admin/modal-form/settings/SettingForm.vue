<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Setting Form</span>
            <v-btn icon variant="text" aria-label="Close dialog" @click="$emit('close')">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" lazy-validation>
                <v-row>
                    <!-- Setting Name -->
                    <v-col cols="12">
                        <div class="mb-2">
                            <v-text-field v-model="form.name" label="Setting Name" :rules="[rules.required]" :error-messages="serverErrors.name" />
                        </div>
                    </v-col>

                    <!-- Type -->
                    <v-col cols="12">
                        <div class="mb-2">
                            <v-select v-model="form.type" :items="input_types" item-title="name" item-value="id" label="Input Type" clearable :error-messages="serverErrors.type" />
                        </div>
                    </v-col>

                    <!-- Conditional Value Field -->
                    <v-col cols="12" v-if="form.type === 'text'">
                        <div class="mb-2">
                            <v-text-field v-model="form.value" label="Value" :error-messages="serverErrors.value" />
                        </div>
                    </v-col>

                    <v-col cols="12" v-if="form.type === 'textarea'">
                        <div class="mb-2">
                            <v-textarea v-model="form.value" label="Value" :error-messages="serverErrors.value" />
                        </div>
                    </v-col>

                    <v-col cols="12" v-if="form.type === 'image'">
                        <div class="mb-2">
                            <v-file-input v-model="form.value" label="Upload Image" accept="image/*" show-size :error-messages="serverErrors.value" prepend-icon="" prepend-inner-icon="mdi-camera" @change="handleIconUpload" />
                        </div>

                        <!-- Image Preview -->
                        <div v-if="form.value" style="height: 100px; width: 100px;" class="mt-2">
                            <img :src="form.value" alt="Uploaded Icon Preview" style="width: 100%;" />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="emit('close')">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">
                Save
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { saveSettingApi } from '@/http/settings.http'
import { uploadGalleryImageApi } from '@/http/gallery.http'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    name: '',
    type: 'text',
    value: '',
})

const input_types = ref([
    { id: 'text', name: 'Text' },
    { id: 'textarea', name: 'Textarea' },
    { id: 'image', name: 'Image' }
])


const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            type: props.item.type || 'text',
            value: props.item.value || '',
        })
    }
})

const serverErrors = reactive({})
const rules = {
    required: v => !!v || 'This field is required',
}

async function submitForm() {
    Object.keys(serverErrors).forEach(k => serverErrors[k] = null)
    const { valid } = await formRef.value.validate()
    if (!valid) return
    handleSubmit()
}

async function handleIconUpload(event) {
    const file = event?.target?.files?.[0] || event?.[0]
    if (!file) return

    const formData = new FormData()
    formData.append('image', file)

    try {
        const uploadResp = await uploadGalleryImageApi(formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        })
        form.value = uploadResp.data?.url || '';
        form.image_url = uploadResp.data?.url || '';
        serverErrors.image_url = '';
    } catch (error) {
        showError('Image upload failed')
        form.image_url = ''
        serverErrors.image_url = 'Failed to upload icon'
    }
}

async function handleSubmit() {
    try {
        loading.value = true


        const resp = await saveSettingApi(form)
        showSuccess(resp.message || 'Setting saved successfully')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to save setting')
        }
    } finally {
        loading.value = false
    }
}
</script>
