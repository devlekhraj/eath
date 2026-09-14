<template>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
            <div class="w-100 d-flex justify-between align-center">
        <span>Upload Form</span>
      </div>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleCancel">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />

    <v-card-text>
      <v-form ref="formRef" @submit.prevent="handleSubmit" lazy-validation>
        <v-row>
          <v-col cols="12">
            <div class="mb-2">
                <v-file-input label="Select Image" accept="image/*" prepend-icon="" :disabled="uploading" :error-messages="serverErrors.image_url" @change="handleUploadImage" prepend-inner-icon="mdi-upload" :loading="uploading" required />
            </div>

            
            <!-- Image Preview -->
            <div v-if="form.image_url && !uploading" style="height: 200px;" class="mt-2">
                <img :src="form.image_url" alt="Uploaded Image Preview" style="width: 100%" />
            </div>
            
            <p class="mt-2" v-if="!uploading">{{ banner.aspect_ratio }} Aspect Ratio Image Needed</p>
            <!-- Uploading Indicator -->
            <div v-if="uploading" class="text-center my-3">
              <v-progress-circular indeterminate color="primary" />
              <p class="text-caption mt-2">Uploading image...</p>
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
        <div class="text-center w-100">
            <v-btn variant="text" :disabled="uploading" @click="handleCancel">Cancel</v-btn>
        </div>
    </v-card-actions>
  </v-card>
</template>

<script setup>
import http from '@/http.config'
import { ref, reactive, onMounted } from 'vue'
import { useSnackbar } from '@/composables/snackbar'

const emit = defineEmits(['close', 'saved'])
const props = defineProps({
  item: Object,
  banner: Object
})

const { showSuccess, showError } = useSnackbar()
const formRef = ref(null)
const loading = ref(false)
const uploading = ref(false)

const form = reactive({
  title: '',
  description: '',
  link_url: '',
  image_url: '',
})

const serverErrors = reactive({
  name: '',
  image_url: '',
})

onMounted(() => {
  if (props.item?.id) {
    Object.assign(form, {
      id: props.item.id,
      title: props.item.title || '',
      description: props.item.description || '',
      link_url: props.item.link_url || '',
      image_url: props.item.image_url || '',
    })
  }
})

function handleCancel() {
  formRef.value?.reset()
  emit('close')
}

async function handleSubmit() {
  try {
    loading.value = true
    const resp = await http.post('admin/lookups', form)
    showSuccess(resp.message || 'Itinerary lookup saved successfully')
    emit('saved', resp.data)
    emit('close')
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(serverErrors, error.response.data.errors || {})
    } else {
      showError(error?.response?.data?.message || 'Failed to save itinerary lookup')
    }
  } finally {
    loading.value = false
  }
}

async function handleUploadImage(event) {
  const file = event?.target?.files?.[0] || event?.[0]
  if (!file) return

  uploading.value = true

  // if (!isValidAspectRatio) {
  //   form.image_url = ''
  //   serverErrors.image_url = message
  //   uploading.value = false
  //   return
  // }

  const formData = new FormData()
  formData.append('image', file)
  formData.append('usage_type', 'banners')
  formData.append('usage_id', props.banner.id)

  try {
    const uploadResp = await http.post('/admin/gallery-upload', formData, {
      headers: { 'Content-Type': 'multipart/form-data' },
    })

    form.image_url = uploadResp.data?.url || ''
    serverErrors.image_url = ''
    emit('close')
  } catch (error) {
    showError('Image upload failed')
    form.image_url = ''
    serverErrors.image_url = 'Failed to upload image'
  } finally {
    uploading.value = false
  }
}

function validateAspectRatio(file, targetRatio = 2.4) {
  return new Promise((resolve) => {
    const img = new Image()
    img.onload = () => {
      const actualRatio = img.width / img.height
      const isCloseEnough = Math.abs(actualRatio - targetRatio) < 0.01
      resolve(isCloseEnough)
    }
    img.onerror = () => resolve(false)
    img.src = URL.createObjectURL(file)
  })
}
</script>

<style scoped></style>
