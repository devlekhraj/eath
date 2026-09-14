import http from '@/http.config'

export type PageId = number | string
export type SectionId = number | string

export interface WebsitePageSection {
    id?: number
    website_page_id?: number
    heading?: string | null
    body?: string | null
    image_id?: number | null
    layout_key?: string | null
    content?: Record<string, unknown> | null
    sort_order?: number
    is_active?: boolean
}

export interface WebsitePage {
    id?: PageId
    title: string
    slug: string
    summary?: string | null
    body?: string | null
    content?: string | null // alias
    type?: 'standard' | 'policy' | 'safety' | 'responsible' | 'about' | 'contact' | string
    media?: Record<string, unknown> | null
    banner_url?: string | null
    is_active?: boolean
    is_published?: boolean
    published_at?: string | null
    meta_title?: string | null
    meta_description?: string | null
    sections?: WebsitePageSection[]
    sections_count?: number
    created_at?: string | null
    updated_at?: string | null
    [key: string]: unknown
}

export interface WebsiteSection {
    id?: SectionId
    page_key: string
    section_key: string
    heading?: string | null
    eyebrow?: string | null
    body?: string | null
    content?: Record<string, unknown> | null
    media_asset_id?: number | null
    is_active?: boolean
    sort_order?: number
    created_at?: string | null
    updated_at?: string | null
    [key: string]: unknown
}

export type PagePayload = Record<string, unknown>
export type SectionPayload = Record<string, unknown>

// Website Pages
export function getWebsitePagesApi(params?: Record<string, unknown>): Promise<{ data: WebsitePage[] }> {
    return http.get('/admin/website-pages', { params })
}

export function getWebsitePageByIdApi(id: PageId): Promise<{ data: WebsitePage; page: WebsitePage }> {
    return http.get(`/admin/website-pages/${id}`)
}

export function createWebsitePageApi(payload: PagePayload): Promise<{ data: WebsitePage; page: WebsitePage; message: string }> {
    return http.post('/admin/website-pages', payload)
}

export function updateWebsitePageApi(id: PageId, payload: PagePayload): Promise<{ data: WebsitePage; page: WebsitePage; message: string }> {
    return http.patch(`/admin/website-pages/${id}`, payload)
}

export function deleteWebsitePageApi(id: PageId): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/website-pages/${id}/delete`)
}

export function toggleWebsitePageActiveApi(id: PageId, isActive?: boolean): Promise<{ success: boolean; is_active: boolean; message: string }> {
    return http.patch(`/admin/website-pages/${id}/toggle-active`, { is_active: isActive })
}

export function toggleWebsitePagePublishApi(id: PageId, isPublished?: boolean): Promise<{ success: boolean; is_published: boolean; message: string }> {
    return http.patch(`/admin/website-pages/${id}/toggle-publish`, { is_published: isPublished })
}

export function saveWebsitePageSectionApi(pageId: PageId, payload: Partial<WebsitePageSection>): Promise<{ success: boolean; data: WebsitePageSection; message: string }> {
    return http.post(`/admin/website-pages/${pageId}/sections`, payload)
}

export function deleteWebsitePageSectionApi(pageId: PageId, sectionId: number): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/website-pages/${pageId}/sections/${sectionId}`)
}

// Global Website Sections
export function getWebsiteSectionsApi(params?: Record<string, unknown>): Promise<{ data: WebsiteSection[] }> {
    return http.get('/admin/website-sections', { params })
}

export function saveWebsiteSectionApi(payload: SectionPayload): Promise<{ data: WebsiteSection; message: string }> {
    if (payload.id) {
        return http.patch(`/admin/website-sections/${payload.id}`, payload)
    }
    return http.post('/admin/website-sections', payload)
}

export function deleteWebsiteSectionApi(id: SectionId): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/website-sections/${id}/delete`)
}

export function toggleWebsiteSectionActiveApi(id: SectionId, isActive?: boolean): Promise<{ success: boolean; is_active: boolean; message: string }> {
    return http.patch(`/admin/website-sections/${id}/toggle-active`, { is_active: isActive })
}
