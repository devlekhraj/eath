<template>
	<v-container>
		<v-form ref="formRef" v-model="formValid" lazy-validation>
			<v-row>
				<v-col cols="12" md="7">
					<div class="mb-4">
						<v-card elevation="0" class="pa-6">
							<v-card-title class="py-3">
								<div>
									<h5>Package Detail
									</h5>
								</div>
							</v-card-title>
							<v-divider></v-divider>
							<v-card-text class="pt-10">
								<v-row>
									<v-col cols="12" md="12">
										<div>
											<v-text-field v-model="form.name" label="Package Name"
												:rules="[rules.required]" :error-messages="errors.name"
												density="comfortable" variant="outlined" :disabled="submitting"
												required />
										</div>
									</v-col>
									<v-col cols="12">
										<div>
											<v-text-field v-model="form.slug" label="URL" :rules="[rules.required]"
												:error-messages="errors.slug" density="comfortable" variant="outlined"
												:disabled="submitting" required />
										</div>

									</v-col>

									<v-col cols="6">
										<v-text-field v-model="form.duration_days" label="Duration (Days)"
											density="comfortable" type="number" variant="outlined"
											prepend-inner-icon="mdi-clock"
											:rules="[rules.required, rules.numeric, rules.positive]"
											:error-messages="errors.duration_days" :disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-text-field v-model="form.duration_nights" label="Duration (Nights)"
											density="comfortable" type="number" variant="outlined"
											prepend-inner-icon="mdi-clock"
											:rules="[rules.required, rules.numeric, rules.positive]"
											:error-messages="errors.duration_nights" :disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-text-field v-model="form.price" label="Price (USD)" type="number"
											density="comfortable" prepend-inner-icon="mdi-currency-usd"
											variant="outlined" :rules="[rules.required, rules.numeric, rules.positive]"
											:error-messages="errors.price" :disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-text-field v-model="form.altitude" label="Altitude (feet)" type="number"
											density="comfortable" prepend-inner-icon="mdi-image-filter-hdr"
											variant="outlined" :rules="[rules.numeric, rules.positive]"
											:error-messages="errors.altitude" :disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-date-input v-model="form.start_date" label="Start Date" prepend-icon=""
											prepend-inner-icon="mdi-calendar" variant="outlined" density="comfortable"
											:error-messages="errors.start_date" :disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-date-input v-model="form.end_date" label="End Date" prepend-icon=""
											prepend-inner-icon="mdi-calendar" variant="outlined" density="comfortable"
											:error-messages="errors.end_date" :disabled="submitting" />
									</v-col>

									<v-col cols="12">
										<v-select v-model="form.category_ids" :items="package_categories"
											item-title="name" item-value="id" label="Select Categories" multiple chips
											clearable />
									</v-col>
									<v-col cols="6">
										<v-switch v-model="form.is_active" label="Active" color="success" inset
											:disabled="submitting" />
									</v-col>

									<v-col cols="6">
										<v-switch v-model="form.is_featured" label="Featured" color="success" inset
											:disabled="submitting" />
									</v-col>


								</v-row>
								<div class="mb-4">
									<label class="text-subtitle-1 mb-2 d-block">Description</label>
									<RichTextEditor v-model="form.description" />
									<span v-if="descriptionError" class="text-error text-caption">Content is
										required</span>
								</div>

								<!-- <v-col cols="12">
									<v-textarea v-model="form.terms_conditions" label="Terms & Conditions" rows="3"
										variant="outlined" auto-grow class="mt-4"
										:error-messages="errors.terms_conditions" />
								</v-col>

								<v-col cols="12">
									<v-textarea v-model="form.cancellation_policy" label="Cancellation Policy" rows="3"
										variant="outlined" auto-grow class="mt-2"
										:error-messages="errors.cancellation_policy" />
								</v-col> -->

								<!-- <div>
									<v-textarea v-model="form.additional_info" label="Additional Info" rows="3"
										variant="outlined" auto-grow class="mt-4" :error-messages="errors.additional_info" />
								</div> -->



								<div class="mt-6 text-center">
									<v-btn size="large" color="primary" rounded :loading="submitting"
										:disabled="submitting" @click="submitPackage">
										<v-icon left>mdi-check</v-icon> {{ package_id ? 'Update Package' : 'Create Package' }}
									</v-btn>
								</div>
							</v-card-text>



						</v-card>
					</div>
					<div class="mt-4">
						<v-card elevation="0" class="pa-6">
							<v-card-title class="py-3">
								<div>
									<h5>Package Images
									</h5>
								</div>
							</v-card-title>
							<v-divider></v-divider>
							<v-card-text class="pt-10">
								<v-row>
									<v-col cols="12" v-if="package_id">
										<h4>Slider Images</h4>
										<v-file-input prepend-icon="" v-model="selected_file" accept="image/*"
											@change="handleUploadImage()" prepend-inner-icon="mdi-image"
											label="File input"></v-file-input>
										<div>
											<v-row>
												<v-col cols="6" md="4" v-for="(image, index) in form.images"
													:key="index">
													<div class="position-relative">
														<img :src="image.url" alt="Image"
															style="width: 100%; object-fit: contain;">

														<!-- Delete icon -->
														<v-icon color="red" small class="position-absolute"
															style="top: 8px; right: 8px; cursor: pointer; padding: 2px;"
															@click="handleDelete(image)" title="Delete Image">
															mdi-close-thick
														</v-icon>
													</div>
												</v-col>

											</v-row>
										</div>
									</v-col>


								</v-row>
							</v-card-text>
						</v-card>
					</div>
				</v-col>

				<v-col cols="12" md="5">
					<div class="mb-4">
						<!-- <FormRight @close="fetchPackage" :travelPackage="travel_package"
							:travelPackageId="package_id" /> -->
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, amet.</p>
					</div>
				</v-col>
			</v-row>
		</v-form>
		<modal-template ref="globalModal" @close="fetchPackage"></modal-template>
	</v-container>
