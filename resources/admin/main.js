import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'

// Quill editor styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'

// Axios global config
import './axios.config.js'

// Auth store
import { useAuthStore } from '@/stores/auth'

// Vuetify setup
const vuetify = createVuetify({
  components,
  directives,
  theme: {
    defaultTheme: 'light',
    themes: {
      light: {
        typography: {
          fontFamily: 'Poppins, sans-serif',
        },
      },
    },
  },
})

import ModalTemplate from '@components/ModalTemplate.vue' // adjust the path as needed
// import NepaliDatePicker from 'vue3-nepali-date-picker';
// import 'vue3-nepali-date-picker/dist/style.css';
// Create app
const app = createApp(App)
// Register ModalTemplate globally
app.component('ModalTemplate', ModalTemplate)
// app.component('v-ndate', NepaliDatePicker)

// Create and register pinia
const pinia = createPinia()
app.use(pinia)

// Load auth store and fetch profile if token exists
const auth = useAuthStore()
if (auth.token) {
  // Set token to axios header
  import('axios').then(({ default: axios }) => {
    axios.defaults.headers.common['Authorization'] = `Bearer ${auth.token}`
    auth.fetchProfile()
  })
}

app.use(router).use(vuetify).mount('#app')
