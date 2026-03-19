import http from '@/http.config'

export interface Banner {
    id: number | string
    [key: string]: unknown
}

export interface BannersResponse {
    data: Banner[]
    [key: string]: unknown
}

export interface BannerResponse {
    data: Banner
    [key: string]: unknown
}

export function getBannersApi(): Promise<BannersResponse | Banner[]> {
    return http.get('/admin/banners')
}

export function getBannerByIdApi(id: number | string): Promise<BannerResponse | Banner> {
    return http.get(`/admin/banners/${id}`)
}
