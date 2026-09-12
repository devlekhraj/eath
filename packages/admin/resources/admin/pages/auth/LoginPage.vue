
<template>
    <v-container>

        <v-card class="pa-6 login-card-shadow" rounded style="max-width: 500px;">
            <v-card-title class="d-flex align-center justify-space-between py-0">Login</v-card-title>
            <v-card-text>
                <v-form ref="formRef" @submit.prevent="handleLogin" lazy-validation>
                    <div class="mb-2">
                        <label class="text-caption text-medium-emphasis d-block mb-1">Username</label>
                        <v-text-field v-model="credentials.username" prepend-inner-icon="mdi-account" required :rules="[v => !!v || 'Username is required']"
                            placeholder="john_cena"
                            :error="!!serverErrors.username" :error-messages="serverErrors.username"
                            autocomplete="username" />
                    </div>
                    <div class="mb-2">
                        <label class="text-caption text-medium-emphasis d-block mb-1">Password</label>
                        <v-text-field v-model="credentials.password" type="password" prepend-inner-icon="mdi-lock" required :rules="[v => !!v || 'Password is required']" placeholder="******"
                            :error="!!serverErrors.password" :error-messages="serverErrors.password"
                            autocomplete="current-password" />
                    </div>
                    <v-btn :loading="loading" tile type="submit" color="primary" class="mt-4" block>
                        <v-icon start icon="mdi-login" />
                        Login
                    </v-btn>
                </v-form>
            </v-card-text>
        </v-card>

    </v-container>
</template>


<script setup lang="ts">
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'

import { loginApi } from '@/api/auth.api'

const credentials = reactive({
    username: '',
    password: ''
})
const loading = ref(false)
const router = useRouter()
const formRef = ref<any>(null)

// Server validation errors per field
let serverErrors = reactive({
    username: '',
    password: '',
    general: '',
})


async function handleLogin() {
    // Clear previous errors
    serverErrors.username = ''
    serverErrors.password = ''
    serverErrors.general = ''

    if (!formRef.value) return
    const { valid } = await formRef.value.validate()

    if (!valid) return;

    try {
        loading.value = true
        const resp = await loginApi({
            username: credentials.username,
            password: credentials.password,
        })
        localStorage.setItem('token', resp.access_token)
        router.push({name:'adminDashboardPage'})
    } catch (error: any) {
        if (error.response && error.response.status === 422) {
            const errors = error.response.data.errors
            serverErrors.username = errors.username || ''
            serverErrors.password = errors.password || ''
        } else if (error.response && error.response.status === 401) {
            serverErrors.password = error.response.data.message || 'Invalid credentials'
        } else {
            serverErrors.password = 'An unexpected error occurred'
        }
    } finally {
        loading.value = false
    }

}
</script>

<style scoped>
.login-card-shadow {
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
}
</style>
