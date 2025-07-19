import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'

// Vuetify
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify-pro-tiptap/style.css'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fontsource/poppins/400.css'
import '@fontsource/poppins/500.css'
import '@fontsource/poppins/600.css'
import '@fontsource/poppins/700.css'

import 'vuetify/styles'
// Axios global config
import './axios.config.js'

// Auth store
import { useAuthStore } from '@/stores/auth'

// Global components
import ModalTemplate from '@components/ModalTemplate.vue'
import RichTextEditor from '@components/RichTextEditor.vue'
import { VuetifyViewer } from 'vuetify-pro-tiptap' // ✅ import

// Vuetify setup
const vuetify = createVuetify({
  components,
  directives,
  theme: {
    defaultTheme: 'light',
    themes: {
      light: {
        colors: {
          // your colors here (optional)
        },
      },
    },
  },
  // Remove `typography` and `defaults.global.style` sections completely
})

const app = createApp(App)
const pinia = createPinia()

// Register global components
app.component('RichTextEditor', RichTextEditor)
app.component('ModalTemplate', ModalTemplate)
app.component('VuetifyViewer', VuetifyViewer) // ✅ register

app.use(pinia)

const auth = useAuthStore()
if (auth.token) {
  import('axios').then(({ default: axios }) => {
    axios.defaults.headers.common['Authorization'] = `Bearer ${auth.token}`
    auth.fetchProfile()
  })
}

app.use(router).use(vuetify).mount('#app')
