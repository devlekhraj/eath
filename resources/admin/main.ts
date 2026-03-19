import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'

// Vuetify
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'

import '@fortawesome/fontawesome-free/css/all.css'
import '@fontsource/poppins/400.css'
import '@fontsource/poppins/500.css'
import '@fontsource/poppins/600.css'
import '@fontsource/poppins/700.css'

import 'vuetify/styles'
// Axios global config
import http from './http.config'


// Global components
import ModalTemplate from '@components/ModalTemplate.vue'
import { VuetifyViewer } from 'vuetify-pro-tiptap' // ✅ import
import RichTextEditor from '@components/RichTextEditor.vue'
import { VDateInput } from 'vuetify/labs/VDateInput'
import { useGlobalModal } from '@/composables/globalModal'

import 'vuetify-pro-tiptap/style.css'

// Vuetify setup
const vuetify = createVuetify({
  components:{
    ...components,
    VDateInput,
  },
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
const modal = useGlobalModal()

// Register global components
app.component('RichTextEditor', RichTextEditor)
app.component('ModalTemplate', ModalTemplate)
app.component('VuetifyViewer', VuetifyViewer) // ✅ register
app.config.globalProperties.$modal = modal

app.use(pinia)


app.use(router).use(vuetify).mount('#app')
