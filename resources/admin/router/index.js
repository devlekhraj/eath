import { createRouter, createWebHistory } from 'vue-router'

// Layout
const DefaultLayout = () => import('../layout/DefaultLayout.vue')
const AuthLayout = () => import('../layout/AuthLayout.vue')

// Admin
const AdminLoginPage = () => import('../pages/auth/LoginPage.vue')
const AdminPasswodResetPage = () => import('../pages/auth/PasswordResetPage.vue')

const DashboardPage = () => import('../pages/dashboard/DashboardPage.vue')
const DemoPage = () => import('../pages/DemoPage.vue')

const routes = [
	{
		path: '/auth',
		component: AuthLayout,
		redirect: '/auth/login',
		children: [
			{
				path: 'login',
				name: 'adminLoginPage',
				component: AdminLoginPage,
				meta: {
					requireAuth: false,
					title: 'Admin Login',
					subtitle: 'Admin Login Page',
				},
			},
			{
				path: 'reset-password',
				name: 'adminResetPasswordPage',
				component: AdminPasswodResetPage,
				meta: {
					requireAuth: false,
					title: 'Password Reset',
					subtitle: 'Admin Password Reset Page',
				},
			},
		],
	},
	{
		path: '/admin',
		component: DefaultLayout,
		redirect: '/admin/dashboard',
		children: [
			{
				path: 'dashboard',
				name: 'adminDashboardPage',
				component: DashboardPage,
				meta: {
					requireAuth: true,
					title: 'Dashboard',
					subtitle: 'Overview of key metrics',
				},
			},

			{
				path: 'demo-page',
				name: 'adminDemoPage',
				component: DemoPage,
				meta: {
					requireAuth: true,
					title: 'Demo Page',
					subtitle: '',
				},
			},
		],
	},
]

const router = createRouter({
	history: createWebHistory(),
	routes,
})

// Global auth guard
router.beforeEach((to, from, next) => {
	const isLoggedIn = !!localStorage.getItem('token')
	const requiresAuth = to.matched.some(record => record.meta.requireAuth)

	if (requiresAuth && !isLoggedIn) {
		return next({ name: 'adminLoginPage' }) // point to /auth/login only
	}

	if (to.name === 'adminLoginPage' && isLoggedIn) {
		return next({ name: 'adminDashboardPage' })
	}

	next()
})


export default router

