import axios from 'axios'

const http = axios
const ADMIN_LOGIN_PATH = '/admin/login'

http.defaults.baseURL = import.meta.env.VITE_API_BASE_URL || ''
http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = localStorage.getItem('token')
if (token) {
    http.defaults.headers.common['Authorization'] = `Bearer ${token}`
} else {
    delete http.defaults.headers.common['Authorization']
}

http.interceptors.request.use((config) => {
    const requestUrl = String(config.url || '')
    const isLoginRequest =
        requestUrl.endsWith('/admin/login') ||
        requestUrl.endsWith('/user/login') ||
        requestUrl === '/admin/login' ||
        requestUrl === '/user/login'

    if (isLoginRequest) {
        if (config.headers?.Authorization) {
            delete config.headers.Authorization
        }
        return config
    }

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
        const status = error?.response?.status

        if (status === 401 || status === 419) {
            localStorage.removeItem('token')
            delete http.defaults.headers.common['Authorization']

            if (window.location.pathname !== ADMIN_LOGIN_PATH) {
                window.location.href = ADMIN_LOGIN_PATH
            }
        }

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
