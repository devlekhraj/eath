<template>
	<v-container fluid>
		<v-row>
			<v-col cols="12" lg="10" offset-lg="1">
				<!-- Header Card -->
				<v-card class="pa-4 mb-4">
					<div class="d-flex align-center justify-space-between flex-wrap ga-2">
						<div>
							<div class="text-h6 text-capitalize">{{ form.title || 'Untitled Page' }}</div>
							<div class="text-caption text-medium-emphasis mt-1">/{{ form.slug || 'page-slug' }}</div>
						</div>
						<div class="d-flex align-center ga-2">
							<v-chip size="small" label variant="tonal" color="primary" class="text-uppercase">
								{{ form.type || 'standard' }}
							</v-chip>
							<v-chip size="small" label :color="form.is_published ? 'success' : 'warning'">
								{{ form.is_published ? 'Published' : 'Draft' }}
							</v-chip>
							<v-btn
								v-if="form.slug"
								variant="outlined"
								color="primary"
								:href="`/${form.slug}`"
								target="_blank"
							>
								<v-icon start size="14">mdi-open-in-new</v-icon>
								View Public Page
							</v-btn>
							<v-btn
								color="primary"
								:loading="submitting"
								@click="submitForm"
							>
								<v-icon start size="16">mdi-content-save</v-icon>
								Save Page
							</v-btn>
						</div>
					</div>
				</v-card>

				<!-- Tabs Card: 2 Tabs (Content & Sections, SEO) -->
				<v-card class="pa-4">
					<v-form ref="formRef" v-model="valid" @submit.prevent="submitForm" validate-on="submit">
						<v-tabs v-model="tab" color="primary">
							<v-tab value="content">
								<v-icon start>mdi-file-document-outline</v-icon> Page Content & Sections
							</v-tab>
							<v-tab value="seo">
								<v-icon start>mdi-magnify</v-icon> SEO & Search Optimization
							</v-tab>
						</v-tabs>
						<v-divider />

						<v-window v-model="tab" class="pt-6">
							<!-- TAB 1: ALL CONTENT & SECTIONS IN ONE SEAMLESS FLOW -->
							<v-window-item value="content">
								<!-- 1. General Information -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												General Information
											</div>
											<div class="text-caption text-medium-emphasis">
												Core title, URL slug, categorization, and publication statuses.
											</div>
										</div>
									</div>

									<v-row dense>
										<v-col cols="12" md="8">
											<div class="mb-2">
												<v-text-field
													v-model="form.title"
													label="Page Title *"
													:rules="[rules.required]"
												/>
											</div>
										</v-col>

										<v-col cols="12" md="4">
											<div class="mb-2">
												<v-text-field
													v-model="form.slug"
													label="URL Slug *"
													:rules="[rules.slug]"
													hint="URL slug without leading slash"
													persistent-hint
												/>
											</div>
										</v-col>

										<v-col cols="12" md="6">
											<div class="mb-2">
												<v-select
													v-model="form.type"
													:items="typeOptions"
													label="Page Type"
												/>
											</div>
										</v-col>

										<v-col cols="12" sm="3">
											<div class="mb-2">
												<v-switch
													v-model="form.is_active"
													inset
													label="Active"
													color="success"
												/>
											</div>
										</v-col>

										<v-col cols="12" sm="3">
											<div class="mb-2">
												<v-switch
													v-model="form.is_published"
													inset
													label="Published"
												/>
											</div>
										</v-col>

										<v-col cols="12">
											<div class="mb-2">
												<v-textarea
													v-model="form.summary"
													label="Page Summary / Lead Text"
													rows="2"
													auto-grow
													hint="Introductory lead paragraph displayed prominently beneath the H1"
													persistent-hint
												/>
											</div>
										</v-col>
									</v-row>
								</v-card>

								<!-- 2. Hero Banner Image Card -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Hero Banner Image
											</div>
											<div class="text-caption text-medium-emphasis">
												High-resolution panoramic banner displayed on top of the public page.
											</div>
										</div>
										<v-chip size="x-small" color="primary" variant="tonal" label>
											16:9 Panoramic
										</v-chip>
									</div>

									<input
										ref="heroFileInputRef"
										type="file"
										accept="image/*"
										class="d-none"
										@change="handleHeroDirectUpload"
									/>

									<!-- Visual Preview -->
									<div v-if="form.hero_image?.url || form.banner_url" class="position-relative mb-4 border rounded overflow-hidden">
										<v-img
											:src="form.hero_image?.url || form.banner_url"
											height="220"
											cover
											class="bg-grey-lighten-4"
										>
											<template #placeholder>
												<div class="d-flex align-center justify-center fill-height bg-grey-lighten-4">
													<v-progress-circular indeterminate size="24" color="primary" />
												</div>
											</template>
										</v-img>

										<div class="pa-2 bg-white d-flex align-center justify-space-between text-caption">
											<span class="font-weight-medium text-truncate">
												{{ form.hero_image?.filename || 'Hero Image' }}
											</span>
											<span v-if="form.hero_image?.alt_text" class="text-medium-emphasis ml-2 text-truncate">
												Alt: {{ form.hero_image.alt_text }}
											</span>
										</div>
									</div>

									<!-- Empty Dropzone -->
									<div
										v-else
										class="d-flex flex-column align-center justify-center pa-6 bg-grey-lighten-5 mb-4 cursor-pointer"
										style="height: 180px; border: 2px dashed #cbd5e1; border-radius: 6px;"
										@click="openHeroLibraryPicker"
									>
										<v-icon size="40" color="grey">mdi-cloud-upload-outline</v-icon>
										<span class="text-body-2 font-weight-medium text-slate-700 mt-2">Choose or Upload Hero Banner</span>
										<span class="text-caption text-medium-emphasis mt-1">Click to select from media library</span>
									</div>

									<!-- Action buttons -->
									<div class="d-flex align-center justify-end flex-wrap ga-2 pt-2 border-t">
										<v-btn
											v-if="form.hero_image?.id || form.hero_image?.url || form.banner_url"
											color="error"
											variant="outlined"
											:disabled="loadingHero"
											@click="removeHeroImage"
										>
											<v-icon start size="16">mdi-delete</v-icon>
											Remove
										</v-btn>

										<v-btn
											v-if="form.hero_image?.attachment_id"
											color="primary"
											variant="outlined"
											:disabled="loadingHero"
											@click="openAltTextDialog"
										>
											<v-icon start size="16">mdi-pencil</v-icon>
											Edit Alt Text
										</v-btn>

										<v-btn
											variant="outlined"
											color="secondary"
											:disabled="loadingHero"
											@click="openHeroLibraryPicker"
										>
											<v-icon start size="16">mdi-image-multiple</v-icon>
											Choose from Library
										</v-btn>

										<v-btn
											color="primary"
											variant="flat"
											:loading="loadingHero"
											@click="heroFileInputRef?.click()"
										>
											<v-icon start size="16">mdi-cloud-upload</v-icon>
											Upload Image
										</v-btn>
									</div>
								</v-card>

								<!-- 3. Notice / Operational Advisory Banner Card -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Notice / Operational Advisory Banner
											</div>
											<div class="text-caption text-medium-emphasis">
												Prominent top notice strip for ethical standards, verification disclaimers, or field alerts.
											</div>
										</div>
										<v-chip size="x-small" color="primary" variant="tonal" label>
											Advisory
										</v-chip>
									</div>

									<v-row dense>
										<v-col cols="12">
											<div class="mb-2">
												<v-text-field
													v-model="form.notice_title"
													label="Notice Title / Kicker"
													placeholder="e.g. Proposed Practices Notice — Not Verified Factual Achievements"
												/>
											</div>
										</v-col>
										<v-col cols="12">
											<div class="mb-2">
												<v-textarea
													v-model="form.notice_body"
													label="Notice Body Text"
													rows="2"
													auto-grow
													placeholder="e.g. This editorial document outlines proposed environmental standards..."
												/>
											</div>
										</v-col>
									</v-row>
								</v-card>

								<!-- 4. Main Page Intro Body (Rich Text) -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Main Page Intro Body (Optional)
											</div>
											<div class="text-caption text-medium-emphasis">
												Rich text editorial content displayed before the modular policy sections.
											</div>
										</div>
									</div>

									<SummarnoteEditor v-model="form.body" minHeight="180" />
								</v-card>

								<!-- 5. Modular Page Sections (Collapsible / Expandable Panels) -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between flex-wrap ga-2 mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Modular Page Sections ({{ form.sections?.length || 0 }})
											</div>
											<div class="text-caption text-medium-emphasis">
												Expandable modular blocks (Checklists, Cards Grids, Q&amp;A, Disclosures) building up this page.
											</div>
										</div>
										<div class="d-flex align-center ga-2">
											<v-btn
												variant="outlined"
												color="secondary"
												@click="toggleExpandAll"
											>
												<v-icon start size="16">
													{{ allExpanded ? 'mdi-collapse-all' : 'mdi-expand-all' }}
												</v-icon>
												{{ allExpanded ? 'Collapse All' : 'Expand All' }}
											</v-btn>
											<v-btn color="primary" @click="addNewSection">
												<v-icon start size="16">mdi-plus</v-icon> Add Section
											</v-btn>
										</div>
									</div>

									<v-divider class="mb-3" />

									<!-- Empty State -->
									<div v-if="!form.sections || form.sections.length === 0" class="pa-8 text-center border text-medium-emphasis bg-slate-50">
										<v-icon size="40" color="grey-lighten-1" class="mb-2">mdi-format-list-numbered</v-icon>
										<div class="text-body-2 font-weight-medium text-slate-700">No modular sections created yet.</div>
										<p class="text-caption text-medium-emphasis mt-1 mb-3">
											Add sections to create structured checklists, cards grids, or Q&amp;A blocks.
										</p>
										<v-btn color="primary" @click="addNewSection">
											<v-icon start size="16">mdi-plus</v-icon> Add First Section
										</v-btn>
									</div>

									<!-- Expandable Panels -->
									<v-expansion-panels v-else v-model="expandedPanels" multiple class="elevation-0">
										<v-expansion-panel
											v-for="(sec, sIdx) in form.sections"
											:key="sec.id || `temp-${sIdx}`"
											:value="sec.id || `temp-${sIdx}`"
											class="border mb-3"
										>
											<v-expansion-panel-title class="py-2">
												<div class="d-flex align-center justify-space-between w-100 pr-2 overflow-hidden">
													<div class="d-flex align-center ga-2 flex-wrap text-truncate mr-2">
														<v-chip size="x-small" label color="primary">
															#{{ sec.sort_order ?? (sIdx + 1) }}
														</v-chip>
														<span class="font-weight-medium text-body-2 text-slate-800 text-truncate">
															{{ sec.heading || 'Untitled Section' }}
														</span>
														<v-chip size="x-small" variant="tonal" color="secondary" label class="text-uppercase">
															{{ sec.layout_key || 'standard' }}
														</v-chip>
														<span class="text-caption text-medium-emphasis">
															({{ (sec.items?.length || 0) }} items)
														</span>
													</div>

													<!-- Header Quick Actions (stop propagation so panel doesn't toggle) -->
													<div class="d-flex align-center ga-1 flex-shrink-0" @click.stop>
														<v-btn
															icon
															variant="text"
															:disabled="sIdx === 0"
															title="Move section up"
															@click="moveSection(sIdx, -1)"
														>
															<v-icon size="16">mdi-arrow-up</v-icon>
														</v-btn>
														<v-btn
															icon
															variant="text"
															:disabled="sIdx === form.sections.length - 1"
															title="Move section down"
															@click="moveSection(sIdx, 1)"
														>
															<v-icon size="16">mdi-arrow-down</v-icon>
														</v-btn>
														<v-btn
															icon
															variant="text"
															color="error"
															title="Delete section"
															@click="deleteSection(sec, sIdx)"
														>
															<v-icon size="16">mdi-delete</v-icon>
														</v-btn>
													</div>
												</div>
											</v-expansion-panel-title>

											<v-expansion-panel-text class="pa-4 bg-white border-t">
												<!-- Section Metadata Row -->
												<v-row dense>
													<v-col cols="12" md="6">
														<div class="mb-2">
															<v-text-field
																v-model="sec.heading"
																label="Section Heading *"
																placeholder="e.g. Supporting Himalayan Valley Communities"
															/>
														</div>
													</v-col>
													<v-col cols="12" md="4">
														<div class="mb-2">
															<v-select
																v-model="sec.layout_key"
																:items="layoutOptions"
																label="Presentation Layout *"
																hint="Controls frontend card / checklist styling"
																persistent-hint
															/>
														</div>
													</v-col>
													<v-col cols="12" md="2">
														<div class="mb-2">
															<v-text-field
																v-model.number="sec.sort_order"
																label="Sort Order"
																type="number"
															/>
														</div>
													</v-col>

													<v-col cols="12">
														<div class="mb-3 mt-1">
															<label class="text-caption mb-1 d-block font-weight-medium">
																Section Intro / Explanatory Text
															</label>
															<SummarnoteEditor v-model="sec.body" minHeight="120" />
														</div>
													</v-col>
												</v-row>

												<!-- Inline Structured Items Repeater -->
												<div class="mt-3 pt-3 border-t">
													<div class="d-flex align-center justify-space-between mb-3">
														<div>
															<div class="text-subtitle-2 font-weight-bold text-slate-800 text-uppercase">
																Structured Items / Cards / Questions ({{ sec.items?.length || 0 }})
															</div>
															<div class="text-caption text-medium-emphasis">
																Add checklist points, policy cards, or question &amp; answer pairs for this section.
															</div>
														</div>
														<v-btn color="primary" variant="tonal" @click="addSectionItem(sec)">
															<v-icon start size="16">mdi-plus</v-icon> Add Item
														</v-btn>
													</div>

													<div v-if="!sec.items || sec.items.length === 0" class="pa-4 text-center border text-medium-emphasis bg-slate-50">
														<div class="text-caption">No structured items added yet. Click "Add Item" to add cards or key points.</div>
													</div>

													<div v-else class="d-flex flex-column ga-2">
														<v-card
															v-for="(item, itIdx) in sec.items"
															:key="itIdx"
															variant="outlined"
															class="pa-3 bg-slate-50"
														>
															<div class="d-flex align-center justify-space-between mb-2">
																<div class="d-flex align-center ga-2">
																	<v-chip size="x-small" label color="primary">#{{ itIdx + 1 }}</v-chip>
																	<span class="text-caption font-weight-medium text-slate-700">
																		{{ item.title || `Item #${itIdx + 1}` }}
																	</span>
																</div>
																<div class="d-flex align-center ga-1">
																	<v-btn
																		icon
																		variant="text"
																		:disabled="itIdx === 0"
																		@click="moveSectionItem(sec, itIdx, -1)"
																	>
																		<v-icon size="16">mdi-arrow-up</v-icon>
																	</v-btn>
																	<v-btn
																		icon
																		variant="text"
																		:disabled="itIdx === sec.items.length - 1"
																		@click="moveSectionItem(sec, itIdx, 1)"
																	>
																		<v-icon size="16">mdi-arrow-down</v-icon>
																	</v-btn>
																	<v-btn
																		icon
																		variant="text"
																		color="error"
																		@click="removeSectionItem(sec, itIdx)"
																	>
																		<v-icon size="16">mdi-delete</v-icon>
																	</v-btn>
																</div>
															</div>

															<v-row dense>
																<v-col cols="12" md="8">
																	<v-text-field
																		v-model="item.title"
																		label="Title / Principle / Question *"
																		density="compact"
																		hide-details="auto"
																		class="mb-2"
																	/>
																</v-col>
																<v-col cols="12" md="4">
																	<v-text-field
																		v-model="item.tag"
																		label="Badge / Tag / Category"
																		density="compact"
																		placeholder="e.g. Standard 01, Protocol"
																		hide-details="auto"
																		class="mb-2"
																	/>
																</v-col>
																<v-col cols="12">
																	<v-textarea
																		v-model="item.description"
																		label="Description / Protocol Detail / Answer *"
																		rows="2"
																		density="compact"
																		auto-grow
																		hide-details="auto"
																	/>
																</v-col>
															</v-row>
														</v-card>
													</div>
												</div>

												<!-- Save This Section Button -->
												<div class="d-flex justify-end mt-4 pt-3 border-t">
													<v-btn
														color="primary"
														variant="tonal"
														:loading="sec._saving"
														@click="saveSingleSection(sec)"
													>
														<v-icon start size="16">mdi-content-save-outline</v-icon>
														Save This Section
													</v-btn>
												</div>
											</v-expansion-panel-text>
										</v-expansion-panel>
									</v-expansion-panels>
								</v-card>

								<!-- 6. Bottom Call-To-Action (CTA) Banner Card -->
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Bottom Call-To-Action (CTA) Banner
											</div>
											<div class="text-caption text-medium-emphasis">
												Bottom conversion banner encouraging travelers to explore journeys or inquire.
											</div>
										</div>
										<v-chip size="x-small" color="secondary" variant="tonal" label>
											CTA
										</v-chip>
									</div>

									<v-row dense>
										<v-col cols="12">
											<div class="mb-2">
												<v-text-field
													v-model="form.cta_title"
													label="CTA Heading"
													placeholder="e.g. Ready to Plan a Mindful Himalayan Trek?"
												/>
											</div>
										</v-col>
										<v-col cols="12">
											<div class="mb-2">
												<v-textarea
													v-model="form.cta_description"
													label="CTA Description"
													rows="2"
													auto-grow
													placeholder="e.g. Explore our interactive journey planner to craft an itinerary..."
												/>
											</div>
										</v-col>
										<v-col cols="12" md="6">
											<div class="mb-2">
												<v-text-field
													v-model="form.cta_primary_btn_text"
													label="Primary Button Label"
													placeholder="e.g. Start Custom Journey Planner →"
												/>
											</div>
										</v-col>
										<v-col cols="12" md="6">
											<div class="mb-2">
												<v-text-field
													v-model="form.cta_primary_btn_url"
													label="Primary Button URL"
													placeholder="e.g. /plan-your-trip"
												/>
											</div>
										</v-col>
										<v-col cols="12" md="6">
											<div class="mb-2">
												<v-text-field
													v-model="form.cta_secondary_btn_text"
													label="Secondary Button Label"
													placeholder="e.g. Ask a Planning Question"
												/>
											</div>
										</v-col>
										<v-col cols="12" md="6">
											<div class="mb-2">
												<v-text-field
													v-model="form.cta_secondary_btn_url"
													label="Secondary Button URL"
													placeholder="e.g. /contact"
												/>
											</div>
										</v-col>
									</v-row>
								</v-card>

								<!-- Submit Button at Bottom of Tab 1 -->
								<div class="text-center mt-6">
									<v-btn type="submit" color="primary" size="large" :loading="submitting">
										<v-icon start size="18">mdi-content-save</v-icon>
										Save All Page Details
									</v-btn>
								</div>
							</v-window-item>

							<!-- TAB 2: SEO & SEARCH OPTIMIZATION -->
							<v-window-item value="seo">
								<v-card variant="outlined" class="pa-4 mb-4">
									<div class="d-flex align-center justify-space-between mb-3">
										<div>
											<div class="text-subtitle-1 font-weight-bold text-uppercase text-slate-800">
												Search Engine Metadata
											</div>
											<div class="text-caption text-medium-emphasis">
												Optimize title tags and meta descriptions for Google, Bing, and social sharing.
											</div>
										</div>
										<v-chip size="x-small" color="primary" variant="tonal" label>
											SEO
										</v-chip>
									</div>

									<v-row dense>
										<v-col cols="12">
											<div class="mb-3">
												<v-text-field
													v-model="form.meta_title"
													label="Meta Title (SEO)"
													placeholder="e.g. Responsible Mountain Travel & Porter Welfare | EATH Trekking"
													:hint="`${form.meta_title?.length || 0} / 60 recommended characters`"
													persistent-hint
												/>
											</div>
										</v-col>

										<v-col cols="12">
											<div class="mb-3">
												<v-textarea
													v-model="form.meta_description"
													label="Meta Description (SEO)"
													rows="3"
													auto-grow
													placeholder="e.g. Explore our proposed framework for ethical porter welfare, local community benefit, and sacred Himalayan etiquette."
													:hint="`${form.meta_description?.length || 0} / 160 recommended characters`"
													persistent-hint
												/>
											</div>
										</v-col>
									</v-row>
								</v-card>

								<!-- Search Engine Result Preview (SERP Simulation) -->
								<v-card variant="outlined" class="pa-4 mb-4 bg-slate-50">
									<div class="text-subtitle-2 font-weight-bold text-slate-800 text-uppercase mb-2">
										Search Engine Snippet Preview
									</div>
									<div class="text-caption text-medium-emphasis mb-3">
										Visual simulation of how this page appears in Google search results.
									</div>

									<div class="pa-4 bg-white border rounded">
										<div class="d-flex align-center ga-2 text-caption text-slate-600 mb-1">
											<v-icon size="14" color="primary">mdi-web</v-icon>
											<span class="text-truncate">https://eath.test &gt; {{ form.slug || 'page-slug' }}</span>
										</div>
										<div class="text-subtitle-1 font-weight-medium text-primary text-truncate cursor-pointer">
											{{ form.meta_title || form.title || 'Page Title | EATH Travels' }}
										</div>
										<div class="text-caption text-slate-600 mt-1" style="line-height: 1.5;">
											{{ form.meta_description || form.summary || 'Search engine summary will appear here. Enter an informative description for search engine discovery.' }}
										</div>
									</div>
								</v-card>

								<!-- Submit Button at Bottom of Tab 2 -->
								<div class="text-center mt-6">
									<v-btn type="submit" color="primary" size="large" :loading="submitting">
										<v-icon start size="18">mdi-content-save</v-icon>
										Save SEO Details
									</v-btn>
								</div>
							</v-window-item>
						</v-window>
					</v-form>
				</v-card>
			</v-col>
		</v-row>
	</v-container>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from 'vue'
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import http from '@/http.config'
import { useRoute } from 'vue-router'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import { uploadMediaAssetApi } from '@/http/media-assets.http'
import MediaAssetPickerModal from '@/modal-form/media/MediaAssetPickerModal.vue'
import MediaAttachmentEditModal from '@/modal-form/media/MediaAttachmentEditModal.vue'

const formRef = ref(null)
const valid = ref(false)
const submitting = ref(false)
const tab = ref('content')

const route = useRoute()
const { showSuccess, showError } = useSnackbar()
const globalModal = useGlobalModal()

const page_id = ref(null)
const heroFileInputRef = ref(null)
const loadingHero = ref(false)

const expandedPanels = ref([])

const typeOptions = [
	{ title: 'Standard Page', value: 'standard' },
	{ title: 'Policy Page', value: 'policy' },
	{ title: 'Safety & Protocol', value: 'safety' },
	{ title: 'Responsible Travel', value: 'responsible' },
	{ title: 'About Us', value: 'about' },
	{ title: 'Contact Us', value: 'contact' },
]

const layoutOptions = [
	{ title: 'Standard Rich Text (standard)', value: 'standard' },
	{ title: 'Checklist Principles (checklist)', value: 'checklist' },
	{ title: 'Structured Cards Grid (cards_grid)', value: 'cards_grid' },
	{ title: 'Conscious Traveler Q&A (qa_grid)', value: 'qa_grid' },
	{ title: 'Verification Notice & Disclosure (disclosure)', value: 'disclosure' },
]

const form = reactive({
	title: '',
	slug: '',
	type: 'standard',
	summary: '',
	body: '',
	hero_image: null,
	banner_url: null,
	notice_title: '',
	notice_body: '',
	cta_title: '',
	cta_description: '',
	cta_primary_btn_text: '',
	cta_primary_btn_url: '',
	cta_secondary_btn_text: '',
	cta_secondary_btn_url: '',
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

const allExpanded = computed(() => {
	if (!form.sections || form.sections.length === 0) return false
	return expandedPanels.value.length === form.sections.length
})

function toggleExpandAll() {
	if (allExpanded.value) {
		expandedPanels.value = []
	} else {
		expandedPanels.value = form.sections.map((s, idx) => s.id || `temp-${idx}`)
	}
}

onMounted(() => {
	if (route.params.id) {
		page_id.value = route.params.id
		fetchData()
	}
})

const fetchData = async () => {
	try {
		const resp = await http.get(`/admin/website-pages/${page_id.value}`)
		const data = resp.data?.data || resp.data?.page || resp.data || {}

		const rawSections = (data.sections || []).map((sec, idx) => {
			let items = []
			if (sec.content?.items && Array.isArray(sec.content.items)) {
				items = JSON.parse(JSON.stringify(sec.content.items))
			} else if (Array.isArray(sec.content)) {
				items = JSON.parse(JSON.stringify(sec.content))
			}

			return {
				id: sec.id,
				heading: sec.heading || '',
				layout_key: sec.layout_key || 'standard',
				sort_order: sec.sort_order ?? (idx + 1),
				body: sec.body || '',
				items: items.map(it => ({
					title: it.title || it.question || '',
					description: it.description || it.answer || '',
					tag: it.tag || it.badge || '',
					icon: it.icon || '',
				})),
				_saving: false,
			}
		})

		Object.assign(form, {
			...data,
			hero_image: data.media?.hero || data.hero_image || null,
			body: data.body || data.content || '',
			sections: rawSections,
		})

		// Default open the first 2 panels
		if (rawSections.length > 0 && expandedPanels.value.length === 0) {
			expandedPanels.value = rawSections.slice(0, 2).map((s, idx) => s.id || `temp-${idx}`)
		}
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
			media: {
				hero: form.hero_image?.id || null,
			},
		}
		const resp = page_id.value
			? await http.patch(`/admin/website-pages/${page_id.value}`, payload)
			: await http.post('/admin/website-pages', payload)
		showSuccess(resp.data?.message || resp.message || 'Page saved successfully')
		if (resp.data?.data) {
			const updated = resp.data.data
			form.title = updated.title
			form.slug = updated.slug
			form.type = updated.type
			form.summary = updated.summary
			form.notice_title = updated.notice_title
			form.notice_body = updated.notice_body
			form.cta_title = updated.cta_title
			form.cta_description = updated.cta_description
			form.cta_primary_btn_text = updated.cta_primary_btn_text
			form.cta_primary_btn_url = updated.cta_primary_btn_url
			form.cta_secondary_btn_text = updated.cta_secondary_btn_text
			form.cta_secondary_btn_url = updated.cta_secondary_btn_url
			form.meta_title = updated.meta_title
			form.meta_description = updated.meta_description
		}
	} catch (error) {
		showError(error.response?.data?.message || 'An error occurred')
	} finally {
		submitting.value = false
	}
}

function openHeroLibraryPicker() {
	globalModal.open({
		title: 'Select Hero Banner from Library',
		component: MediaAssetPickerModal,
		size: 'lg',
		props: {
			onSelect: async (asset) => {
				if (!asset?.id) return
				if (page_id.value) {
					try {
						loadingHero.value = true
						const resp = await http.post(`/admin/website-pages/${page_id.value}/media-attachments`, {
							media_asset_id: asset.id,
							collection: 'hero',
						})
						showSuccess('Hero banner updated.')
						if (resp.data?.data) {
							form.hero_image = resp.data.data.media?.hero || resp.data.data.hero_image
							form.banner_url = resp.data.data.banner_url
						} else {
							fetchData()
						}
					} catch (err) {
						showError(err?.response?.data?.message || 'Failed to attach image.')
					} finally {
						loadingHero.value = false
					}
				} else {
					form.hero_image = asset
					form.banner_url = asset.url
				}
			},
		},
	})
}

async function handleHeroDirectUpload(event) {
	const file = event.target?.files?.[0]
	if (!file) return

	try {
		loadingHero.value = true
		const formData = new FormData()
		formData.append('file', file)

		const uploadResp = await uploadMediaAssetApi(formData)
		const mediaAsset = uploadResp.data

		if (!mediaAsset?.id) {
			showError('Failed to upload image.')
			return
		}

		if (page_id.value) {
			const resp = await http.post(`/admin/website-pages/${page_id.value}/media-attachments`, {
				media_asset_id: mediaAsset.id,
				collection: 'hero',
			})
			showSuccess('Hero banner uploaded and attached.')
			if (resp.data?.data) {
				form.hero_image = resp.data.data.media?.hero || resp.data.data.hero_image
				form.banner_url = resp.data.data.banner_url
			} else {
				fetchData()
			}
		} else {
			form.hero_image = mediaAsset
			form.banner_url = mediaAsset.url
			showSuccess('Hero image selected.')
		}
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to upload hero image.')
	} finally {
		loadingHero.value = false
		if (event.target) event.target.value = ''
	}
}

async function removeHeroImage() {
	if (!confirm('Remove hero banner image?')) return

	if (page_id.value && form.hero_image?.attachment_id) {
		try {
			loadingHero.value = true
			const resp = await http.delete(`/admin/website-pages/${page_id.value}/media-attachments/${form.hero_image.attachment_id}`)
			showSuccess(resp.data?.message || 'Hero banner removed.')
			if (resp.data?.data) {
				form.hero_image = null
				form.banner_url = null
			} else {
				fetchData()
			}
		} catch (err) {
			showError(err?.response?.data?.message || 'Failed to remove image.')
		} finally {
			loadingHero.value = false
		}
	} else {
		form.hero_image = null
		form.banner_url = null
	}
}

function openAltTextDialog() {
	if (!form.hero_image) return
	globalModal.open({
		title: 'Edit Hero Banner Alt Text',
		component: MediaAttachmentEditModal,
		size: 'sm',
		props: {
			attachment: {
				id: form.hero_image.attachment_id,
				alt_text: form.hero_image.alt_text,
				file_url: form.hero_image.url,
				media_asset: {
					title: 'Hero Banner Image',
					file_url: form.hero_image.url,
				},
			},
			showCaption: false,
			showSortOrder: false,
			onSave: async (payload) => {
				if (!page_id.value || !form.hero_image?.attachment_id) return
				await http.patch(`/admin/website-pages/${page_id.value}/media-attachments/${form.hero_image.attachment_id}`, {
					alt_text: payload.alt_text,
				})
			},
		},
		onSaved: (updated) => {
			if (form.hero_image) {
				form.hero_image.alt_text = updated.alt_text
			}
		},
	})
}

// Section Management
function addNewSection() {
	const newIndex = form.sections.length
	const newSec = {
		id: null,
		heading: 'New Section',
		layout_key: 'cards_grid',
		sort_order: newIndex + 1,
		body: '',
		items: [
			{ title: 'New Item 1', tag: 'Standard', description: '' }
		],
		_saving: false,
	}
	form.sections.push(newSec)
	const panelKey = `temp-${newIndex}`
	if (!expandedPanels.value.includes(panelKey)) {
		expandedPanels.value.push(panelKey)
	}
}

function moveSection(sIdx, direction) {
	const newIdx = sIdx + direction
	if (newIdx < 0 || newIdx >= form.sections.length) return
	const sec = form.sections.splice(sIdx, 1)[0]
	form.sections.splice(newIdx, 0, sec)

	// Re-index sort order
	form.sections.forEach((s, i) => {
		s.sort_order = i + 1
	})
}

async function deleteSection(sec, sIdx) {
	if (!confirm(`Delete section "${sec.heading || 'Untitled'}"?`)) return

	if (!page_id.value || !sec.id) {
		form.sections.splice(sIdx, 1)
		return
	}

	try {
		const resp = await http.delete(`/admin/website-pages/${page_id.value}/sections/${sec.id}`)
		showSuccess(resp.message || 'Section deleted')
		form.sections.splice(sIdx, 1)
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to delete section')
	}
}

function addSectionItem(sec) {
	if (!sec.items) sec.items = []
	sec.items.push({
		title: '',
		tag: '',
		description: '',
		icon: '',
	})
}

function removeSectionItem(sec, itIdx) {
	sec.items.splice(itIdx, 1)
}

function moveSectionItem(sec, itIdx, direction) {
	const newIdx = itIdx + direction
	if (newIdx < 0 || newIdx >= sec.items.length) return
	const it = sec.items.splice(itIdx, 1)[0]
	sec.items.splice(newIdx, 0, it)
}

async function saveSingleSection(sec) {
	if (!sec.heading) {
		showError('Section heading is required')
		return
	}

	if (!page_id.value) {
		showSuccess('Section updated in draft. Save page to persist.')
		return
	}

	sec._saving = true
	try {
		const contentPayload = sec.items && sec.items.length > 0 ? { items: sec.items } : null
		const payload = {
			id: sec.id,
			heading: sec.heading,
			layout_key: sec.layout_key,
			sort_order: sec.sort_order,
			body: sec.body,
			content: contentPayload,
		}

		const resp = await http.post(`/admin/website-pages/${page_id.value}/sections`, payload)
		showSuccess(resp.data?.message || resp.message || 'Section saved successfully')
		if (resp.data?.data?.id) {
			sec.id = resp.data.data.id
		}
	} catch (error) {
		showError(error?.response?.data?.message || 'Failed to save section')
	} finally {
		sec._saving = false
	}
}
</script>

<style scoped>
.cursor-pointer {
	cursor: pointer;
}
</style>
