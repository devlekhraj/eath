<template>
    <div class="mb-4">
        <v-card elevation="0">
            <!-- <v-card-title class="d-flex align-center justify-space-between py-4">
                <h2 class="font-medium">Pricing Form</h2>

            </v-card-title>
            <v-divider></v-divider> -->
            <v-card-text>
                <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation class="mb-6">
                    <div>

                        <div>
                            <v-row>
                                <v-col cols="7">
                                    <div>
                                        <v-text-field variant="outlined" label="Item name" v-model="form.title"
                                            prepend-inner-icon="mdi-invoice-list" hide-details density="comfortable"
                                            :rules="[rules.required]"></v-text-field>
                                    </div>

                                </v-col>
                                <v-col cols="5">
                                    <div class="d-flex align-center">
                                        <div class="w-100">
                                            <v-text-field label="Price" variant="outlined" v-model="form.price"
                                                prepend-inner-icon="mdi-currency-usd" type="number" hide-details
                                                density="comfortable" :rules="[rules.required]"></v-text-field>
                                        </div>
                                        <v-spacer></v-spacer>
                                        <div class="text-right ml-4">
                                            <v-btn color="primary" rounded size="large" :loading="loading"
                                                :disabled="loading" @click="handleSubmit()">
                                                <v-icon>mdi-check</v-icon> &nbsp; Save
                                            </v-btn>
                                        </div>
                                    </div>

                                </v-col>
                            </v-row>

                        </div>

                    </div>
                </v-form>
                <div class="mb-4">
                    <div v-if="travelPackage?.prices?.length" class="mt-4">
                        <!-- <div>
                            <p class="font-weight-bold">Price List</p>
                        </div> -->

                        <v-table density="compact" class="mt-2">
                            <thead>
                                <tr>
                                    <th class="text-left text-primary">Price Title</th>
                                    <th class="text-left text-primary">Price</th>
                                    <th class="text-left text-primary">Is Economy ?</th>
                                    <th class="text-left text-primary">Description</th>
                                    <th class="text-left text-primary">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in travelPackage.prices" :key="index">
                                    <td class="py-2">
                                        <p class="text-capitalize font-weight-medium">{{ item.title }}</p>
                                    </td>
                                    <td class="py-2">
                                        <p class="text-capitalize font-weight-medium">{{ formatAmount(item.price) }}</p>
                                    </td>
                                    <td class="py-2">
                                        <v-chip size="small" :color="item.is_economy?'primary':'error'">{{ item.is_economy ? 'Yes':'No' }}</v-chip>
                                    </td>
                                    <td class="py-2">
                                        <p class="text-capitalize">{{ item.description ||'n/a' }}</p>
                                    </td>
                                    <td class="py-2">
                                        <v-btn icon size="x-small" variant="tonal" color="primary"
                                            @click="editItem(item, false)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <v-btn icon size="x-small" variant="tonal" color="error" class="ml-2"
                                            @click="deleteItem(item)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                    </td>
                                </tr>
                            </tbody>
                        </v-table>
                    </div>

                </div>


            </v-card-text>
        </v-card>
        <!-- Modal -->
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import { formatAmount } from '@utils/format'
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
    price: '',
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
        const resp = await axios.post(
            `/admin/travel-packages/${props.travelPackage.id}/prices`,
            form
        )
        Object.assign(form, {
            title: '',
            price: '',
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

import PackagePriceDelete from '../modal/PackagePriceDelete.vue'
import PackagePriceForm from '../modal/PackagePriceForm.vue'

function deleteItem(item) {
    console.log({ item });
    globalModal.value.open({
        title: 'Delete Item',
        component: PackagePriceDelete,
        size: 'sm',
        props: {
            item,
        },
    })
}
function editItem(item) {
    globalModal.value.open({
        title: 'Edit ' + item.title,
        component: PackagePriceForm,
        size: 'md',
        props: {
            item,
        },
    })
}

function handleClose() {
    emit('close')
    emit('refresh')
}

</script>