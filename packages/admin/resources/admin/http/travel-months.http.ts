import http from '@/http.config'

export type TravelMonthId = number | string

export function getTravelMonthsApi(params?: Record<string, unknown>) {
    return http.get('admin/travel-months', { params })
}

export function updateTravelMonthApi(id: TravelMonthId, payload: Record<string, unknown>) {
    return http.patch(`admin/travel-months/${id}`, payload)
}

export function toggleTravelMonthActiveApi(id: TravelMonthId, isActive: boolean) {
    return http.patch(`admin/travel-months/${id}/toggle-active`, { is_active: isActive })
}
