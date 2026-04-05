import http from '@/http.config'

export interface TrekDeparturePayload {
	start_date: string
	end_date: string
	total_seat: number | string
	cost: number | string
}

export interface TrekDepartureRequest {
	trek_id: number | string | null
	departures: TrekDeparturePayload[]
}

export function saveTrekDepartures(trekId: number | string, payload: TrekDeparturePayload[]) {
	return http.post(`/admin/treks/${trekId}/fixed-departures`, {
		trek_id: trekId,
		departures: payload,
	})
}

export function deleteTrekDeparture(trekId: number | string, departureId: number | string) {
	return http.delete(`/admin/treks/${trekId}/fixed-departures/${departureId}`)
}

export function updateTrekDeparture(
	trekId: number | string,
	departureId: number | string,
	payload: Partial<TrekDeparturePayload> & { start_date: string; end_date: string }
) {
	return http.patch(`/admin/treks/${trekId}/fixed-departures/${departureId}`, payload)
}
