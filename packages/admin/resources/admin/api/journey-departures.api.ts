import http from '@/http.config'

export type DepartureId = number | string

export function getDeparturesApi(params?: Record<string, unknown>) {
    return http.get('admin/departures', { params })
}

export function toggleDepartureActiveApi(id: DepartureId, isActive?: boolean) {
    return http.patch(`admin/departures/${id}/toggle-active`, { is_active: isActive })
}

export function deleteJourneyDepartureApi(id: DepartureId) {
    return http.delete(`admin/journey-departures/${id}/delete`)
}

/** Featured / pinned departures (legacy journey-departures page) */
export function getFeaturedPackagesApi(params?: Record<string, unknown>) {
    return http.get('/admin/travel-packages', { params })
}

export function saveFeaturedPackageApi(payload: Record<string, unknown>) {
    return http.post('/admin/featured-packages', payload)
}

export function deleteFeaturedPackageApi(id: DepartureId) {
    return http.delete(`/admin/featured_packages/${id}/delete`)
}
