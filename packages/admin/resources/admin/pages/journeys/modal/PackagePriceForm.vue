<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <div class="d-flex align-center">
                <span>Form Price</span>
            </div>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="form.name" label="Name" placeholder="Standard traveler price" :rules="[rules.required]" :error="!!serverErrors.name" :error-messages="serverErrors.name" required />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-text-field v-model="form.price" type="number" label="Price" :error="!!serverErrors.price" :error-messages="serverErrors.price" />
                    </v-col>
                    <v-col cols="6" md="6">
                        <v-text-field v-model="form.sort_order" label="Sequence Number" type="number" :error="!!serverErrors.sort_order" :error-messages="serverErrors.sort_order" />
                    </v-col>
                    <v-col cols="6" md="6">
                        <v-switch inset color="primary" v-model="form.is_primary" label="Primary Price" density="comfortable"></v-switch>
                    </v-col>
                    <v-col cols="6" md="6">
                        <v-switch inset color="primary" v-model="form.is_active" label="Active" density="comfortable"></v-switch>
                    </v-col>
                    
                    <v-col cols="12">
                        <v-textarea label="Price Description" v-model="form.description" :error="!!serverErrors.description" :error-messages="serverErrors.description" />
                    </v-col>


                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" color="error" class="ml-4" :loading="loading_delete" :disabled="loading_delete" @click="handleDelete">
                    Delete
                </v-btn>
            </div>
            <div>
                <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">
                    Update
                </v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'

const emit = defineEmits(['close', 'saved'])
const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    journeyId: {
        type: Number,
        default: null,
    },
})

const formRef = ref(null)
const loading = ref(false)
const loading_delete = ref(false)

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    name: '',
    price: '',
    is_primary:false,
    is_active:true,
    description:'',
    sort_order: 0,
    journey_id: props.journeyId,
})

const serverErrors = reactive({})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || props.item.title || '',
            price: props.item.price || '',
            is_primary: props.item.is_primary || props.item.is_default || false,
            is_active: props.item.is_active ?? true,
            description: props.item.description || '',
            sort_order: props.item.sort_order || 0,
            journey_id: props.item.journey_id || props.journeyId || 0,
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    Object.keys(serverErrors).forEach((key) => delete serverErrors[key])
    emit('close')
}

async function handleDelete() {
    try {
        loading_delete.value = true
        await http.delete(`/admin/journey-prices/${form.id}/delete`)
        emit('close')
    } catch (err) {
        console.error('Failed to delete:', err)
    } finally {
        loading_delete.value = false
    }
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return

    // Clear previous errors
    Object.keys(serverErrors).forEach((key) => delete serverErrors[key])

    try {
        loading.value = true
        const resp = await http.post(
            `/admin/journeys/${props.journeyId || props.item.journey_id}/prices`,
            form
        )
        emit('close')
    } catch (err) {
        if (err.response?.status === 422) {
            const errors = err.response.data.errors
            for (const key in errors) {
                serverErrors[key] = errors[key]
            }
        } else {
            console.error('Failed to save:', err)
        }
    } finally {
        loading.value = false
    }
}
</script>
