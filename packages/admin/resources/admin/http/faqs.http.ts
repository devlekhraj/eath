import http from '@/http.config'

export interface FaqItem {
  id: number | string
  question: string
  answer: string
  category?: string | null
  faqable_type?: string | null
  faqable_id?: number | null
  faqable?: {
    id: number
    name?: string
    title?: string
    slug?: string
    [key: string]: unknown
  } | null
  journey_id?: number | null
  journey?: {
    id: number
    name: string
    slug: string
  } | null
  destination_id?: number | null
  destination?: {
    id: number
    name: string
    slug: string
  } | null
  experience_id?: number | null
  experience?: {
    id: number
    name: string
    slug: string
  } | null
  sort_order: number
  is_active: boolean
  created_at?: string
  updated_at?: string
  [key: string]: unknown
}

export interface FaqsResponse {
  success?: boolean
  data: FaqItem[]
  [key: string]: unknown
}

export interface FaqResponse {
  success?: boolean
  data: FaqItem
  [key: string]: unknown
}

export function getFaqsApi(params?: Record<string, any>): Promise<FaqsResponse> {
  return http.get('/admin/faqs', { params })
}

export function getFaqCategoriesApi(): Promise<{ success?: boolean; data: string[] }> {
  return http.get('/admin/faqs/categories')
}

export function getFaqByIdApi(id: number | string): Promise<FaqResponse> {
  return http.get(`/admin/faqs/${id}`)
}

export function createFaqApi(data: Partial<FaqItem>): Promise<FaqResponse> {
  return http.post('/admin/faqs', data)
}

export function updateFaqApi(id: number | string, data: Partial<FaqItem>): Promise<FaqResponse> {
  return http.patch(`/admin/faqs/${id}`, data)
}

export function deleteFaqApi(id: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/faqs/${id}/delete`)
}

export function toggleFaqActiveApi(id: number | string, isActive?: boolean): Promise<{ success: boolean; message: string; is_active: boolean }> {
  return http.patch(`/admin/faqs/${id}/toggle-active`, typeof isActive === 'boolean' ? { is_active: isActive } : {})
}
