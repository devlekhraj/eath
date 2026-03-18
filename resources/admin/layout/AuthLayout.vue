<template>
    <v-container class="pa-0 auth-container" fluid>
        <div class="auth-content">
            <div class="auth-card-wrap">
                <router-view></router-view>
            </div>
        </div>
    </v-container>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const loading = ref(false)
const router = useRouter()

const handleLogin = async () => {
    loading.value = true

    const resp = await axios.post('/admin/login', {
        email: email.value,
        password: password.value
    });

    console.log({resp});
    // setTimeout(() => {
    //     loading.value = false
    //     console.log('Logged in with:', email.value, password.value)
    //     router.push({ name: 'adminDashboardPage' })
    // }, 1000)
}

const goToForgotPassword = () => {
    router.push({ name: 'forgotPasswordPage' })
}

const goToRegister = () => {
    router.push({ name: 'registerPage' })
}
</script>

<style scoped>
.auth-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 45%, #e0f2fe 100%);
}

.auth-content {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
}

.auth-card-wrap {
    width: 100%;
    max-width: 500px;
}

.banner-col {
    background-color: #f5f5f5;
    min-height: 100vh;
    text-align: center;
}

.v-card {
    background-color: white;
}

@media (max-width: 960px) {
    .banner-col {
        min-height: auto;
        padding: 2rem 1rem;
    }
}
</style>