</template>

<script>
import { useSnackbar } from '@/composables/snackbar'
import { useRoute } from 'vue-router'
import { defineAsyncComponent } from 'vue'
export default {
	name: 'BlogForm',

	data() {
		return {
			formRef: null,
			formValid: true,
			submitting: false,
			package_id: null,
			descriptionError: false,
			travel_package: {},
			errors: {},
			form: {
				category_ids: [],
				name: '',
				slug: '',
				description: '',
				additional_info: '',
				duration_days: '',
				duration_nights: '',
				price: '',
				altitude: '',
				start_date: '',
				end_date: '',
				is_active: false,
				is_featured: false,
				// terms_conditions: '',
				// cancellation_policy: '',
				images: [],
			},
			rules: {
				required: v => !!v || 'This field is required',
				numeric: v => !v || !isNaN(v) || 'Must be a number',
				positive: v => !v || Number(v) >= 0 || 'Must be positive',
			},
			package_categories: [],
			selected_file: null,
		}
	},

	mounted() {
		const route = useRoute()
		if (route.query.id) {
			this.package_id = parseInt(route.query.id)
			this.fetchPackage()
		}
		this.packageCategories();
	},
	components: {
		FormRight: defineAsyncComponent(() => import('./form_section/FormRight.vue'))
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
		async handleDelete(imageItem) {
			console.log('Opening modal with imageItem:', imageItem);
			const component = (await import('./modal/DeleteImage.vue')).default;
			this.$refs.globalModal.open({
				title: 'Delete Image',
				component,
				size: 'sm',
				props: { imageItem }  // imageItem must NOT be undefined or null here
			});
		},

		handleUploadImage() {

			const formData = new FormData();
			if (this.package_id) {
				formData.append('usage_id', this.package_id);
				formData.append('usage_type', 'travel_packages');
			}
			formData.append('image', this.selected_file);

			return axios.post('/admin/gallery-upload', formData)
				.then(response => {
					console.log(response.url);
					this.form.images.push({
						id: response.data.id,
						url: response.url,
					});
					if (response && response.url) {
						this.showSuccess("Image uploaded");
						return response.url; // must return URL string here!
					}
					return Promise.reject('Upload failed');
				})
				.catch(err => {
					this.showError(err?.response?.data?.message || 'An error occurred')
					console.error('Upload error:', err);
					return Promise.reject(err);
				});
		},
		async fetchPackage() {
			try {
				const resp = await axios.get(`/admin/travel-packages/${this.package_id}`)
				this.travel_package = resp.data

				Object.assign(this.form, {
					...this.travel_package,
					// is_active: this.travel_package.is_active === 1,
					// is_featured: this.travel_package.is_featured === 1,
				})
			} catch (error) {
				console.error('Failed to fetch package', error)
			}
		},
		async packageCategories() {
			try {
				const resp = await axios.get(`/admin/package-categories`)
				console.log(resp.data);
				this.package_categories = resp.data
			} catch (error) {
				console.error('Failed to fetch package', error)
			}
		},

		async submitPackage() {
			// const isValid = this.formRef.validate()
			// if (!isValid) return
			this.descriptionError = !this.form.description || this.form.description.trim() === '';

			let { valid, errors } = await this.$refs.formRef.validate();

			if (!valid) {
				console.log({ errors });
				return;
			}

			console.log("Test");
			this.submitting = true
			this.errors = {}

			try {
				// const url = this.package_id
				//   ? `/admin/travel-packages/${this.package_id}`
				//   : `/admin/travel-packages`

				// const method = this.package_id ? 'put' : 'post'

				// await axios[method](url, this.form)
				if (this.package_id) {
					this.form.id = this.package_id
				}
				// Format start_date and end_date before sending
				if (this.form.start_date) {
					this.form.start_date = new Date(this.form.start_date).toISOString().split('T')[0];
				}
				if (this.form.end_date) {
					this.form.end_date = new Date(this.form.end_date).toISOString().split('T')[0];
				}

				const resp = await axios.post('/admin/travel-packages', this.form);
				this.showSuccess("Package created");
				if (this.package_id) return;
				// Clear form
				Object.assign(this.form, {
					name: '',
					description: '',
					additional_info: '',
					duration_days: null,
					duration_nights: null,
					price: null,
					altitude: null,
					start_date: '',
					end_date: '',
					is_active: false,
					is_featured: false,
					terms_conditions: '',
					cancellation_policy: '',
				})

				// this.formRef.resetValidation()
			} catch (error) {
				if (error.response && error.response.status === 422) {
					this.errors = error.response.data.errors || {}
				} else {
					console.error('Failed to save package', error)
				}
			} finally {
				this.submitting = false
			}
		},
	},
}
</script>
