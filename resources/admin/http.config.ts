import axios from 'axios'

const http = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL || '',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
})

// Request interceptor — attach token from localStorage
http.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('token')
        const requestUrl = String(config.url || '')
        const isLoginRequest = requestUrl.endsWith('/login') || requestUrl.includes('/admin/login')

        if (token && !isLoginRequest) {
            config.headers.Authorization = `Bearer ${token}`
        } else if (config.headers?.Authorization) {
            delete config.headers.Authorization
        }
        return config
    },
    (error) => Promise.reject(error)
)

// Response interceptor — unwrap data, handle errors
http.interceptors.response.use(
    (response) => response.data,
    (error) => {
        const status: number | undefined = error?.response?.status

        if (status === 401 || status === 419) {
            localStorage.removeItem('token')
        }

        return Promise.reject(error)
    }
)

export default http
