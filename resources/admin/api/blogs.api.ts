import http from '@/http.config'

export type BlogId = number | string

export interface Blog {
    id?: BlogId
    [key: string]: unknown
}

export interface BlogGetResponse {
    data?: Blog | { data: Blog }
    [key: string]: unknown
}

export interface BlogMutationResponse {
    message?: string
    data?: Blog
    [key: string]: unknown
}

export type BlogPayload = Record<string, unknown>

export function getBlogByIdApi(id: BlogId): Promise<BlogGetResponse> {
    return http.get(`/admin/blogs/${id}`)
}

export function createBlogApi(payload: BlogPayload): Promise<BlogMutationResponse> {
    return http.post('/admin/blogs', payload)
}

export function updateBlogApi(id: BlogId, payload: BlogPayload): Promise<BlogMutationResponse> {
    return http.patch(`/admin/blogs/${id}/update`, payload)
}
