<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" lg="10" offset-lg="1">
                <div class="pb-4 d-flex align-center justify-space-between">
                    <h2>Frequently Asked Questions</h2>
                    <v-btn size="large" rounded color="primary" @click="openForm()">
                        <v-icon>mdi-plus</v-icon>
                        Add Question
                    </v-btn>
                </div>

                <!-- Skeleton loader while loading -->
                <template v-if="loading">
                    <v-skeleton-loader v-for="n in 3" :key="n" type="list-item-two-line" class="mb-4" />
                </template>

                <!-- No data -->
                <template v-else-if="data_list.length === 0">
                    <v-card elevation="0">
                        <div class="text-center text-grey-darken-1 py-8">
                            <v-icon size="40" color="grey">mdi-information-outline</v-icon>
                            <div class="mt-2">No FAQs available</div>
                        </div>
                    </v-card>
                </template>

                <!-- Actual data -->
                <v-list v-else two-line>
                    <v-list-item v-for="(faq, index) in data_list" :key="index" class="faq-item" shaped>
                        <v-list-item-content>
                            <v-list-item-title class="font-weight-bold mb-1 d-flex justify-space-between align-center">
                                <span>{{ faq.question }}</span>
                                <div>
                                    <v-btn icon size="x-small" variant="tonal" @click="openForm(faq)">
                                        <v-icon color="primary">mdi-pencil</v-icon>
                                    </v-btn>
                                    <v-btn icon size="x-small" variant="tonal" class="ml-2" @click="deleteFAQ(faq)">
                                        <v-icon color="red">mdi-delete</v-icon>
                                    </v-btn>
                                </div>
                            </v-list-item-title>

                            <!-- Changed from v-list-item-subtitle to a normal div to avoid truncation -->
                            <div class="faq-answer">
                                {{ faq.answer }}
                            </div>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

            </v-col>
        </v-row>
    </v-container>

    <modal-template ref="globalModal" @close="fetchData"></modal-template>
</template>

<script setup>
import http from '@/http.config'
import { ref, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import FaqForm from './modal/FaqForm.vue'
import FaqDelete from './modal/FaqDelete.vue'

const { showError } = useSnackbar()
const globalModal = ref(null)
const data_list = ref([])
const loading = ref(false)

function openForm(item = {}) {
    globalModal.value.open({
        component: FaqForm,
        size: 'lg',
        props: { item },
    })
}
function deleteFAQ(item) {
    globalModal.value.open({
        component: FaqDelete,
        size: 'sm',
        props: { item },
    })
}

async function fetchData() {
    try {
        loading.value = true
        const resp = await http.get('/admin/faqs')
        data_list.value = resp.data
    } catch (err) {
        showError('Failed to load FAQs')
    } finally {
        loading.value = false
    }
}

onMounted(() => {
    fetchData()
})
</script>

<style scoped>
.faq-answer {
    white-space: normal;
    /* allow wrapping */
    overflow: visible;
    /* prevent clipping */
    line-height: 1.5;
    color: rgba(0, 0, 0, 0.7);
    /* subtle subtitle color */
}

.faq-item {
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid #ddd;
}

.faq-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
</style>
