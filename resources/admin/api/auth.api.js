import http from '@/http.config'

export function loginApi(payload) {
    return http.post('/admin/login', payload)
}

export function logoutApi() {
    return http.post('/admin/logout')
}

export function profileApi() {
    return http.get('/admin/profile')
}
