<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="10" offset-lg="1">
                <div class="d-flex align-center justify-space-between mb-4">
                    <div>
                        <div class="text-subtitle-1 font-weight-medium">Article Sections</div>
                        <div class="text-caption text-medium-emphasis">Structured editorial headings and detailed content blocks.</div>
                    </div>
                    <v-btn color="primary" @click="openSectionDialog()">
                        <v-icon start>mdi-plus</v-icon> Add Section
                    </v-btn>
                </div>

                <v-divider class="mb-4" />

                <div v-if="sections && sections.length > 0">
                    <v-table class="border">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Order</th>
                                <th>Heading</th>
                                <th>Content Preview</th>
                                <th class="text-center" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="sec in sections" :key="sec.id || sec.heading">
                                <td>{{ sec.sort_order ?? 0 }}</td>
                                <td>{{ sec.heading }}</td>
                                <td class="text-caption text-medium-emphasis">
                                    {{ stripHtml(sec.body).slice(0, 100) }}...
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-center justify-center ga-2">
                                        <v-btn size="x-small" icon variant="tonal" color="primary" @click="openSectionDialog(sec)">
                                            <v-icon size="16">mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn size="x-small" icon variant="tonal" color="error" @click="deleteSection(sec)">
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
                    <div>No sections added yet. Click "Add Section" to create structured content blocks.</div>
                </div>

                <!-- Section Dialog -->
                <v-dialog v-model="dialog" max-width="700" persistent>
                    <v-card>
                        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
                            <span class="text-uppercase font-weight-medium text-slate-800">
                                {{ editingSection.id ? 'Edit Section' : 'Add Section' }}
                            </span>
                            <v-btn icon variant="text" size="small" @click="closeDialog">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-card-title>
                        <v-divider />
                        <v-card-text>
                            <v-row>
                                <v-col cols="12" sm="9">
                                    <v-text-field
                                        v-model="editingSection.heading"
                                        label="Section Heading"
                                        variant="outlined"
                                        density="compact"
                                        :rules="[v => !!v || 'Heading is required']"
                                    />
                                </v-col>
                                <v-col cols="12" sm="3">
                                    <v-text-field
                                        v-model.number="editingSection.sort_order"
                                        label="Sort Order"
                                        type="number"
                                        variant="outlined"
                                        density="compact"
                                    />
                                </v-col>
                                <v-col cols="12">
                                    <label class="text-caption mb-1 d-block">Section Body</label>
                                    <SummarnoteEditor v-model="editingSection.body" minHeight="200" />
                                </v-col>
                            </v-row>
                        </v-card-text>
                        <v-divider />
                        <v-card-actions class="pa-3 justify-end">
                            <v-btn variant="text" @click="closeDialog">Cancel</v-btn>
                            <v-btn color="primary" :loading="saving" @click="saveSection">Save Section</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { ref, computed } from 'vue'
import http from '@/http.config'
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
    form: { type: Object, required: true },
    articleId: { type: [String, Number], default: null },
})

const emit = defineEmits(['saved'])
const { showSuccess, showError } = useSnackbar()

const dialog = ref(false)
const saving = ref(false)
const editingSection = ref({
    id: null,
    heading: '',
    body: '',
    sort_order: 0,
})

const sections = computed(() => props.form?.sections || [])

function stripHtml(html) {
    if (!html) return ''
    return html.replace(/<[^>]*>?/gm, '')
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
            sort_order: sections.value.length + 1,
        }
    }
    dialog.value = true
}

function closeDialog() {
    dialog.value = false
    editingSection.value = { id: null, heading: '', body: '', sort_order: 0 }
}

async function saveSection() {
    if (!editingSection.value.heading || !editingSection.value.body) {
        showError('Please provide both heading and body content.')
        return
    }

    if (!props.articleId) {
        // If article not created yet, push to local array
        if (!props.form.sections) props.form.sections = []
        if (editingSection.value.id) {
            const idx = props.form.sections.findIndex(s => s.id === editingSection.value.id)
            if (idx !== -1) props.form.sections[idx] = { ...editingSection.value }
        } else {
            props.form.sections.push({ ...editingSection.value })
        }
        closeDialog()
        return
    }

    saving.value = true
    try {
        const resp = await http.post(`/admin/articles/${props.articleId}/sections`, editingSection.value)
        showSuccess(resp.message || 'Section saved')
        closeDialog()
        emit('saved', { message: 'Section updated' })
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to save section')
    } finally {
        saving.value = false
    }
}

async function deleteSection(sec) {
    if (!confirm(`Delete section "${sec.heading}"?`)) return

    if (!props.articleId || !sec.id) {
        props.form.sections = props.form.sections.filter(s => s !== sec)
        return
    }

    try {
        const resp = await http.delete(`/admin/articles/${props.articleId}/sections/${sec.id}`)
        showSuccess(resp.message || 'Section deleted')
        emit('saved', { message: 'Section deleted' })
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to delete section')
    }
}
</script>
