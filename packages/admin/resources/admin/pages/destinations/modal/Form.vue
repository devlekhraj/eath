<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span class="text-subtitle-1 font-weight-bold text-uppercase">{{ form.id ? 'Edit Destination' : 'Add Destination' }}</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pa-4">
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row dense>
                    <v-col cols="12" md="8">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.name"
                                label="Destination Name"
                                :rules="[rules.required]"
                                :error-messages="serverErrors.name"
                                required
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.slug"
                                label="URL Slug (optional)"
                                :error-messages="serverErrors.slug"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.region_label"
                                label="Region Label (e.g. Khumbu, Annapurna)"
                                :error-messages="serverErrors.region_label"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.sort_order"
                                label="Sort Order"
                                type="number"
                                min="0"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.summary"
                                label="Summary / Introduction"
                                rows="3"
                                auto-grow
                                :error-messages="serverErrors.summary"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_active"
                                label="Active"
                                inset
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_featured"
                                label="Featured Destination"
                                inset
                            />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" variant="flat" class="px-6 font-weight-medium" :loading="loading" :disabled="loading" @click="submitForm">
                <v-icon start>mdi-check</v-icon>
                {{ form.id ? 'Save Changes' : 'Create Destination' }}
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    id: null,
    name: '',
    slug: '',
    summary: '',
    region_label: '',
    sort_order: 0,
    is_active: true,
    is_featured: false,
})

const serverErrors = reactive({})

const rules = {
    required: (v) => !!v || 'This field is required',
}

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
            slug: props.item.slug || '',
            summary: props.item.summary || '',
            region_label: props.item.region_label || props.item.region || '',
            sort_order: props.item.sort_order || 0,
            is_active: props.item.is_active ?? true,
            is_featured: props.item.is_featured ?? false,
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    Object.keys(serverErrors).forEach((key) => (serverErrors[key] = null))

    const { valid } = await formRef.value.validate()
    if (!valid) return

    try {
        loading.value = true
        form.sort_order = parseInt(form.sort_order, 10) || 0

        const resp = await http.post('admin/destinations', form)

        showSuccess(resp.data?.message ?? resp.message ?? 'Destination saved successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to save destination')
        }
        console.error('Destination creation failed', error)
    } finally {
        loading.value = false
    }
}
</script>
