import http from '@/http.config'

export type ExperienceId = number | string

export function getExperiencesApi(params?: Record<string, unknown>) {
    return http.get('admin/experiences', { params })
}

export function getExperienceByIdApi(id: ExperienceId) {
    return http.get(`admin/experiences/${id}`)
}

export function createExperienceApi(payload: Record<string, unknown>) {
    return http.post('admin/experiences', payload)
}

export function updateExperienceApi(id: ExperienceId, payload: Record<string, unknown>) {
    return http.patch(`admin/experiences/${id}`, payload)
}

export function deleteExperienceApi(id: ExperienceId) {
    return http.delete(`admin/experiences/${id}/delete`)
}

export function toggleExperienceActiveApi(id: ExperienceId, isActive: boolean) {
    return http.patch(`admin/experiences/${id}/toggle-active`, { is_active: isActive })
}

// ── Media Attachments ─────────────────────────────────────────────────────────

export function attachExperienceMediaApi(experienceId: ExperienceId, payload: Record<string, unknown>) {
    return http.post(`admin/experiences/${experienceId}/media-attachments`, payload)
}

export function detachExperienceMediaApi(experienceId: ExperienceId, attachmentId: number | string) {
    return http.delete(`admin/experiences/${experienceId}/media-attachments/${attachmentId}`)
}

export function updateExperienceMediaApi(experienceId: ExperienceId, attachmentId: number | string, payload: Record<string, unknown>) {
    return http.patch(`admin/experiences/${experienceId}/media-attachments/${attachmentId}`, payload)
}
