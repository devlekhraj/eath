<template>
    <v-card flat>
        <v-card-title>
            <span class="font-medium">Category Form</span>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
                <v-row>
                    <v-col cols="12" md="12">
                        <v-text-field v-model="form.name" label="Category Name" variant="outlined" density="comfortable"
                            :rules="[rules.required]" required />
                    </v-col>

                    <v-col cols="12" md="12">
                        <v-select v-model="form.parent_id" :items="parentOptions" item-title="name" item-value="id"
                            label="Parent Category" variant="outlined" density="comfortable" clearable />
                    </v-col>

                    <v-col cols="12" md="12">
                        <v-textarea v-model="form.description" label="Description" variant="outlined"
                            density="comfortable" />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-text-field v-model="form.seq_no" label="Sequence Number" type="number" variant="outlined"
                            density="comfortable" />
                    </v-col>

                    <v-col cols="6" md="6">
                        <div class="text-right">
                            <v-switch v-model="form.is_active" inset label="Active" color="success" />
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
import axios from 'axios'

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
        const resp = await axios.get('admin/blog-categories?type=parent')
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
        const resp = await axios.post('admin/blog-categories', form)
        emit('saved')
        emit('close')
    } catch (error) {
        console.error('Category creation failed', error)
    }
}
</script>

<style scoped></style>
