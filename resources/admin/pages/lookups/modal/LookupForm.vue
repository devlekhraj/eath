<template>
    <v-card flat>
        <v-card-title>
            <div class="w-100 d-flex justify-between align-center">
                <span class="font-medium">Lookup Form</span>
                <v-spacer></v-spacer>
                <v-btn size="small" icon variant="text" color="error"
                    @click="handleCancel"><v-icon>mdi-close</v-icon></v-btn>
            </div>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <!-- Name Field -->
                    <v-col cols="12">
                        <v-select v-model="form.code" :items="lookup_codes" label="Code"
                        variant="outlined"
                        density="comfortable"
                        ></v-select>
                    </v-col>
                    <v-col cols="12">
                        <v-text-field v-model="form.name" label="Item Name" variant="outlined" density="comfortable"
                            :rules="[rules.required]" :error-messages="serverErrors.name" required />
                    </v-col>

                    <!-- Icon Upload Field -->
                    <v-col cols="12">
                        <v-file-input label="Upload Icon Image" accept="image/*" variant="outlined" prepend-icon=""
                            density="comfortable" :error-messages="serverErrors.icon_url" @change="handleIconUpload"
                            prepend-inner-icon="mdi-upload" required />

                        <!-- Image Preview -->
                        <div v-if="form.icon_url" style="height: 100px; width: 100px;" class="mt-2">
                            <img :src="form.icon_url" alt="Uploaded Icon Preview" style="width: 100%;" />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions>
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
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
    name: '',
    code:'',
    icon: '',
    icon_url: '', // changed from icon to icon_url
})

const serverErrors = reactive({
    name: '',
    icon_url: '', // changed from icon to icon_url
})

const rules = {
    required: v => !!v || 'This field is required',
}

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    lookup_codes: {
        type: Array,
        default: () => [],
    },
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            code: props.item.code || '',
            icon: props.item.icon || '',
            icon_url: props.item.icon_url || '', // changed here
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))
    const { valid } = await formRef.value.validate()
    if (!valid) return

    handleSubmit()
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

async function handleIconUpload(event) {
    const file = event?.target?.files?.[0] || event?.[0]
    if (!file) return

    const formData = new FormData()
    formData.append('image', file)

    try {
        const uploadResp = await http.post('/admin/gallery-upload', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        })
        form.icon = uploadResp.data?.filename || '';
        form.icon_url = uploadResp.data?.url || '';
        serverErrors.icon_url = '';
    } catch (error) {
        showError('Image upload failed')
        form.icon_url = ''
        serverErrors.icon_url = 'Failed to upload icon'
    }
}
</script>

<style scoped></style>
