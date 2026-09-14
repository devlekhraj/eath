import http from '@/http.config'

export interface MediaVariantItem {
  id: number | string
  media_asset_id: number | string
  variant: string
  format: string
  file_name: string
  file_path: string
  mime_type?: string | null
  size?: number | null
  width?: number | null
  height?: number | null
  [key: string]: unknown
}

export interface MediaAttachmentItem {
  id: number | string
  media_asset_id: number | string
  attachable_type: string
  attachable_id: number | string
  collection: string
  title?: string | null
  alt_text?: string | null
  caption?: string | null
  sort_order?: number
  [key: string]: unknown
}

export interface MediaAssetItem {
  id: number | string
  hash?: string | null
  disk?: string
  filename: string
  path: string
  url: string
  mime_type?: string | null
  size_bytes?: number | null
  formatted_size?: string
  width?: number | null
  height?: number | null
  title?: string | null
  alt_text?: string | null
  caption?: string | null
  metadata?: Record<string, any> | null
  variants?: MediaVariantItem[]
  attachments?: MediaAttachmentItem[]
  attachments_count?: number
  created_at?: string
  updated_at?: string
  [key: string]: unknown
}

export interface MediaAssetsResponse {
  success?: boolean
  data: MediaAssetItem[]
  meta?: {
    current_page: number
    last_page: number
    per_page: number
    total: number
  }
  [key: string]: unknown
}

export interface MediaAssetResponse {
  success?: boolean
  data: MediaAssetItem
  [key: string]: unknown
}

export function getMediaAssetsApi(params?: Record<string, any>): Promise<MediaAssetsResponse> {
  return http.get('/admin/media-assets', { params })
}

export function getMediaAssetByIdApi(id: number | string): Promise<MediaAssetResponse> {
  return http.get(`/admin/media-assets/${id}`)
}

export function uploadMediaAssetApi(formData: FormData): Promise<MediaAssetResponse & { deduped?: boolean }> {
  return http.post('/admin/media-assets/upload', formData, {
    headers: { 'Content-Type': 'multipart/form-data' },
  })
}

export function updateMediaAssetApi(id: number | string, data: Partial<MediaAssetItem>): Promise<MediaAssetResponse> {
  return http.patch(`/admin/media-assets/${id}`, data)
}

export function deleteMediaAssetApi(id: number | string, force: boolean = false): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/media-assets/${id}`, { params: { force: force ? 1 : 0 } })
}

export function attachMediaAssetApi(id: number | string, data: Record<string, any>): Promise<{ success: boolean; message: string; data: MediaAttachmentItem }> {
  return http.post(`/admin/media-assets/${id}/attach`, data)
}

export function detachMediaAssetApi(attachmentId: number | string): Promise<{ success: boolean; message: string }> {
  return http.delete(`/admin/media-attachments/${attachmentId}`)
}

// Backward-compatible aliases
export const getGalleriesApi = getMediaAssetsApi
export const uploadGalleryImageApi = uploadMediaAssetApi
