<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>{{item.id ? 'Edit Trip' : 'Add Trip'}}</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <v-col cols="12" md="12">
                        <!-- Travel Package -->
                        <div class="mb-2">
                            <v-select v-model="form.travel_package_id" :items="travelPackages" item-title="name" item-value="id" label="Travel Package" :rules="[rules.required]" :error-messages="serverErrors.travel_package_id" clearable required />
                        </div>
                    </v-col>

                    <v-col cols="12" md="6">
                        <!-- Start Date -->
                        <v-date-input prepend-inner-icon="mdi-calendar" prepend-icon="" v-model="form.start_date" label="Start Date" :rules="[rules.required]" :error-messages="serverErrors.start_date" :max="form.end_date || null" required />
                    </v-col>

                    <v-col cols="12" md="6">
                        <!-- End Date -->
                        <v-date-input prepend-inner-icon="mdi-calendar" prepend-icon="" v-model="form.end_date" label="End Date" :rules="[rules.required, rules.endDateAfterStartDate]" :error-messages="serverErrors.end_date" :min="form.start_date || null" required />
                    </v-col>


                    <v-col cols="12" md="12">
                        <!-- Group Size -->
                        <div class="mb-2">
                            <v-text-field v-model="form.group_size" label="Group Size" type="number" :rules="[rules.required, rules.positiveNumber]" :error-messages="serverErrors.group_size" required min="1" />
                        </div>
                    </v-col>

                    <v-col cols="12" md="12">
                        <!-- Notes / Comment -->
                        <div class="mb-2">
                            <v-textarea v-model="form.notes" label="Notes / Comment" :error-messages="serverErrors.notes" rows="3" />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" :disabled="loading || !form.travel_package_id || !form.start_date || !form.end_date || !form.group_size " @click="submitForm">
                {{item.id ? 'Update' : 'Add'}}
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { saveGuideTripApi, getTravelPackagesListApi } from '@/api/guides.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    travel_package_id: null,
    start_date: '',
    end_date: '',
    notes: '',
    group_size: '',
})

const serverErrors = reactive({})

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    guide: {
        type: Object,
        default: () => ({}),
    },
    title: {
        type: String,
        default: 'Add Guide Trip',
    },
})

const travelPackages = ref([])

const rules = {
    required: (v) => !!v || 'This field is required',
    positiveNumber: (v) => (v && Number(v) > 0) || 'Must be a positive number',
    endDateAfterStartDate: (v) => {
        if (!v || !form.start_date) return true
        return new Date(v) >= new Date(form.start_date) || 'End Date must be after or equal to Start Date'
    },
}

onMounted(async () => {
    await fetchData()
    if (props.item.id) {
        Object.assign(form, props.item)
    }
})
async function fetchData(){
    try {
        const resp = await getTravelPackagesListApi() // Adjust your API endpoint here
        travelPackages.value = resp.data || []
    } catch (error) {
        showError('Failed to load travel packages')
        console.error(error)
    }
}
function handleCancel() {
    formRef.value?.reset()
    Object.assign(form, {
        travel_package_id: null,
        start_date: '',
        end_date: '',
        notes: '',
        group_size: '',
    })
    emit('close')
}

async function submitForm() {
    const valid = await formRef.value.validate()
    if (!valid) return
    handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true
        const resp = await saveGuideTripApi(props.guide.id, form)
        showSuccess(resp.message || 'Trip added successfully')
        emit('saved')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to add trip')
        }
        console.error('Add trip failed', error)
    } finally {
        loading.value = false
    }
}
</script>
