import http from '@/http.config'

export const fetchBookings = async (params = {}) => {
    const res = await http.get('/admin/bookings', { params })
    return res
}

export const fetchBooking = async (id: number | string) => {
    const res = await http.get(`/admin/bookings/${id}`)
    return res.data
}

export const deleteBooking = async (id: number | string) => {
    const res = await http.delete(`/admin/bookings/${id}`)
    return res.data
}
