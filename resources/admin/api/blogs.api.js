import http from '@/http.config'

export function getBlogByIdApi(id) {
    return http.get(`/admin/blogs/${id}`)
}

export function createBlogApi(payload) {
    return http.post('/admin/blogs', payload)
}

export function updateBlogApi(id, payload) {
    return http.patch(`/admin/blogs/${id}/update`, payload)
}
