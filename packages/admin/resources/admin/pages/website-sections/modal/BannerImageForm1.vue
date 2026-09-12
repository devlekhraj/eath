<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <div class="w-100 d-flex justify-between align-center">
                <span>Upload Form</span>
            </div>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <!-- Icon Upload Field -->
                    <v-col cols="12">
                        <v-file-input label="Select Image" accept="image/*" prepend-icon="" :error-messages="serverErrors.image_url" @change="handleUploadImage" prepend-inner-icon="mdi-upload" required />

                        <!-- Image Preview -->
                        <div v-if="form.image_url" style="height: 200px;" class="mt-2">
                            <img :src="form.image_url" alt="Uploaded Image Preview" style="width: 100%;" />
                        </div>
                        <p>{{ banner.aspect_ratio }} Aspect Ratio Image Needed</p>
                    </v-col>
                    <!-- <v-col cols="12">
                        <v-text-field v-model="form.title" label="Item title" :rules="[rules.required]" :error-messages="serverErrors.title" required />
                    </v-col>
                    <v-col cols="12">
                        <v-text-field v-model="form.title" label="Item Description" :rules="[rules.required]" :error-messages="serverErrors.description" required />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field v-model="form.link_url" label="URL" :rules="[rules.required]" :error-messages="serverErrors.url" required />
                    </v-col> -->

                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions>
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <!-- <v-spacer></v-spacer>
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn> -->
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const emit = defineEmits(['close', 'saved'])

const { showSuccess, showError } = useSnackbar()
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    title: '',
    description: '',
    link_url: '',
    image_url: '', // changed from icon to image_url
})

const serverErrors = reactive({
    name: '',
    image_url: '', // changed from icon to image_url
})

const rules = {
    required: v => !!v || 'This field is required',
}

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    banner: {
        type: Object,
        default: () => ({}),
    }
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            title: props.item.title || '',
            description: props.item.description || '',
            link_url: props.item.link_url || '',
            image_url: props.item.image_url || '', // changed here
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}


async function handleSubmit() {
    try {
        loading.value = true
        const resp = await http.post('admin/lookups', form)

        showSuccess(resp.message || 'Itinerary lookup saved successfully')
        emit('saved', resp.data)
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to save itinerary lookup')
        }
    } finally {
        loading.value = false
    }
}

async function handleUploadImage(event) {
    const file = event?.target?.files?.[0] || event?.[0]
    if (!file) return

    // console.log(props.banner);
    const isValidAspectRatio = await validateAspectRatio(file, props.banner.aspect_ratio)
    if (!isValidAspectRatio) {
        const message = "Image must have an aspect ratio of "+props.banner.aspect_ratio+" (e.g., 1920x800)";
        // showError(message)
        form.image_url = ''
        serverErrors.image_url = message;
        return
    }

    const formData = new FormData()
    formData.append('image', file)
    formData.append('usage_type', 'banners')
    formData.append('usage_id', props.banner.id)

    try {
        const uploadResp = await http.post('/admin/gallery-upload', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        })

        form.image_url = uploadResp.data?.url || ''
        serverErrors.image_url = ''
        emit('close')
    } catch (error) {
        showError('Image upload failed')
        form.image_url = ''
        serverErrors.image_url = 'Failed to upload icon'
    }
}

function validateAspectRatio(file, targetRatio = 2.4) {
    return new Promise((resolve) => {
        const img = new Image()
        img.onload = () => {
            const actualRatio = img.width / img.height
            const isCloseEnough = Math.abs(actualRatio - targetRatio) < 0.01
            resolve(isCloseEnough)
        }
        img.onerror = () => resolve(false)
        img.src = URL.createObjectURL(file)
    })
}


</script>

<style scoped></style>
