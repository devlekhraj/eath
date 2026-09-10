<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Category Form</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <v-col cols="12" md="12">
                        <v-text-field v-model="form.name" label="Category Name" :rules="[rules.required]" :error-messages="serverErrors.name" required />
                    </v-col>

                    <v-col cols="12" md="12">
                        <v-select v-model="form.parent_id" :items="parentOptions" item-title="name" item-value="id" label="Parent Category" clearable :error-messages="serverErrors.parent_id" />
                    </v-col>

                    <v-col cols="12" md="12">
                        <v-textarea v-model="form.description" label="Description" :error-messages="serverErrors.description" />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-text-field v-model="form.sort_order" label="Sequence Number" type="number" :error-messages="serverErrors.sort_order" />
                    </v-col>

                    <v-col cols="6" md="6">
                        <div class="text-right">
                            <v-switch v-model="form.is_active" inset label="Active" color="success" />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
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
    name: '',
    parent_id: null,
    description: '',
    is_active: false,
    sort_order: 0,
})

const parentOptions = ref([])
const serverErrors = reactive({})

const rules = {
    required: v => !!v || 'This field is required',
}

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

onMounted(() => {
    fetchParentCategories()

    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            parent_id: props.item.parent_id || null,
            description: props.item.description || '',
            is_active: props.item.is_active ?? true,
            sort_order: props.item.sort_order || 0,
        })
    }
})

async function fetchParentCategories() {
    try {
        const resp = await http.get('admin/package-categories?type=parent')
        parentOptions.value = resp.data || []
    } catch (error) {
        console.error('Failed to load parent categories', error)
    }
}

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    // Clear previous server errors
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))

    const { valid } = await formRef.value.validate()
    if (!valid) return

    handleSubmit()
}

async function handleSubmit() {
    try {
        form.sort_order = parseInt(form.sort_order) || 0

        loading.value = true
        const resp = await http.post('admin/package-categories', form)

        showSuccess(resp.message || 'Category created successfully')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to update status')
        }
        console.error('Category creation failed', error)
    } finally {
        loading.value = false
    }
}
</script>

<style scoped></style>
