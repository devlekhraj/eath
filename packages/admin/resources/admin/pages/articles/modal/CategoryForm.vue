<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
            <span class="text-uppercase font-weight-medium text-slate-800">
                {{ form.id ? 'Edit Article Category' : 'Add Article Category' }}
            </span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field
                            v-model="form.name"
                            label="Category Name"
                            variant="outlined"
                            density="comfortable"
                            :rules="[rules.required]"
                            required
                            @input="onNameInput"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            v-model="form.slug"
                            label="URL Slug"
                            variant="outlined"
                            density="comfortable"
                            :rules="[rules.required, rules.slug]"
                            hint="URL slug e.g. trekking-guide, alpine-culture"
                            persistent-hint
                            required
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <v-text-field
                            v-model.number="form.sort_order"
                            label="Sequence / Sort Order"
                            type="number"
                            variant="outlined"
                            density="comfortable"
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <div class="d-flex align-center h-100">
                            <v-switch
                                v-model="form.is_active"
                                inset
                                label="Active Status"
                                color="success"
                            />
                        </div>
                    </v-col>

                    <v-col cols="12">
                        <label class="text-caption mb-1 d-block">Description</label>
                        <SummarnoteEditor v-model="form.description" minHeight="180" />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-divider />

        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save Category</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { createArticleCategoryApi } from '@/api/articles.api'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)
const slugEdited = ref(false)

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

const form = reactive({
    id: null,
    name: '',
    slug: '',
    description: '',
    is_active: true,
    sort_order: 0,
})

const rules = {
    required: v => !!v || 'This field is required',
    slug: v =>
        !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
        'Slug must contain only lowercase letters, numbers, and hyphens',
}

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            slug: props.item.slug || '',
            description: props.item.description || '',
            is_active: props.item.is_active ?? true,
            sort_order: props.item.sort_order ?? 0,
        })
        slugEdited.value = true
    }
})

function onNameInput() {
    if (!slugEdited.value && form.name) {
        form.slug = form.name
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
    }
}

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return

    loading.value = true
    try {
        form.sort_order = parseInt(form.sort_order) || 0
        const resp = await createArticleCategoryApi(form)
        loading.value = false
        showSuccess(resp.message || 'Category saved successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        loading.value = false
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Category save failed', error)
    }
}
</script>
