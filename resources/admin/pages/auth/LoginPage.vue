
<template>
    <v-container>

        <v-card elevation="0" class="pa-6 login-card-shadow" rounded style="max-width: 500px;">
            <v-card-title class="text-h5">Login</v-card-title>
            <v-card-text>
                <v-form ref="formRef" @submit.prevent="handleLogin" lazy-validation>
                    <div class="mb-4">
                        <label class="text-caption text-medium-emphasis d-block mb-2">Username</label>
                        <v-text-field v-model="credentials.username" prepend-inner-icon="mdi-account" required
                            :rules="[v => !!v || 'Username is required']" variant="outlined" density="comfortable"
                            placeholder="john_cena" hide-details="auto"
                            :error="!!serverErrors.username" :error-messages="serverErrors.username"
                            autocomplete="username" />
                    </div>
                    <div class="mb-4">
                        <label class="text-caption text-medium-emphasis d-block mb-2">Password</label>
                        <v-text-field v-model="credentials.password" type="password" variant="outlined"
                            density="comfortable" prepend-inner-icon="mdi-lock" required
                            :rules="[v => !!v || 'Password is required']" placeholder="******"
                            hide-details="auto"
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

    </v-container>
</template>


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

<style scoped>
.login-card-shadow {
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
}
</style>
