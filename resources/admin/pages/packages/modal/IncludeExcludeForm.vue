<template>
    <v-card flat>
        <v-card-title class="py-0">
            <div class="d-flex align-center">
                <span class="font-medium">Include/Exclude Item Form</span>
                <v-spacer></v-spacer>
                <v-btn variant="text" icon @click="handleCancel"><v-icon>mdi-close</v-icon></v-btn>
            </div>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field
                            v-model="form.title"
                            label="Title"
                            variant="outlined"
                            density="comfortable"
                            placeholder="E.g. Hotel Accommodation"
                            :rules="[rules.required]"
                            :error="!!serverErrors.title"
                            :error-messages="serverErrors.title"
                            required
                        />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea
                            label="Description"
                            variant="outlined"
                            v-model="form.description"
                            density="comfortable"
                            :error="!!serverErrors.description"
                            :error-messages="serverErrors.description"
                        />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-text-field
                            v-model="form.sort_order"
                            label="Sequence Number"
                            type="number"
                            variant="outlined"
                            density="comfortable"
                            :error="!!serverErrors.sort_order"
                            :error-messages="serverErrors.sort_order"
                        />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-switch
                            v-model="form.is_excluded"
                            label="Is Excluded?"
                            inset
                            color="error"
                            :true-value="true"
                            :false-value="false"
                        />
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn
                    v-if="props.item?.id"
                    variant="text"
                    color="error"
                    class="ml-4"
                    :loading="loading_delete"
                    :disabled="loading_delete"
                    @click="handleDelete"
                >
                    Delete
                </v-btn>
            </div>
            <div>
                <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">
                    Save
                </v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'

const emit = defineEmits(['close', 'saved'])
const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
    travelPackageId: {
        type: Number,
        required: true,
    },
    isExcluded: {
        type: Boolean,
        required: true,
    },
})

const formRef = ref(null)
const loading = ref(false)
const loading_delete = ref(false)

const rules = {
    required: (v) => !!v || 'This field is required',
}

const form = reactive({
    title: '',
    description: '',
    is_excluded: false,
    sort_order: 0,
    travel_package_id: props.travelPackageId,
})

const serverErrors = reactive({})

onMounted(() => {
    if (props.item?.id) {
        Object.assign(form, {
            id: props.item.id,
            title: props.item.title || '',
            sort_order: props.item.sort_order || 0,
            description: props.item.description || '',
            is_excluded: props.item.is_excluded || false,
        })
    } else {
        form.is_excluded = props.isExcluded
        form.travel_package_id = props.travelPackageId
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
        await axios.delete(`/admin/package-inclusions/${form.id}/delete`)
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
        const resp = await axios.post(
            `/admin/travel-packages/${props.travelPackageId}/inlusions`,
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
