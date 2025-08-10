<script setup>
import { ref, computed, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useDisplay } from 'vuetify'
import { useAuthStore } from '@/stores/auth'

const auth = useAuthStore()
const router = useRouter()
const route = useRoute()
const { mdAndUp } = useDisplay()
const drawer = ref(mdAndUp.value)

watch(mdAndUp, (newVal) => {
	drawer.value = newVal
})

const notifications = ref([
	{ title: 'New Order Received', time: '2m ago', icon: 'mdi-package-variant-closed', color: 'primary', read: false },
	{ title: 'User Registered', time: '10m ago', icon: 'mdi-account-plus', color: 'success', read: false },
	{ title: 'Server Alert', time: '1h ago', icon: 'mdi-alert-circle-outline', color: 'error', read: true },
])

const unreadCount = computed(() => notifications.value.filter((n) => !n.read).length)

const goToNotificationsPage = () => {
	console.log('Navigating to full notification center...')
}

const logout = async () => {
	try {
		const resp = await auth.logout()
		console.log(resp)
		router.push({ name: 'adminLoginPage' })
	} catch (error) {
		console.log({ error })
	}
}

const menuGroups = ref([
	{
		groupName: 'Dashboard',
		items: [
			{ name: 'Dashboard', icon: 'mdi-view-dashboard-outline', route_name: 'adminDashboardPage' },
			{ name: 'Banners', icon: 'mdi-image-area', route_name: 'adminBannerPage' },
		],
	},
	// {
	// 	groupName: 'Bookings',
	// 	items: [
	// 		{ name: 'Manage Bookings', icon: 'mdi-calendar-check-outline', route_name: 'adminBookingPage' },
	// 		{ name: 'New Booking', icon: 'mdi-plus-circle-outline', route_name: 'adminBookingForm' },
	// 	],
	// },
	{
		groupName: 'Our Blogs',
		items: [
			// { name: 'Create Blog', icon: 'mdi-note-plus-outline', route_name: 'adminBlogForm' },
			{ name: 'All Blogs', icon: 'mdi-note-text-outline', route_name: 'adminBlogPage' },
			{ name: 'Categories', icon: 'mdi-note-text-outline', route_name: 'adminBlogCategorypage' },
		],
	},
	{
		groupName: 'Travel',
		items: [
			{ name: 'Packages', icon: 'mdi-package-variant-closed', route_name: 'adminPackagePage' },
			// { name: 'Create Package', icon: 'mdi-plus-box-outline', route_name: 'adminPackageForm' },
			{ name: 'Categories', icon: 'mdi-tag-multiple-outline', route_name: 'adminPackageCategoryPage' },
			{ name: 'Lookups', icon: 'mdi-format-list-bulleted-type', route_name: 'adminLookupPage' },
			{ name: 'Guide Profile', icon: 'mdi-account-cowboy-hat-outline', route_name: 'adminGuidePage' }

		],
	},
	{
		groupName: 'Customers',
		items: [
			{ name: 'Customer List', icon: 'mdi-account-group-outline', route_name: 'adminCustomerPage' },
			{ name: 'Inquiries', icon: 'mdi-message-question-outline', route_name: 'adminInquiryPage' },
		],
	},
	// {
	// 	groupName: 'Finance',
	// 	items: [
	// 		{ name: 'Invoices', icon: 'mdi-file-document-outline', route_name: 'adminInvoicePage' },
	// 		{ name: 'Reports', icon: 'mdi-chart-box-outline', route_name: 'adminReportPage' },
	// 	],
	// },
	// {
	// 	groupName: 'Gallery',
	// 	items: [
	// 		{ name: 'Add Image', icon: 'mdi-chart-box-outline', route_name: 'adminGalleryForm' },
	// 	],
	// },
	{
		groupName: 'Settings',
		items: [
			{ name: 'Pages', icon: 'mdi-file-document-outline', route_name: 'adminWebPage' },
			{ name: 'FAQs', icon: 'mdi-file-document-outline', route_name: 'adminFAQPage' },
			{ name: 'All Images', icon: 'mdi-image', route_name: 'adminGalleryPage' },
			{ name: 'Notifications', icon: 'mdi-bell-outline', route_name: 'adminNotificationPage' },
			{ name: 'General Settings', icon: 'mdi-cog-outline', route_name: 'adminGeneralSettingPage' },
			// { name: 'User Management', icon: 'mdi-account-cog-outline', route_name: 'adminUserManagementPage' },
		],
	},
])

