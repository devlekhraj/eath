import http from '@/http.config'

export type ComparisonPresetId = number | string

export function getComparisonPresetsApi(params?: Record<string, unknown>) {
    return http.get('/admin/comparison-presets', { params })
}

export function getComparisonPresetApi(id: ComparisonPresetId) {
    return http.get(`/admin/comparison-presets/${id}`)
}

export function saveComparisonPresetApi(payload: Record<string, unknown>) {
    if (payload.id) {
        return http.put(`/admin/comparison-presets/${payload.id}`, payload)
    }
    return http.post('/admin/comparison-presets', payload)
}

export function deleteComparisonPresetApi(id: ComparisonPresetId) {
    return http.delete(`/admin/comparison-presets/${id}`)
}
