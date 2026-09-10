<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="8" offset-lg="2">
                <v-row>
                    <v-col cols="12" class="pb-0">
                        <v-textarea v-model="form.title" label="Title" rows="2" auto-grow :rules="[rules.required]" class="mb-4" :error-messages="errors.title" @input="handleTitleInput" />
                    </v-col>

                    <v-col cols="12" class="py-0">
                        <v-text-field v-model="form.slug" label="Slug" :rules="[rules.slug]" class="mb-4" hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint :error-messages="errors.slug" />
                    </v-col>
                    <v-col cols="5">
                        <v-select v-model="form.category_id" :items="blogCategories" item-title="name" item-value="id" label="Select Categories" clearable :error-messages="errors.category_id || errors.category_id" />
                    </v-col>

                    <v-col cols="5">
                        <v-text-field v-model="form.author" label="Author" prepend-inner-icon="mdi-account" :rules="[rules.required]" class="mb-4" :error-messages="errors.author" />
                    </v-col>
                    <v-col cols="2">
                        <v-switch v-model="form.is_active" label="Is Active" color="primary" :error-messages="errors.is_active" inset />
                    </v-col>


                    <v-col cols="12">
                         <div class="text-center mt-6">
                            <v-btn type="button" color="primary" :loading="isSubmitting" @click="submitOverview">
                                Submit
                            </v-btn>
                         </div>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { computed, ref, toRefs, watch } from 'vue'
import { createBlogApi, updateBlogApi } from '@/api/blogs.api'

const props = defineProps({
    form: { type: Object, required: true },
    rules: { type: Object, required: true },
    errors: { type: Object, required: true },
    blogCategories: { type: Array, default: () => [] },
    blogCategory: { type: [Number, String], default: null },
    blogId: { type: [String, Number], default: null },
    submitting: { type: Boolean, default: false },
})

const emit = defineEmits(['saved'])

const { form, rules, errors, blogCategories, blogCategory, blogId, submitting } = toRefs(props)
const localSubmitting = ref(false)
const isSubmitting = computed(() => submitting.value || localSubmitting.value)

watch(
    () => form.value,
    (value) => {
        if (!value || value.category_id) return
        value.category_id =
            blogCategory.value ??
            value?.category?.id ??
            value?.category_id ??
            value?.category_id ??
            (Array.isArray(value?.category_ids) ? value.category_ids[0] : null) ??
            null
    },
    { deep: true, immediate: true }
)

function handleTitleInput(value) {
    if (!form.value.slug) return
    form.value.slug = value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
}

async function submitOverview() {
    localSubmitting.value = true
    try {
        const payload = {
            title: form.value.title,
            slug: form.value.slug,
            category_id: form.value.category_id,
            author: form.value.author,
            is_active: form.value.is_active,
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
