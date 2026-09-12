import http from '@/http.config'

export type SettingId = number | string

export function getSettingsApi(params?: Record<string, unknown>) {
    return http.get('/admin/settings', { params })
}

export function saveSettingApi(payload: Record<string, unknown>) {
    return http.post('admin/settings', payload)
}

export function deleteSettingApi(id: SettingId) {
    return http.delete(`/admin/settings/${id}/delete`)
}
