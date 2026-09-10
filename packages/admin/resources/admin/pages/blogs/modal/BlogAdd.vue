<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Add New Blog</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="form.title" label="Title" :rules="[rules.required]" />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field v-model="form.slug" label="Slug" :rules="[rules.required, rules.slug]" hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint @input="onSlugInput" />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, watch } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false);

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
        .replace(/[\s_]+/g, '-')       // Replace spaces/underscores with -
        .replace(/[^\w\-]+/g, '')      // Remove non-word chars
        .replace(/\-\-+/g, '-')        // Collapse multiple -
        .replace(/^-+|-+$/g, '')       // Trim start/end -
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
        loading.value = true;
        const resp = await http.post('/admin/blogs', form)
        loading.value = false;
        showSuccess(resp.data?.message || 'Blog created successfully')
        console.log('Blog created', { resp });
        // emit('close')
        router.push({ name: 'adminBlogDetailPage', query: { id: resp.blog.id } })
    } catch (error) {
        loading.value = false;
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Blog creation failed', error)
    }
}
</script>

<style scoped></style>
