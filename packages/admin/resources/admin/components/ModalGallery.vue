<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Gallery Form</span>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <v-col cols="12" md="12">
                        <div class="mb-2">
                            <v-text-field v-model="form.name" label="Category Name" :rules="[rules.required]" required />
                        </div>
                    </v-col>

                    <v-col cols="12" md="12">
                        <div class="mb-2">
                            <v-select v-model="form.parent_id" :items="parentOptions" item-title="name" item-value="id" label="Parent Category" clearable />
                        </div>
                    </v-col>

                    <v-col cols="12" md="12">
                        <div class="mb-2">
                            <v-textarea v-model="form.description" label="Description" />
                        </div>
                    </v-col>

                    <v-col cols="6" md="6">
                        <div class="mb-2">
                            <v-text-field v-model="form.seq_no" label="Sequence Number" type="number" />
                        </div>
                    </v-col>

                    <v-col cols="6" md="6">
                        <div class="text-right">
                            <div class="mb-2">
                                <v-switch v-model="form.is_active" inset label="Active" color="success" />
                            </div>
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-btn color="primary" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import http from '@/http.config'

const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)

const form = reactive({
    name: '',
    parent_id: null,
    description: '',
    is_active: true,
    seq_no: null,
})

const parentOptions = ref([])

const rules = {
    required: v => !!v || 'This field is required',
}

onMounted(() => {
    fetchParentCategories()
})

async function fetchParentCategories() {
    try {
        const resp = await http.get('admin/blog-categories?type=parent')
        parentOptions.value = resp.data || []
    } catch (error) {
        console.error('Failed to load parent categories', error)
    }
}

function handleCancel() {
    formRef.value?.reset()
    emit('close')
}

async function submitForm() {
    const { valid } = await formRef.value.validate()
    if (!valid) return
    handleSubmit()
}

async function handleSubmit() {
    try {
        const resp = await http.post('admin/blog-categories', form)
        emit('saved')
        emit('close')
    } catch (error) {
        console.error('Category creation failed', error)
    }
}
</script>

<style scoped></style>
