<template>
    <v-card rounded="0">
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
            <span class="text-uppercase font-weight-medium text-slate-800">Add New Page</span>
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
                            rounded="0"
                            :rules="[rules.required]"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            v-model="form.slug"
                            label="Slug"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.required, rules.slug]"
                            hint="URL-friendly string with lowercase letters, numbers, and hyphens"
                            persistent-hint
                            @input="onSlugInput"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-select
                            v-model="form.type"
                            :items="typeOptions"
                            label="Page Type"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                        />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-divider />

        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" rounded="0" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" rounded="0" :loading="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, watch } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)

const typeOptions = [
    { title: 'Standard Page', value: 'standard' },
    { title: 'Policy Page', value: 'policy' },
    { title: 'Safety & Protocol', value: 'safety' },
    { title: 'Responsible Travel', value: 'responsible' },
    { title: 'About Us', value: 'about' },
    { title: 'Contact Us', value: 'contact' },
]

const form = reactive({
    title: '',
    slug: '',
    type: 'standard',
})

const slugEdited = ref(false)
const { showSuccess, showError } = useSnackbar()

function slugify(text) {
    return text
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
        const resp = await http.post('/admin/website-pages', form)
        loading.value = false
        showSuccess(resp.message || 'Page created successfully')
        emit('close')
        const pageId = resp.data?.id || resp.page?.id
        if (pageId) {
            router.push({ name: 'adminWebPageDetail', params: { id: pageId } })
        }
    } catch (error) {
        loading.value = false
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Page creation failed', error)
    }
}
</script>

<style scoped></style>
