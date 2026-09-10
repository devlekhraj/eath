<template>
  <v-container fluid class="dashboard-page pa-4 pa-sm-6">
    <!-- Header / Welcome Banner -->
    <div class="mb-6 d-flex flex-column flex-sm-row justify-space-between align-sm-center ga-4">
      <div>
        <div class="d-flex align-center ga-2 mb-1">
          <h1 class="text-h5 font-weight-bold text-slate-800">
            Travel Operations Dashboard
          </h1>
          <v-chip size="small" color="primary" variant="tonal" label class="font-weight-medium">
            Live Overview
          </v-chip>
        </div>
        <p class="text-body-2 text-slate-500 mb-0">
          Real-time monitoring of Himalayan treks, group departures, bookings, and customer inquiries.
        </p>
      </div>

      <!-- Quick Action Controls -->
      <div class="d-flex align-center ga-2 flex-wrap">
        <v-btn variant="outlined" color="primary" prepend-icon="mdi-refresh" :loading="loading" class="text-capitalize"
          @click="loadDashboard">
          Refresh
        </v-btn>

        <v-btn color="primary" prepend-icon="mdi-plus-circle-outline" class="text-capitalize"
          :to="{ name: 'adminBookingForm' }">
          New Booking
        </v-btn>

        <v-btn variant="tonal" color="primary" prepend-icon="mdi-hiking" class="text-capitalize"
          :to="{ name: 'adminPackageForm' }">
          Add Trek
        </v-btn>
      </div>
    </div>

    <!-- Loading Skeleton Overlay -->
    <v-row v-if="loading && !dashboardData">
      <v-col v-for="i in 6" :key="`skel-kpi-${i}`" cols="6" sm="6" md="4" lg="2">
        <v-skeleton-loader type="card" height="110" class="rounded-lg" />
      </v-col>
      <v-col cols="12" lg="8">
        <v-skeleton-loader type="table" height="320" class="rounded-lg" />
      </v-col>
      <v-col cols="12" lg="4">
        <v-skeleton-loader type="article" height="320" class="rounded-lg" />
      </v-col>
    </v-row>

    <!-- Error State -->
    <v-alert v-else-if="error" type="error" variant="tonal" class="mb-6 rounded-lg" closable
      @click:close="error = null">
      <div class="d-flex align-center justify-space-between">
        <span>{{ error }}</span>
        <v-btn size="small" variant="text" color="error" @click="loadDashboard">Retry</v-btn>
      </div>
    </v-alert>

    <!-- Main Dashboard Content -->
    <div v-else-if="dashboardData" class="dashboard-content">
      <!-- 1. KPI Metric Cards -->
      <v-row class="mb-4" dense>
        <!-- Metric 1: Active Bookings -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminBookingPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Bookings</span>
              <v-avatar color="primary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-calendar-check-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_bookings }}
            </div>
            <div class="text-caption text-slate-500 d-flex align-center ga-1">
              <v-icon size="14" color="primary">mdi-account-group</v-icon>
              <span>{{ dashboardData.metrics.total_travellers }} Travellers</span>
            </div>
          </v-card>
        </v-col>

        <!-- Active Inquiries -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminInquiryPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Inquiries</span>
              <v-avatar color="warning" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-email-fast-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_inquiries }}
            </div>
            <div class="text-caption text-warning font-weight-medium d-flex align-center ga-1">
              <v-icon size="14">mdi-alert-circle-outline</v-icon>
              <span>{{ dashboardData.metrics.new_inquiries }} New Leads</span>
            </div>
          </v-card>
        </v-col>

        <!-- Trek Packages -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminPackagePage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Trek Catalog</span>
              <v-avatar color="success" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-hiking</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_packages }}
            </div>
            <div class="text-caption text-success d-flex align-center ga-1">
              <v-icon size="14">mdi-check-circle-outline</v-icon>
              <span>{{ dashboardData.metrics.active_packages }} Published</span>
            </div>
          </v-card>
        </v-col>

        <!-- Fixed Departures -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminPackagePage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Departures</span>
              <v-avatar color="info" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-calendar-range-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_departures }}
            </div>
            <div class="text-caption text-info d-flex align-center ga-1">
              <v-icon size="14">mdi-clock-outline</v-icon>
              <span>{{ dashboardData.metrics.upcoming_departures_count }} Upcoming</span>
            </div>
          </v-card>
        </v-col>

        <!-- Destinations -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminDestinationPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Destinations</span>
              <v-avatar color="secondary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-map-marker-radius-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_destinations }}
            </div>
            <div class="text-caption text-slate-500 d-flex align-center ga-1">
              <v-icon size="14">mdi-image-filter-hdr</v-icon>
              <span>Himalayan Regions</span>
            </div>
          </v-card>
        </v-col>

        <!-- Guides & Staff -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminGuidePage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Field Guides</span>
              <v-avatar color="primary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-account-star-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_guides }}
            </div>
            <div class="text-caption text-slate-500 d-flex align-center ga-1">
              <v-icon size="14">mdi-account-check-outline</v-icon>
              <span>Certified Crew</span>
            </div>
          </v-card>
        </v-col>
      </v-row>

      <!-- 2. Row: Upcoming Group Departures & Regional Destination Distribution -->
      <v-row>
        <!-- Upcoming Group Departures Table -->
        <v-col cols="12" lg="8">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="primary" variant="tonal" rounded>
                  <v-icon size="14">mdi-calendar-clock-outline</v-icon>
                </v-avatar>
                <span class="text-uppercase font-weight-medium text-slate-800"
                  style="font-size: 0.82rem; letter-spacing: 0.03em;">Upcoming Group Departures</span>
              </div>
              <v-btn variant="text" color="primary" size="small" class="text-capitalize"
                :to="{ name: 'adminPackagePage' }">
                View Packages &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text>
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left" style="width: 50px;">SN</th>
                    <th class="text-left">Trek Name</th>
                    <th class="text-left">Dates</th>
                    <th class="text-left">Seats Available</th>
                    <th class="text-left">Cost</th>
                    <th class="text-center" style="width: 100px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.upcoming_departures.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No scheduled upcoming departures found.
                    </td>
                  </tr>
                  <tr v-for="(dep, idx) in dashboardData.upcoming_departures" :key="dep.id">
                    <td>
                      <div style="min-width: max-content;">{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        <router-link :to="{ name: 'adminPackageDetailPage', params: { id: dep.trek_id } }"
                          class="text-primary text-decoration-underline text-capitalize">
                          {{ dep.trek_name }}
                        </router-link>
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;" class="d-flex align-center ga-1 text-caption">
                        <v-icon size="14" color="primary">mdi-calendar-start</v-icon>
                        <span>{{ dep.start_date || 'TBD' }}</span>
                        <span v-if="dep.end_date" class="text-slate-400">→ {{ dep.end_date }}</span>
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;" class="d-flex align-center ga-2">
                        <v-chip size="x-small" label color="cyan-darken-2" variant="tonal">
                          <v-icon start size="12">mdi-seat-passenger</v-icon>
                          {{ dep.available_seats }} seats
                        </v-chip>
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        {{ formatAmount(dep.cost) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div style="min-width: max-content;">
                        <v-chip size="x-small" label class="text-capitalize"
                          :color="dep.status === 'active' ? 'success' : 'warning'">
                          {{ dep.status || 'Active' }}
                        </v-chip>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </v-table>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Destination Regional Distribution -->
        <v-col cols="12" lg="4">
          <v-card class="h-100 d-flex flex-column justify-space-between">
            <div>
              <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
                <div class="d-flex align-center ga-2">
                  <v-avatar size="24" color="primary" variant="tonal" rounded>
                    <v-icon size="14">mdi-compass-outline</v-icon>
                  </v-avatar>
                  <span class="text-uppercase font-weight-medium text-slate-800"
                    style="font-size: 0.82rem; letter-spacing: 0.03em;">Destination Portfolio</span>
                </div>
                <v-btn variant="text" color="primary" size="small" class="text-capitalize"
                  :to="{ name: 'adminDestinationPage' }">
                  Manage
                </v-btn>
              </v-card-title>
              <v-divider />

              <v-card-text>
                <div class="d-flex flex-column ga-2">
                  <div v-for="dest in dashboardData.destinations_summary" :key="dest.id"
                    class="pa-3 rounded-lg border border-slate-100 bg-slate-50/50 mb-2">
                    <div class="d-flex align-center justify-space-between mb-1.5">
                      <router-link :to="{ name: 'admin.destination.detail', params: { id: dest.id } }"
                        class="text-slate-800 font-weight-semibold text-subtitle-2 hover:text-primary transition">
                        {{ dest.name }} Region
                      </router-link>
                      <v-chip size="x-small" label color="primary" variant="flat">
                        {{ dest.packages_count }} {{ dest.packages_count === 1 ? 'Package' : 'Packages' }}
                      </v-chip>
                    </div>
                    <v-progress-linear :model-value="calcDestPercentage(dest.packages_count)" color="primary" height="6"
                      rounded class="bg-slate-200" />
                  </div>
                </div>
              </v-card-text>
            </div>

            <!-- Quick Add Destination Callout -->
            <div>
              <v-divider />
              <div class="pa-4 d-flex align-center justify-space-between">
                <span class="text-caption text-slate-500">
                  Total: {{ dashboardData.metrics.total_destinations }} Regions / {{
                    dashboardData.metrics.total_packages }} Treks
                </span>
                <v-btn size="small" variant="tonal" color="primary" class="text-capitalize"
                  :to="{ name: 'adminDestinationPage' }">
                  Explore Destinations
                </v-btn>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>

      <!-- 3. Row: Recent Bookings & Latest Inquiries -->
      <v-row>
        <!-- Recent Bookings Table -->
        <v-col cols="12" lg="6">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="success" variant="tonal" rounded>
                  <v-icon size="14">mdi-ticket-confirmation-outline</v-icon>
                </v-avatar>
                <span class="text-uppercase font-weight-medium text-slate-800"
                  style="font-size: 0.82rem; letter-spacing: 0.03em;">Recent Bookings</span>
              </div>
              <v-btn variant="text" color="primary" size="small" class="text-capitalize"
                :to="{ name: 'adminBookingPage' }">
                View All &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text>
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left" style="width: 50px;">SN</th>
                    <th class="text-left">Traveller</th>
                    <th class="text-left">Trek Package</th>
                    <th class="text-left">Departure</th>
                    <th class="text-center">Pax</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.recent_bookings.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No recent bookings recorded.
                    </td>
                  </tr>
                  <tr v-for="(booking, idx) in dashboardData.recent_bookings" :key="booking.id">
                    <td>
                      <div style="min-width: max-content;">{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        {{ booking.user_name }}
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        <span class="text-slate-800">
                          {{ booking.package_name }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;" class="text-caption text-slate-600">
                        {{ formatDate(booking.departure_date) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div style="min-width: max-content;">
                        <v-chip size="x-small" label color="primary" variant="tonal">
                          {{ booking.traveller_count }}
                        </v-chip>
                      </div>
                    </td>
                    <td class="text-center">
                      <div style="min-width: max-content;">
                        <v-chip size="x-small" label class="text-capitalize"
                          :color="getBookingStatusColor(booking.status)">
                          {{ booking.status }}
                        </v-chip>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </v-table>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Recent Inquiries Table -->
        <v-col cols="12" lg="6">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="warning" variant="tonal" rounded>
                  <v-icon size="14">mdi-message-text-clock-outline</v-icon>
                </v-avatar>
                <span class="text-uppercase font-weight-medium text-slate-800"
                  style="font-size: 0.82rem; letter-spacing: 0.03em;">Latest Custom Inquiries</span>
              </div>
              <v-btn variant="text" color="primary" size="small" class="text-capitalize"
                :to="{ name: 'adminInquiryPage' }">
                View All &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text>
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left" style="width: 50px;">SN</th>
                    <th class="text-left">Lead Name</th>
                    <th class="text-left">Destination / Request</th>
                    <th class="text-left">Travel Date</th>
                    <th class="text-center">Group</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.recent_inquiries.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No inquiries submitted yet.
                    </td>
                  </tr>
                  <tr v-for="(inq, idx) in dashboardData.recent_inquiries" :key="inq.id">
                    <td>
                      <div style="min-width: max-content;">{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        {{ inq.name || 'Anonymous' }}
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;">
                        <span class="text-slate-800">
                          {{ inq.destination || 'Custom Tour' }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div style="min-width: max-content;" class="text-caption text-slate-600">
                        {{ formatDate(inq.travel_date) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div style="min-width: max-content;">
                        <v-chip size="x-small" label variant="tonal" color="secondary">
                          <v-icon start size="12">mdi-account</v-icon>
                          {{ inq.number_of_people || 1 }}
                        </v-chip>
                      </div>
                    </td>
                    <td class="text-center">
                      <div style="min-width: max-content;">
                        <v-chip size="x-small" label class="text-capitalize" :color="getInquiryStatusColor(inq.status)">
                          {{ inq.status }}
                        </v-chip>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </v-table>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>

      <!-- 4. Row: Operational Trends & Quick Resource Shortcuts -->
      <v-row>
        <!-- Monthly Lead & Booking Trends Chart -->
        <v-col cols="12" lg="8">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="primary" variant="tonal" rounded>
                  <v-icon size="14">mdi-chart-timeline-variant</v-icon>
                </v-avatar>
                <span class="text-uppercase font-weight-medium text-slate-800"
                  style="font-size: 0.82rem; letter-spacing: 0.03em;">Monthly Booking & Lead Inflow</span>
              </div>
              <div class="d-flex align-center ga-3 text-caption">
                <div class="d-flex align-center ga-1">
                  <span class="d-inline-block rounded-circle"
                    style="width: 8px; height: 8px; background: #1976D2;"></span>
                  <span>Bookings</span>
                </div>
                <div class="d-flex align-center ga-1">
                  <span class="d-inline-block rounded-circle"
                    style="width: 8px; height: 8px; background: #f59e0b;"></span>
                  <span>Inquiries</span>
                </div>
              </div>
            </v-card-title>
            <v-divider />

            <!-- Custom Clean Responsive Bar Chart -->
            <v-card-text>
              <div class="d-flex justify-space-around align-end" style="height: 180px;">
                <div v-for="(trend, i) in dashboardData.monthly_trend" :key="`trend-${i}`"
                  class="d-flex flex-column align-center" style="width: 14%;">
                  <div class="d-flex align-end ga-1 mb-2" style="height: 130px;">
                    <!-- Bookings Bar -->
                    <div class="rounded-t-sm transition-swing" :style="{
                      width: '16px',
                      height: `${calcBarHeight(trend.bookings)}px`,
                      backgroundColor: '#1976D2',
                      minHeight: '4px'
                    }" :title="`${trend.bookings} Bookings in ${trend.month}`"></div>
                    <!-- Inquiries Bar -->
                    <div class="rounded-t-sm transition-swing" :style="{
                      width: '16px',
                      height: `${calcBarHeight(trend.inquiries)}px`,
                      backgroundColor: '#f59e0b',
                      minHeight: '4px'
                    }" :title="`${trend.inquiries} Inquiries in ${trend.month}`"></div>
                  </div>
                  <span class="text-caption text-slate-500 font-weight-medium">
                    {{ trend.short_month }}
                  </span>
                </div>
              </div>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Agency Content & Fleet Overview -->
        <v-col cols="12" lg="4">
          <v-card class="h-100 d-flex flex-column justify-space-between">
            <div>
              <v-card-title class="d-flex align-center ga-2 px-4 py-3">
                <v-avatar size="24" color="info" variant="tonal" rounded>
                  <v-icon size="14">mdi-folder-cog-outline</v-icon>
                </v-avatar>
                <span class="text-uppercase font-weight-medium text-slate-800"
                  style="font-size: 0.82rem; letter-spacing: 0.03em;">Content & Resource Hub</span>
              </v-card-title>
              <v-divider />

              <v-card-text>
                <v-list density="compact" class="pa-0">
                  <v-list-item prepend-icon="mdi-post-outline" title="Travel Articles & Safety"
                    :subtitle="`${dashboardData.metrics.total_blogs} Articles Published`"
                    class="px-2 rounded-lg border mb-2" link :to="{ name: 'adminBlogPage' }">
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>

                  <v-list-item prepend-icon="mdi-account-group-outline" title="Customer Registry"
                    :subtitle="`${dashboardData.metrics.total_customers} Registered Users`"
                    class="px-2 rounded-lg border mb-2" link :to="{ name: 'adminCustomerPage' }">
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>

                  <v-list-item prepend-icon="mdi-image-multiple-outline" title="Media & Gallery"
                    subtitle="Trek photos, banners & media assets" class="px-2 rounded-lg border mb-2" link
                    :to="{ name: 'adminGalleryPage' }">
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>
                </v-list>
              </v-card-text>
            </div>

            <!-- Fast Status Summary Footer -->
            <div>
              <v-divider />
              <div class="pa-4 d-flex align-center justify-space-between text-caption text-slate-600">
                <span>Inquiry Pipeline Health:</span>
                <span class="font-weight-semibold text-success">
                  {{ dashboardData.metrics.new_inquiries === 0 ? 'All Inquiries Answered' :
                    `${dashboardData.metrics.new_inquiries}
                  Awaiting Reply` }}
                </span>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { fetchDashboardStats } from '@/api/dashboard.api'
import { formatDate, formatAmount } from '@utils/utils'

const loading = ref(true)
const error = ref(null)
const dashboardData = ref(null)

const loadDashboard = async () => {
  try {
    loading.value = true
    error.value = null
    const res = await fetchDashboardStats()
    dashboardData.value = res
  } catch (err) {
    console.error('Failed to load dashboard data:', err)
    error.value = 'Failed to load dashboard data. Please check your connection and try again.'
  } finally {
    loading.value = false
  }
}

const calcDestPercentage = (count) => {
  if (!dashboardData.value?.metrics.total_packages) return 0
  const total = dashboardData.value.metrics.total_packages
  return Math.min(100, Math.round((count / total) * 100))
}

const calcBarHeight = (val) => {
  if (!val || val <= 0) return 4
  const max = 10
  return Math.max(8, Math.min(120, Math.round((val / max) * 120)))
}

const getBookingStatusColor = (status) => {
  const map = {
    confirmed: 'success',
    pending: 'warning',
    cancelled: 'error',
    completed: 'info',
  }
  return map[status?.toLowerCase()] || 'primary'
}

const getInquiryStatusColor = (status) => {
  const map = {
    resolved: 'success',
    new: 'amber-darken-2',
    in_progress: 'info',
  }
  return map[status?.toLowerCase()] || 'secondary'
}

onMounted(() => {
  loadDashboard()
})
</script>
