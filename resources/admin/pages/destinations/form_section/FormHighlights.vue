<template>
    <div class="mb-4">
        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center justify-space-between py-4">
                <!-- <h2 class="font-medium">Highlights</h2> -->
                <v-btn color="primary" size="large" rounded title="Add Highlight" @click="openForm()">
                    <v-icon>mdi-plus</v-icon> Add Highlight
                </v-btn>
            </v-card-title>
            <!-- <v-divider></v-divider> -->
            <v-card-text>


                <div class="mt-4">

                    <v-row>
                        <v-col cols="12" md="6" v-for="(highlight, index) in travelPackage?.highlights" :key="index">
                            <div class="border pa-4 rounded">
                                <div class="d-flex">
                                    <div style="width: 40px; height: 40px;">
                                        <v-img :src="highlight.icon_url" contain height="40" width="40"></v-img>
                                    </div>
                                    <div class="pl-4">
                                        <p class="text-primary">{{ highlight.highlight_name }}</p>
                                        <p style="font-size: 0.9rem;">
                                            {{ highlight.description }}
                                        </p>
                                    </div>
                                    <v-spacer></v-spacer>
                                    <div>
                                        <v-btn color="primary" icon size="small" @click="openForm(highlight)"
                                            variant="tonal">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>

                </div>

            </v-card-text>
        </v-card>
        <!-- Modal -->
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import http from '@/http.config'
import { reactive, ref, watch, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['refresh', 'close'])


const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    travelPackage: {
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
const globalModal = ref(null)

const form = reactive({
    title: '',
    is_excluded: false,
    travel_package_id: props.travelPackage.id,
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
            `/admin/travel-packages/${props.travelPackage.id}/inlusions`,
            form
        )
        Object.assign(form, {
            title: '',
        })
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

// const globalModal = ref(null)

import DeleteIncludeItem from '../modal/DeleteIncludeItem.vue'
import PackageHighlightForm from '../modal/PackageHighlightForm.vue'

function deleteItem(item) {
    globalModal.value.open({
        title: 'Delete Item',
        component: DeleteIncludeItem,
        size: 'sm',
        props: {
            item,
        },
    })
}

function openForm(item = {}) {
    globalModal.value.open({
        title: item ? 'Edit ' + item.title : 'Add Highlight',
        component: PackageHighlightForm,
        size: 'lg',
        props: {
            item,
            travelPackage: props.travelPackage,
        },
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>