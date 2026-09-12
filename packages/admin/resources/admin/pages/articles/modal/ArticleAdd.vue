<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
            <span class="text-uppercase font-weight-medium text-slate-800">Add New Article</span>
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
                            v-model="form.title"
                            label="Title"
                            variant="outlined"
                            density="comfortable"
                            :rules="[rules.required]"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            v-model="form.slug"
                            label="Slug"
                            variant="outlined"
                            density="comfortable"
                            :rules="[rules.required, rules.slug]"
                            hint="URL-friendly string with lowercase letters, numbers, and hyphens"
                            persistent-hint
                            @input="onSlugInput"
                        />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-divider />

        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, watch } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { useRouter } from 'vue-router'
import { createArticleApi } from '@/api/articles.api'

const router = useRouter()
const loading = ref(false)

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)

const form = reactive({
    title: '',
    slug: '',
})

const slugEdited = ref(false)
const { showSuccess, showError } = useSnackbar()

function slugify(text) {
    const safeText = text == null ? '' : String(text)
    return safeText
        .toLowerCase()
        .trim()
        .replace(/[\s_]+/g, '-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+|-+$/g, '')
}

// Auto-update slug only if user hasn't edited it manually
watch(() => form.title, (newTitle) => {
    if (!slugEdited.value) {
        form.slug = slugify(newTitle)
    }
})

function onSlugInput() {
    slugEdited.value = true
}

const rules = {
    required: v => !!v || 'This field is required',
    slug: (v) =>
        !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
        'Slug must contain only lowercase letters, numbers, and hyphens',
}

function handleCancel() {
    formRef.value?.reset()
    slugEdited.value = false
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return
    await handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true
        const resp = await createArticleApi(form)
        loading.value = false
        showSuccess(resp.message || 'Article created successfully')
        const createdId = resp.data?.id || resp.article?.id || resp.blog?.id
        emit('close')
        if (createdId) {
            router.push({ name: 'adminArticleDetailPage', params: { id: createdId }, query: { id: createdId } })
        }
    } catch (error) {
        loading.value = false
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Article creation failed', error)
    }
}
</script>
