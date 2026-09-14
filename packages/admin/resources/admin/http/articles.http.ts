import http from '@/http.config'

export type ArticleId = number | string

export interface ArticleSection {
    id?: number
    article_id?: number
    heading: string
    body: string
    sort_order?: number
}

export interface ArticleCategory {
    id?: number
    name: string
    slug: string
    description?: string
    sort_order?: number
    is_active?: boolean
    articles_count?: number
}

export interface Article {
    id?: ArticleId
    article_category_id?: number | null
    category_id?: number | null
    title: string
    slug: string
    summary?: string | null
    sub_title?: string | null
    body?: string | null
    content?: string | null
    author_name?: string | null
    author?: string | null
    media?: Record<string, unknown> | null
    banner_url?: string | null
    published_at?: string | null
    updated_on?: string | null
    is_featured?: boolean
    is_active?: boolean
    status?: boolean
    is_published?: boolean
    meta_title?: string | null
    meta_description?: string | null
    category?: ArticleCategory | null
    sections?: ArticleSection[]
    journeys?: Array<{ id: number; title: string; slug: string; sort_order?: number }>
    journey_ids?: number[]
    created_at?: string | null
    updated_at?: string | null
    [key: string]: unknown
}

export interface ArticleGetResponse {
    data?: Article | { data: Article }
    article?: Article
    [key: string]: unknown
}

export interface ArticleMutationResponse {
    message?: string
    data?: Article
    article?: Article
    [key: string]: unknown
}

export type ArticlePayload = Record<string, unknown>

// Articles API
export function getArticlesApi(params?: Record<string, unknown>): Promise<{ data: Article[] }> {
    return http.get('/admin/articles', { params })
}

export function getArticleByIdApi(id: ArticleId): Promise<ArticleGetResponse> {
    return http.get(`/admin/articles/${id}`)
}

export function createArticleApi(payload: ArticlePayload): Promise<ArticleMutationResponse> {
    return http.post('/admin/articles', payload)
}

export function updateArticleApi(id: ArticleId, payload: ArticlePayload): Promise<ArticleMutationResponse> {
    return http.patch(`/admin/articles/${id}`, payload)
}

export function deleteArticleApi(id: ArticleId): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/articles/${id}/delete`)
}

export function toggleArticleActiveApi(id: ArticleId, isActive?: boolean): Promise<{ success: boolean; is_active: boolean; message: string }> {
    return http.patch(`/admin/articles/${id}/toggle-active`, { is_active: isActive })
}

export function toggleArticlePublishApi(id: ArticleId, isPublished?: boolean): Promise<{ success: boolean; is_published: boolean; message: string }> {
    return http.patch(`/admin/articles/${id}/toggle-publish`, { is_published: isPublished })
}

export function saveArticleSectionApi(articleId: ArticleId, payload: Partial<ArticleSection>): Promise<{ success: boolean; data: ArticleSection; message: string }> {
    return http.post(`/admin/articles/${articleId}/sections`, payload)
}

export function deleteArticleSectionApi(articleId: ArticleId, sectionId: number): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/articles/${articleId}/sections/${sectionId}`)
}

export function syncArticleJourneysApi(articleId: ArticleId, journeyIds: number[]): Promise<{ success: boolean; message: string }> {
    return http.post(`/admin/articles/${articleId}/journeys`, { journey_ids: journeyIds })
}

// Article Categories API
export function getArticleCategoriesApi(params?: Record<string, unknown>): Promise<{ data: ArticleCategory[] }> {
    return http.get('/admin/article-categories', { params })
}

export function getArticleCategoryByIdApi(id: number | string): Promise<{ data: ArticleCategory }> {
    return http.get(`/admin/article-categories/${id}`)
}

export function createArticleCategoryApi(payload: Partial<ArticleCategory>): Promise<{ success: boolean; data: ArticleCategory; message: string }> {
    return http.post('/admin/article-categories', payload)
}

export function updateArticleCategoryApi(id: number | string, payload: Partial<ArticleCategory>): Promise<{ success: boolean; data: ArticleCategory; message: string }> {
    return http.patch(`/admin/article-categories/${id}`, payload)
}

export function deleteArticleCategoryApi(id: number | string): Promise<{ success: boolean; message: string }> {
    return http.delete(`/admin/article-categories/${id}/delete`)
}

export function toggleArticleCategoryActiveApi(id: number | string, isActive?: boolean): Promise<{ success: boolean; is_active: boolean; message: string }> {
    return http.patch(`/admin/article-categories/${id}/toggle-active`, { is_active: isActive })
}

// Backward-compatible Blog Aliases
export type BlogId = ArticleId
export type Blog = Article
export type BlogGetResponse = ArticleGetResponse
export type BlogMutationResponse = ArticleMutationResponse
export type BlogPayload = ArticlePayload

export const getBlogsApi = getArticlesApi
export const getBlogByIdApi = getArticleByIdApi
export const createBlogApi = createArticleApi
export const updateBlogApi = updateArticleApi
export const deleteBlogApi = deleteArticleApi
export const toggleBlogActiveApi = toggleArticleActiveApi
export const toggleBlogPublishApi = toggleArticlePublishApi
export const saveBlogSectionApi = saveArticleSectionApi
export const deleteBlogSectionApi = deleteArticleSectionApi
export const syncBlogJourneysApi = syncArticleJourneysApi
export const getBlogCategoriesApi = getArticleCategoriesApi
