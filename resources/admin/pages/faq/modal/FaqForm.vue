<template>
    <v-card flat>
        <v-card-title>
            <div class="d-flex align-center justify-space-between">
                <div>
                    <span class="font-medium">{{item.id ? "Update":"Add New"}} Question</span>
                </div>
                <div>
                      <v-btn variant="text" icon @click="handleCancel" color="error"><v-icon>mdi-close</v-icon></v-btn>
                </div>
            </div>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="form.question" label="Question" density="comfortable" variant="outlined"
                            :rules="[rules.required]" />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea v-model="form.answer" label="Answer" density="comfortable" variant="outlined"
                            :rules="[rules.required]"
                          />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field type="number" label="Sequence No#" variant="outlined" density="comfortable" v-model="form.sort_order"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-switch color="primary" inset label="Active" v-model="form.is_active"></v-switch>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false);

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)

const form = reactive({
    question: '',
    answer: '',
})

const slugEdited = ref(false)

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            question: props.item.question || '',
            answer: props.item.answer || '',
            sort_order: props.item.sort_order || 0,
            is_active: props.item.is_active || false,
        })
    }
})





const rules = {
    required: v => !!v || 'This field is required',
}

function handleCancel() {
    formRef.value?.reset()
    slugEdited.value = false
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return
    await handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true;
        const resp = await http.post('/admin/faqs', form)
        loading.value = false;
        showSuccess(resp.data?.message || 'Blog created successfully')
        emit('close')
    } catch (error) {
        loading.value = false;
        showError(error?.response?.data?.message || 'An error occurred')
        console.error('Blog creation failed', error)
    }
}
</script>

<style scoped></style>
