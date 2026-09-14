<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
            <div class="w-100 d-flex justify-between align-center">
        <span>{{ item && item.id ? 'Update Guide Profile' : 'Add New Guide' }}</span>
      </div>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
        <v-row>
          <!-- Name -->
          <v-col cols="12" md="12">
            <div class="mb-2">
                <v-text-field v-model="form.name" prepend-inner-icon="mdi-account" label="Full Name" :rules="[rules.required]" :error-messages="serverErrors.name" required />
            </div>
          </v-col>

          <!-- Email -->
          <v-col cols="12" md="12">
            <div class="mb-2">
                <v-text-field v-model="form.email" label="Email" prepend-inner-icon="mdi-email" :rules="[rules.required, rules.email]" :error-messages="serverErrors.email" required />
            </div>
          </v-col>

          <!-- Phone -->
          <v-col cols="12" md="12">
            <div class="mb-2">
                <AppPhoneInput v-model="form.phone_no" label="Phone" :rules="[rules.required]" :error-messages="serverErrors.phone_no" required />
            </div>
          </v-col>

          <!-- Language Spoken -->
          <v-col cols="12" md="12">
            <div class="mb-2">
                <v-select v-model="form.language_spoken" :items="languageOptions" label="Language Spoken" prepend-inner-icon="mdi-translate" multiple :rules="[rules.required]" :error-messages="serverErrors.language_spoken" required chips />
            </div>
          </v-col>
          <v-col cols="12" md="12">
            <div class="mb-2">
                <v-select v-model="form.status" :items="status_list" item-title="label" item-value="id" class="text-capitalize" label="Status" prepend-inner-icon="mdi-translate" :rules="[rules.required]" :error-messages="serverErrors.status" required />
            </div>

          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-spacer></v-spacer>
      <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import AppPhoneInput from '@/components/AppPhoneInput.vue'
import { useSnackbar } from '@/composables/snackbar'
import { createGuideApi } from '@/http/guides.http'

const emit = defineEmits(['close', 'saved'])
const { showSuccess, showError } = useSnackbar()
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
  name: '',
  email: '',
  phone_no: '',
  language_spoken: [], // array for multiple languages
})

const serverErrors = reactive({
  name: '',
  email: '',
  phone_no: '',
  language_spoken: '',
})

const status_list = [
  { id: 'active', label: 'Active' },
  { id: 'inactive', label: 'Inactive' },
  { id: 'deleted', label: 'Deleted' },
  { id: 'pending', label: 'Pending' },
  { id: 'suspended', label: 'Suspended' },
]


const rules = {
  required: (v) => !!v || 'This field is required',
  email: (v) =>
    !v || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Email must be valid',
  phone: (v) =>
    !v || /^\d{10}$/.test(v) || 'Phone number must be exactly 10 digits',
}


const props = defineProps({
  item: {
    type: Object,
    default: () => ({}),
  },
  languageOptions: {
    type: Array,
    default: () => ['English', 'Nepali', 'Hindi', 'Chinese', 'German', 'French'],
  },
})

onMounted(() => {
  if (props.item?.id) {
    Object.assign(form, {
      id: props.item.id || '',
      name: props.item.name || '',
      email: props.item.email || '',
      phone_no: props.item.phone_no || '',
      status: props.item.status || '',
      language_spoken: props.item.language_spoken || [],
    })
  }
})

function handleCancel() {
  formRef.value?.reset()
  emit('close')
}

async function submitForm() {
  Object.keys(serverErrors).forEach((key) => (serverErrors[key] = null))
  const { valid } = await formRef.value.validate()
  if (!valid) return

  await handleSubmit()
}

async function handleSubmit() {
  try {
    loading.value = true
    // Replace with your actual API endpoint and method
    const resp = await createGuideApi(form)

    showSuccess(resp.data.message || 'Guide saved successfully')
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(serverErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to save guide')
    }
  } finally {
    loading.value = false
  }
}
</script>

<style scoped></style>
