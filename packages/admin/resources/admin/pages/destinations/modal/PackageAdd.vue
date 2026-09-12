<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Add New Package</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="form.name" label="Package Name" :rules="[rules.required]" :error-messages="serverErrors.name" />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field v-model="form.slug" label="Slug" :rules="[rules.required, rules.slug]" :error-messages="serverErrors.slug" hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint @input="onSlugInput" />
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
const loading = ref(false)
const formRef = ref(null)
const emit = defineEmits(['close', 'saved'])

const form = reactive({
    name: '',
    slug: '',
})

const serverErrors = reactive({
    name: null,
    slug: null,
})

const slugEdited = ref(false)

const { showSuccess, showError } = useSnackbar()

function slugify(text) {
    return text
        .toLowerCase()
        .trim()
        .replace(/[\s_]+/g, '-')       // Replace spaces/underscores with -
        .replace(/[^\w\-]+/g, '')      // Remove non-word chars
        .replace(/\-\-+/g, '-')        // Collapse multiple -
        .replace(/^-+|-+$/g, '')       // Trim start/end -
}

watch(() => form.name, (newName) => {
    if (!slugEdited.value) {
        form.slug = slugify(newName)
    }
})

function onSlugInput() {
    slugEdited.value = true
}

const rules = {
    required: v => !!v || 'This field is required',
    slug: v =>
        !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
        'Slug must contain only lowercase letters, numbers, and hyphens',
}

function handleCancel() {
    formRef.value?.reset()
    slugEdited.value = false
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))
    emit('close')
}

async function submitForm() {
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))

    const { valid } = await formRef.value.validate()
    if (!valid) return
    await handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true
        const resp = await http.post('/admin/journeys', form)
        showSuccess(resp.data?.message || 'Journey created successfully')
        router.push({ name: 'adminJourneyForm', query: { id: resp.data.id } })
    } catch (error) {
        if (error.response?.status === 422) {
            const errors = error.response.data?.errors || {}
            Object.keys(errors).forEach(key => {
                serverErrors[key] = errors[key]
            })
        } else {
            showError(error?.response?.data?.message || 'An error occurred')
        }
        console.error('Package creation failed', error)
    } finally {
        loading.value = false
    }
}
</script>

<style scoped></style>
