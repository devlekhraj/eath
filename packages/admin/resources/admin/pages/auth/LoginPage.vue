<template>
  <div class="auth-page-container">
    <!-- Brand / Header -->
    <div class="text-center mb-6">
      <v-avatar size="56" color="primary" class="mb-3">
        <v-img src="/images/logo.png" alt="Eathways" cover />
      </v-avatar>
      <h1 class="text-h6 font-weight-bold text-slate-800 mb-1">
        Eathways Admin
      </h1>
      <p class="text-body-2 text-medium-emphasis">
        Sign in to access your management console
      </p>
    </div>

    <!-- Login Card -->
    <v-card class="pa-6">
      <v-card-title class="d-flex align-center justify-space-between pa-0 mb-4 text-primary">
        <div class="d-flex align-center ga-2">
          <v-avatar size="24" color="primary">
            <v-icon size="14">mdi-shield-lock-outline</v-icon>
          </v-avatar>
          <span class="text-uppercase font-weight-medium text-slate-800" style="font-size: 0.82rem; letter-spacing: 0.03em;">
            Admin Authentication
          </span>
        </div>
      </v-card-title>

      <v-divider class="mb-5" />

      <v-card-text class="pa-0">
        <!-- Error Alert -->
        <v-alert
          v-if="serverErrors.general"
          type="error"
          variant="tonal"
          class="mb-4"
          closable
          @click:close="serverErrors.general = ''"
        >
          {{ serverErrors.general }}
        </v-alert>

        <v-form ref="formRef" @submit.prevent="handleLogin">
          <div class="mb-4">
            <v-text-field
              v-model="credentials.username"
              label="Username"
              prepend-inner-icon="mdi-account-outline"
              required
              :rules="[v => !!v || 'Username is required']"
              placeholder="Enter your username"
              :error="!!serverErrors.username"
              :error-messages="serverErrors.username"
              autocomplete="username"
              @input="clearFieldErrors('username')"
            />
          </div>

          <div class="mb-3">
            <v-text-field
              v-model="credentials.password"
              :type="showPassword ? 'text' : 'password'"
              label="Password"
              prepend-inner-icon="mdi-lock-outline"
              :append-inner-icon="showPassword ? 'mdi-eye-off-outline' : 'mdi-eye-outline'"
              required
              :rules="[v => !!v || 'Password is required']"
              placeholder="Enter your password"
              :error="!!serverErrors.password"
              :error-messages="serverErrors.password"
              autocomplete="current-password"
              @click:append-inner="showPassword = !showPassword"
              @input="clearFieldErrors('password')"
            />
          </div>

          <div class="d-flex align-center justify-space-between mb-4">
            <v-checkbox
              v-model="rememberMe"
              label="Remember me"
            />
            <router-link
              :to="{ name: 'adminResetPasswordPage' }"
              class="text-caption text-primary text-decoration-underline"
            >
              Forgot password?
            </router-link>
          </div>

          <v-btn
            :loading="loading"
            type="submit"
            color="primary"
            size="large"
            block
          >
            <v-icon start icon="mdi-login" />
            Sign In
          </v-btn>
        </v-form>
      </v-card-text>
    </v-card>

    <!-- Footer note -->
    <div class="text-center mt-6 text-caption text-medium-emphasis">
      &copy; 2026 E.A.T.H. Travels (P) Ltd. All rights reserved.
    </div>
  </div>
</template>

<script setup lang="ts">
import { reactive, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

import { loginApi } from '@/http/auth.http'

const credentials = reactive({
  username: '',
  password: '',
})

const rememberMe = ref(false)
const showPassword = ref(false)
const loading = ref(false)
const router = useRouter()
const route = useRoute()
const formRef = ref<any>(null)

// Server validation errors per field
const serverErrors = reactive({
  username: '',
  password: '',
  general: '',
})

function clearFieldErrors(field: 'username' | 'password') {
  serverErrors[field] = ''
  serverErrors.general = ''
}

async function handleLogin() {
  // Clear previous errors
  serverErrors.username = ''
  serverErrors.password = ''
  serverErrors.general = ''

  if (!formRef.value) return
  const { valid } = await formRef.value.validate()

  if (!valid) return

  try {
    loading.value = true
    const resp = await loginApi({
      username: credentials.username,
      password: credentials.password,
    })
    localStorage.setItem('token', resp.access_token)
    const redirect = (route.query.redirect as string) || { name: 'adminDashboardPage' }
    router.push(redirect)
  } catch (error: any) {
    if (error.response && error.response.status === 422) {
      const errors = error.response.data?.errors || {}
      serverErrors.username = errors.username
        ? Array.isArray(errors.username)
          ? errors.username[0]
          : errors.username
        : ''
      serverErrors.password = errors.password
        ? Array.isArray(errors.password)
          ? errors.password[0]
          : errors.password
        : ''
      if (!serverErrors.username && !serverErrors.password) {
        serverErrors.general =
          error.response.data?.message || 'Validation failed. Please check your credentials.'
      }
    } else if (error.response && error.response.status === 401) {
      serverErrors.general = error.response.data?.message || 'Invalid username or password.'
    } else {
      serverErrors.general =
        error.response?.data?.message || 'An unexpected error occurred. Please try again.'
    }
  } finally {
    loading.value = false
  }
}
</script>
