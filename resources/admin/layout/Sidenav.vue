<script setup>
import { ref } from 'vue'

const menuGroups = ref([
  {
    groupName: 'Dashboard',
    items: [
      { name: 'Dashboard', icon: 'fa-solid fa-chart-line', route: 'adminDashboardPage' },
    ],
  },
  {
    groupName: 'Academic',
    items: [
      { name: 'Academic Years', icon: 'fa-solid fa-calendar-days', route: 'academicYearsPage' },
      { name: 'Classes & Sections', icon: 'fa-solid fa-school', route: 'classesSectionsPage' },
      { name: 'Subjects', icon: 'fa-solid fa-book-open-reader', route: 'subjectsPage' },
      { name: 'Class Routine', icon: 'fa-solid fa-clock', route: 'classRoutinePage' },
      { name: 'Exam Setup', icon: 'fa-solid fa-clipboard-check', route: 'examSetupPage' },
    ],
  },
  {
    groupName: 'Students',
    items: [
      { name: 'Student List', icon: 'fa-solid fa-users', route: 'studentsPage' },
      { name: 'Add Student', icon: 'fa-solid fa-user-plus', route: 'addStudentPage' },
      { name: 'Student Promotion', icon: 'fa-solid fa-arrow-up-right-dots', route: 'promotionPage' },
    ],
  },
  {
    groupName: 'Enrollment',
    items: [
      { name: 'Admission Form', icon: 'fa-solid fa-address-card', route: 'admissionFormPage' },
      { name: 'Admission Enquiry', icon: 'fa-solid fa-question-circle', route: 'admissionEnquiryPage' },
    ],
  },
  {
    groupName: 'Teachers',
    items: [
      { name: 'Teacher Directory', icon: 'fa-solid fa-chalkboard-teacher', route: 'teachersPage' },
      { name: 'Assign Subjects', icon: 'fa-solid fa-user-edit', route: 'assignSubjectsPage' },
    ],
  },
  {
    groupName: 'Attendance',
    items: [
      { name: 'Student Attendance', icon: 'fa-solid fa-user-check', route: 'studentAttendancePage' },
      { name: 'Teacher Attendance', icon: 'fa-solid fa-id-badge', route: 'teacherAttendancePage' },
      { name: 'Attendance Report', icon: 'fa-solid fa-clipboard-list', route: 'attendanceReportPage' },
    ],
  },
  {
    groupName: 'Notice & Events',
    items: [
      { name: 'Notices', icon: 'fa-solid fa-bell', route: 'noticesPage' },
      { name: 'Events', icon: 'fa-solid fa-calendar-check', route: 'eventsPage' },
    ],
  },
  {
    groupName: 'Notifications',
    items: [
      { name: 'Send Notification', icon: 'fa-solid fa-paper-plane', route: 'sendNotificationPage' },
      { name: 'Templates', icon: 'fa-solid fa-file-signature', route: 'notificationTemplatesPage' },
    ],
  },
  {
    groupName: 'HR',
    items: [
      { name: 'Staff Directory', icon: 'fa-solid fa-address-book', route: 'staffDirectoryPage' },
      { name: 'Leave Management', icon: 'fa-solid fa-business-time', route: 'leaveManagementPage' },
      { name: 'Attendance', icon: 'fa-solid fa-calendar-check', route: 'staffAttendancePage' },
    ],
  },
  {
    groupName: 'Account',
    items: [
      { name: 'Chart of Accounts', icon: 'fa-solid fa-diagram-project', route: 'chartOfAccountsPage' },
      { name: 'Income & Expenses', icon: 'fa-solid fa-money-bill-trend-up', route: 'incomeExpensePage' },
      { name: 'Vouchers', icon: 'fa-solid fa-file-invoice', route: 'vouchersPage' },
    ],
  },
  {
    groupName: 'Fees',
    items: [
      { name: 'Fee Structure', icon: 'fa-solid fa-layer-group', route: 'feeStructurePage' },
      { name: 'Invoices', icon: 'fa-solid fa-receipt', route: 'feeInvoicesPage' },
      { name: 'Collection Report', icon: 'fa-solid fa-coins', route: 'feeCollectionReportPage' },
    ],
  },
  {
    groupName: 'Finances',
    items: [
      { name: 'Budgets', icon: 'fa-solid fa-sack-dollar', route: 'budgetsPage' },
      { name: 'Vendor Payments', icon: 'fa-solid fa-people-carry-box', route: 'vendorPaymentsPage' },
      { name: 'Donations & Grants', icon: 'fa-solid fa-hand-holding-dollar', route: 'donationsGrantsPage' },
    ],
  },
  {
    groupName: 'Payrolls',
    items: [
      { name: 'Salary Setup', icon: 'fa-solid fa-file-invoice-dollar', route: 'salarySetupPage' },
      { name: 'Generate Payroll', icon: 'fa-solid fa-cash-register', route: 'generatePayrollPage' },
      { name: 'Payslips', icon: 'fa-solid fa-money-check-dollar', route: 'payslipsPage' },
    ],
  },
  {
    groupName: 'Reports',
    items: [
      { name: 'Student Reports', icon: 'fa-solid fa-user-graduate', route: 'studentReportsPage' },
      { name: 'Fee Reports', icon: 'fa-solid fa-file-invoice', route: 'feeReportsPage' },
      { name: 'Staff Reports', icon: 'fa-solid fa-user-tie', route: 'staffReportsPage' },
      { name: 'Academic Reports', icon: 'fa-solid fa-chart-pie', route: 'academicReportsPage' },
    ],
  },
])

</script>

<template>
  <div
    style="position: fixed; top:0; border-bottom: 1px solid #ececec; width:100%; padding: 10px 20px; background-color: #fff">
    <h4>Dashboard</h4>
  </div>
  <nav class="sidebar px-4 py-4 py-14" id="navList">
    <div>
      <div style="height: calc(100vh - 90px); overflow-y: auto;">
        <div v-for="group in menuGroups" :key="group.groupName" class="menu-group mb-3">
          <p class="group-title">{{ group.groupName }}</p>
          <ul>
            <li v-for="item in group.items" :key="item.route" class="menu-item">
              <router-link :to="{ name: item.route }" class="flex items-center gap-2">
                <i :class="item.icon" class="menu-icon"></i>
                <span class="menu-text">{{ item.name }}</span>
              </router-link>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>

</template>


<style scoped lang="scss">
.group-title {
  font-size: 0.9rem;
  font-weight: 500;
  padding-bottom: 6px;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;

  li {
    padding: .65rem .75rem !important;

    color: #707782;
    font-size: .875rem !important;
    line-height: 1rem !important;
    font-weight: 500 !important;

    i {
      width: 25px;
    }

    &:hover {
      background-color: #f0f0f0;
      cursor: pointer;
    }
  }
}

#navList {
  width: 16rem;
}
</style>
