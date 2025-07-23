<template>
    <v-card flat>
        <v-card-title>
            <span class="font-medium">Include/Exclude Item Form</span>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="form.title" label="Title" variant="outlined" density="comfortable"
                            placeholder="E.g. Hotel Accommodation" :rules="[rules.required]" required />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea label="Description" variant="outlined" v-model="form.description"
                            :rules="[rules.required]" density="comfortable"></v-textarea>
                        <!-- <RichTextEditor v-model="form.description" /> -->
                        <!-- <span v-if="descriptionError" class="text-error text-caption">Description is required</span> -->
                    </v-col>
                    <v-col cols="6" md="6">
                        <v-text-field v-model="form.sort_order" label="Sequence Number" type="number" variant="outlined"
                            density="comfortable" />
                    </v-col>

                    <v-col cols="6" md="6">
                        <v-switch v-model="form.is_excluded" label="Is Excluded?" inset color="error" :true-value="true"
                            :false-value="false" />
                    </v-col>


                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="justify-space-between">
            <div>
                <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
                <v-btn v-if="props.item?.id" variant="text" color="error" class="ml-4" :loading="loading_delete"
                    :disabled="loading_delete" @click="handleDelete">
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
    sort_order:0,
    travel_package_id: props.travelPackageId,
})

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
        form.is_excluded = props.isExcluded;
        form.travel_package_id = props.travelPackageId;
    }
})

function handleCancel() {
    formRef.value?.reset()
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
    const {valid} = await formRef.value.validate()

    if (!valid) return

    console.log({form});
    // descriptionError.value = !form.description || form.description.trim() === ''
    // if (descriptionError.value) return

    try {
        loading.value = true

        const resp = await axios.post(`/admin/travel-packages/${props.travelPackageId}/inlusions`, form)
        console.log({resp});
        emit('close')
    } catch (err) {
        console.error('Failed to save:', err)
    } finally {
        loading.value = false
    }
}
</script>
