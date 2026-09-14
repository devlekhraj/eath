<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span class="text-subtitle-1 font-weight-bold text-uppercase">{{ form.id ? 'Edit Experience' : 'Add Experience' }}</span>
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
                                label="Experience Name"
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
                                label="Slug (optional)"
                                :error-messages="serverErrors.slug"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.summary"
                                label="Summary"
                                rows="2"
                                auto-grow
                                :error-messages="serverErrors.summary"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <div class="mb-2">
                            <v-textarea
                                v-model="form.description"
                                label="Full Description"
                                rows="4"
                                auto-grow
                                :error-messages="serverErrors.description"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-text-field
                                v-model="form.sort_order"
                                label="Sort Order"
                                type="number"
                                min="0"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_active"
                                label="Active"
                                inset
                            />
                        </div>
                    </v-col>

                    <v-col cols="12" md="4">
                        <div class="mb-2">
                            <v-switch
                                v-model="form.is_featured"
                                label="Featured Experience"
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
                {{ form.id ? 'Save Changes' : 'Create Experience' }}
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { createExperienceApi } from '@/api/experiences.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    id: null,
    name: '',
    slug: '',
    summary: '',
    description: '',
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
            description: props.item.description || '',
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

        const resp = await createExperienceApi(form)

        showSuccess(resp.data?.message ?? resp.message ?? 'Experience saved successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to save experience')
        }
        console.error('Experience creation failed', error)
    } finally {
        loading.value = false
    }
}
</script>
