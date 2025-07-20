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
							:rules="[rules.required, rules.slug]" class="mb-4"
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
					<!-- Featured Image -->
					<v-file-input v-model="form.image" label="Featured Image" accept="image/*" prepend-icon=""
						variant="outlined" prepend-inner-icon="mdi-image" @change="onImageChange"
						class="mb-4"></v-file-input>

					<v-img v-if="previewImage" :src="previewImage" height="200" cover class="rounded mb-4"></v-img>

					<!-- Author -->
					<v-text-field v-model="form.author" prepend-inner-icon="mdi-account" label="Author"
						variant="outlined" density="comfortable" :rules="[rules.required]" class="mb-4"></v-text-field>

				
						<v-select v-model="form.category_ids" variant="outlined" :items="blog_categories" item-title="name"
							item-value="id" label="Select Categories" multiple chips clearable />
			

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
export default {
	data() {
		return {
			valid: false,
			contentError: false,
			submitting: false,
			previewImage: null,
			form: {
				title: '',
				category_ids:[],
				sub_title: '',
				slug: '',
				content: '',
				image: null,
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

		},
		onImageChange() {
			const selected = Array.isArray(this.form.image) ? this.form.image[0] : this.form.image;

			// Preview
			if (selected instanceof File) {
				this.previewImage = URL.createObjectURL(selected)

				const formData = new FormData()
				formData.append('image', selected)

				axios.post('/admin/gallery-upload', formData, {
					headers: { 'Content-Type': 'multipart/form-data' }
				})
					.then(response => {
						this.form.cover_image = response.data.path
					})
					.catch(error => {
						console.error('Image upload failed', error)
					})
			} else {
				console.log("test");
				this.previewImage = null
				this.form.cover_image = ''
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
				// const formData = new FormData();

				// if (this.form.id) {
				// 	formData.append('id', this.form.id);
				// }
				// formData.append('title', this.form.title);
				// formData.append('slug', this.form.slug);
				// formData.append('sub_title', this.form.sub_title);
				// formData.append('content', this.form.content);
				// formData.append('author', this.form.author);
				// formData.append('meta_title', this.safeTrim(this.form.meta_title ?? ''));
				// formData.append('meta_description', this.safeTrim(this.form.meta_description ?? ''));
				// formData.append('meta_keywords', this.safeTrim(this.form.meta_keywords ?? ''));
				// if (this.form.image) {
				// 	formData.append(
				// 		'cover_image',
				// 		Array.isArray(this.form.image) ? this.form.image[0] : this.form.image
				// 	);
				// }

				console.log(this.form);
				// Submit to API
				const resp = await axios.post('/admin/blogs', this.form);

				console.log({ resp });
				// Reset form
				if (!this.blog_id) {
					this.$refs.formRef.reset();
					this.form.content = '';
					this.previewImage = null;
				}
			} catch (error) {
				console.error('Form submission error:', error);
			} finally {
				this.submitting = false;
			}
		},
	},
};
</script>

<style scoped>
.mb-4 {
	margin-bottom: 1rem;
}

.rounded {
	border-radius: 8px;
}
</style>
