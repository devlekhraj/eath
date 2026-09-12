import http from '@/http.config'

export type StoryId = number | string

export interface TravelerStory {
    id?: StoryId
    journey_id?: number | null
    journey?: { id: number; title: string; slug: string } | null
    destination_id?: number | null
    destination?: { id: number; name: string; slug: string } | null
    title: string
    slug: string
    summary?: string | null
    body?: string | null
    traveler_name?: string | null
    traveler_country?: string | null
    traveled_on?: string | null
    hero_image_id?: number | null
    banner_url?: string | null
    hero_image?: { id: number; path: string; alt_text?: string } | null
    is_featured?: boolean
    is_active?: boolean
    is_published?: boolean
    published_at?: string | null
    meta_title?: string | null
    meta_description?: string | null
    story_url?: string | null
    created_at?: string | null
    updated_at?: string | null
    [key: string]: unknown
}

export interface StoryGetResponse {
    data?: TravelerStory
    story?: TravelerStory
    [key: string]: unknown
}

export interface StoryMutationResponse {
    message?: string
    data?: TravelerStory
    story?: TravelerStory
    [key: string]: unknown
}

export type StoryPayload = Record<string, unknown>

export function getTravelerStoriesApi(params?: Record<string, unknown>): Promise<{ data: TravelerStory[] }> {
    return http.get('/admin/traveler-stories', { params })
}

export function getTravelerStoryByIdApi(id: StoryId): Promise<StoryGetResponse> {
    return http.get(`/admin/traveler-stories/${id}`)
}

export function createTravelerStoryApi(payload: StoryPayload): Promise<StoryMutationResponse> {
    return http.post('/admin/traveler-stories', payload)
}

export function updateTravelerStoryApi(id: StoryId, payload: StoryPayload): Promise<StoryMutationResponse> {
    return http.patch(`/admin/traveler-stories/${id}`, payload)
}

export function deleteTravelerStoryApi(id: StoryId): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/traveler-stories/${id}/delete`)
}

export function toggleTravelerStoryActiveApi(id: StoryId, isActive?: boolean): Promise<{ success: boolean; is_active: boolean; message: string }> {
    return http.patch(`/admin/traveler-stories/${id}/toggle-active`, { is_active: isActive })
}

export function toggleTravelerStoryPublishApi(id: StoryId, isPublished?: boolean): Promise<{ success: boolean; is_published: boolean; message: string }> {
    return http.patch(`/admin/traveler-stories/${id}/toggle-publish`, { is_published: isPublished })
}
