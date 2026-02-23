import axios from 'axios'

const http = axios

http.defaults.baseURL = import.meta.env.VITE_API_BASE_URL || ''
http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = localStorage.getItem('token')
if (token) {
    http.defaults.headers.common['Authorization'] = `Bearer ${token}`
} else {
    delete http.defaults.headers.common['Authorization']
}

http.interceptors.request.use((config) => {
    const latestToken = localStorage.getItem('token')
    if (latestToken) {
        config.headers.Authorization = `Bearer ${latestToken}`
    } else if (config.headers?.Authorization) {
        delete config.headers.Authorization
    }
    return config
})

http.interceptors.response.use(
    (response) => response.data,
    (error) => {
        if (
            error.response &&
            error.response.status === 422 &&
            error.response.data &&
            error.response.data.errors
        ) {
            const rawErrors = error.response.data.errors
            const flatErrors = {}

            for (const key in rawErrors) {
                flatErrors[key] = Array.isArray(rawErrors[key]) ? rawErrors[key][0] : rawErrors[key]
            }

            error.response.data.errors = flatErrors
        }

        return Promise.reject(error)
    }
)

window.axios = http

export default http