</script>

<template>
	<v-app>
		<v-navigation-drawer v-model="drawer" app :permanent="$vuetify.display.mdAndUp" temporary class="border-0">
			<v-list dense nav id="main-nav">
				<template v-for="group in menuGroups" :key="group.groupName">
					<v-list-subheader class="text-uppercase group-title mb-0 pb-0">{{
						group.groupName }}</v-list-subheader>
					<v-list-item v-for="item in group.items" :key="item.name" :to="{ name: item.route_name }" link
						class="rounded py-2">
						<template #prepend>
							<v-icon class="mr-0" style="font-size: 1.5rem;" color="">{{ item.icon }}</v-icon>
						</template>
						<v-list-item-title style="font-size: 0.9rem !important; color: #5a5a5a;">{{ item.name
						}}</v-list-item-title>
					</v-list-item>
				</template>
			</v-list>
		</v-navigation-drawer>

		<v-main>
			<div class="top-bar d-flex align-center px-4 py-2">
				<v-btn icon @click="drawer = !drawer" variant="text" class="d-md-none">
					<v-icon>mdi-menu</v-icon>
				</v-btn>

				<div>
					<h4 style="font-weight:bold">{{ route.meta.title || 'Admin Panel' }}</h4>
					<p style="font-size: small;">{{ route.meta.subtitle || '' }}</p>
				</div>

				<v-spacer></v-spacer>

				<!-- Notifications and User -->
				<div class="d-flex align-center gap-3">
					<!-- Notifications -->
					<v-menu offset-y>
						<template #activator="{ props }">
							<v-btn icon variant="text" v-bind="props">
								<v-badge :content="unreadCount" color="red" dot>
									<v-icon>mdi-bell-outline</v-icon>
								</v-badge>
							</v-btn>
						</template>
						<v-card width="300" elevation="0">
							<v-list density="compact">
								<v-list-subheader>Notifications</v-list-subheader>

								<v-list-item v-for="(notification, index) in notifications" :key="index"
									class="hover-notification">
									<template #prepend>
										<v-icon :color="notification.color">{{ notification.icon }}</v-icon>
									</template>
									<template #title>
										<span class="custom-title">{{ notification.title }}</span>
									</template>
									<template #subtitle>
										<small class="custom-subtitle">{{ notification.time }}</small>
									</template>
								</v-list-item>

								<v-divider />
								<v-list-item title="View All" @click="goToNotificationsPage" />
							</v-list>
						</v-card>
					</v-menu>

					<!-- User Menu -->
					<v-menu offset-y>
						<template #activator="{ props }">
							<v-btn icon v-bind="props" variant="text">
								<v-avatar color="info">
									<v-icon icon="mdi-account-circle"></v-icon>
								</v-avatar>
							</v-btn>
						</template>
						<v-list elevation="0">
							<v-list-item title="Profile" prepend-icon="mdi-account" />
							<v-list-item title="Logout" prepend-icon="mdi-logout" @click="logout" />
						</v-list>
					</v-menu>
				</div>
			</div>

			<div style="overflow-y: auto; max-height: calc(100vh - 70px);" class="pa-4">
				<router-view></router-view>
			</div>
		</v-main>
	</v-app>
</template>

<style lang="scss">
.v-list-item__prepend>.v-icon~.v-list-item__spacer {
	width: 14px;
}

.custom-title {
	font-size: 0.9rem;
}

.hover-notification {
	transition: background-color 0.2s;
	border-radius: 4px;
}

.hover-notification:hover {
	background-color: #f5f5f5;
	cursor: pointer;
}

.v-navigation-drawer--temporary.v-navigation-drawer--active {
	box-shadow: none;
}

.v-list-item.v-list-item--active {
	background-color: #e3f2fd;
	color: #1976d2;
}

// .group-title {
// 	font-size: 0.9rem;
// 	font-weight: 500;
// 	padding-bottom: 6px;
// }

.v-list-subheader__text {
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	color: #2b77d2;
	font-weight: 600;
	font-size: 0.8rem;
}

.v-list-item {
	min-height: 36px !important;
	font-size: 0.875rem;
	font-weight: 500;
}

.top-bar {
	border-bottom: 1px solid #f6f6f6;
	background-color: #fff;
	position: sticky;
	top: 0;
	z-index: 10;
}

.v-main {
	background-color: #f7f7f7;
	min-height: 100vh;
}
</style>
