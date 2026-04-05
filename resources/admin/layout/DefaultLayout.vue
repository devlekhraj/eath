<template>
	<v-app>
	<v-navigation-drawer
		v-model="drawer"
		app
		:permanent="$vuetify.display.mdAndUp"
		temporary
		class="border-0 drawer-root"
	>
			<div class="drawer-header px-4 pb-2">
				<div class="d-flex align-center py-4">
					<v-avatar size="40" color="primary" class="mr-3">
						<span class="text-body-2 text-white">{{ userInitials }}</span>
					</v-avatar>
					<div>
						<div class="text-subtitle-2 font-weight-medium">{{ userName }}</div>
						<div class="text-caption text-medium-emphasis">
							@{{ userHandle || 'username' }}
						</div>
					</div>
				</div>

				<v-text-field
					v-model="menuSearch"
					density="compact"
					variant="outlined"
					placeholder="Search menu"
					clearable
					prepend-inner-icon="mdi-magnify"
					class="mb-2"
					hide-details
				/>
			</div>

			<div class="drawer-list-wrapper px-4">
				<v-list dense nav id="main-nav">
					<template v-for="group in menuGroups" :key="group.groupName">
					<template v-if="filteredGroupItems(group.items).length">
						<v-list-subheader class="group-title pb-0">
							{{ group.groupName }}
						</v-list-subheader>
						<v-list-item
							v-for="item in filteredGroupItems(group.items)"
							:key="item.name"
							:to="{ name: item.route_name }"
							link
							class="rounded py-2"
						>
							<template #prepend>
								<v-icon class="mr-0" color="">{{ item.icon }}</v-icon>
							</template>
							<v-list-item-title>{{ item.name }}</v-list-item-title>
						</v-list-item>
					</template>
				</template>
			</v-list>
			</div>
		</v-navigation-drawer>

		<v-main class="main-scroll">
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

			<div class="pa-4">
				<router-view></router-view>
			</div>
		</v-main>
	</v-app>
</template>

<script setup>
import { ref, computed, watch, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useDisplay } from 'vuetify'
import { profileApi } from '@/api/auth.api'



const router = useRouter()
const route = useRoute()
const { mdAndUp } = useDisplay()
const drawer = ref(mdAndUp.value)
const menuSearch = ref('')

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
		localStorage.removeItem('token')
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
		groupName: 'Travel',
		items: [
			{ name: 'Regions', icon: 'mdi-tag-multiple-outline', route_name: 'adminDestinationPage' },
			//{ name: 'Categories', icon: 'mdi-tag-multiple-outline', route_name: 'adminPackageCategoryPage' },
			{ name: 'Tour / Treks', icon: 'mdi-briefcase-variant', route_name: 'adminPackagePage' },
			
			{ name: 'Fixed Departure', icon: 'mdi-calendar-check', route_name: 'adminFeaturedPackagePage' },
			{ name: 'Guide Profile', icon: 'mdi-account-cowboy-hat-outline', route_name: 'adminGuidePage' },

			{ name: 'Lookups', icon: 'mdi-format-list-bulleted-type', route_name: 'adminLookupPage' },
		]

	},
	{
		groupName: 'Our Blogs',
		items: [
			// { name: 'Create Blog', icon: 'mdi-note-plus-outline', route_name: 'adminBlogForm' },
			{ name: 'All Blogs', icon: 'mdi-note-text-outline', route_name: 'adminBlogPage' },
			{ name: 'Categories', icon: 'mdi-note-text-outline', route_name: 'adminBlogCategorypage' },
		],
	},
	{
		groupName: 'Customers',
		items: [
			{ name: 'Customer List', icon: 'mdi-account-group-outline', route_name: 'adminCustomerPage' },
			{ name: 'Inquiries', icon: 'mdi-message-question-outline', route_name: 'adminInquiryPage' },
			{ name: 'Bookings', icon: 'mdi-calendar-check-outline', route_name: 'adminBookingPage' },
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

const normalizedSearch = computed(() => menuSearch.value.trim().toLowerCase())

const filteredGroupItems = (items) => {
	if (!normalizedSearch.value) return items
	return items.filter((item) =>
		item.name.toLowerCase().includes(normalizedSearch.value)
	)
}

const userName = ref(localStorage.getItem('user_name') || 'User')
const userHandle = ref(localStorage.getItem('user_handle') || '')
const userInitials = computed(() => {
	const name = userName.value.trim()
	if (!name) return 'A'
	const parts = name.split(' ').filter(Boolean)
	if (parts.length === 1) return parts[0].slice(0, 2).toUpperCase()
	return (parts[0][0] + parts[parts.length - 1][0]).toUpperCase()
})

const loadUserProfile = async () => {
	try {
		const resp = await profileApi()
		const profile = resp && resp.data ? resp.data : resp
		const name = profile?.name || profile?.full_name || profile?.email || 'User'
		const handle = profile?.username || profile?.email || ''
		userName.value = String(name)
		userHandle.value = String(handle)
		localStorage.setItem('user_name', userName.value)
		localStorage.setItem('user_handle', userHandle.value)
	} catch (err) {
		console.error('Failed to load profile', err)
	}
}

onMounted(() => {
	loadUserProfile()
})

</script>


<style lang="scss">
.v-list-item__prepend>.v-icon~.v-list-item__spacer {
	width: 14px;
}

.custom-title {
	font-size: 0.8rem;
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

.drawer-root {
	display: flex;
	flex-direction: column;
	height: 100%;
	position: fixed;
	top: 0;
	background-color: #ffffff;
	overflow: hidden;
}

.drawer-header {
	background-color: #ffffff;
	flex: 0 0 auto;
	position: sticky;
	top: 0;
	z-index: 2;
}

.drawer-list-wrapper {
	max-height: calc(100vh - 100px);
	overflow: auto;
}

#main-nav {
	max-height: 100%;
	overflow-y: auto;
}

.v-list-item.v-list-item--active {
	background-color: #dedede40;
	color: #000000;
}

.v-list-subheader__text {
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	font-size: 12px;
}

.v-list-item {
	min-height: 36px !important;
	font-size: 0.8rem;
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
	height: 100vh;
	overflow-y: auto;
}
.v-list-item--nav .v-list-item-title {
	font-size: 0.82rem;
}
</style>
