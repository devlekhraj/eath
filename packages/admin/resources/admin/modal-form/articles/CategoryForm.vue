<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-2">
            <span class="text-uppercase font-weight-medium text-slate-800">
                {{ form.id ? 'Edit Article Category & Pillar' : 'Add Article Category & Pillar' }}
            </span>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <!-- Navigation Tabs -->
        <v-tabs v-model="activeTab" color="primary">
            <v-tab value="general">
                <v-icon start>mdi-information-outline</v-icon>
                General
            </v-tab>
            <v-tab value="pillar">
                <v-icon start>mdi-pillar</v-icon>
                Pillar Presentation
            </v-tab>
            <v-tab value="rules">
                <v-icon start>mdi-format-list-numbered</v-icon>
                Core Rules ({{ form.rules.length }})
            </v-tab>
            <v-tab value="hazards_checklists">
                <v-icon start>mdi-alert-outline</v-icon>
                Hazards & Checklists
            </v-tab>
        </v-tabs>
        <v-divider />

        <v-card-text style="max-height: 65vh; overflow-y: auto;">
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-window v-model="activeTab">
                    
                    <!-- TAB 1: General Category Details -->
                    <v-window-item value="general">
                        <v-row class="mt-1">
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.name"
                                    label="Category Name"
                                    :rules="[rules.required]"
                                    required
                                    @input="onNameInput"
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.slug"
                                    label="URL Slug"
                                    :rules="[rules.required, rules.slug]"
                                    hint="e.g. seasons, packing, preparation, planning, culture, logistics"
                                    persistent-hint
                                    required
                                />
                            </v-col>

                            <v-col cols="12" sm="6">
                                <v-text-field
                                    v-model.number="form.sort_order"
                                    label="Sort Order / Sequence"
                                    type="number"
                                />
                            </v-col>

                            <v-col cols="12" sm="6">
                                <v-switch
                                    v-model="form.is_active"
                                    inset
                                    label="Active Status"
                                    color="success"
                                />
                            </v-col>

                            <v-col cols="12">
                                <label class="text-caption mb-1 d-block font-weight-medium">Category Description</label>
                                <SummarnoteEditor v-model="form.description" minHeight="160" />
                            </v-col>
                        </v-row>
                    </v-window-item>

                    <!-- TAB 2: Pillar Presentation & Narrative -->
                    <v-window-item value="pillar">
                        <v-row class="mt-1">
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.kicker"
                                    label="Eyebrow Kicker"
                                    placeholder="e.g. EXPEDITION PILLAR 01 · TIMING"
                                    hint="Displayed above the pillar title"
                                    persistent-hint
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-select
                                    v-model="form.icon"
                                    :items="iconOptions"
                                    label="Pillar Icon"
                                    hint="Alpine visual representation on cards"
                                    persistent-hint
                                />
                            </v-col>

                            <v-col cols="12">
                                <v-text-field
                                    v-model="form.tagline"
                                    label="Pillar Tagline / Subtitle"
                                    placeholder="e.g. Weather Windows & Trail Conditions"
                                />
                            </v-col>

                            <v-col cols="12">
                                <v-textarea
                                    v-model="form.summary"
                                    label="Executive Summary"
                                    rows="2"
                                    hint="Displayed on the card and offcanvas drawer overview"
                                    persistent-hint
                                />
                            </v-col>

                            <v-col cols="12">
                                <v-textarea
                                    v-model="form.lead"
                                    label="Extended Alpine Lead Context"
                                    rows="3"
                                    hint="Comprehensive paragraph explaining why this pillar is fundamental"
                                    persistent-hint
                                />
                            </v-col>
                        </v-row>
                    </v-window-item>

                    <!-- TAB 3: Core Principles (Rules) -->
                    <v-window-item value="rules">
                        <div class="mt-2">
                            <div class="d-flex justify-space-between align-center mb-3">
                                <div>
                                    <div class="text-subtitle-2 font-weight-medium text-slate-800">
                                        Essential Field Principles & Rules
                                    </div>
                                    <div class="text-caption text-slate-600">
                                        Numbered principles rendered in the right-side expedition panel.
                                    </div>
                                </div>
                                <v-btn color="primary" variant="outlined" @click="addRule">
                                    <v-icon start>mdi-plus</v-icon>
                                    Add Principle
                                </v-btn>
                            </div>

                            <div v-if="form.rules.length === 0" class="text-center py-6 text-slate-500">
                                No principles added yet. Click "Add Principle" to create one.
                            </div>

                            <v-card
                                v-for="(ruleItem, rIdx) in form.rules"
                                :key="rIdx"
                                class="mb-3 pa-3"
                                variant="outlined"
                            >
                                <div class="d-flex align-center justify-space-between mb-2">
                                    <span class="text-caption font-weight-bold text-primary">
                                        PRINCIPLE #{{ rIdx + 1 }}
                                    </span>
                                    <v-btn
                                        icon
                                        color="error"
                                        variant="text"
                                        title="Remove Principle"
                                        @click="removeRule(rIdx)"
                                    >
                                        <v-icon>mdi-delete</v-icon>
                                    </v-btn>
                                </div>
                                <v-text-field
                                    v-model="ruleItem.rule"
                                    label="Principle Headline"
                                    placeholder="e.g. The 3-Layer Thermodynamic System"
                                    class="mb-2"
                                    hide-details="auto"
                                />
                                <v-textarea
                                    v-model="ruleItem.detail"
                                    label="Principle Detail / Execution Guidance"
                                    rows="2"
                                    hide-details="auto"
                                />
                            </v-card>
                        </div>
                    </v-window-item>

                    <!-- TAB 4: Alpine Hazards & Pre-Expedition Checklists -->
                    <v-window-item value="hazards_checklists">
                        <v-row class="mt-1">
                            
                            <!-- Hazards Section -->
                            <v-col cols="12" md="6">
                                <div class="d-flex justify-space-between align-center mb-2">
                                    <span class="text-subtitle-2 font-weight-medium text-error">
                                        Critical Hazards to Avoid ({{ form.hazards.length }})
                                    </span>
                                    <v-btn color="error" variant="outlined" @click="addHazard">
                                        <v-icon start>mdi-plus</v-icon>
                                        Add Hazard
                                    </v-btn>
                                </div>
                                <div v-if="form.hazards.length === 0" class="text-caption text-slate-500 py-3">
                                    No hazards defined.
                                </div>
                                <div
                                    v-for="(hazard, hIdx) in form.hazards"
                                    :key="hIdx"
                                    class="d-flex align-center ga-2 mb-2"
                                >
                                    <v-text-field
                                        v-model="form.hazards[hIdx]"
                                        label="Hazard Description"
                                        hide-details
                                    />
                                    <v-btn
                                        icon
                                        color="error"
                                        variant="text"
                                        @click="removeHazard(hIdx)"
                                    >
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                </div>
                            </v-col>

                            <!-- Checklists Section -->
                            <v-col cols="12" md="6">
                                <div class="d-flex justify-space-between align-center mb-2">
                                    <span class="text-subtitle-2 font-weight-medium text-primary">
                                        Action Checklist Items ({{ form.checklists.length }})
                                    </span>
                                    <v-btn color="primary" variant="outlined" @click="addChecklist">
                                        <v-icon start>mdi-plus</v-icon>
                                        Add Item
                                    </v-btn>
                                </div>
                                <div v-if="form.checklists.length === 0" class="text-caption text-slate-500 py-3">
                                    No checklist items defined.
                                </div>
                                <div
                                    v-for="(checkItem, cIdx) in form.checklists"
                                    :key="cIdx"
                                    class="d-flex align-center ga-2 mb-2"
                                >
                                    <v-text-field
                                        v-model="form.checklists[cIdx]"
                                        label="Checklist Item"
                                        hide-details
                                    />
                                    <v-btn
                                        icon
                                        color="error"
                                        variant="text"
                                        @click="removeChecklist(cIdx)"
                                    >
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                </div>
                            </v-col>

                        </v-row>
                    </v-window-item>

                </v-window>
            </v-form>
        </v-card-text>

        <v-divider />
        <v-card-actions class="justify-end pa-3">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save Category</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { createArticleCategoryApi } from '@/http/articles.http'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)
