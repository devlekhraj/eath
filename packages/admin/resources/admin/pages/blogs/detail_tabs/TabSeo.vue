<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="8" offset-lg="2">
                <v-text-field v-model="form.meta_title" label="Meta Title" counter="60" hint="Max 60 characters for best SEO" persistent-hint class="mb-4" :error-messages="errors.meta_title" />

                <v-textarea v-model="form.meta_description" label="Meta Description" rows="3" counter="160" hint="Max 160 characters for search engines" persistent-hint class="mb-4" :error-messages="errors.meta_description" />

                <v-textarea v-model="seoKeyword" label="Meta Keyword" rows="2" hint="Separate keywords with commas" persistent-hint class="mb-4" :error-messages="errors.meta_keyword || errors.meta_keywords" />

                    <div class="text-center mt-6">
                        <v-btn type="button" color="primary" :loading="isSubmitting" @click="submitSeo">
                            Submit
                        </v-btn>
                    </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { computed, ref, toRefs } from 'vue'
import { createBlogApi, updateBlogApi } from '@/api/blogs.api'

const props = defineProps({
    form: { type: Object, required: true },
    errors: { type: Object, required: true },
    blogId: { type: [String, Number], default: null },
    submitting: { type: Boolean, default: false },
})

const emit = defineEmits(['saved'])

const { form, errors, blogId, submitting } = toRefs(props)
const localSubmitting = ref(false)
const isSubmitting = computed(() => submitting.value || localSubmitting.value)

const seoKeyword = computed({
    get: () => form.value.meta_keyword ?? form.value.meta_keywords ?? '',
    set: (value) => {
        form.value.meta_keyword = value
        form.value.meta_keywords = value
    },
})

async function submitSeo() {
    localSubmitting.value = true
    try {
        const payload = {
            meta_title: form.value.meta_title,
            meta_description: form.value.meta_description,
            meta_keyword: seoKeyword.value,
        }

        const resp = blogId.value
            ? await updateBlogApi(blogId.value, payload)
            : await createBlogApi(payload)
        emit('saved', { message: resp?.message || 'Blog saved successfully' })
    } catch (error) {
        if (error.response?.status === 422) {
            const fieldErrors = error.response?.data?.errors || {}
            Object.keys(errors.value).forEach((key) => {
                errors.value[key] = fieldErrors[key] || ''
            })
            Object.keys(fieldErrors).forEach((key) => {
                if (!(key in errors.value)) {
                    errors.value[key] = fieldErrors[key]
                }
            })
        }
    } finally {
        localSubmitting.value = false
    }
}
</script>
