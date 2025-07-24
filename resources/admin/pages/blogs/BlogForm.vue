<template>
	<v-container>
		<v-row>
			<!-- Blog Form Content Area -->
			<v-col cols="12" md="8">
				<v-card class="pa-4" elevation="0">
					<v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
						<!-- Title -->
						<v-text-field v-model="form.title" label="Title" density="comfortable" variant="outlined"
							:rules="[rules.required]" class="mb-4"></v-text-field>

						<!-- Slug -->
						<v-text-field v-model="form.slug" label="Slug" density="comfortable" variant="outlined"
							class="mb-4"
							hint="URL-friendly string with lowercase letters, numbers, and hyphens"
							persistent-hint></v-text-field>

						<!-- Subtitle -->
						<v-textarea v-model="form.sub_title" label="Sub Title" density="comfortable" variant="outlined"
							:rules="[rules.required]" class="mb-4"></v-textarea>

						<!-- Content -->
						<div class="mb-4">
							<label class="text-subtitle-1 mb-2 d-block">Content</label>
							<RichTextEditor v-model="form.content" />
							<span v-if="contentError" class="text-error text-caption">Content is required</span>
						</div>
					</v-form>
				</v-card>
			</v-col>

			<!-- Side Controls -->
			<v-col cols="12" md="4">
				<v-card class="pa-4" elevation="0">

					<div v-if="blog_id">
						<!-- Featured Image -->
						<v-file-input v-model="selected_image" label="Featured Image" accept="image/*" prepend-icon=""
							variant="outlined" density="comfortable" prepend-inner-icon="mdi-image"
							@change="onImageChange" class="mb-4 truncate-file-name"></v-file-input>
					</div>

					<v-img v-if="previewImage" :src="form.banner_url" height="200" contain class="rounded mb-4"></v-img>

					<!-- Author -->
					<v-text-field v-model="form.author" prepend-inner-icon="mdi-account" label="Author"
						variant="outlined" density="comfortable" :rules="[rules.required]" class="mb-4"></v-text-field>


					<v-select v-model="form.category_ids" variant="outlined" density="comfortable"
						:items="blog_categories" item-title="name" item-value="id" label="Select Categories" multiple
						chips clearable />


					<!-- Meta Title -->
					<v-text-field v-model="form.meta_title" label="Meta Title" variant="outlined" density="comfortable"
						counter="60" persistent-hint hint="Max 60 characters for best SEO" class="mb-4"></v-text-field>

					<!-- Meta Description -->
					<v-textarea v-model="form.meta_description" label="Meta Description" variant="outlined"
						density="comfortable" counter="160" rows="3" persistent-hint
						hint="Max 160 characters for search engines" class="mb-4"></v-textarea>

					<!-- Meta Keywords -->
					<v-textarea v-model="form.meta_keywords" label="Meta Keywords" variant="outlined"
						density="comfortable" rows="2" persistent-hint hint="Separate keywords with commas"
						class="mb-4"></v-textarea>

					<!-- Submit -->
					<v-btn type="submit" color="primary" size="large" block @click="submitForm" :loading="submitting">
						Submit
					</v-btn>
				</v-card>
			</v-col>
		</v-row>
	</v-container>
</template>

<script>
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
			rules: {
				required: (v) => !!v || 'This field is required',
				slug: (v) =>
					/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
					'Slug must contain only lowercase letters, numbers, and hyphens',
			},
			blog_id: null,
			blog_categories: [],
		};
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

		// Return methods to be used in Options API
		return {
			showSuccess,
			showError,
		}
	},

	methods: {
		async fetchBlogCategory() {

			try {

				const resp = await axios.get('admin/blog-categories');
				this.blog_categories = resp.data;
			} catch (error) {
				this.blog_categories = [];
			}

		},

		async fetchBlog() {
			const resp = await axios.get(`/admin/blogs/${this.blog_id}`);
			this.form = resp.data;
			this.previewImage = resp.data.banner_url;

		},
		onImageChange() {
			const selected = Array.isArray(this.selected_image) ? this.selected_image[0] : this.selected_image;

			// Preview
			if (selected instanceof File) {

				const formData = new FormData();
				if (this.blog_id) {
					formData.append('usage_id', this.blog_id);
					formData.append('usage_type', 'blogs');
				}
				formData.append('image', selected)

				axios.post('/admin/gallery-upload', formData, {
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
						console.error('Image upload failed', error)
					})
			} else {
				console.log("test");
			}
		},
		safeTrim(value) {
			return typeof value === 'string' ? value.trim() : '';
		},


		async submitForm() {
			this.contentError = !this.form.content || this.form.content.trim() === '';
			if (!this.$refs.formRef.validate() || this.contentError) return;


			let { valid, errors } = await this.$refs.formRef.validate();

			if (!valid) {
				console.log({ errors });
				return;
			}


			// let info  = await this.$refs.formRef.validate();
			// console.log({info});

			this.submitting = true;
			try {

				// Submit to API
				const resp = await axios.post('/admin/blogs', this.form);
				this.showSuccess(resp.message || "Success");
			
			} catch (error) {
				this.showError(error?.response?.data?.message || 'An error occurred');
				console.error('Form submission error:', error);
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
