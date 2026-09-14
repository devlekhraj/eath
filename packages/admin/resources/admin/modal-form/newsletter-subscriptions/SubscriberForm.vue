<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Add Newsletter Subscriber</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit">
        <v-row dense>
          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.email"
                label="Email Address *"
                placeholder="subscriber@example.com"
                type="email"
                :rules="[rules.required, rules.email]"
                :error-messages="errors.email"
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.name"
                label="Subscriber Name"
                placeholder="e.g. John Doe"
                :error-messages="errors.name"
              />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-btn
        color="primary"
        variant="flat"
        :loading="loading"
        @click="handleSubmit"
      >
        Save Subscriber
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { createNewsletterSubscriptionApi } from '@/api/newsletter-subscriptions.api'
import { useSnackbar } from '@/composables/snackbar'

const { showSuccess, showError } = useSnackbar()

const emit = defineEmits(['close', 'saved'])

const formRef = ref(null)
const loading = ref(false)

const form = reactive({
  email: '',
  name: '',
})

const errors = reactive({
  email: null,
  name: null,
})

const rules = {
  required: (v) => !!v || 'Email is required',
  email: (v) => !v || /.+@.+\..+/.test(v) || 'Must be a valid email address',
}

function handleCancel() {
  emit('close')
}

async function handleSubmit() {
  errors.email = null
  errors.name = null

  const { valid } = (await formRef.value?.validate()) || { valid: true }
  if (!valid) return

  loading.value = true
  try {
    await createNewsletterSubscriptionApi({
      email: form.email,
      name: form.name || null,
    })
    showSuccess('Subscriber added successfully')
    emit('saved')
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(errors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to add subscriber')
    }
  } finally {
    loading.value = false
  }
}
</script>
