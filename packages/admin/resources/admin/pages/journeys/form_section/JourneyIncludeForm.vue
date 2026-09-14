<template>
    <div class="mb-4">
        <v-card>
            <v-card-text>
                <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation class="border pa-4">
                    <div>

                        <div class="w-100">
                            <div class="mb-2">
                                <v-text-field label="Item name" v-model="form.title" :rules="[rules.required]"></v-text-field>
                            </div>
                            <div class="mb-2">
                                <v-switch label="Is Excluded?" v-model="form.is_excluded" inset color="error"></v-switch>
                            </div>
                        </div>
                        <div class="text-center">
                            <v-btn color="primary" :loading="loading" :disabled="loading" @click="handleSubmit()">
                                <v-icon>mdi-check</v-icon> &nbsp; Save
                            </v-btn>
                        </div>
                    </div>
                </v-form>
                <div class="mb-4">
                    <div v-if="journey?.inclusions?.length" class="mt-4">
                        <div>
                            <p>Included Items</p>
                        </div>
                        <v-list density="compact">
                            <v-list-item v-for="(item, index) in journey?.inclusions" :key="'inc-' + item.id"
                                class="px-0">

                                <div class="border d-flex align-center justify-space-between pa-2">
                                    <div class="d-flex align-start pl-2">
                                        <v-icon color="success" size="20" class="mr-3"
                                            :class="item.description ? 'mt-1' : ''">
                                            mdi-check-outline
                                        </v-icon>
                                        <div>
                                            <div>{{ item.title }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <v-btn icon variant="tonal" color="primary" @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn icon variant="tonal" color="error" class="ml-3" @click="deleteItem(item)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </v-list-item>
                        </v-list>
                    </div>
                </div>

                <div>
                    <div v-if="journey?.exclusions?.length">
                        <div>
                            <p>Excluded Items</p>
                        </div>
                        <v-list density="compact">
                            <v-list-item v-for="(item, index) in journey?.exclusions" :key="'inc-' + item.id"
                                class="px-0">

                                <div class="border d-flex align-center justify-space-between pa-2">
                                    <div class="d-flex align-start pl-2">
                                        <v-icon color="success" size="20" class="mr-3"
                                            :class="item.description ? 'mt-1' : ''">
                                            mdi-check-outline
                                        </v-icon>
                                        <div>
                                            <div>{{ item.title }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <v-btn icon variant="tonal" color="primary" @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn icon variant="tonal" color="error" class="ml-3" @click="deleteItem(item)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </v-list-item>
                        </v-list>
                    </div>
                </div>
            </v-card-text>
        </v-card>
        <!-- Modal -->
    </div>
</template>
<script setup>
import http from '@/http.config'
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { useGlobalModal } from '@/composables/globalModal'
const emit = defineEmits(['refresh', 'close'])


const { open: openModal } = useGlobalModal()

const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    journey: {
        type: Object,
        default: () => ({}),
    },
})

const rules = {
    required: (v) => !!v || 'This field is required',
}

const formRef = ref(null)
const loading = ref(false);
const serverErrors = reactive({})

const form = reactive({
    title: '',
    is_excluded: false,
    journey_id: props.journey.id,
})

async function handleSubmit() {
    const { valid, errors } = await formRef.value.validate()
    if (!valid) {
        const allMessages = errors.flatMap(e => e.errorMessages).filter(Boolean)
        if (allMessages.length) {
            showError(allMessages.join('\n'))
        } else {
            showError('Validation failed. Please check the form.')
        }
        return
    }

    // Clear previous errors
    Object.keys(serverErrors).forEach((key) => delete serverErrors[key])

    try {
        loading.value = true
        const resp = await http.post(
            `/admin/journeys/${props.journey.id}/services`,
            form
        )
        Object.assign(form, {
            title: '',
        })
        showSuccess(resp.message || 'Service saved successfully')
        emit('refresh')
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


import DeleteIncludeItem from '@/modal-form/journeys/DeleteIncludeItem.vue'
import IncludeExcludeForm from '@/modal-form/journeys/IncludeExcludeForm.vue'

function deleteItem(item) {
    openModal({
        title: 'Delete Item',
        component: DeleteIncludeItem,
        size: 'sm',
        props: {
            item,
        },
        onClose: handleClose,
    })
}
function editItem(item) {
    openModal({
        title: 'Edit ' + item.title,
        component: IncludeExcludeForm,
        size: 'md',
        props: {
            item,
            journeyId: props.journey.id,
        },
        onClose: handleClose,
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>
