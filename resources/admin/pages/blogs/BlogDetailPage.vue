<template>
    <div>
        <v-card class="pa-4 mb-4" elevation="0">
            <div class="blog-header-grid">
                <div class="blog-header-image">
                    <v-img :src="form.banner_url || '/images/logo.png'" width="300"
                    style="aspect-ratio: 16/9;"
                    cover rounded />
                </div>
                <div class="blog-header-meta">
                    <div class="text-h6 text-capitalize mb-2">{{ form.title || 'Untitled Blog' }}</div>
                    <div class="d-flex align-center mb-2">
                        <span class="text-body-2 text-medium-emphasis">
                            {{ form.blog_url || 'No URL available' }}
                        </span>
                        <v-btn
                            v-if="form?.blog_url"
                            size="x-small"
                            class="ml-2"
                            color="primary"
                            icon
                            variant="tonal"
                            :href="form.blog_url"
                            target="_blank"
                            rel="noopener"
                        >
                            <v-icon>mdi-open-in-new</v-icon>
                        </v-btn>
                    </div>
                    <div v-if="form.sub_title" class="text-subtitle-1 text-medium-emphasis">{{ form.sub_title }}</div>
                </div>
            </div>
        </v-card>

        <v-card class="pa-4" elevation="0">
            <v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
                <v-tabs v-model="tab" color="primary">
                    <v-tab v-for="tabItem in tabs" :key="tabItem.value" :value="tabItem.value">
                        <v-icon start color="primary">{{ tabItem.icon }}</v-icon>
                        {{ tabItem.label }}
                    </v-tab>
                </v-tabs>
                <v-divider></v-divider>

                <v-window v-model="tab">
                    <v-window-item v-for="tabItem in tabs" :key="tabItem.value" :value="tabItem.value">
                        <div class="pt-8">
                            <component :is="getTabComponent(tabItem.value)" :form="form" :rules="rules"
                                :errors="errors" :blog-categories="blog_categories"
                                :blog-category="form.blog_category || form.category_id || form?.category?.id || null"
                                :content-error="contentError" 
                                :blog-id="blog_id" :submitting="submitting"
                                @saved="handleChildSaved" />
                        </div>
                    </v-window-item>
                </v-window>
            </v-form>
        </v-card>
    </div>
</template>

<script>
import TabOverview from './detail_tabs/TabOverview.vue'
import TabContent from './detail_tabs/TabContent.vue'
import TabImages from './detail_tabs/TabImages.vue'
import TabSeo from './detail_tabs/TabSeo.vue'
import { useSnackbar } from '@/composables/snackbar'
import { createBlogApi, getBlogByIdApi, updateBlogApi } from '@/api/blogs.api'

const tabComponents = {
    tab_overview: TabOverview,
    tab_content: TabContent,
    tab_images: TabImages,
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
                category_ids: [],
                category_id:null,
                sub_title: '',
                slug: '',
                content: '',
                author: 'Admin',
                meta_title: '',
                meta_description: '',
                meta_keywords: '',
            },
            errors: {},
            rules: {
                required: (v) => !!v || 'This field is required',
                slug: (v) =>
                    !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
                    'Slug must contain only lowercase letters, numbers, and hyphens',
            },
            blog_id: null,
            blog_categories: [],
            tabs: [
                { value: 'tab_overview', label: 'Overview', icon: 'mdi-lightbulb-outline' },
                { value: 'tab_content', label: 'Content', icon: 'mdi-file-document-outline' },
                { value: 'tab_images', label: 'Images', icon: 'mdi-image-multiple-outline' },
                { value: 'tab_seo', label: 'SEO', icon: 'mdi-magnify' },
            ],
        }
    },
    mounted() {
        if (this.$route.query.id) {
            this.blog_id = this.$route.query.id;
            this.fetchBlog();
        }
        this.fetchBlogCategory();
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
            this.showSuccess(payload?.message || 'Saved');
            if (this.blog_id) {
                this.fetchBlog();
            }
        },

        async fetchBlogCategory() {
            try {
                const resp = await axios.get('admin/blog-categories');
                this.blog_categories = resp.data;
            } catch {
                this.blog_categories = [];
            }
        },

        async fetchBlog() {
            const resp = await getBlogByIdApi(this.blog_id);
            this.form = resp?.data?.data || resp?.data || {};
        },

        async submitForm() {
            this.contentError = !this.form.content || this.form.content.trim() === '';
            this.errors = {};

            const { valid } = await this.$refs.formRef.validate();
            if (!valid || this.contentError) return;

            this.submitting = true;
            try {
                const resp = this.blog_id
                    ? await updateBlogApi(this.blog_id, this.form)
                    : await createBlogApi(this.form);
                this.showSuccess(resp.message || "Blog saved successfully");

            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
                this.showError(error?.response?.data?.message || 'An error occurred');
            } finally {
                this.submitting = false;
            }
        },
    },
    computed: {
        blogUrl() {
            if (!this.form?.slug) return ''
            const base = window?.location?.origin ?? ''
            return `${base}/blogs/${this.form.slug}`
        },
    },
};
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

.rounded {
    border-radius: 8px;
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
