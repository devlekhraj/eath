import { defineStore } from 'pinia'
import axios from 'axios'

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
                const res = await axios.post('/admin/login', { username, password })

                this.token = res.access_token

                localStorage.setItem('token', this.token)
                axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
            } catch (err) {
                this.error = err.response?.data?.message || 'Login failed'
                throw err
            } finally {
                this.loading = false
            }
        },

        async logout() {
            try {
                await axios.post('/admin/logout')
            } catch (e) {
                console.warn('Logout API failed:', e)
            } finally {
                this.token = null
                this.user = null
                this.error = null
                this.loading = false
                localStorage.removeItem('token')
                delete axios.defaults.headers.common['Authorization']
            }
        },

        async fetchProfile() {
            if (!this.token) return

            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`

            try {
                const resp = await axios.get('/admin/profile')
                this.user = resp.data
            } catch(error) {
                console.log({error});
                // this.logout()
            }
        }
    }
})
