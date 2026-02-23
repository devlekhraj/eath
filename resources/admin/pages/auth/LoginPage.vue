<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { loginApi } from '@/api/auth.api'

const credentials = reactive({
    username: '',
    password: ''
})
const auth = useAuthStore()
const router = useRouter()
const formRef = ref(null)
const isFormValid = ref(false)

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

    const { valid } = await formRef.value.validate()

    if (!valid) return;

    try {
        auth.loading = true
        const resp = await loginApi({
            username: credentials.username,
            password: credentials.password,
        })
        auth.token = resp.access_token
        localStorage.setItem('token', auth.token)
        await auth.fetchProfile()
        router.push({name:'adminDashboardPage'})
    } catch (error) {
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
        auth.loading = false
    }

}
</script>

<template>
    <v-container>
        <v-row>
            <v-col cols="12" md="6" offset-md="3">
                <v-card elevation="0">
                    <v-card-title class="text-h5">Login</v-card-title>
                    <v-card-text>
                        <v-form ref="formRef" @submit.prevent="handleLogin" lazy-validation>
                            <div class="mb-4">
                                <v-text-field v-model="credentials.username" label="Username"
                                    prepend-inner-icon="mdi-account" required :rules="[v => !!v || 'Username is required']"
                                    :error="!!serverErrors.username" :error-messages="serverErrors.username"
                                    autocomplete="username" />
                            </div>
                            <div class="mb-4">
                                <v-text-field v-model="credentials.password" label="Password" type="password"
                                    prepend-inner-icon="mdi-lock" required :rules="[v => !!v || 'Password is required']"
                                    :error="!!serverErrors.password" :error-messages="serverErrors.password"
                                    autocomplete="current-password" />
                            </div>
                            <v-btn :loading="auth.loading" size="large" tile type="submit" color="primary" class="mt-4" block>
                                <v-icon start icon="mdi-login" />
                                Login
                            </v-btn>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
