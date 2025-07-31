<template>
  <v-card flat>
    <v-card-title>
      <div class="w-100 d-flex justify-between align-center">
        <span class="font-medium">{{ item && item.id ? 'Update Guide Profile' : 'Add New Guide' }}</span>
        <v-spacer></v-spacer>
        <v-btn size="small" icon variant="text" color="error" @click="handleCancel">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </div>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
        <v-row>
          <!-- Name -->
          <v-col cols="12" md="12">
            <v-text-field v-model="form.name" prepend-inner-icon="mdi-account" label="Full Name" variant="outlined"
              density="comfortable" :rules="[rules.required]" :error-messages="serverErrors.name" required />
          </v-col>

          <!-- Email -->
          <v-col cols="12" md="6">
            <v-text-field v-model="form.email" label="Email" prepend-inner-icon="mdi-email" variant="outlined"
              density="comfortable" :rules="[rules.required, rules.email]" :error-messages="serverErrors.email"
              required />
          </v-col>

          <!-- Phone -->
          <v-col cols="12" md="6">
            <v-text-field v-model="form.phone_no" prepend-inner-icon="mdi-phone" label="Phone" variant="outlined"
              density="comfortable" :rules="[rules.required, rules.phone]" :error-messages="serverErrors.phone_no"
              required />
          </v-col>

          <!-- Language Spoken -->
          <v-col cols="12" md="12">
            <v-select v-model="form.language_spoken" :items="languageOptions" label="Language Spoken"
              prepend-inner-icon="mdi-translate" multiple variant="outlined" density="comfortable"
              :rules="[rules.required]" :error-messages="serverErrors.language_spoken" required chips />
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
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

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
    const resp = await axios.post('/admin/guides', form)

    showSuccess(resp.data.message || 'Guide saved successfully')
    emit('saved', resp.data.data)
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
