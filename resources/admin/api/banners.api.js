import http from '@/http.config'

export function getBannersApi() {
    return http.get('/admin/banners')
}

export function getBannerByIdApi(id) {
    return http.get(`/admin/banners/${id}`)
}
