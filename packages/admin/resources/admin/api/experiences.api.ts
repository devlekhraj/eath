import http from '@/http.config'

export type ExperienceId = number | string

export function getExperiencesApi(params?: Record<string, unknown>) {
    return http.get('admin/experiences', { params })
}

export function createExperienceApi(payload: Record<string, unknown>) {
    return http.post('admin/experiences', payload)
}

export function deleteExperienceApi(id: ExperienceId) {
    return http.delete(`admin/experiences/${id}/delete`)
}

export function toggleExperienceActiveApi(id: ExperienceId, isActive: boolean) {
    return http.patch(`admin/experiences/${id}/toggle-active`, { is_active: isActive })
}
