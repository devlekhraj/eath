import http from '@/http.config'

export interface InquiryItem {
  id: number | string
  reference_code: string
  inquiry_type: 'general' | 'journey' | 'departure' | 'custom'
  journey_id?: number | null
  journey?: {
    id: number
    name: string
    slug: string
  } | null
  departure_id?: number | null
  departure?: {
    id: number
    code?: string
    start_date?: string
    end_date?: string
  } | null
  name: string
  email: string
  phone?: string | null
  country?: string | null
  subject?: string | null
  message: string
  status: 'new' | 'reviewing' | 'replied' | 'closed'
  ip_address?: string | null
  user_agent?: string | null
  created_at: string
  updated_at: string
  [key: string]: unknown
}

export interface InquiriesResponse {
  success?: boolean
  data: InquiryItem[]
  [key: string]: unknown
}

export interface InquiryResponse {
  success?: boolean
  data: InquiryItem
  [key: string]: unknown
}

export function getInquiriesApi(params?: Record<string, any>): Promise<InquiriesResponse> {
  return http.get('/admin/inquiries', { params })
}

export function getInquiryByIdApi(id: number | string): Promise<InquiryResponse> {
  return http.get(`/admin/inquiries/${id}`)
}

export function updateInquiryStatusApi(id: number | string, status: string): Promise<{ success: boolean; message: string; status: string }> {
  return http.patch(`/admin/inquiries/${id}/status`, { status })
}

export function updateInquiryApi(id: number | string, data: Partial<InquiryItem>): Promise<InquiryResponse> {
  return http.patch(`/admin/inquiries/${id}`, data)
}

export function deleteInquiryApi(id: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/inquiries/${id}`)
}
