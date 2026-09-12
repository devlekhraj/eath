<template>
	<v-container fluid>
		<v-row>
			<v-col cols="12" lg="10" offset-lg="1">
				<!-- Header Card -->
				<v-card class="pa-4 mb-4" flat rounded="0">
					<div class="d-flex align-center justify-space-between">
						<div>
							<div class="text-h6 text-capitalize">{{ form.title || 'Untitled Page' }}</div>
							<div class="text-caption text-medium-emphasis mt-1">/{{ form.slug || 'page-slug' }}</div>
						</div>
						<div class="d-flex align-center ga-2">
							<v-chip size="small" label rounded="0" variant="tonal" color="primary" class="text-uppercase">
								{{ form.type || 'standard' }}
							</v-chip>
							<v-chip size="small" label rounded="0" :color="form.is_published ? 'success' : 'warning'">
								{{ form.is_published ? 'Published' : 'Draft' }}
							</v-chip>
						</div>
					</div>
				</v-card>

				<!-- Tabs Card -->
				<v-card class="pa-4" flat rounded="0">
					<v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
						<v-tabs v-model="tab" color="primary">
							<v-tab value="overview" rounded="0">
								<v-icon start>mdi-information-outline</v-icon> Overview & SEO
							</v-tab>
							<v-tab value="content" rounded="0">
								<v-icon start>mdi-file-document-outline</v-icon> Content
							</v-tab>
							<v-tab value="sections" rounded="0">
								<v-icon start>mdi-format-list-numbered</v-icon> Page Sections ({{ form.sections?.length || 0 }})
							</v-tab>
						</v-tabs>
						<v-divider />

						<v-window v-model="tab" class="pt-6">
							<!-- Overview Window -->
							<v-window-item value="overview">
								<v-row>
									<v-col cols="12" md="8">
										<v-text-field
											v-model="form.title"
											label="Page Title"
											variant="outlined"
											density="comfortable"
											rounded="0"
											:rules="[rules.required]"
										/>
									</v-col>

									<v-col cols="12" md="4">
										<v-text-field
											v-model="form.slug"
											label="URL Slug"
											variant="outlined"
											density="comfortable"
											rounded="0"
											:rules="[rules.slug]"
											hint="URL slug without leading slash"
											persistent-hint
										/>
									</v-col>

									<v-col cols="12" md="6">
										<v-select
											v-model="form.type"
											:items="typeOptions"
											label="Page Type"
											variant="outlined"
											density="comfortable"
											rounded="0"
										/>
									</v-col>

									<v-col cols="12" sm="3">
										<v-switch
											v-model="form.is_active"
											inset
											label="Active"
											color="success"
											rounded="0"
										/>
									</v-col>

									<v-col cols="12" sm="3">
										<v-switch
											v-model="form.is_published"
											inset
											label="Published"
											color="primary"
											rounded="0"
										/>
									</v-col>

									<v-col cols="12">
										<v-textarea
											v-model="form.summary"
											label="Page Summary"
											rows="2"
											auto-grow
											variant="outlined"
											density="comfortable"
											rounded="0"
											hint="Short overview shown in previews and search results"
											persistent-hint
										/>
									</v-col>

									<v-col cols="12" md="6">
										<v-text-field
											v-model="form.meta_title"
											label="Meta Title (SEO)"
											variant="outlined"
											density="comfortable"
											rounded="0"
										/>
									</v-col>

									<v-col cols="12" md="6">
										<v-text-field
											v-model="form.meta_description"
											label="Meta Description (SEO)"
											variant="outlined"
											density="comfortable"
											rounded="0"
										/>
									</v-col>
								</v-row>
							</v-window-item>

							<!-- Content Window -->
							<v-window-item value="content">
								<div class="mb-4">
									<label class="text-caption mb-1 d-block font-weight-medium">Main Page Body</label>
									<SummarnoteEditor v-model="form.body" minHeight="300" />
								</div>
							</v-window-item>

							<!-- Sections Window -->
							<v-window-item value="sections">
								<div class="d-flex align-center justify-space-between mb-4">
									<div>
										<div class="text-subtitle-1 font-weight-medium">Page Content Blocks</div>
										<div class="text-caption text-medium-emphasis">Ordered modular sections that build up this page.</div>
									</div>
									<v-btn color="primary" rounded="0" @click="openSectionDialog()">
										<v-icon start>mdi-plus</v-icon> Add Section
									</v-btn>
								</div>

								<v-divider class="mb-4" />

								<div v-if="form.sections && form.sections.length > 0">
									<v-table class="border">
										<thead>
											<tr>
												<th style="width: 80px;">Order</th>
												<th>Heading</th>
												<th>Layout</th>
												<th class="text-center" style="width: 120px;">Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="sec in form.sections" :key="sec.id || sec.heading">
												<td>{{ sec.sort_order ?? 0 }}</td>
												<td>{{ sec.heading || '—' }}</td>
												<td class="text-caption text-medium-emphasis">{{ sec.layout_key || 'standard' }}</td>
												<td class="text-center">
													<div class="d-flex align-center justify-center ga-2">
														<v-btn size="x-small" icon variant="tonal" color="primary" rounded="0" @click="openSectionDialog(sec)">
															<v-icon size="16">mdi-pencil</v-icon>
														</v-btn>
														<v-btn size="x-small" icon variant="tonal" color="error" rounded="0" @click="deleteSection(sec)">
															<v-icon size="16">mdi-delete</v-icon>
														</v-btn>
													</div>
												</td>
											</tr>
										</tbody>
									</v-table>
								</div>
								<div v-else class="pa-8 text-center border text-medium-emphasis">
									<v-icon size="40" color="grey-lighten-1" class="mb-2">mdi-format-list-numbered</v-icon>
									<div>No sub-sections added yet. Click "Add Section" to create modular content blocks.</div>
								</div>
							</v-window-item>
						</v-window>

						<div class="text-center mt-6">
							<v-btn type="submit" color="primary" rounded="0" :loading="submitting">
								Save Page
							</v-btn>
						</div>
					</v-form>
				</v-card>

				<!-- Section Dialog -->
				<v-dialog v-model="sectionDialog" max-width="700" persistent>
					<v-card rounded="0">
						<v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
							<span class="text-uppercase font-weight-medium text-slate-800">
								{{ editingSection.id ? 'Edit Section' : 'Add Section' }}
							</span>
							<v-btn icon variant="text" size="small" @click="closeSectionDialog">
								<v-icon>mdi-close</v-icon>
							</v-btn>
						</v-card-title>
						<v-divider />
						<v-card-text>
							<v-row>
								<v-col cols="12" sm="8">
									<v-text-field
										v-model="editingSection.heading"
										label="Section Heading"
										variant="outlined"
										density="compact"
										rounded="0"
									/>
								</v-col>
								<v-col cols="12" sm="4">
									<v-text-field
										v-model.number="editingSection.sort_order"
										label="Sort Order"
										type="number"
										variant="outlined"
										density="compact"
										rounded="0"
									/>
								</v-col>
								<v-col cols="12">
									<label class="text-caption mb-1 d-block font-weight-medium">Section Body</label>
									<SummarnoteEditor v-model="editingSection.body" minHeight="200" />
								</v-col>
							</v-row>
						</v-card-text>
						<v-divider />
						<v-card-actions class="pa-3 justify-end">
							<v-btn variant="text" rounded="0" @click="closeSectionDialog">Cancel</v-btn>
							<v-btn color="primary" rounded="0" :loading="savingSection" @click="saveSection">Save Section</v-btn>
						</v-card-actions>
					</v-card>
				</v-dialog>
			</v-col>
		</v-row>
	</v-container>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import http from '@/http.config'
