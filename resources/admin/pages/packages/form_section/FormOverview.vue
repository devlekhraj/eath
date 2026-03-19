<template>
    <div class="mb-4">
        <v-card elevation="0" class="pa-2">
            <v-card-text class="pt-10">
                <v-row>
                    <v-col cols="12">
                        <v-textarea v-model="form.name" label="Package Name" :rules="[rules.required]"
                        rows="2" auto-grow
                            :error-messages="errors.name" density="comfortable" variant="outlined"
                            :disabled="submitting" required />
                    </v-col>

                     <v-col cols="12">
                        <v-text-field v-model="form.slug" label="URL" :rules="[rules.required]"
                            :error-messages="errors.slug" density="comfortable" variant="outlined"
                            :disabled="submitting" required />
                    </v-col>

                    <v-col cols="12" md="6" lg="8">
                        <v-select v-model="form.destination_id" variant="outlined" :items="destination_list"
                            item-title="name" item-value="id" label="Select Destination" clearable />
                    </v-col>

                     <v-col cols="6" md="3" lg="2">
                        <v-switch v-model="form.is_active" label="Active" color="success" inset
                            :disabled="submitting" />
                    </v-col>

                      <v-col cols="6" md="3"  lg="2">
                        <v-switch v-model="form.is_featured" label="Featured" color="success" inset
                            :disabled="submitting" />
                    </v-col>
                </v-row>

                <div class="mt-6 text-center">
                    <v-btn size="large" color="primary" rounded :loading="submitting" :disabled="submitting"
                        @click="submitPackage">
                        <v-icon left>mdi-check</v-icon>
                        {{ packageId ? 'Update Package' : 'Create Package' }}
                    </v-btn>
                </div>
            </v-card-text>
        </v-card>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    travelPackage: {
        type: Object,
        default: () => ({}),
    },
})

const emit = defineEmits(['submit'])

const submitting = ref(false)
const descriptionError = ref(false)
const package_categories = ref([])
const destination_list = ref([])
const errors = ref({})

const form = reactive({
    id: null,
    name: '',
    slug: '',
    description: '',
    duration_days: '',
    duration_nights: '',
    price: '',
    altitude: '',
    start_date: '',
    end_date: '',
    is_active: false,
    is_featured: false,
    destination_id: null,
    published_at: null,
})

const rules = {
    required: (v) => !!v || 'This field is required',
    numeric: (v) => !v || !isNaN(v) || 'Must be a number',
    positive: (v) => !v || Number(v) >= 0 || 'Must be positive',
}

const packageId = ref(null)

watch(
    () => props.travelPackage,
    (newVal) => {
        if (newVal && Object.keys(newVal).length) {
            Object.assign(form, {
                ...newVal,
                description: newVal.description ?? '', // fix null warning
            })
            packageId.value = newVal.id
        }
    },
    { immediate: true }
)

onMounted(() => {
    // fetchPackageCategories()
    fetchDestinations();
})

// async function fetchPackageCategories() {
//     try {
//         const resp = await http.get(`/admin/package-categories`)
//         package_categories.value = resp.data
//     } catch (error) {
//         console.error('Failed to fetch package categories', error)
//     }
// }
async function fetchDestinations() {
    try {
        const resp = await http.get(`/admin/destinations`)
        destination_list.value = resp.data
    } catch (error) {
        console.error('Failed to fetch destinations', error)
    }
}

async function submitPackage() {
    descriptionError.value = !form.description || form.description.trim() === ''
    if (descriptionError.value) return

    submitting.value = true
    errors.value = {}

    try {
        const payload = {
            ...form,
            start_date: form.start_date
                ? new Date(form.start_date).toISOString().split('T')[0]
                : '',
            end_date: form.end_date
                ? new Date(form.end_date).toISOString().split('T')[0]
                : '',
        }

        const resp = await http.post('/admin/travel-packages', payload)

        showSuccess(resp.message || 'Package saved successfully')

        // emit('submit', payload) // Uncomment if needed
    } catch (error) {
        showError(error?.response?.data?.message || 'An error occurred')
        errors.value = error?.response?.data?.errors || {}
    } finally {
        submitting.value = false
    }
}
</script>
