<template>
	<div>
		<v-row>
			<!-- Blog Form Content Area -->
			<v-col cols="12" md="8">
				<v-card class="pa-4">
					<v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
						<!-- Title -->
						<v-text-field v-model="form.title" label="Title" :rules="[rules.required]" class="mb-4" :error-messages="errors.title" @input="handleTitleInput" />

						<!-- Slug -->
						<v-text-field v-model="form.slug" label="Slug" :rules="[rules.slug]" class="mb-4" hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint :disabled="form.published_at" :error-messages="errors.slug" />

						<!-- Subtitle -->
						<v-textarea v-model="form.sub_title" label="Sub Title" :rules="[rules.required]" class="mb-4" :error-messages="errors.sub_title" />

						<!-- Content -->
						<div class="mb-4">
							<label class="text-subtitle-1 mb-2 d-block">Content</label>
							<SummarnoteEditor v-model="form.content" />
							<span v-if="contentError || errors.content" class="text-error text-caption">
								{{ errors.content || 'Content is required' }}
							</span>
						</div>
						<!-- <SummarnoteViewer :value="form.content"></SummarnoteViewer> -->
					</v-form>
				</v-card>
			</v-col>

			<!-- Side Controls -->
			<v-col cols="12" md="4">
				<v-card class="pa-4">
					<!-- Featured Image -->
					<v-file-input v-if="articleId" v-model="selected_image" accept="image/*" label="Featured Image" prepend-inner-icon="mdi-image" @change="onImageChange" class="mb-4 truncate-file-name" />

					<v-img
						v-if="previewImage"
						:src="form.banner_url"
						height="200"
						contain
						class="rounded mb-4"
					/>

					<!-- Author -->
					<v-text-field v-model="form.author" label="Author" prepend-inner-icon="mdi-account" :rules="[rules.required]" class="mb-4" :error-messages="errors.author" />

					<!-- Categories -->
					<v-select v-model="form.category_ids" :items="blog_categories" item-title="name" item-value="id" label="Select Categories" multiple chips clearable :error-messages="errors.category_ids" />

					<!-- Meta Title -->
					<v-text-field v-model="form.meta_title" label="Meta Title" counter="60" hint="Max 60 characters for best SEO" persistent-hint class="mb-4" :error-messages="errors.meta_title" />

					<!-- Meta Description -->
					<v-textarea v-model="form.meta_description" label="Meta Description" rows="3" counter="160" hint="Max 160 characters for search engines" persistent-hint class="mb-4" :error-messages="errors.meta_description" />

					<!-- Meta Keywords -->
					<v-textarea v-model="form.meta_keywords" label="Meta Keywords" rows="2" hint="Separate keywords with commas" persistent-hint class="mb-4" :error-messages="errors.meta_keywords" />

					<!-- Submit -->
					<v-btn type="submit" color="primary" block @click="submitForm" :loading="submitting">
						Submit
					</v-btn>
				</v-card>
			</v-col>
		</v-row>
	</div>
</template>

<script>
import SummarnoteEditor from '@components/SummarnoteEditor.vue';
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
export default {
	data() {
		return {
			valid: false,
			contentError: false,
			submitting: false,
			previewImage: null,
			selected_image: null,
			form: {
				title: '',
				category_ids: [],
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
			articleId: null,
			blog_categories: [],
		}
	},

	mounted() {
		if (this.$route.query.id) {
			this.articleId = this.$route.query.id;
			this.fetchBlog();
		}
		this.fetchBlogCategory();
	},

	setup() {
		const { showSuccess, showError } = useSnackbar()
		return { showSuccess, showError }
	},

	methods: {
		handleTitleInput(value) {
			if (!this.form.slug || this.slugManuallyEdited) return;
			this.form.slug = value
				.toLowerCase()
				.trim()
				.replace(/[^a-z0-9\s-]/g, '')
				.replace(/\s+/g, '-');
		},

		async fetchBlogCategory() {
			try {
				const resp = await http.get('admin/blog-categories');
				this.blog_categories = resp.data;
			} catch {
				this.blog_categories = [];
			}
		},

		async fetchBlog() {
			const resp = await http.get(`/admin/blogs/${this.articleId}`);
			this.form = resp.data;
			this.previewImage = resp.data.banner_url;
		},

		onImageChange() {
			const selected = Array.isArray(this.selected_image) ? this.selected_image[0] : this.selected_image;

			if (selected instanceof File) {
				const formData = new FormData();
				if (this.articleId) {
					formData.append('usage_id', this.articleId);
					formData.append('usage_type', 'blogs');
				}
				formData.append('image', selected);

				http.post('/admin/gallery-upload', formData, {
					headers: { 'Content-Type': 'multipart/form-data' }
				})
				.then(response => {
					this.showSuccess("Image uploaded");
					this.form.cover_image = response.data.filename;
					this.previewImage = response.url;
					this.form.banner_url = response.url;
				})
				.catch(error => {
					this.showError("Image upload failed");
					console.error('Image upload failed', error);
				});
			}
		},

		async submitForm() {
			this.contentError = !this.form.content || this.form.content.trim() === '';
			this.errors = {};

			const { valid } = await this.$refs.formRef.validate();
			if (!valid || this.contentError) return;

			this.submitting = true;
			try {
				const resp = await http.post('/admin/blogs', this.form);
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
</style>
