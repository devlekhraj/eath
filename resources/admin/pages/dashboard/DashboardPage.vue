<template>
  <v-container fluid>
    <!-- Key Stats -->
    <v-row>
      <v-col v-for="stat in stats" :key="stat.title" cols="12" sm="6" md="3">
        <v-card flat class="rounded-lg">
          <v-card-text class="d-flex justify-space-between align-center">
            <div>
              <p class="text-grey-darken-1">{{ stat.title }}</p>
              <h1 class="my-1">{{ stat.value }}</h1>
            </div>
            <v-avatar :color="stat.color" size="60" rounded="lg">
              <v-icon color="white" size="30">{{ stat.icon }}</v-icon>
            </v-avatar>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <!-- Announcements, Events, Revenue Summary -->
    <v-row>
      <!-- Announcements -->
      <v-col cols="12" md="4">
        <v-card flat class="rounded-lg" style="height: 100%">
          <v-card-title>Recent Announcements</v-card-title>
          <v-list dense>
            <v-list-item v-for="item in announcements" :key="item.id">
              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
                <v-list-item-subtitle>{{ item.date }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-col>

      <!-- Upcoming Events -->
      <v-col cols="12" md="4">
        <v-card flat class="rounded-lg" style="height: 100%">
          <v-card-title>Upcoming Events</v-card-title>
          <v-list dense>
            <v-list-item v-for="event in events" :key="event.id">
              <v-list-item-content>
                <v-list-item-title>{{ event.title }}</v-list-item-title>
                <v-list-item-subtitle>{{ event.date }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-col>

      <!-- Revenue Summary -->
      <v-col cols="12" md="4">
        <v-card flat class="rounded-lg" style="height: 100%">
          <v-card-title>Revenue Summary</v-card-title>
          <v-list dense>
            <v-list-item v-for="rev in revenueSummary" :key="rev.label">
              <template v-slot:prepend>
                <v-avatar :color="rev.color">
                  <v-icon color="white">{{ rev.icon }}</v-icon>
                </v-avatar>
              </template>
              <v-list-item-content>
                <v-list-item-title>{{ rev.label }}</v-list-item-title>
                <v-list-item-subtitle class="font-weight-bold">{{ rev.value }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-col>
    </v-row>

    <!-- Bookings Status and Staff Attendance -->
    <v-row>
      <v-col cols="12" md="6">
        <v-card flat class="rounded-lg" style="height: 350px;">
          <v-card-title>Booking Status Overview</v-card-title>
          <v-card-text>
            <v-list dense>
              <v-list-item v-for="booking in bookingsStatus" :key="booking.name" class="d-flex justify-space-between">
                <v-list-item-content>
                  <v-list-item-title>{{ booking.name }}</v-list-item-title>
                </v-list-item-content>
                <v-chip :color="booking.color" label size="small">{{ booking.count }}</v-chip>
              </v-list-item>
            </v-list>
          </v-card-text>
        </v-card>
      </v-col>

      <v-col cols="12" md="6">
        <v-card flat class="rounded-lg" style="height: 350px;">
          <v-card-title>Staff Attendance</v-card-title>
          <v-card-text>
            <v-list dense>
              <v-list-item v-for="staff in staffAttendance" :key="staff.name">
                <v-list-item-content>
                  <v-list-item-title>{{ staff.name }}</v-list-item-title>
                </v-list-item-content>
                <v-chip :color="staff.statusColor" label size="small" class="ma-2">{{ staff.status }}</v-chip>
              </v-list-item>
            </v-list>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <!-- Optional: Revenue Trend Placeholder -->
    <v-row>
      <v-col cols="12">
        <v-card flat class="rounded-lg" style="height: 300px;">
          <v-card-title>Revenue Trends</v-card-title>
          <v-card-text class="d-flex justify-center align-center"
            style="height: 100%; background-color: #f9f9f9; border-radius: 8px;">
            <p class="text-grey-darken-1">[Revenue Chart Placeholder]</p>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      stats: [
        { title: 'Total Bookings', value: '3,452', icon: 'mdi-calendar-check', color: 'primary' },
        { title: 'Active Packages', value: '58', icon: 'mdi-package-variant', color: 'success' },
        { title: 'Customer Reviews', value: '1,234', icon: 'mdi-star-circle', color: 'warning' },
        { title: 'Revenue This Month', value: '$123,456', icon: 'mdi-cash-multiple', color: 'info' },
      ],

      announcements: [
        { id: 'A001', title: 'New Bali Package Launched!', date: '2025-07-01' },
        { id: 'A002', title: 'Summer Sale: Up to 30% Off', date: '2025-06-20' },
        { id: 'A003', title: 'Travel Advisory Updated', date: '2025-06-15' },
      ],

      events: [
        { id: 'E001', title: 'Travel Expo 2025', date: '2025-07-10' },
        { id: 'E002', title: 'Webinar: Travel Safety Tips', date: '2025-07-25' },
        { id: 'E003', title: 'Holiday - Independence Day', date: '2025-08-01' },
      ],

      bookingsStatus: [
        { name: 'Confirmed', count: 234, color: 'success' },
        { name: 'Pending', count: 56, color: 'warning' },
        { name: 'Cancelled', count: 12, color: 'error' },
      ],

      staffAttendance: [
        { name: 'Sita Lama (Customer Support)', status: 'Present', statusColor: 'success' },
        { name: 'Ramesh Gurung (Accounts)', status: 'Absent', statusColor: 'error' },
        { name: 'Gita Rana (Marketing)', status: 'Present', statusColor: 'success' },
      ],

      revenueSummary: [
        { label: 'Total Revenue (This Month)', value: '$150,000', icon: 'mdi-cash-multiple', color: 'success' },
        { label: 'Pending Payments', value: '$15,000', icon: 'mdi-alert-circle', color: 'warning' },
        { label: 'Discounts Given', value: '$5,000', icon: 'mdi-tag-heart', color: 'info' },
        { label: 'Avg. Booking Value', value: '$1,200', icon: 'mdi-currency-usd', color: 'primary' },
      ],
    };
  },
};
</script>
