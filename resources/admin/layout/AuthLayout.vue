<template>
    <v-container class="pa-0" fluid fill-height>
        <v-row no-gutters align="center" justify="center">
            <!-- Left Side - Banner or Logo -->
            <v-col cols="12" md="6" class="d-flex align-center justify-center banner-col">
                <div class="text-center px-6">
                    <v-img src="/logo.svg" alt="Logo" contain max-height="150" class="mb-6"></v-img>
                    <h2 class="mb-2 font-weight-bold">Welcome to Admin Panel</h2>
                    <p class="text--secondary">
                        Manage your store efficiently with powerful tools.
                    </p>
                </div>
            </v-col>

            <!-- Right Side - Login Form -->
            <v-col cols="12" md="6" class="d-flex align-center justify-center">
                <router-view></router-view>
            </v-col>
        </v-row>
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
