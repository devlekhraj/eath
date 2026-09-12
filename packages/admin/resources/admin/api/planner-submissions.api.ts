import http from '@/http.config'

export interface PlannerSubmissionItem {
  id: number | string
  reference_code: string
  journey_id?: number | null
  journey?: {
    id: number
    name: string
    slug: string
    price_minor?: number
    currency?: string
  } | null
  departure_id?: number | null
  departure?: {
    id: number
    code?: string
    start_date?: string
    end_date?: string
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
  travel_month_id?: number | null
  travel_month?: {
    id: number
    name: string
    season?: string
  } | null
  contact_name: string
  contact_email: string
  contact_phone?: string | null
  country?: string | null
  adults: number
  children: number
  available_days?: number | null
  budget_minor?: number | null
  currency: string
  preferences?: Record<string, any> | null
  recommendation_snapshot?: Record<string, any> | null
  message?: string | null
  status: 'new' | 'reviewing' | 'replied' | 'closed'
  ip_address?: string | null
  user_agent?: string | null
  created_at: string
  updated_at: string
  [key: string]: unknown
}

export interface PlannerSubmissionsResponse {
  success?: boolean
  data: PlannerSubmissionItem[]
  [key: string]: unknown
}

export interface PlannerSubmissionResponse {
  success?: boolean
  data: PlannerSubmissionItem
  [key: string]: unknown
}

export function getPlannerSubmissionsApi(params?: Record<string, any>): Promise<PlannerSubmissionsResponse> {
  return http.get('/admin/planner-submissions', { params })
}

export function getPlannerSubmissionByIdApi(id: number | string): Promise<PlannerSubmissionResponse> {
  return http.get(`/admin/planner-submissions/${id}`)
}

export function updatePlannerSubmissionStatusApi(id: number | string, status: string): Promise<{ success: boolean; message: string; status: string }> {
  return http.patch(`/admin/planner-submissions/${id}/status`, { status })
}

export function deletePlannerSubmissionApi(id: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/planner-submissions/${id}`)
}

// Backward compatibility alias
export const getBookingsApi = getPlannerSubmissionsApi
