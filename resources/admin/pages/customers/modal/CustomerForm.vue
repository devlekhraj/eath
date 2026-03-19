<template>
  <v-card flat>
    <v-card-title>
      <div class="w-100 d-flex justify-between align-center">
        <span class="font-medium">{{ item && item.id ? 'Update Customer Profile' : 'Add New Customer' }}</span>
        <v-spacer></v-spacer>
        <v-btn size="small" icon variant="text" color="error" @click="handleCancel">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text class="pt-8">
      <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
        <v-row>
          <!-- Name -->
          <v-col cols="12" md="6">
            <v-text-field v-model="form.fname" prepend-inner-icon="mdi-account" label="First Name" variant="outlined"
              density="comfortable" :rules="[rules.required]" :error-messages="serverErrors.fname" required />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field v-model="form.lname" prepend-inner-icon="mdi-account" label="First Name" variant="outlined"
              density="comfortable" :rules="[rules.required]" :error-messages="serverErrors.lname" required />
          </v-col>
          <v-col cols="12" md="12">
            <v-text-field v-model="form.username" prepend-inner-icon="mdi-account" label="Username" variant="outlined"
              density="comfortable" :rules="[rules.required, rules.username]" :error-messages="serverErrors.username" required />
          </v-col>

          <!-- Email -->
          <v-col cols="12" md="6">
            <v-text-field v-model="form.email" label="Email" prepend-inner-icon="mdi-email" variant="outlined"
              density="comfortable" :rules="[rules.required, rules.email]" :error-messages="serverErrors.email"
              required />
          </v-col>

          <!-- Phone -->
          <v-col cols="12" md="6">
            <v-text-field v-model="form.mobile_no" prepend-inner-icon="mdi-phone" label="Phone" variant="outlined"
              density="comfortable" :rules="[rules.required, rules.phone]" :error-messages="serverErrors.mobile_no"
              required />
          </v-col>


        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions>
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-spacer></v-spacer>
      <v-btn color="primary" :loading="loading" :disabled="loading" @click="submitForm">Save</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const emit = defineEmits(['close', 'saved'])
const { showSuccess, showError } = useSnackbar()
const formRef = ref(null)
const loading = ref(false)

const form = reactive({
  fname: '',
  lname: '',
  username: '',
  email: '',
  mobile_no: '',
  language_spoken: [], // array for multiple languages
})

const serverErrors = reactive({
  name: '',
  email: '',
  mobile_no: '',
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
  username: (v) =>
    !v || /^[a-zA-Z0-9_]{3,20}$/.test(v) || 'Username must be 3–20 characters and contain only letters, numbers, or underscores',
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
      fname: props.item.fname || '',
      lname: props.item.lname || '',
      username: props.item.username || '',

      email: props.item.email || '',
      mobile_no: props.item.mobile_no || '',
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
    const resp = await http.post('/admin/customers', form)

    showSuccess(resp.message || 'Saved successfully')
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
