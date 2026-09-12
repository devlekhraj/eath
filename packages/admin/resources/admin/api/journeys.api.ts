import http from "@/http.config";

export interface JourneyDeparturePayload {
    id?: number | string;
    start_date: string;
    end_date: string;
    total_seat?: number | string;
    total_seats?: number | string;
    available_seats?: number | string;
    cost?: number | string;
    price?: number | string;
    price_minor?: number;
    status?: string;
    code?: string;
    notes?: string;
    booking_deadline?: string;
    is_active?: boolean;
}

export function getJourneys(params: Record<string, any> = {}) {
    return http.get('/admin/journeys', { params });
}

export function getJourney(id: number | string) {
    return http.get(`/admin/journeys/${id}`);
}

export function saveJourney(payload: Record<string, any>) {
    return http.post('/admin/journeys', payload);
}

export function deleteJourney(id: number | string) {
    return http.delete(`/admin/journeys/${id}`);
}

export function toggleJourneyActive(id: number | string, is_active: boolean) {
    return http.patch(`/admin/journeys/${id}/toggle-active`, { is_active });
}

export function toggleJourneyPublish(id: number | string, is_published: boolean) {
    return http.patch(`/admin/journeys/${id}/toggle-publish`, { is_published });
}

export function saveJourneyHighlight(journeyId: number | string, payload: Record<string, any>) {
    return http.post(`/admin/journeys/${journeyId}/highlights`, payload);
}

export function deleteJourneyHighlight(id: number | string) {
    return http.delete(`/admin/journey-highlights/${id}`);
}

export function saveJourneyItineraryDay(journeyId: number | string, payload: Record<string, any>) {
    return http.post(`/admin/journeys/${journeyId}/itinerary-days`, payload);
}

export function deleteJourneyItineraryDay(id: number | string) {
    return http.delete(`/admin/journey-itinerary-days/${id}`);
}

export function saveJourneyItineraryHighlight(dayId: number | string, payload: Record<string, any>) {
    return http.post(`/admin/journey-itinerary-days/${dayId}/highlights`, payload);
}

export function deleteJourneyItineraryHighlight(id: number | string) {
    return http.delete(`/admin/journey-itinerary-highlights/${id}`);
}

export function saveJourneyPrice(journeyId: number | string, payload: Record<string, any>) {
    return http.post(`/admin/journeys/${journeyId}/prices`, payload);
}

export function deleteJourneyPrice(id: number | string) {
    return http.delete(`/admin/journey-prices/${id}`);
}

export function saveJourneyService(journeyId: number | string, payload: Record<string, any>) {
    return http.post(`/admin/journeys/${journeyId}/services`, payload);
}

export function deleteJourneyService(id: number | string) {
    return http.delete(`/admin/journey-services/${id}`);
}

export function getDepartures(params: Record<string, any> = {}) {
    return http.get('/admin/departures', { params });
}

export function saveJourneyDepartures(journeyId: number | string, departures: JourneyDeparturePayload[]) {
    return http.post(`/admin/journeys/${journeyId}/departures`, { departures });
}

export function updateJourneyDeparture(
    journeyId: number | string,
    departureId: number | string,
    payload: Partial<JourneyDeparturePayload>
) {
    return http.patch(`/admin/journeys/${journeyId}/departures/${departureId}`, payload);
}

export function deleteJourneyDeparture(journeyId: number | string, departureId: number | string) {
    return http.delete(`/admin/journeys/${journeyId}/departures/${departureId}`);
}

export function toggleDepartureActive(id: number | string, is_active?: boolean) {
    return http.patch(`/admin/departures/${id}/toggle-active`, { is_active });
}

// Aliases for backward compatibility
export const saveTrekDepartures = saveJourneyDepartures;
export const deleteTrekDeparture = deleteJourneyDeparture;
export const updateTrekDeparture = updateJourneyDeparture;
