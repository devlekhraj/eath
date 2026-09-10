import http from '@/http.config'

export interface DashboardMetrics {
  total_bookings: number
  total_travellers: number
  total_inquiries: number
  new_inquiries: number
  in_progress_inquiries: number
  resolved_inquiries: number
  total_packages: number
  active_packages: number
  total_destinations: number
  total_departures: number
  upcoming_departures_count: number
  total_guides: number
  total_blogs: number
  total_customers: number
}

export interface RecentBooking {
  id: number
  user_name: string
  user_email: string
  package_name: string
  package_slug: string
  departure_date: string | null
  traveller_count: number
  flight: string | null
  insurance: string | null
  status: string
  created_at: string | null
}

export interface RecentInquiry {
  id: number
  name: string
  email: string
  mobile_no: string
  country: string
  destination: string
  travel_date: string | null
  number_of_people: number | null
  status: string
  message: string
  created_at: string | null
}

export interface UpcomingDeparture {
  id: number
  trek_name: string
  trek_id: number
  start_date: string | null
  end_date: string | null
  cost: string | number
  available_seats: number
  booked_seats: number
  status: string
}

export interface DestinationSummary {
  id: number
  name: string
  slug: string
  packages_count: number
  is_featured: boolean
}

export interface MonthlyTrend {
  month: string
  short_month: string
  bookings: number
  inquiries: number
}

export interface DashboardData {
  metrics: DashboardMetrics
  recent_bookings: RecentBooking[]
  recent_inquiries: RecentInquiry[]
  upcoming_departures: UpcomingDeparture[]
  destinations_summary: DestinationSummary[]
  monthly_trend: MonthlyTrend[]
}

export const fetchDashboardStats = async (): Promise<DashboardData> => {
  const res: any = await http.get('/admin/dashboard')
  return res.data
}
