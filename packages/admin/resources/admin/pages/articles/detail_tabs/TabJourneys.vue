<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" lg="8" offset-lg="2">
                <div class="mb-4">
                    <div class="text-subtitle-1 font-weight-medium">Related Journeys & Treks</div>
                    <div class="text-caption text-medium-emphasis">
                        Associate packages and trekking itineraries that will appear as recommended trips in this article.
                    </div>
                </div>

                <v-autocomplete
                    v-model="selectedJourneyIds"
                    :items="availableJourneys"
                    item-title="title"
                    item-value="id"
                    label="Select Related Journeys"
                    multiple
                    chips
                    closable-chips
                    clearable
                    variant="outlined"
                    density="comfortable"
                    :loading="loadingJourneys"
                />

                <div v-if="selectedJourneyDetails.length > 0" class="mt-4">
                    <v-table class="border">
                        <thead>
                            <tr>
                                <th>Journey Title</th>
                                <th style="width: 150px;">Slug</th>
                                <th class="text-center" style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="j in selectedJourneyDetails" :key="j.id">
                                <td>{{ j.title }}</td>
                                <td class="text-caption text-medium-emphasis">{{ j.slug }}</td>
                                <td class="text-center">
                                    <v-btn size="x-small" icon variant="tonal" color="error" @click="removeJourney(j.id)">
                                        <v-icon size="16">mdi-close</v-icon>
                                    </v-btn>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </div>

                <div class="text-center mt-6">
                    <v-btn color="primary" :loading="saving" @click="saveJourneys">
                        Save Related Journeys
                    </v-btn>
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'

const props = defineProps({
    form: { type: Object, required: true },
    articleId: { type: [String, Number], default: null },
})

const emit = defineEmits(['saved'])
const { showSuccess, showError } = useSnackbar()

const availableJourneys = ref([])
const loadingJourneys = ref(false)
const saving = ref(false)
const selectedJourneyIds = ref([])

onMounted(async () => {
    await fetchJourneys()
    syncInitialSelection()
})

watch(() => props.form, () => {
    syncInitialSelection()
}, { deep: true })

function syncInitialSelection() {
    if (props.form?.journey_ids && Array.isArray(props.form.journey_ids)) {
        selectedJourneyIds.value = [...props.form.journey_ids]
    } else if (props.form?.journeys && Array.isArray(props.form.journeys)) {
        selectedJourneyIds.value = props.form.journeys.map(j => j.id)
    }
}

async function fetchJourneys() {
    try {
        loadingJourneys.value = true
        const resp = await http.get('/admin/journeys')
        availableJourneys.value = resp.data || []
    } catch (error) {
        console.error('Failed to load journeys:', error)
    } finally {
        loadingJourneys.value = false
    }
}

const selectedJourneyDetails = computed(() => {
    return availableJourneys.value.filter(j => selectedJourneyIds.value.includes(j.id))
})

function removeJourney(id) {
    selectedJourneyIds.value = selectedJourneyIds.value.filter(jId => jId !== id)
}

async function saveJourneys() {
    if (!props.articleId) {
        props.form.journey_ids = [...selectedJourneyIds.value]
        showSuccess('Journeys selected for article')
        return
    }

    saving.value = true
    try {
        const resp = await http.post(`/admin/articles/${props.articleId}/journeys`, {
            journey_ids: selectedJourneyIds.value,
        })
        showSuccess(resp.message || 'Related journeys updated')
        emit('saved', { message: 'Related journeys updated' })
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update related journeys')
    } finally {
        saving.value = false
    }
}
</script>
