<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <div class="d-flex align-center">
                <span>{{ item?.id ? 'Edit' : 'Create' }} Featured Package</span>
            </div>
            <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

        <v-card-text>
            <!-- Skeleton Loader -->
            <template v-if="fetching_data">
                <v-row>
                    <v-col cols="12" v-for="n in 6" :key="n">
                        <v-skeleton-loader type="text"></v-skeleton-loader>
                    </v-col>
                    <v-col cols="12" md="6" v-for="n in 2" :key="'date-' + n">
                        <v-skeleton-loader type="text"></v-skeleton-loader>
                    </v-col>
                    <v-col cols="12" md="12">
                        <v-skeleton-loader type="image"></v-skeleton-loader>
                    </v-col>
                </v-row>
            </template>
            <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation v-else>
                <v-row>
                    <!-- Package Name -->
                    <v-col cols="12">
                        <v-text-field v-model="form.title" label="Title" :rules="[rules.required]" :error-messages="serverErrors.title" prepend-inner-icon="mdi-package-variant" />
                    </v-col>

                    <!-- Slug -->
                    <v-col cols="12">
                        <v-text-field v-model="form.slug" label="Slug URL" :rules="[rules.required, rules.slug]" :error-messages="serverErrors.slug" hint="URL-friendly string with lowercase letters, numbers, and hyphens" persistent-hint prepend-inner-icon="mdi-link-variant" />
                    </v-col>
                    <!-- Slug -->
                    <v-col cols="12">
                        <v-select v-model="form.package_id" :items="package_list" item-title="name" item-value="id" label="Select Package" :rules="[rules.required]" :error-messages="serverErrors.package_id" prepend-inner-icon="mdi-package-variant" />
                    </v-col>

                    <!-- Highlight -->
                    <v-col cols="12">
                        <v-textarea v-model="form.highlight" label="Highlight" auto-grow :rules="[rules.required]" :error-messages="serverErrors.highlight" prepend-inner-icon="mdi-text" />
                    </v-col>
                    <!-- Description -->
                    <v-col cols="12">
                        <v-textarea v-model="form.description" label="Description" auto-grow :rules="[rules.required]" :error-messages="serverErrors.description" prepend-inner-icon="mdi-text" />
                    </v-col>

                    <!-- Start Date -->
                    <v-col cols="12" md="6">
                        <v-date-input prepend-icon="" v-model="form.start_date" label="Start Date" :rules="[rules.required, rules.startDate]" :error-messages="serverErrors.start_date" prepend-inner-icon="mdi-calendar-star" :min="today" :max="form.end_date || undefined" />
                    </v-col>

                    <!-- End Date -->
                    <v-col cols="12" md="6">
                        <v-date-input prepend-icon="" v-model="form.end_date" label="End Date" :rules="[rules.required, rules.endDate(form.start_date)]" :error-messages="serverErrors.end_date" prepend-inner-icon="mdi-calendar" :min="form.start_date || undefined" />
                    </v-col>

                    <!-- Group Size -->
                    <v-col cols="12" md="6">
                        <v-text-field v-model="form.group_size" label="Group Size" type="number" :rules="[rules.required, rules.positiveNumber]" :error-messages="serverErrors.group_size" prepend-inner-icon="mdi-account-group" />
                    </v-col>

                    <!-- Price -->
                    <v-col cols="12" md="6">
                        <v-text-field v-model="form.price" label="Price" type="number" :rules="[rules.required, rules.positiveNumber]" :error-messages="serverErrors.price" prepend-inner-icon="mdi-currency-usd" />
                    </v-col>
                    <!-- Price -->
                    <v-col cols="12" md="12">
                        <v-text-field v-model="form.duration" label="Duration" placeholder="eg. 3 Days, 2 Nights" :rules="[rules.required]" :error-messages="serverErrors.duration" prepend-inner-icon="mdi-clock" />
                    </v-col>
                    <v-col cols="12" md="12">
                        <div>
                            <v-file-input v-if="item?.id" v-model="selected_image" accept="image/*" prepend-icon="" label="Featured Image" prepend-inner-icon="mdi-image" @change="onImageChange" class="mb-4 truncate-file-name" />

                            <v-img v-if="item?.banner_url || form?.banner_url" :src="form.banner_url" height="200"
                                contain class="rounded mb-4" />
                        </div>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>

        <v-card-actions class="" v-if="!fetching_data">
            <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" :loading="loading" @click="submitForm">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { ref, reactive, watch, onMounted } from 'vue'