const slugEdited = ref(false)
const activeTab = ref('general')

const iconOptions = [
    { title: 'Sun (Seasons & Timing)', value: 'sun' },
    { title: 'Backpack (Packing & Gear)', value: 'backpack' },
    { title: 'Shield (Preparation & Health)', value: 'shield' },
    { title: 'Map (Route Planning)', value: 'map' },
    { title: 'Compass (Himalayan Culture)', value: 'compass' },
    { title: 'Plane (Travel Logistics)', value: 'plane' },
]

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

const form = reactive({
    id: null,
    name: '',
    slug: '',
    description: '',
    kicker: '',
    tagline: '',
    summary: '',
    lead: '',
    icon: 'compass',
    rules: [],
    hazards: [],
    checklists: [],
    is_active: true,
    sort_order: 0,
})

const rules = {
    required: v => !!v || 'This field is required',
    slug: v =>
        !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
        'Slug must contain only lowercase letters, numbers, and hyphens',
}

function parseArray(val) {
    if (Array.isArray(val)) return val
    if (typeof val === 'string') {
        try {
            const parsed = JSON.parse(val)
            return Array.isArray(parsed) ? parsed : []
        } catch {
            return []
        }
    }
    return []
}

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            slug: props.item.slug || '',
            description: props.item.description || '',
            kicker: props.item.kicker || '',
            tagline: props.item.tagline || '',
            summary: props.item.summary || '',
            lead: props.item.lead || '',
            icon: props.item.icon || 'compass',
            rules: parseArray(props.item.rules).map(r => ({
                rule: r?.rule || '',
                detail: r?.detail || '',
            })),
            hazards: parseArray(props.item.hazards).map(h => typeof h === 'string' ? h : (h?.hazard || '')),
            checklists: parseArray(props.item.checklists).map(c => typeof c === 'string' ? c : (c?.checklist || '')),
            is_active: props.item.is_active ?? true,
            sort_order: props.item.sort_order ?? 0,
        })
        slugEdited.value = true
    }
})

function onNameInput() {
    if (!slugEdited.value && form.name) {
        form.slug = form.name
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
    }
}

function addRule() {
    form.rules.push({ rule: '', detail: '' })
}

function removeRule(index) {
    form.rules.splice(index, 1)
}

function addHazard() {
    form.hazards.push('')
}

function removeHazard(index) {
    form.hazards.splice(index, 1)
}

function addChecklist() {
    form.checklists.push('')
}

function removeChecklist(index) {
    form.checklists.splice(index, 1)
}

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) {
        activeTab.value = 'general'
        return
    }

    loading.value = true
    try {
        const payload = {
            ...form,
            sort_order: parseInt(form.sort_order) || 0,
            rules: form.rules.filter(r => r.rule || r.detail),
            hazards: form.hazards.filter(h => !!h?.trim()),
            checklists: form.checklists.filter(c => !!c?.trim()),
        }
        const resp = await createArticleCategoryApi(payload)
        loading.value = false
        showSuccess(resp.message || 'Category saved successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        loading.value = false
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Category save failed', error)
    }
}
</script>