import { useRoute } from 'vue-router'
import { useSnackbar } from '@/composables/snackbar'

const formRef = ref(null)
const valid = ref(false)
const submitting = ref(false)
const tab = ref('overview')

const route = useRoute()
const { showSuccess, showError } = useSnackbar()

const page_id = ref(null)

const typeOptions = [
	{ title: 'Standard Page', value: 'standard' },
	{ title: 'Policy Page', value: 'policy' },
	{ title: 'Safety & Protocol', value: 'safety' },
	{ title: 'Responsible Travel', value: 'responsible' },
	{ title: 'About Us', value: 'about' },
	{ title: 'Contact Us', value: 'contact' },
]

const form = reactive({
	title: '',
	slug: '',
	type: 'standard',
	summary: '',
	body: '',
	is_active: true,
	is_published: false,
	meta_title: '',
	meta_description: '',
	sections: [],
})

const rules = {
	required: v => !!v || 'This field is required',
	slug: v =>
		!v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
		'Slug must contain only lowercase letters, numbers, and hyphens',
}

// Section modal state
const sectionDialog = ref(false)
const savingSection = ref(false)
const editingSection = ref({
	id: null,
	heading: '',
	body: '',
	sort_order: 0,
})

onMounted(() => {
	if (route.params.id) {
		page_id.value = route.params.id
		fetchData()
	}
})

