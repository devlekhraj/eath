<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Itinerary Form</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12" md="8">
                        <v-text-field v-model="form.title" label="Title" placeholder="Day 1" :rules="[rules.required]" required />
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field v-model="form.sort_order" label="Sequence Number" type="number" />
                    </v-col>

                    <v-col cols="12" md="12">
                        <SummarnoteEditor v-model="form.description" />
                        <span v-if="descriptionError" class="text-error text-caption">Content is required</span>
                    </v-col>
          

                </v-row>
            </v-form>
        </v-card-text>

        <v-divider />
        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" class="ml-4" color="error" :loading="loading_delete" :disabled="loading_delete" @click="handleDelete">Delete</v-btn>
            </div>
            <div>
                <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import SummarnoteEditor from '@components/SummarnoteEditor.vue';

import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useTravelPackageStore } from '@/stores/travel_package' // adjust path as needed
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const travelPackageStore = useTravelPackageStore()


const emit = defineEmits(['close', 'saved'])
const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    travelPackageId: {
        type: Number,
        required: true,
    }
})

const formRef = ref(null)
const loading = ref(false)
const loading_delete = ref(false)
const descriptionError = ref(false)

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    title: '',
    description: '',
    is_active: true,
    sort_order: null,
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            title: props.item.title || '',
            travel_package_id: props.item.travel_package_id || null,
            description: props.item.description || '',
            sort_order: props.item.sort_order || null,
            is_active: props.item.is_active ?? true,
        })
    }
    Object.assign(form, {
        travel_package_id: props.travelPackageId
    })
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}
async function handleDelete(item) {
    try {
        loading_delete.value = true

        // Submit logic here, for example:
        const resp = await http.delete(`/admin/package-itineraries/${props.item.id}/delete`)
        showSuccess("Itinerary Deleted Successfully");
        console.log(resp.data);
        emit('close')

    } catch (err) {
        showSuccess("Failed to Delete");
        console.error('Failed to save:', err)
    } finally {
        loading_delete.value = false
    }
}

async function submitForm() {

    // if (!formRef.value) return

    const valid = await formRef.value.validate()
    if (!valid) return

    descriptionError.value = !form.description || form.description.trim() === ''
    if (descriptionError.value) return

    try {
        loading.value = true

        // Submit logic here, for example:
        const resp = await http.post(`/admin/travel-packages/${props.travelPackageId}/itinerary`, form)
        console.log(resp.data);
        showSuccess("Success");
        emit('close')

    } catch (err) {
        console.error('Failed to save:', err)
        showError("Failed");
    } finally {
        loading.value = false
    }
}
</script>
