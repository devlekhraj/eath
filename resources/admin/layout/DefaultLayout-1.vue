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
	{
		title: 'New Order Received',
		time: '2m ago',
		icon: 'mdi-package-variant-closed',
		color: 'primary',
		read: false,
	},
	{
		title: 'User Registered',
		time: '10m ago',
		icon: 'mdi-account-plus',
		color: 'success',
		read: false,
	},
	{
		title: 'Server Alert',
		time: '1h ago',
		icon: 'mdi-alert-circle-outline',
		color: 'error',
		read: true,
	},
])

const unreadCount = computed(() =>
	notifications.value.filter((n) => !n.read).length
)

const goToNotificationsPage = () => {
	console.log('Navigating to full notification center...')
}

const logout = async () => {
	try {
		const resp = await auth.logout();
		console.log(resp);
		router.push({ name: 'adminLoginPage' });
	} catch (error) {
		console.log({ error })
	}
}

const menuGroups = ref([
	{
		groupName: 'Dashboard',
		items: [
			{ name: 'Dashboard', icon: 'fa-solid fa-chart-line', route_name: 'adminDashboardPage' },
		],
	},

	{
		groupName: 'Bookings',
		items: [
			{ name: 'Manage Bookings', icon: 'fa-solid fa-calendar-check', route_name: 'adminDemoPage' },
			{ name: 'New Booking', icon: 'fa-solid fa-plus-circle', route_name: 'adminDemoPage' },
		],
	},

	{
		groupName: 'Packages',
		items: [
			{ name: 'All Packages', icon: 'fa-solid fa-boxes-stacked', route_name: 'adminDemoPage' },
			{ name: 'Add New Package', icon: 'fa-solid fa-plus', route_name: 'adminDemoPage' },
			{ name: 'Categories', icon: 'fa-solid fa-tags', route_name: 'adminDemoPage' },
		],
	},

	{
		groupName: 'Customers',
		items: [
			{ name: 'Customer List', icon: 'fa-solid fa-users', route_name: 'adminDemoPage' },
			{ name: 'Inquiries', icon: 'fa-solid fa-comments', route_name: 'adminDemoPage' },
		],
	},

	{
		groupName: 'Finance',
		items: [
			{ name: 'Payments', icon: 'fa-solid fa-credit-card', route_name: 'adminDemoPage' },
			{ name: 'Invoices', icon: 'fa-solid fa-file-invoice', route_name: 'adminDemoPage' },
			{ name: 'Reports', icon: 'fa-solid fa-file-lines', route_name: 'adminDemoPage' },
		],
	},

	{
		groupName: 'Communication',
		items: [
			{ name: 'Notices & Events', icon: 'fa-solid fa-bell', route_name: 'adminDemoPage' },
			{ name: 'Notifications', icon: 'fa-solid fa-paper-plane', route_name: 'adminDemoPage' },
			{ name: 'Chat Support', icon: 'fa-solid fa-comments', route_name: 'adminDemoPage' },
		],
	},

	{
		groupName: 'Settings',
		items: [
			{ name: 'General Settings', icon: 'fa-solid fa-gear', route_name: 'adminDemoPage' },
			{ name: 'Roles & Permissions', icon: 'fa-solid fa-user-shield', route_name: 'adminDemoPage' },
			{ name: 'User Management', icon: 'fa-solid fa-users-cog', route_name: 'adminDemoPage' },
			{ name: 'Email/SMS Settings', icon: 'fa-solid fa-envelope', route_name: 'adminDemoPage' },
			{ name: 'Backup & Restore', icon: 'fa-solid fa-database', route_name: 'adminDemoPage' },
		],
	},
])


</script>

<template>
	<v-app>
		<v-navigation-drawer v-model="drawer" app :permanent="$vuetify.display.mdAndUp" temporary>
			<v-list dense nav>
				<template v-for="group in menuGroups" :key="group.groupName">
					<v-list-subheader class="text-uppercase group-title">{{ group.groupName }}</v-list-subheader>
					<v-list-item v-for="item in group.items" :key="item.name" :to="{ name: item.route_name }" link
						class="rounded py-2">
						<template #prepend>
							<div style="width: 30px;">
								<i :class="item.icon" class="mr-3"></i>
							</div>
						</template>
						<v-list-item-title>{{ item.name }}</v-list-item-title>
					</v-list-item>
				</template>
			</v-list>
		</v-navigation-drawer>

		<v-main>
			<div class="top-bar d-flex align-center px-4 py-2">
				<!-- Menu button (mobile only) -->
				<v-btn icon @click="drawer = !drawer" variant="text" class="d-md-none">
					<v-icon>mdi-menu</v-icon>
				</v-btn>

				<!-- Route Title and Subtitle -->
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

			<div style="overflow-y: auto; max-height: calc(100vh - 70px);">
				<router-view></router-view>
			</div>
		</v-main>
	</v-app>
</template>

<style lang="scss">
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

.group-title {
	font-size: 0.9rem;
	font-weight: 500;
	padding-bottom: 6px;
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