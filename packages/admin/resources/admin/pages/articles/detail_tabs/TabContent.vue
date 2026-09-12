<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="8" offset-lg="2">
                <div class="mb-4">
                    <label class="text-subtitle-1 mb-2 d-block">Content</label>
                    <SummarnoteEditor v-model="form.content" />
                    <span v-if="contentError || errors.content" class="text-error text-caption">
                        {{ errors.content || 'Content is required' }}
                    </span>
                </div>

                <div class="text-center mt-6">
                    <v-btn type="button" color="primary" :loading="isSubmitting" @click="submitContent">
                        Save Content
                    </v-btn>
                </div>

            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue';
import { computed, ref, toRefs } from 'vue'
import { createBlogApi, updateBlogApi } from '@/api/articles.api'

const props = defineProps({
    form: { type: Object, required: true },
    errors: { type: Object, required: true },
    contentError: { type: Boolean, default: false },
    articleId: { type: [String, Number], default: null },
    submitting: { type: Boolean, default: false },
})

const emit = defineEmits(['saved'])

const { form, errors, contentError, articleId, submitting } = toRefs(props)
const localSubmitting = ref(false)
const isSubmitting = computed(() => submitting.value || localSubmitting.value)

async function submitContent() {
    localSubmitting.value = true
    try {
        const payload = {
            content: form.value.content,
        }

        const resp = articleId.value
            ? await updateBlogApi(articleId.value, payload)
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
