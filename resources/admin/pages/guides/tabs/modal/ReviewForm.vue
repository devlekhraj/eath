<template>
    <v-card flat>
        <v-card-title>
            <span class="font-medium">{{ title }}</span>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <!-- Rating -->
                <v-row class="mb-4" align="center">
                    <v-col cols="12" md="4">
                        <label class="text-sm font-medium mb-2 d-block">Rating</label>
                        <v-rating v-model="form.rating" color="amber" background-color="grey lighten-2" length="5"
                            size="32" :rules="[rules.required]" />
                        <div v-if="serverErrors.rating" class="text-red text-sm mt-1">{{ serverErrors.rating[0] }}</div>
                    </v-col>
                </v-row>

                <!-- Review Comment -->
                <div class="mb-4">
                    <label class="text-sm font-medium">Review</label>
                        <v-textarea label="Review" v-model="form.comment" :rules="[rules.required]" :error-messages="serverErrors.comment" variant="outlined"></v-textarea>


                </div>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" :disabled="loading || !form.rating || !form.comment"
                @click="submitForm">
                Submit Review
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
    rating: 0,
    comment: '',
})

const serverErrors = reactive({})

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    title: {
        type: String,
        default: 'Submit Guide Review',
    },
})

const rules = {
    required: v => !!v || 'This field is required',
}

onMounted(() => {
    if (props.item?.comment) {
        Object.assign(form, {
            rating: props.item.rating || 0,
            comment: props.item.comment || '',
        })
    }
})

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    if (!form.rating || !form.comment) return
    handleSubmit()
}

async function handleSubmit() {
    try {

        loading.value = true
        // Adjust endpoint as needed
        const resp = await http.post(`admin/guides/${props.item.id}/review`, form)
        showSuccess(resp.message || 'Review submitted successfully')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            Object.assign(serverErrors, error.response.data.errors || {})
        } else {
            showError(error?.response?.data?.message || 'Failed to submit review')
        }
        console.error('Review submission failed', error)
    } finally {
        loading.value = false
    }
}
</script>