const fetchData = async () => {
	try {
		const resp = await http.get(`/admin/website-pages/${page_id.value}`)
		const data = resp.data?.data || resp.data || {}
		Object.assign(form, {
			...data,
			body: data.body || data.content || '',
			sections: data.sections || [],
		})
	} catch (error) {
		showError('Failed to load page data')
	}
}

const submitForm = async () => {
	const { valid: isValid } = await formRef.value.validate()
	if (!isValid) return

	submitting.value = true
	try {
		const payload = {
			...form,
			content: form.body,
		}
		const resp = page_id.value
			? await http.patch(`/admin/website-pages/${page_id.value}`, payload)
			: await http.post('/admin/website-pages', payload)
		showSuccess(resp.data?.message || resp.message || 'Page saved successfully')
	} catch (error) {
		showError(error.response?.data?.message || 'An error occurred')
	} finally {
		submitting.value = false
	}
}

function openSectionDialog(sec = null) {
	if (sec) {
		editingSection.value = {
			id: sec.id,
			heading: sec.heading || '',
			body: sec.body || '',
			sort_order: sec.sort_order ?? 0,
		}
	} else {
		editingSection.value = {
			id: null,
			heading: '',
			body: '',
			sort_order: (form.sections?.length || 0) + 1,
		}
	}
	sectionDialog.value = true
}

function closeSectionDialog() {
	sectionDialog.value = false
	editingSection.value = { id: null, heading: '', body: '', sort_order: 0 }
}

async function saveSection() {
	if (!page_id.value) {
		if (editingSection.value.id) {
			const idx = form.sections.findIndex(s => s.id === editingSection.value.id)
			if (idx !== -1) form.sections[idx] = { ...editingSection.value }
		} else {
			form.sections.push({ ...editingSection.value })
		}
		closeSectionDialog()
		return
	}

	savingSection.value = true
	try {
		const resp = await http.post(`/admin/website-pages/${page_id.value}/sections`, editingSection.value)
		showSuccess(resp.message || 'Section saved')
		closeSectionDialog()
		fetchData()
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to save section')
	} finally {
		savingSection.value = false
	}
}

async function deleteSection(sec) {
	if (!confirm(`Delete section "${sec.heading}"?`)) return

	if (!page_id.value || !sec.id) {
		form.sections = form.sections.filter(s => s !== sec)
		return
	}

	try {
		const resp = await http.delete(`/admin/website-pages/${page_id.value}/sections/${sec.id}`)
		showSuccess(resp.message || 'Section deleted')
		fetchData()
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to delete section')
	}
}
</script>

<style scoped>
.mb-4 {
	margin-bottom: 1rem;
}
</style>
