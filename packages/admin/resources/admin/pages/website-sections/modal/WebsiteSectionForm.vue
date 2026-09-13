<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>
        {{ props.item?.id ? 'Edit Website Section' : 'Add Website Section' }}
      </span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon size="18">mdi-close</v-icon>
      </v-btn>
    </v-card-title>
        <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit">
        <v-row dense>
          <v-col cols="12" sm="6">
            <div class="mb-2">
                <v-text-field
                  v-model="form.page_key"
                  label="Page Key *"
                  placeholder="e.g. home, about, contact"
                  :rules="[rules.required]"
                  :error-messages="serverErrors.page_key"
                  required
                />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
                <v-text-field
                  v-model="form.section_key"
                  label="Section Key *"
                  placeholder="e.g. hero, values, featured"
                  :rules="[rules.required]"
                  :error-messages="serverErrors.section_key"
                  required
                />
            </div>
          </v-col>

          <v-col cols="12" sm="8">
            <div class="mb-2">
                <v-text-field
                  v-model="form.heading"
                  label="Heading"
                  placeholder="Section main heading"
                  :error-messages="serverErrors.heading"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="4">
            <div class="mb-2">
                <v-text-field
                  v-model="form.eyebrow"
                  label="Eyebrow / Subtitle"
                  placeholder="Small kicker label"
                  :error-messages="serverErrors.eyebrow"
                />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
                <v-textarea
                  v-model="form.body"
                  label="Body / Content"
                  rows="4"
                  placeholder="Section narrative or description"
                  :error-messages="serverErrors.body"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="6">
            <div class="mb-2">
                <v-text-field
                  v-model.number="form.sort_order"
                  label="Sort Order"
                  type="number"
                  min="0"
                  :error-messages="serverErrors.sort_order"
                />
            </div>
          </v-col>

          <v-col cols="12" sm="6" class="d-flex align-center">
            <div class="mb-2">
                <v-switch
                  v-model="form.is_active"
                  label="Active Status"
                  hide-details
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
        :disabled="loading"
        @click="handleSubmit"
      >
        Save Section
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'
import { createWebsiteSectionApi, updateWebsiteSectionApi } from '@/api/website-sections.api'

const { showSuccess, showError } = useSnackbar()
const emit = defineEmits(['close', 'saved'])

const props = defineProps({
  item: {
    type: Object,
    default: () => ({}),
  },
})

const formRef = ref(null)
const loading = ref(false)
const serverErrors = reactive({})

const form = reactive({
  id: null,
  page_key: '',
  section_key: '',
  heading: '',
  eyebrow: '',
  body: '',
  sort_order: 0,
  is_active: true,
})

const rules = {
  required: v => !!v || 'This field is required',
}

onMounted(() => {
  if (props.item?.id) {
    form.id = props.item.id
    form.page_key = props.item.page_key || ''
    form.section_key = props.item.section_key || ''
    form.heading = props.item.heading || ''
    form.eyebrow = props.item.eyebrow || ''
    form.body = props.item.body || ''
    form.sort_order = props.item.sort_order ?? 0
    form.is_active = props.item.is_active ?? true
  }
})

function handleCancel() {
  emit('close')
}

async function handleSubmit() {
  Object.keys(serverErrors).forEach(key => (serverErrors[key] = null))

  const { valid } = await formRef.value.validate()
  if (!valid) return

  loading.value = true
  try {
    const payload = {
      page_key: form.page_key,
      section_key: form.section_key,
      heading: form.heading,
      eyebrow: form.eyebrow,
      body: form.body,
      sort_order: Number(form.sort_order) || 0,
      is_active: Boolean(form.is_active),
    }

    if (form.id) {
      await updateWebsiteSectionApi(form.id, payload)
      showSuccess('Website section updated successfully')
    } else {
      await createWebsiteSectionApi(payload)
      showSuccess('Website section created successfully')
    }

    emit('saved')
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(serverErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to save website section')
    }
  } finally {
    loading.value = false
  }
}
</script>
