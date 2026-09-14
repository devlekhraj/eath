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
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { computed } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
import ArticleSectionModal from '@/modal-form/articles/ArticleSectionModal.vue'

const props = defineProps({
    form: { type: Object, required: true },
    articleId: { type: [String, Number], default: null },
})

const emit = defineEmits(['saved'])
const { showSuccess, showError } = useSnackbar()
const globalModal = useGlobalModal()

const sections = computed(() => props.form?.sections || [])

function stripHtml(html) {
    if (!html) return ''
    return html.replace(/<[^>]*>?/gm, '')
}

function openSectionDialog(sec = null) {
    globalModal.open({
        title: sec?.id ? 'Edit Article Section' : 'Add Article Section',
        component: ArticleSectionModal,
        size: 'lg',
        props: {
            section: sec ? { ...sec } : { sort_order: sections.value.length + 1 },
            articleId: props.articleId,
        },
        onSaved: (savedSec) => {
            if (!props.articleId) {
                if (!props.form.sections) props.form.sections = []
                if (savedSec.id) {
                    const idx = props.form.sections.findIndex(s => s.id === savedSec.id)
                    if (idx !== -1) props.form.sections[idx] = savedSec
                } else {
                    props.form.sections.push(savedSec)
                }
            } else {
                emit('saved', { message: 'Section updated' })
            }
        },
    })
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
