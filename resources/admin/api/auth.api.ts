import http from '@/http.config'

export interface LoginCredentials {
    username: string
    password: string
}

export interface LoginResponse {
    access_token: string
    token_type: string
}

export interface UserProfile {
    id: number
    name: string
    email: string
    [key: string]: unknown
}

export function loginApi(payload: LoginCredentials): Promise<LoginResponse> {
    return http.post('/admin/login', payload)
}

export function logoutApi(): Promise<void> {
    return http.post('/admin/logout')
}

export function profileApi(): Promise<{ data: UserProfile }> {
    return http.get('/admin/profile')
}
