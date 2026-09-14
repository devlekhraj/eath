import http from '@/http.config'

export interface NewsletterSubscriptionItem {
  id: number | string
  email: string
  name?: string | null
  is_subscribed: boolean
  subscribed_at?: string | null
  unsubscribed_at?: string | null
  ip_address?: string | null
  user_agent?: string | null
  created_at?: string
  updated_at?: string
  [key: string]: unknown
}

export interface NewsletterSubscriptionsResponse {
  success?: boolean
  data: NewsletterSubscriptionItem[]
  [key: string]: unknown
}

export function getNewsletterSubscriptionsApi(params?: Record<string, any>): Promise<NewsletterSubscriptionsResponse> {
  return http.get('/admin/newsletter-subscriptions', { params })
}

export function createNewsletterSubscriptionApi(data: Partial<NewsletterSubscriptionItem>): Promise<{ success: boolean; message: string; data: NewsletterSubscriptionItem }> {
  return http.post('/admin/newsletter-subscriptions', data)
}

export function toggleNewsletterSubscriptionApi(id: number | string, isSubscribed?: boolean): Promise<{ success: boolean; message: string; is_subscribed: boolean }> {
  return http.patch(`/admin/newsletter-subscriptions/${id}/toggle-subscription`, typeof isSubscribed === 'boolean' ? { is_subscribed: isSubscribed } : {})
}

export function deleteNewsletterSubscriptionApi(id: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/newsletter-subscriptions/${id}`)
}
