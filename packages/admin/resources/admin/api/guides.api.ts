import http from '@/http.config'

export type GuideId = number | string

export function getGuidesApi(params?: Record<string, unknown>) {
    return http.get('/admin/guides', { params })
}

export function getGuideByIdApi(id: GuideId) {
    return http.get(`/admin/guides/${id}`)
}

export function createGuideApi(payload: Record<string, unknown>) {
    return http.post('/admin/guides', payload)
}

export function deleteGuideApi(id: GuideId) {
    return http.delete(`/admin/guides/${id}/delete`)
}

export function updateGuideBioApi(id: GuideId, payload: Record<string, unknown>) {
    return http.patch(`admin/guides/${id}/bio`, payload)
}

export function saveGuideReviewApi(id: GuideId, payload: Record<string, unknown>) {
    return http.post(`admin/guides/${id}/review`, payload)
}

export function saveGuideTripApi(guideId: GuideId, payload: Record<string, unknown>) {
    return http.post(`admin/guides/${guideId}/trip`, payload)
}

/** Fetches journeys for the trip selector dropdown */
export function getTravelPackagesListApi(params?: Record<string, unknown>) {
    return http.get('/admin/travel-packages', { params })
}
