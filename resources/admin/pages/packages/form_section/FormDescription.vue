<template>
    <div class="mb-4">
        <v-card elevation="0" class="pa-2">
          
            <v-card-text>
                <div class="mb-4">
                    <RichTextEditor v-model="form.description" />
                    <span v-if="descriptionError" class="text-error text-caption">Content is required</span>
                </div>

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
//         const resp = await axios.get(`/admin/package-categories`)
//         package_categories.value = resp.data
//     } catch (error) {
//         console.error('Failed to fetch package categories', error)
//     }
// }
async function fetchDestinations() {
    try {
        const resp = await axios.get(`/admin/destinations`)
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

        const resp = await axios.post('/admin/travel-packages', payload)

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
