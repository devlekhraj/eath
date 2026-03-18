import { defineStore } from 'pinia'
import http from '@/http.config'
import { loginApi, logoutApi, profileApi } from '@/api/auth.api'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
        loading: false,
        error: null,
    }),

    actions: {
        async login({ username, password }) {
            this.loading = true
            this.error = null

            try {
                const res = await loginApi({ username, password })

                this.token = res.access_token

                localStorage.setItem('token', this.token)
                http.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
            } catch (err) {
                this.error = err.response?.data?.message || 'Login failed'
                throw err
            } finally {
                this.loading = false
            }
        },

        async logout() {
            try {
                await logoutApi()
            } catch (e) {
                console.warn('Logout API failed:', e)
            } finally {
                this.token = null
                this.user = null
                this.error = null
                this.loading = false
                localStorage.removeItem('token')
                delete http.defaults.headers.common['Authorization']
            }
        },

        async fetchProfile() {
            if (!this.token) return

            http.defaults.headers.common['Authorization'] = `Bearer ${this.token}`

            try {
                const resp = await profileApi()
                this.user = resp?.data ?? resp
            } catch(error) {
                const status = error?.response?.status
                if (status === 401 || status === 419) {
                    this.token = null
                    this.user = null
                    localStorage.removeItem('token')
                    delete http.defaults.headers.common['Authorization']
                }
            }
        }
    }
})
