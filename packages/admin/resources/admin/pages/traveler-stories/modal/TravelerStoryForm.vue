<template>
    <v-card rounded="0">
        <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
            <span class="text-uppercase font-weight-medium text-slate-800">
                {{ form.id ? 'Edit Traveler Story' : 'Add Traveler Story' }}
            </span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text class="pa-4">
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12" md="8">
                        <v-text-field
                            v-model="form.title"
                            label="Story Title"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.required]"
                            required
                            @input="onTitleInput"
                        />
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field
                            v-model="form.slug"
                            label="URL Slug"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            :rules="[rules.required, rules.slug]"
                            hint="URL slug e.g. conquering-thorong-la"
                            persistent-hint
                            required
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-text-field
                            v-model="form.traveler_name"
                            label="Traveler Name"
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            placeholder="e.g. Sarah Jenkins"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-text-field
                            v-model="form.traveler_country"
                            label="Country of Origin"
                            prepend-inner-icon="mdi-earth"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            placeholder="e.g. United Kingdom"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-text-field
                            v-model="form.traveled_on"
                            label="Date of Travel"
                            type="date"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <v-select
                            v-model="form.journey_id"
                            :items="journeyOptions"
                            item-title="title"
                            item-value="id"
                            label="Related Journey / Trek"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            clearable
                            :loading="loadingOptions"
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <v-select
                            v-model="form.destination_id"
                            :items="destinationOptions"
                            item-title="name"
                            item-value="id"
                            label="Destination / Region"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            clearable
                            :loading="loadingOptions"
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea
                            v-model="form.summary"
                            label="Story Summary"
                            rows="2"
                            auto-grow
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                            hint="A captivating 1-2 sentence excerpt shown in cards and quotes"
                            persistent-hint
                        />
                    </v-col>

                    <v-col cols="12">
                        <label class="text-caption mb-1 d-block font-weight-medium">Full Story & Testimonial</label>
                        <SummarnoteEditor v-model="form.body" minHeight="240" />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_active"
                            inset
                            label="Active"
                            color="success"
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_published"
                            inset
                            label="Published"
                            color="primary"
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="4">
                        <v-switch
                            v-model="form.is_featured"
                            inset
                            label="Featured Story"
                            color="accent"
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <v-text-field
                            v-model="form.meta_title"
                            label="Meta Title (SEO)"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                        />
                    </v-col>

                    <v-col cols="12" sm="6">
                        <v-text-field
                            v-model="form.meta_description"
                            label="Meta Description (SEO)"
                            variant="outlined"
                            density="comfortable"
                            rounded="0"
                        />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
        <v-divider />

        <v-card-actions class="pa-3 justify-end">
            <v-btn variant="text" rounded="0" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" rounded="0" :loading="loading" @click="submitForm">Save Story</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import SummarnoteEditor from '@components/SummarnoteEditor.vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)
const loadingOptions = ref(false)
const slugEdited = ref(false)

const journeyOptions = ref([])
const destinationOptions = ref([])

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

const form = reactive({
    id: null,
    title: '',
    slug: '',
    traveler_name: '',
    traveler_country: '',
    traveled_on: '',
    journey_id: null,
    destination_id: null,
    summary: '',
    body: '',
    is_active: true,
    is_published: false,
    is_featured: false,
    meta_title: '',
    meta_description: '',
})

const rules = {
    required: v => !!v || 'This field is required',
    slug: v =>
        !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) ||
        'Slug must contain only lowercase letters, numbers, and hyphens',
}

onMounted(async () => {
    await fetchOptions()

    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            title: props.item.title || '',
            slug: props.item.slug || '',
            traveler_name: props.item.traveler_name || '',
            traveler_country: props.item.traveler_country || '',
            traveled_on: props.item.traveled_on || '',
            journey_id: props.item.journey_id || null,
            destination_id: props.item.destination_id || null,
            summary: props.item.summary || '',
            body: props.item.body || '',
            is_active: props.item.is_active ?? true,
            is_published: props.item.is_published ?? false,
            is_featured: props.item.is_featured ?? false,
            meta_title: props.item.meta_title || '',
            meta_description: props.item.meta_description || '',
        })
        slugEdited.value = true
    }
})

async function fetchOptions() {
    try {
        loadingOptions.value = true
        const [journeysResp, destinationsResp] = await Promise.all([
            http.get('/admin/journeys'),
            http.get('/admin/destinations'),
        ])
        journeyOptions.value = journeysResp.data || []
        destinationOptions.value = destinationsResp.data || []
    } catch (err) {
        console.error('Failed to load select options:', err)
    } finally {
        loadingOptions.value = false
    }
}

function onTitleInput() {
    if (!slugEdited.value && form.title) {
        form.slug = form.title
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
    }
}

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return

    loading.value = true
    try {
        const resp = form.id
            ? await http.patch(`/admin/traveler-stories/${form.id}`, form)
            : await http.post('/admin/traveler-stories', form)
        loading.value = false
        showSuccess(resp.message || 'Traveler story saved successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        loading.value = false
        showError(error?.response?.data?.message || 'Failed to save traveler story')
        console.error(error)
    }
}
</script>
