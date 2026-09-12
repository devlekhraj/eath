<template>
    <div>
        <v-card class="pa-4 mb-4">
            <div class="blog-header-grid">
                <div class="blog-header-image">
                    <v-img
                        :src="form.banner_url || '/images/logo.png'"
                        width="300"
                        style="aspect-ratio: 16/9;"
                        cover
                    />
                </div>
                <div class="blog-header-meta">
                    <div class="text-h6 text-capitalize mb-2">{{ form.title || 'Untitled Article' }}</div>
                    <div class="d-flex align-center mb-2">
                        <span class="text-body-2 text-medium-emphasis">
                            {{ articleUrl || 'No URL available' }}
                        </span>
                        <v-btn
                            v-if="form?.slug"
                            size="x-small"
                            class="ml-2"
                            color="primary"
                            icon
                            variant="tonal"
                            :href="articleUrl"
                            target="_blank"
                            rel="noopener"
                        >
                            <v-icon size="14">mdi-open-in-new</v-icon>
                        </v-btn>
                    </div>
                    <div v-if="form.summary || form.sub_title" class="text-subtitle-1 text-medium-emphasis">
                        {{ form.summary || form.sub_title }}
                    </div>
                </div>
            </div>
        </v-card>

        <v-card class="pa-4">
            <v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
                <v-tabs v-model="tab" color="primary">
                    <v-tab v-for="tabItem in tabs" :key="tabItem.value" :value="tabItem.value">
                        <v-icon start color="primary">{{ tabItem.icon }}</v-icon>
                        {{ tabItem.label }}
                    </v-tab>
                </v-tabs>
                <v-divider />

                <v-window v-model="tab">
                    <v-window-item v-for="tabItem in tabs" :key="tabItem.value" :value="tabItem.value">
                        <div class="pt-8">
                            <component
                                :is="getTabComponent(tabItem.value)"
                                :form="form"
                                :rules="rules"
                                :errors="errors"
                                :blog-categories="blog_categories"
                                :blog-category="form.category_id || form.article_category_id || form?.category?.id || null"
                                :content-error="contentError"
                                :article-id="articleId"
                                :submitting="submitting"
                                @saved="handleChildSaved"
                            />
                        </div>
                    </v-window-item>
                </v-window>
            </v-form>
        </v-card>
    </div>
</template>

<script>
import http from '@/http.config'
import TabOverview from './detail_tabs/TabOverview.vue'
import TabContent from './detail_tabs/TabContent.vue'
import TabSections from './detail_tabs/TabSections.vue'
import TabJourneys from './detail_tabs/TabJourneys.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import { useSnackbar } from '@/composables/snackbar'
import { createArticleApi, getArticleByIdApi, updateArticleApi } from '@/api/articles.api'

const tabComponents = {
    tab_overview: TabOverview,
    tab_content: TabContent,
    tab_sections: TabSections,
    tab_journeys: TabJourneys,
    tab_seo: TabSeo,
}

export default {
    data() {
        return {
            valid: false,
            contentError: false,
            submitting: false,
            tab: 'tab_overview',
            form: {
                title: '',
                category_id: null,
                article_category_id: null,
                summary: '',
                sub_title: '',
                slug: '',
                content: '',
                body: '',
                author: 'Admin',
                author_name: 'Admin',
                is_active: true,
                is_published: false,
                is_featured: false,
                meta_title: '',
                meta_description: '',
                meta_keywords: '',
                sections: [],
                journeys: [],
                journey_ids: [],
            },
            errors: {},
            rules: {
                required: (v) => !v || 'This field is required',
                slug: (v) =>
                    !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
                    'Slug must contain only lowercase letters, numbers, and hyphens',
            },
            articleId: null,
            blog_categories: [],
            tabs: [
                { value: 'tab_overview', label: 'Overview', icon: 'mdi-lightbulb-outline' },
                { value: 'tab_content', label: 'Content', icon: 'mdi-file-document-outline' },
                { value: 'tab_sections', label: 'Sections', icon: 'mdi-format-list-numbered' },
                { value: 'tab_journeys', label: 'Related Journeys', icon: 'mdi-compass-outline' },
                { value: 'tab_seo', label: 'SEO', icon: 'mdi-magnify' },
            ],
        }
    },
    mounted() {
        const id = this.$route.params.id || this.$route.query.id
        if (id) {
            this.articleId = id
            this.fetchBlog()
        }
        this.fetchBlogCategory()
    },

    setup() {
        const { showSuccess, showError } = useSnackbar()
        return { showSuccess, showError }
    },

    methods: {
        getTabComponent(value) {
            return tabComponents[value] || TabOverview
        },

        handleChildSaved(payload) {
            this.showSuccess(payload?.message || 'Saved')
            if (this.articleId) {
                this.fetchBlog()
            }
        },

        async fetchBlogCategory() {
            try {
                const resp = await http.get('admin/article-categories')
                this.blog_categories = resp.data || []
            } catch {
                try {
                    const fallback = await http.get('admin/blog-categories')
                    this.blog_categories = fallback.data || []
                } catch {
                    this.blog_categories = []
                }
            }
        },

        async fetchBlog() {
            try {
                const resp = await getArticleByIdApi(this.articleId)
                const data = resp?.data?.data || resp?.data || resp?.article || {}
                this.form = {
                    ...this.form,
                    ...data,
                    summary: data.summary || data.sub_title || '',
                    sub_title: data.summary || data.sub_title || '',
                    content: data.body || data.content || '',
                    body: data.body || data.content || '',
                    author: data.author_name || data.author || 'Admin',
                    author_name: data.author_name || data.author || 'Admin',
                    category_id: data.article_category_id || data.category_id || data?.category?.id || null,
                }
            } catch (err) {
                console.error('Failed to load article details:', err)
            }
        },

        async submitForm() {
            this.errors = {}
            const { valid } = await this.$refs.formRef.validate()
            if (!valid) return

            this.submitting = true
            try {
                const resp = this.articleId
                    ? await updateArticleApi(this.articleId, this.form)
                    : await createArticleApi(this.form)
                this.showSuccess(resp.message || 'Article saved successfully')
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors || {}
                }
                this.showError(error?.response?.data?.message || 'An error occurred')
            } finally {
                this.submitting = false
            }
        },
    },
    computed: {
        articleUrl() {
            if (!this.form?.slug) return ''
            const base = window?.location?.origin ?? ''
            return `${base}/articles/${this.form.slug}`
        },
    },
}
</script>

<style scoped>
.truncate-file-name .v-field__input {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.mb-4 {
    margin-bottom: 1rem;
}

.blog-header-grid {
    display: grid;
    grid-template-columns: minmax(0, 300px) minmax(0, 1fr);
    gap: 16px;
    align-items: center;
}

@media (max-width: 960px) {
    .blog-header-grid {
        grid-template-columns: 1fr;
    }
}
</style>
