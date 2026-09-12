<template>
  <v-container fluid class="dashboard-page pa-4 pa-sm-6">
    <!-- Header / Welcome Banner -->
    <div class="mb-6 d-flex flex-column flex-sm-row justify-space-between align-sm-center ga-4">
      <div>
        <div class="d-flex align-center ga-2 mb-1">
          <h1 class="text-h5 font-weight-bold text-slate-800">
            Website Operations Dashboard
          </h1>
          <v-chip size="small" color="primary" variant="tonal" class="font-weight-medium">
            Live Operations
          </v-chip>
        </div>
        <p class="text-body-2 text-slate-500 mb-0">
          Real-time overview of journeys, departures, planner submissions, leads, and content.
        </p>
      </div>

      <!-- Quick Action Controls -->
      <div class="d-flex align-center ga-2 flex-wrap">
        <v-btn
          variant="outlined"
          color="primary"
          prepend-icon="mdi-refresh"
          :loading="loading"
          class="text-capitalize"
          @click="loadDashboard"
        >
          Refresh
        </v-btn>

        <v-btn
          color="primary"
          prepend-icon="mdi-calendar-check-outline"
          class="text-capitalize"
          :to="{ name: 'adminPlannerSubmissionPage' }"
        >
          Planner Requests
        </v-btn>

        <v-btn
          variant="tonal"
          color="primary"
          prepend-icon="mdi-hiking"
          class="text-capitalize"
          :to="{ name: 'adminJourneyForm' }"
        >
          Add Journey
        </v-btn>
      </div>
    </div>

    <!-- Loading Skeleton Overlay -->
    <v-row v-if="loading && !dashboardData">
      <v-col v-for="i in 6" :key="`skel-kpi-${i}`" cols="6" sm="6" md="4" lg="2">
        <v-skeleton-loader type="card" height="110" class="border" />
      </v-col>
      <v-col cols="12" lg="8">
        <v-skeleton-loader type="table" height="320" class="border" />
      </v-col>
      <v-col cols="12" lg="4">
        <v-skeleton-loader type="article" height="320" class="border" />
      </v-col>
    </v-row>

    <!-- Error State -->
    <v-alert
      v-else-if="error"
      type="error"
      variant="tonal"
      class="mb-6"
      closable
      @click:close="error = null"
    >
      <div class="d-flex align-center justify-space-between">
        <span>{{ error }}</span>
        <v-btn size="small" variant="text" color="error" @click="loadDashboard">Retry</v-btn>
      </div>
    </v-alert>

    <!-- Main Dashboard Content -->
    <div v-else-if="dashboardData" class="dashboard-content">
      <!-- 1. KPI Metric Cards -->
      <v-row class="mb-4" dense>
        <!-- Metric 1: Journeys -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminJourneyPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Journeys</span>
              <v-avatar color="primary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-hiking</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_journeys ?? dashboardData.metrics.total_packages }}
            </div>
            <div class="text-caption text-success d-flex align-center ga-1">
              <v-icon size="14">mdi-check-circle-outline</v-icon>
              <span>{{ dashboardData.metrics.published_journeys ?? dashboardData.metrics.active_packages }} Published</span>
            </div>
          </v-card>
        </v-col>

        <!-- Metric 2: Departures -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminDeparturePage' }">
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

        <!-- Metric 3: Planner Submissions -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminPlannerSubmissionPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Planner</span>
              <v-avatar color="primary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-calendar-check-outline</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.total_planner_submissions ?? dashboardData.metrics.total_bookings }}
            </div>
            <div class="text-caption text-warning font-weight-medium d-flex align-center ga-1">
              <v-icon size="14">mdi-alert-circle-outline</v-icon>
              <span>{{ dashboardData.metrics.new_planner_submissions ?? 0 }} New Leads</span>
            </div>
          </v-card>
        </v-col>

        <!-- Metric 4: Inquiries -->
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

        <!-- Metric 5: Destinations -->
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
              <span>{{ dashboardData.metrics.active_destinations }} Active Regions</span>
            </div>
          </v-card>
        </v-col>

        <!-- Metric 6: Subscribers -->
        <v-col cols="6" sm="6" md="4" lg="2">
          <v-card class="pa-4 h-100" :to="{ name: 'adminNewsletterSubscriptionPage' }">
            <div class="d-flex align-center justify-space-between mb-2">
              <span class="text-caption font-weight-medium text-slate-500 text-uppercase">Subscribers</span>
              <v-avatar color="primary" variant="tonal" size="30" rounded>
                <v-icon size="16">mdi-email-newsletter</v-icon>
              </v-avatar>
            </div>
            <div class="text-h5 font-weight-bold text-slate-900 mb-1">
              {{ dashboardData.metrics.newsletter_subscribers }}
            </div>
            <div class="text-caption text-slate-500 d-flex align-center ga-1">
              <v-icon size="14">mdi-account-check-outline</v-icon>
              <span>Active List</span>
            </div>
          </v-card>
        </v-col>
      </v-row>

      <!-- 2. Row: Upcoming Group Departures & Regional Destination Distribution -->
      <v-row>
        <!-- Upcoming Group Departures Table -->
        <v-col cols="12" lg="8">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="primary" variant="tonal" rounded>
                  <v-icon size="14">mdi-calendar-clock-outline</v-icon>
                </v-avatar>
                <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                  Upcoming Group Departures
                </span>
              </div>
              <v-btn
                variant="text"
                color="primary"
                size="small"
                class="text-capitalize"
                :to="{ name: 'adminDeparturePage' }"
              >
                View Departures &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text class="pa-0">
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left">SN</th>
                    <th class="text-left">Journey</th>
                    <th class="text-left">Dates</th>
                    <th class="text-left">Seats Available</th>
                    <th class="text-left">Cost</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.upcoming_departures?.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No scheduled upcoming departures found.
                    </td>
                  </tr>
                  <tr v-for="(dep, idx) in dashboardData.upcoming_departures" :key="dep.id">
                    <td>
                      <div>{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div>
                        <router-link
                          :to="{ name: 'adminJourneyDetailPage', params: { id: dep.journey_id } }"
                          class="text-primary text-decoration-underline"
                        >
                          {{ dep.journey_name }}
                        </router-link>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-center ga-1 text-caption">
                        <v-icon size="14" color="primary">mdi-calendar-start</v-icon>
                        <span>{{ dep.start_date || 'TBD' }}</span>
                        <span v-if="dep.end_date" class="text-slate-400">→ {{ dep.end_date }}</span>
                      </div>
                    </td>
                    <td>
                      <div>
                        <v-chip size="x-small" color="secondary" variant="tonal">
                          <v-icon start size="12">mdi-seat-passenger</v-icon>
                          {{ dep.available_seats }} / {{ dep.total_seats }} seats
                        </v-chip>
                      </div>
                    </td>
                    <td>
                      <div>
                        {{ formatAmount(dep.price_minor) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div>
                        <v-chip
                          size="x-small"
                          class="text-uppercase"
                          :color="getStatusColor(dep.status)"
                        >
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
              <v-card-title class="d-flex align-center justify-space-between pa-3">
                <div class="d-flex align-center ga-2">
                  <v-avatar size="24" color="primary" variant="tonal" rounded>
                    <v-icon size="14">mdi-compass-outline</v-icon>
                  </v-avatar>
                  <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                    Destination Portfolio
                  </span>
                </div>
                <v-btn
                  variant="text"
                  color="primary"
                  size="small"
                  class="text-capitalize"
                  :to="{ name: 'adminDestinationPage' }"
                >
                  Manage
                </v-btn>
              </v-card-title>
              <v-divider />

              <v-card-text>
                <div class="d-flex flex-column ga-2">
                  <div
                    v-for="dest in dashboardData.destinations_summary"
                    :key="dest.id"
                    class="pa-3 rounded-lg border bg-slate-50 mb-2"
                  >
                    <div class="d-flex align-center justify-space-between mb-1">
                      <router-link
                        :to="{ name: 'admin.destination.detail', params: { id: dest.id } }"
                        class="text-slate-800 font-weight-medium text-subtitle-2 hover:text-primary transition"
                      >
                        {{ dest.name }}
                      </router-link>
                      <v-chip size="x-small" color="primary" variant="flat">
                        {{ dest.journeys_count }} {{ dest.journeys_count === 1 ? 'Journey' : 'Journeys' }}
                      </v-chip>
                    </div>
                    <v-progress-linear
                      :model-value="calcDestPercentage(dest.journeys_count)"
                      color="primary"
                      height="6"
                      class="bg-slate-200"
                    />
                  </div>
                </div>
              </v-card-text>
            </div>

            <div>
              <v-divider />
              <div class="pa-4 d-flex align-center justify-space-between">
                <span class="text-caption text-slate-500">
                  {{ dashboardData.metrics.total_destinations }} Regions · {{ dashboardData.metrics.total_journeys }} Journeys
                </span>
                <v-btn
                  size="small"
                  variant="tonal"
                  color="primary"
                  class="text-capitalize"
                  :to="{ name: 'adminDestinationPage' }"
                >
                  Explore Regions
                </v-btn>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>

      <!-- 3. Row: Recent Planner Submissions & Latest Inquiries -->
      <v-row class="mt-2">
        <!-- Recent Planner Submissions Table -->
        <v-col cols="12" lg="6">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="success" variant="tonal" rounded>
                  <v-icon size="14">mdi-ticket-confirmation-outline</v-icon>
                </v-avatar>
                <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                  Recent Planner Requests
                </span>
              </div>
              <v-btn
                variant="text"
                color="primary"
                size="small"
                class="text-capitalize"
                :to="{ name: 'adminPlannerSubmissionPage' }"
              >
                View All &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text class="pa-0">
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left">SN</th>
                    <th class="text-left">Traveler</th>
                    <th class="text-left">Journey</th>
                    <th class="text-left">Departure</th>
                    <th class="text-center">Party</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.recent_planner_submissions?.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No recent planner submissions recorded.
                    </td>
                  </tr>
                  <tr v-for="(req, idx) in dashboardData.recent_planner_submissions" :key="req.id">
                    <td>
                      <div>{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div>
                        <span class="text-slate-800">{{ req.contact_name || req.user_name }}</span>
                      </div>
                    </td>
                    <td>
                      <div>
                        <span class="text-slate-800">
                          {{ req.journey_name || req.package_name }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="text-caption text-slate-600">
                        {{ formatDate(req.departure_date) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div>
                        <v-chip size="x-small" color="primary" variant="tonal">
                          {{ req.traveller_count }}
                        </v-chip>
                      </div>
                    </td>
                    <td class="text-center">
                      <div>
                        <v-chip
                          size="x-small"
                          class="text-uppercase"
                          :color="getStatusColor(req.status)"
                        >
                          {{ req.status }}
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
            <v-card-title class="d-flex align-center justify-space-between pa-3">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="warning" variant="tonal" rounded>
                  <v-icon size="14">mdi-message-text-clock-outline</v-icon>
                </v-avatar>
                <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                  Latest Inquiries
                </span>
              </div>
              <v-btn
                variant="text"
                color="primary"
                size="small"
                class="text-capitalize"
                :to="{ name: 'adminInquiryPage' }"
              >
                View All &rarr;
              </v-btn>
            </v-card-title>
            <v-divider />

            <v-card-text class="pa-0">
              <v-table>
                <thead>
                  <tr>
                    <th class="text-left">SN</th>
                    <th class="text-left">Lead Name</th>
                    <th class="text-left">Subject / Destination</th>
                    <th class="text-left">Received</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="!dashboardData.recent_inquiries?.length">
                    <td colspan="6" class="text-center py-6 text-slate-400">
                      No inquiries submitted yet.
                    </td>
                  </tr>
                  <tr v-for="(inq, idx) in dashboardData.recent_inquiries" :key="inq.id">
                    <td>
                      <div>{{ idx + 1 }}</div>
                    </td>
                    <td>
                      <div>
                        <span class="text-slate-800">{{ inq.name || 'Anonymous' }}</span>
                      </div>
                    </td>
                    <td>
                      <div>
                        <span class="text-slate-800">
                          {{ inq.destination || inq.subject || 'General Inquiry' }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="text-caption text-slate-600">
                        {{ formatDate(inq.created_at) }}
                      </div>
                    </td>
                    <td class="text-center">
                      <div>
                        <v-chip size="x-small" class="text-uppercase" variant="tonal" color="secondary">
                          {{ inq.type }}
                        </v-chip>
                      </div>
                    </td>
                    <td class="text-center">
                      <div>
                        <v-chip
                          size="x-small"
                          class="text-uppercase"
                          :color="getStatusColor(inq.status)"
                        >
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
      <v-row class="mt-2">
        <!-- Monthly Inflow Chart -->
        <v-col cols="12" lg="8">
          <v-card class="h-100">
            <v-card-title class="d-flex align-center justify-space-between pa-3">
              <div class="d-flex align-center ga-2">
                <v-avatar size="24" color="primary" variant="tonal" rounded>
                  <v-icon size="14">mdi-chart-timeline-variant</v-icon>
                </v-avatar>
                <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                  Monthly Planner & Inquiries Inflow
                </span>
              </div>
              <div class="d-flex align-center ga-3 text-caption">
                <div class="d-flex align-center ga-1">
                  <span class="d-inline-block" style="width: 8px; height: 8px; background: #0284c7;"></span>
                  <span>Planner</span>
                </div>
                <div class="d-flex align-center ga-1">
                  <span class="d-inline-block" style="width: 8px; height: 8px; background: #f59e0b;"></span>
                  <span>Inquiries</span>
                </div>
              </div>
            </v-card-title>
            <v-divider />

            <v-card-text>
              <div class="d-flex justify-space-around align-end" style="height: 180px;">
                <div
                  v-for="(trend, i) in dashboardData.monthly_trend"
                  :key="`trend-${i}`"
                  class="d-flex flex-column align-center"
                  style="width: 14%;"
                >
                  <div class="d-flex align-end ga-1 mb-2" style="height: 130px;">
                    <!-- Planner Bar -->
                    <div
                      class="rounded-t-sm transition-swing"
                      :style="{
                        width: '16px',
                        height: `${calcBarHeight(trend.planner_submissions ?? trend.bookings)}px`,
                        backgroundColor: '#0284c7',
                        minHeight: '4px'
                      }"
                      :title="`${trend.planner_submissions ?? trend.bookings} Planner submissions in ${trend.month}`"
                    />
                    <!-- Inquiries Bar -->
                    <div
                      class="rounded-t-sm transition-swing"
                      :style="{
                        width: '16px',
                        height: `${calcBarHeight(trend.inquiries)}px`,
                        backgroundColor: '#f59e0b',
                        minHeight: '4px'
                      }"
                      :title="`${trend.inquiries} Inquiries in ${trend.month}`"
                    />
                  </div>
                  <span class="text-caption text-slate-500 font-weight-medium">
                    {{ trend.short_month }}
                  </span>
                </div>
              </div>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Content & Operations Hub -->
        <v-col cols="12" lg="4">
          <v-card class="h-100 d-flex flex-column justify-space-between">
            <div>
              <v-card-title class="d-flex align-center ga-2 pa-3 text-primary">
                <v-avatar size="24" color="info" variant="tonal" rounded>
                  <v-icon size="14">mdi-folder-cog-outline</v-icon>
                </v-avatar>
                <span class=" font-weight-medium text-slate-800" style="letter-spacing: 0.03em;">
                  Editorial & Operations Hub
                </span>
              </v-card-title>
              <v-divider />

              <v-card-text>
                <v-list density="compact" class="pa-0">
                  <v-list-item
                    prepend-icon="mdi-post-outline"
                    title="Articles & Stories"
                    :subtitle="`${dashboardData.metrics.published_articles ?? dashboardData.metrics.total_articles} Articles Published`"
                    class="px-2 rounded-lg border mb-2"
                    link
                    :to="{ name: 'adminArticlePage' }"
                  >
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>

                  <v-list-item
                    prepend-icon="mdi-image-multiple-outline"
                    title="Media Manager"
                    subtitle="Photos, galleries, and website assets"
                    class="px-2 rounded-lg border mb-2"
                    link
                    :to="{ name: 'adminMediaAssetPage' }"
                  >
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>

                  <v-list-item
                    prepend-icon="mdi-email-newsletter"
                    title="Newsletter Subscribers"
                    :subtitle="`${dashboardData.metrics.newsletter_subscribers} Active Subscribers`"
                    class="px-2 rounded-lg border mb-2"
                    link
                    :to="{ name: 'adminNewsletterSubscriptionPage' }"
                  >
                    <template #append>
                      <v-icon size="16">mdi-chevron-right</v-icon>
                    </template>
                  </v-list-item>
                </v-list>
              </v-card-text>
            </div>

            <div>
              <v-divider />
              <div class="pa-4 d-flex align-center justify-space-between text-caption text-slate-600">
                <span>Inquiry Pipeline Health:</span>
                <span class="font-weight-medium text-success">
                  {{ dashboardData.metrics.new_inquiries === 0 ? 'All Inquiries Answered' : `${dashboardData.metrics.new_inquiries} Awaiting Reply` }}
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
import { formatDate, formatAmount, getStatusColor } from '@utils/utils'

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
  const total = dashboardData.value?.metrics?.total_journeys || dashboardData.value?.metrics?.total_packages || 1
  return Math.min(100, Math.round((count / total) * 100))
}

const calcBarHeight = (val) => {
  if (!val || val <= 0) return 4
  const max = 10
  return Math.max(8, Math.min(120, Math.round((val / max) * 120)))
}

onMounted(() => {
  loadDashboard()
})
</script>

<style scoped>
.dashboard-content {
  animation: fadeIn 0.25s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
</style>
