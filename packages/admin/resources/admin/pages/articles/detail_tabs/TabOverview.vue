<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="8" offset-lg="2">
                <v-row>
                    <v-col cols="12">
                        <v-text-field
                            v-model="form.title"
                            label="Title"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.required]"
                            :error-messages="errors.title"
                            @input="handleTitleInput"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            v-model="form.slug"
                            label="Slug"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.slug]"
                            hint="URL-friendly string with lowercase letters, numbers, and hyphens"
                            persistent-hint
                            :error-messages="errors.slug"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea
                            v-model="form.summary"
                            label="Summary / Abstract"
                            rows="3"
                            auto-grow
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            hint="Brief overview displayed in article cards and meta snippets"
                            persistent-hint
                        />
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-select
                            v-model="form.category_id"
                            :items="blogCategories"
                            item-title="name"
                            item-value="id"
                            label="Article Category"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            clearable
                            :error-messages="errors.category_id"
                        />
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.author"
                            label="Author Name"
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.required]"
                            :error-messages="errors.author"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_active"
                            label="Is Active"
                            color="success"
                            inset
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_published"
                            label="Is Published"
                            color="primary"
                            inset
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_featured"
                            label="Featured Article"
                            color="accent"
                            inset
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12">
                        <div class="text-center mt-6">
                            <v-btn
                                type="button"
                                color="primary"
                                rounded="0"
                                :loading="isSubmitting"
                                @click="submitOverview"
                            >
                                Save Overview
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
import { createBlogApi, updateBlogApi } from '@/api/articles.api'

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
        if (!value) return
        if (!value.category_id && (blogCategory.value || value?.category?.id || value?.article_category_id)) {
            value.category_id = blogCategory.value ?? value?.category?.id ?? value?.article_category_id ?? null
        }
        if (value.sub_title && !value.summary) {
            value.summary = value.sub_title
        }
        if (value.author_name && !value.author) {
            value.author = value.author_name
        }
    },
    { deep: true, immediate: true }
)

function handleTitleInput(value) {
    if (!form.value.slug) {
        form.value.slug = value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
    }
}

async function submitOverview() {
    localSubmitting.value = true
    try {
        const payload = {
            title: form.value.title,
            slug: form.value.slug,
            category_id: form.value.category_id,
            article_category_id: form.value.category_id,
            summary: form.value.summary || form.value.sub_title,
            sub_title: form.value.summary || form.value.sub_title,
            author: form.value.author,
            author_name: form.value.author,
            is_active: form.value.is_active,
            is_published: form.value.is_published,
            is_featured: form.value.is_featured,
        }

        const resp = blogId.value
            ? await updateBlogApi(blogId.value, payload)
            : await createBlogApi(payload)
        emit('saved', { message: resp?.message || 'Article saved successfully' })
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
