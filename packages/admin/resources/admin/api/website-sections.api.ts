import http from '@/http.config'

export interface WebsiteSection {
  id: number | string
  page_key: string
  section_key: string
  heading?: string | null
  eyebrow?: string | null
  body?: string | null
  content?: Record<string, any> | any[] | null
  media_asset_id?: number | null
  media_asset?: any
  is_active: boolean
  sort_order?: number
  created_at?: string
  updated_at?: string
  [key: string]: unknown
}

export interface WebsiteSectionsResponse {
  success?: boolean
  data: WebsiteSection[]
  [key: string]: unknown
}

export interface WebsiteSectionResponse {
  success?: boolean
  data: WebsiteSection
  [key: string]: unknown
}

export function getWebsiteSectionsApi(params?: Record<string, any>): Promise<WebsiteSectionsResponse> {
  return http.get('/admin/website-sections', { params })
}

export function getWebsiteSectionByIdApi(id: number | string): Promise<WebsiteSectionResponse> {
  return http.get(`/admin/website-sections/${id}`)
}

export function createWebsiteSectionApi(data: Partial<WebsiteSection>): Promise<WebsiteSectionResponse> {
  return http.post('/admin/website-sections', data)
}

export function updateWebsiteSectionApi(id: number | string, data: Partial<WebsiteSection>): Promise<WebsiteSectionResponse> {
  return http.patch(`/admin/website-sections/${id}`, data)
}

export function deleteWebsiteSectionApi(id: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/website-sections/${id}/delete`)
}

export function toggleWebsiteSectionActiveApi(id: number | string, isActive?: boolean): Promise<{ success: boolean; message: string; is_active: boolean }> {
  return http.patch(`/admin/website-sections/${id}/toggle-active`, typeof isActive === 'boolean' ? { is_active: isActive } : {})
}

// Backward-compatible Banner aliases
export type Banner = WebsiteSection
export const getBannersApi = getWebsiteSectionsApi
export const getBannerByIdApi = getWebsiteSectionByIdApi
