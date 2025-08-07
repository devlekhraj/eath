<template>
	<v-container>
		<v-row>
			<v-col cols="12" md="10" offset-md="1">
				<v-card class="pa-4" elevation="0">
					<v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
						<!-- Title -->
						<v-text-field v-model="form.title" label="Title" variant="outlined" density="comfortable"
							:rules="[rules.required]" class="mb-4" :error-messages="errors.title" />

						<!-- Slug -->
						<v-text-field v-model="form.slug" label="Slug" variant="outlined" density="comfortable"
							:rules="[rules.slug]" class="mb-4"
							hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint
							:disabled="form.published_at" :error-messages="errors.slug" />

						<!-- Content -->
						<div class="mb-4">
							<label class="text-subtitle-1 mb-2 d-block">Content</label>
							<RichTextEditor v-model="form.content" />
							<span v-if="contentError || errors.content" class="text-error text-caption">
								{{ errors.content || 'Content is required' }}
							</span>
						</div>
					</v-form>
				</v-card>

				<div class="text-center mt-4">
					<v-btn type="submit" color="primary" size="large" @click="submitForm" :loading="submitting">
						Submit
					</v-btn>
				</div>
			</v-col>
		</v-row>
	</v-container>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'
import { useSnackbar } from '@/composables/snackbar'

const formRef = ref(null)
const valid = ref(false)
const contentError = ref(false)
const submitting = ref(false)

const route = useRoute()
const { showSuccess, showError } = useSnackbar()

const page_id = ref(null)

const form = reactive({
	title: '',
	slug: '',
	content: '',
	is_active: true, // for disabling slug
})

const errors = reactive({})

const rules = {
	required: v => !!v || 'This field is required',
	slug: v =>
		!v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
		'Slug must contain only lowercase letters, numbers, and hyphens',
}


onMounted(() => {
	if (route.params.id) {
		page_id.value = route.params.id
		fetchData()
	}
})

const fetchData = async () => {
	try {
		const resp = await axios.get(`/admin/pages/${page_id.value}`)
		Object.assign(form, {
			...resp.data,
			content: resp.data.content || '',
		});
	} catch (error) {
		showError('Failed to load blog data')
	}
}

const submitForm = async () => {
	contentError.value = !form.content || form.content.trim() === ''
	Object.keys(errors).forEach(key => (errors[key] = '')) // Clear previous errors

	const { valid: isValid } = await formRef.value.validate()
	if (!isValid || contentError.value) return

	submitting.value = true

	try {
		const resp = await axios.post('/admin/pages', form)
		showSuccess(resp.data?.message || 'Page saved successfully')
	} catch (error) {
		if (error.response?.status === 422) {
			Object.assign(errors, error.response.data.errors || {})
		}
		showError(error.response?.data?.message || 'An error occurred')
	} finally {
		submitting.value = false
	}
}
</script>

<style scoped>
.mb-4 {
	margin-bottom: 1rem;
}
</style>
