<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'

// Form refs and states
const formRef = ref(null)
const submitting = ref(false)

// Fields
const packageName = ref('')
const description = ref('')
const additionalInfo = ref('')
const durationDays = ref(null)
const durationNights = ref(null)
const price = ref(null)
const startDate = ref('')
const endDate = ref('')
const isActive = ref(false)
const isFeatured = ref(false)
const termsConditions = ref('')
const cancellationPolicy = ref('')

// Validation rules
const rules = {
  required: (value: any) => !!value || 'This field is required',
  numeric: (value: any) => !value || !isNaN(value) || 'Must be a number',
  positive: (value: any) => !value || Number(value) >= 0 || 'Must be positive',
}

async function submitPackage() {
  if (!formRef.value) return
  const valid = await formRef.value.validate()
  if (!valid) {
    console.log('Form validation failed')
    return
  }

  submitting.value = true
  try {
    const payload = {
      name: packageName.value,
      description: description.value,
      additional_info: additionalInfo.value,
      duration_days: durationDays.value,
      duration_nights: durationNights.value,
      price: price.value,
      start_date: startDate.value,
      end_date: endDate.value,
      is_active: isActive.value,
      is_featured: isFeatured.value,
      terms_conditions: termsConditions.value,
      cancellation_policy: cancellationPolicy.value,
    }

    await axios.post('/admin/travel-packages', payload)
    console.log('Package created successfully!')

    // Reset form
    packageName.value = ''
    description.value = ''
    additionalInfo.value = ''
    durationDays.value = null
    durationNights.value = null
    price.value = null
    startDate.value = ''
    endDate.value = ''
    isActive.value = false
    isFeatured.value = false
    termsConditions.value = ''
    cancellationPolicy.value = ''
    formRef.value.resetValidation()
  } catch (error) {
    console.error('Failed to create package', error)
  } finally {
    submitting.value = false
  }
}
</script>
<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="8">
        <v-card elevation="0" class="pa-6">
          <v-form ref="formRef" lazy-validation>
            <v-text-field
              v-model="packageName"
              label="Package Name"
              :rules="[rules.required]"
              :disabled="submitting"
              required
            />

            <RichTextEditor
              v-model="description"
              label="Description"
              :disabled="submitting"
              class="mt-4"
            />

            <v-textarea
              v-model="additionalInfo"
              label="Additional Info"
              rows="3"
              auto-grow
              class="mt-4"
            />

            <v-row class="mt-2">
              <v-col cols="6">
                <v-text-field
                  v-model="durationDays"
                  label="Duration (Days)"
                  type="number"
                  :rules="[rules.numeric, rules.positive]"
                  :disabled="submitting"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="durationNights"
                  label="Duration (Nights)"
                  type="number"
                  :rules="[rules.numeric, rules.positive]"
                  :disabled="submitting"
                />
              </v-col>
            </v-row>

            <v-text-field
              v-model="price"
              label="Price (NPR)"
              type="number"
              :rules="[rules.numeric, rules.positive]"
              :disabled="submitting"
              class="mt-2"
            />

            <v-row class="mt-2">
              <v-col cols="6">
                <v-text-field
                  v-model="startDate"
                  label="Start Date"
                  type="date"
                  :disabled="submitting"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="endDate"
                  label="End Date"
                  type="date"
                  :disabled="submitting"
                />
              </v-col>
            </v-row>

            <v-switch
              v-model="isActive"
              label="Active"
              color="success"
              class="mt-2"
              :disabled="submitting"
            />

            <v-switch
              v-model="isFeatured"
              label="Featured"
              color="primary"
              class="mt-2"
              :disabled="submitting"
            />

            <v-textarea
              v-model="termsConditions"
              label="Terms & Conditions"
              rows="3"
              class="mt-4"
              auto-grow
            />

            <v-textarea
              v-model="cancellationPolicy"
              label="Cancellation Policy"
              rows="3"
              class="mt-2"
              auto-grow
            />

            <div class="mt-6 text-center">
              <v-btn
                size="large"
                color="primary"
                rounded
                :loading="submitting"
                :disabled="submitting"
                @click="submitPackage"
              >
                <v-icon left>mdi-plus</v-icon> Create Package
              </v-btn>
            </div>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
