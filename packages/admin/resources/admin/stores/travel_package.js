import { defineStore } from 'pinia'
import http from '@/http.config'

export const useTravelPackageStore = defineStore('travelPackage', {
  state: () => ({
    travel_package_list: [],
    travel_package: null,
    loading: false,
    error: null,
  }),

  actions: {
    async travelPackages(params = {}) {
      this.loading = true
      this.error = null

      try {
        const resp = await http.get('admin/travel-packages', { params })
        this.travel_package_list = resp.data
      } catch (error) {
        this.error = error
        console.error('Failed to fetch travel packages:', error)
      } finally {
        this.loading = false
      }
    },

    async packageDetail({ id }) {
      this.loading = true
      this.error = null

      try {
        const resp = await http.get(`admin/travel-packages/${id}`)
        this.travel_package = resp.data
      } catch (error) {
        this.error = error
        console.error('Failed to fetch package detail:', error)
      } finally {
        this.loading = false
      }
    },
  },
})
