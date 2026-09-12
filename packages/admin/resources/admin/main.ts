import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'
import $ from 'jquery'

// Assign global jQuery
if (typeof window !== 'undefined') {
  window.$ = $
  window.jQuery = $
}

// Vuetify Plugin
import vuetify from './plugins/vuetify'

import '@fortawesome/fontawesome-free/css/all.css'
import '@fontsource/poppins/400.css'
import '@fontsource/poppins/500.css'
import '@fontsource/poppins/600.css'
import '@fontsource/poppins/700.css'


const app = createApp(App)
const pinia = createPinia()

app.use(pinia)
app.use(router)
app.use(vuetify)
app.mount('#app')
