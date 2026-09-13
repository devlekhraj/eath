import http from '@/http.config'

export type DestinationId = number | string

// ── Destinations CRUD ─────────────────────────────────────────────────────────

export function getDestinationsApi(params?: Record<string, unknown>) {
    return http.get('/admin/destinations', { params })
}

export function getDestinationByIdApi(id: DestinationId) {
    return http.get(`/admin/destinations/${id}`)
}

export function saveDestinationApi(payload: Record<string, unknown>) {
    return http.post('admin/destinations', payload)
}

export function updateDestinationApi(id: DestinationId, payload: Record<string, unknown>) {
    return http.patch(`/admin/destinations/${id}/update`, payload)
}

export function deleteDestinationApi(id: DestinationId) {
    return http.delete(`/admin/destinations/${id}/delete`)
}

export function toggleDestinationActiveApi(id: DestinationId, isActive: boolean) {
    return http.patch(`/admin/destinations/${id}/update`, { is_active: isActive })
}

export function getPackageCategoriesApi(params?: Record<string, unknown>) {
    return http.get('admin/package-categories', { params })
}

export function savePackageCategoryApi(payload: Record<string, unknown>) {
    return http.post('admin/package-categories', payload)
}

export function deletePackageCategoryApi(id: DestinationId) {
    return http.delete(`/admin/package-categories/${id}/delete`)
}

// ── Packages under Destinations (travel-packages) ────────────────────────────

export function getDestinationPackagesApi(destinationId: DestinationId) {
    return http.get(`/admin/destinations/${destinationId}/packages`)
}

export function deleteTravelPackageApi(id: DestinationId) {
    return http.delete(`/admin/travel-packages/${id}/delete`)
}

// ── Package Prices ─────────────────────────────────────────────────────────────

export function savePackagePriceApi(travelPackageId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/travel-packages/${travelPackageId}/prices`, payload)
}

export function deletePackagePriceApi(id: DestinationId) {
    return http.delete(`/admin/package-prices/${id}/delete`)
}

// ── Package Inclusions / Exclusions ──────────────────────────────────────────

export function savePackageInclusionApi(travelPackageId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/travel-packages/${travelPackageId}/services`, payload)
}

export function deletePackageInclusionApi(id: DestinationId) {
    return http.delete(`/admin/package-inclusions/${id}/delete`)
}

// ── Package Highlights ────────────────────────────────────────────────────────

export function getPackageHighlightLookupsApi() {
    return http.get('/admin/lookups?code=package_highlights')
}

export function savePackageHighlightApi(travelPackageId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/travel-packages/${travelPackageId}/highlight`, payload)
}

export function deletePackageHighlightApi(id: DestinationId) {
    return http.delete(`/admin/travel-package-highlight/${id}/delete`)
}

// ── Package Itinerary ─────────────────────────────────────────────────────────

export function savePackageItineraryApi(travelPackageId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/travel-packages/${travelPackageId}/itinerary`, payload)
}

export function deletePackageItineraryApi(id: DestinationId) {
    return http.delete(`/admin/package-itineraries/${id}/delete`)
}

// ── Itinerary Highlights ──────────────────────────────────────────────────────

export function getItineraryHighlightLookupsApi() {
    return http.get('/admin/lookups?code=itinerary_highlights')
}

export function saveItineraryHighlightApi(itineraryId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/package-itineraries/${itineraryId}/highlight`, payload)
}

export function deleteItineraryHighlightApi(id: DestinationId) {
    return http.delete(`/admin/itinerary-highlights/${id}/delete`)
}

// ── Itinerary Lookups ─────────────────────────────────────────────────────────

export function saveItineraryLookupApi(payload: Record<string, unknown>) {
    return http.post('admin/itinerary-lookups', payload)
}

export function deleteItineraryLookupApi(id: DestinationId) {
    return http.delete(`/admin/itinerary-lookups/${id}/delete`)
}

// ── Destination Media Attachments ─────────────────────────────────────────────

export function attachDestinationMediaApi(destinationId: DestinationId, payload: Record<string, unknown>) {
    return http.post(`/admin/destinations/${destinationId}/media-attachments`, payload)
}

export function detachDestinationMediaApi(destinationId: DestinationId, attachmentId: number | string) {
    return http.delete(`/admin/destinations/${destinationId}/media-attachments/${attachmentId}`)
}

export function updateDestinationMediaApi(destinationId: DestinationId, attachmentId: number | string, payload: Record<string, unknown>) {
    return http.patch(`/admin/destinations/${destinationId}/media-attachments/${attachmentId}`, payload)
}


