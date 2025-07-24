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
                        <v-text-field v-model="form.sort_order" label="Sequence Number" type="number" variant="outlined"
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
            <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])
const formRef = ref(null)
let loading = ref(false);

const form = reactive({
    name: '',
    parent_id: null,
    description: '',
    is_active: false,
    sort_order: 0,
})

const parentOptions = ref([])

const rules = {
    required: v => !!v || 'This field is required',
}

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
});





onMounted(() => {
    fetchParentCategories();

    if (props.item?.id) {
        console.log("Edit mode");
        Object.assign(form, {
            id: props.item.id,
            name: props.item.name || '',
            parent_id: props.item.parent_id || null,
            description: props.item.description || '',
            is_active: props.item.is_active ?? true,
            sort_order: props.item.sort_order || 0,
        });
    } else {
        console.log("Add mode");
    }
})

async function fetchParentCategories() {
    try {
        const resp = await axios.get('admin/package-categories?type=parent')
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

        form.sort_order = parseInt(form.sort_order) || 0

        loading.value = true; // ✅ correct way
        const resp = await axios.post('admin/package-categories', form);
        showSuccess(resp.message || "Category created successfully");
        emit('close')
    } catch (error) {
        showError(error?.response?.data?.message || 'Failed to update status');
        console.error('Category creation failed', error)
    } finally {
        loading.value = false; // ✅ always stop loading, even if error
    }
}

</script>

<style scoped></style>
