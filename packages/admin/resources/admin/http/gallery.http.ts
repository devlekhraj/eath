import http from '@/http.config'

/**
 * Shared gallery/media upload utilities used across multiple modules.
 * All direct image upload endpoints live here to avoid duplication.
 */

export function uploadGalleryImageApi(formData: FormData) {
    return http.post('/admin/gallery-upload', formData)
}

export function getGalleryImagesApi(params?: Record<string, unknown>) {
    return http.get('/admin/galleries', { params })
}

export function deleteGalleryImageApi(id: number | string) {
    return http.delete(`/admin/galleries/${id}/delete`)
}

export function updateMediaUsageApi(id: number | string, payload: Record<string, unknown>) {
    return http.patch(`/admin/media-usages/${id}`, payload)
}

export function deleteMediaUsageApi(id: number | string) {
    return http.delete(`/admin/media-usages/${id}`)
}

/** Save/associate an existing gallery image to a resource (banners, treks, etc.) */
export function saveResourceImageApi(endpoint: string, payload: Record<string, unknown>) {
    return http.post(endpoint, payload)
}

/** Upload and save a new image to a resource */
export function uploadResourceImageApi(endpoint: string, formData: FormData) {
    return http.post(endpoint, formData)
}