import http from '@/http.config'
import { useSnackbar } from '@/composables/snackbar'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)
const fetching_data = ref(false)
const formRef = ref(null)
const package_list = ref([])
const selected_image = ref(null)

const emit = defineEmits(['close', 'saved'])
const today = new Date().toISOString().substr(0, 10) // "YYYY-MM-DD"
const form = reactive({
    title: '',
    slug: '',
    highlight: '',
    description: '',
    start_date: '',
    end_date: '',
    group_size: '',
    price: '',
    duration: '',
    sort_order: 0,
    banner_url: '',
})

const serverErrors = reactive({
    title: null,
    slug: null,
    highlight: null,
    description: null,
    start_date: null,
    end_date: null,
    group_size: null,
    price: null,
    duration: null
})

const props = defineProps({
    item: {
        type: Object,
        default: () => ({}),
    },
})

onMounted(() => {
    fetchPackages()


})
function fetchPackages() {

    fetching_data.value = true;
    http.get('/admin/travel-packages')
        .then(response => {
            package_list.value = response.data;

            if (props.item?.id) {
                Object.assign(form, {
                    id: props.item.id,
                    title: props.item.title || '',
                    slug: props.item.slug || '',
                    highlight: props.item.highlight || '',
                    description: props.item.description || '',
                    package_id: props.item.package_id || null,
                    start_date: props.item.start_date || '',
                    end_date: props.item.end_date || '',
                    group_size: props.item.group_size || '',
                    price: props.item.price || '',
                    duration: props.item.duration || '',
                    sort_order: props.item.sort_order || 0,
                    banner_url: props.item.banner_url ?? true,
                    is_active: props.item.is_active ?? true,
                })
            }
            fetching_data.value = false;
        })
        .catch(error => {
            fetching_data.value = false;
            console.error('Error fetching packages:', error);
        });
}


async function onImageChange() {
    const selected = Array.isArray(selected_image.value)
        ? selected_image.value[0]
        : selected_image.value

    if (selected instanceof File) {
        const formData = new FormData()
        if (form.id) {
            formData.append('usage_id', form.id)
            formData.append('usage_type', 'featured_packages')
        }
        formData.append('image', selected)

        try {
            const { data } = await http.post('/admin/gallery-upload', formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
            })

            showSuccess('Image uploaded')
            form.banner = data.filename
            form.banner_url = data.url
        } catch (error) {
            showError('Image upload failed')
            console.error('Image upload failed', error)
        }
    }
}



const slugEdited = ref(false)
const { showSuccess, showError } = useSnackbar()

// Auto-generate slug from name
// function slugify(text) {
//     return text
//         .toLowerCase()
//         .trim()
//         .replace(/[\s_]+/g, '-')
//         .replace(/[^\w\-]+/g, '')
//         .replace(/\-\-+/g, '-')
//         .replace(/^-+|-+$/g, '')
// }

// watch(() => form.title, (newTitle) => {
//     if (!slugEdited.value) {
//         form.slug = slugify(newTitle)
//     }
// })

function onSlugInput() {
    slugEdited.value = true
}

// Validation rules
const rules = {
    required: v => !!v || 'This field is required',
    slug: v => !v || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(v) || 'Slug must contain only lowercase letters, numbers, and hyphens',
    positiveNumber: v => v > 0 || 'Value must be greater than zero',
    startDate: v => !!v || 'Start date is required',
    endDate: start => v => !v || new Date(v) >= new Date(start) || 'End date cannot be before start date'
}

// Reset form
function handleCancel() {
    formRef.value?.reset()
    slugEdited.value = false
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))
    emit('close')
}

// Submit form
async function submitForm() {
    Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))
    const { valid } = await formRef.value.validate()
    if (!valid) return
    await handleSubmit()
}

async function handleSubmit() {
    try {
        loading.value = true
        const payload = {
            ...form,
            start_date: formatToYMD(form.start_date),
            end_date: formatToYMD(form.end_date),

        };

        console.log({payload});

        const resp = await http.post('/admin/featured-packages', payload)
        showSuccess(resp.data?.message || 'Package created successfully')
        emit('close')
    } catch (error) {
        if (error.response?.status === 422) {
            const errors = error.response.data?.errors || {}
            Object.keys(errors).forEach(key => {
                serverErrors[key] = errors[key]
            })
        } else {
            showError(error?.response?.data?.message || 'An error occurred')
        }
        console.error('Package creation failed', error)
    } finally {
        loading.value = false
    }
}
function formatToYMD(date) {
    if (!date) return null;

    const d = new Date(date);
    if (isNaN(d.getTime())) return null; // invalid date

    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0'); // months are 0-based
    const day = String(d.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}
</script>
