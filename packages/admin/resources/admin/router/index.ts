import { createRouter, createWebHistory } from 'vue-router'

const routes = [
	{
		path: '/admin',
		component: () => import('@/layout/AuthLayout.vue'),
		redirect: '/admin/login',
		children: [
			{
				path: 'login',
				name: 'adminLoginPage',
				component: () => import('@pages/auth/LoginPage.vue'),
				meta: {
					requireAuth: false,
					title: 'Login',
					subtitle: 'Access your admin panel',
				},
			},
			{
				path: 'reset-password',
				name: 'adminResetPasswordPage',
				component: () => import('@pages/auth/PasswordResetPage.vue'),
				meta: {
					requireAuth: false,
					title: 'Reset Password',
					subtitle: 'Recover your admin account',
				},
			},
		],
	},
	{
		path: '/admin',
		component: () => import('@/layout/DefaultLayout.vue'),
		redirect: '/admin/dashboard',
		children: [
			{
				path: 'dashboard',
				name: 'adminDashboardPage',
				component: () => import('@pages/dashboard/DashboardPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Dashboard',
					subtitle: 'Overview of key metrics',
				},
			},
			{
				path: 'banners',
				name: 'adminBannerPage',
				component: () => import('@pages/banners/BannerPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Banner Management',
					subtitle: 'Manage homepage banners and display order',
				},
			},
			{
				path: 'banners/:id',
				name: 'adminBannerDetailPage',
				component: () => import('@pages/banners/BannerDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Edit Banner',
					subtitle: 'Modify banner content, visibility, and settings',
				},
			},

			{
				path: 'blogs',
				name: 'adminBlogPage',
				component: () => import('@pages/blogs/BlogPage.vue'),
				meta: {
					requireAuth: true,
					title: 'All Blogs',
					subtitle: 'Manage your blog articles',
				},
			},
			{
				path: 'blog-detail',
				name: 'adminBlogDetailPage',
				component: () => import('@pages/blogs/BlogDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Blog Detail',
					subtitle: 'View and edit blog post',
				},
			},
			// {
			// 	path: 'blog-form',
			// 	name: 'adminBlogForm',
			// 	component: () => import('@pages/blogs/BlogForm.vue'),
			// 	meta: {
			// 		requireAuth: true,
			// 		title: 'Create Blog',
			// 		subtitle: 'Write and publish a new blog post',
			// 	},
			// },
			{
				path: 'blog-categories',
				name: 'adminBlogCategorypage',
				component: () => import('@pages/blogs/BlogCategoryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Blog Categories',
					subtitle: 'Organize your blog content',
				},
			},
			{
				path: 'bookings',
				name: 'adminBookingPage',
				component: () => import('@pages/bookings/BookingPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Manage Bookings',
					subtitle: 'View and edit travel bookings',
				},
			},
			{
				path: 'booking-form',
				name: 'adminBookingForm',
				component: () => import('@pages/bookings/BookingForm.vue'),
				meta: {
					requireAuth: true,
					title: 'New Booking',
					subtitle: 'Create a new travel booking',
				},
			},
			{
				path: 'customers',
				name: 'adminCustomerPage',
				component: () => import('@pages/customers/CustomerPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Customer List',
					subtitle: 'View and manage all customers',
				},
			},


			// packages routes
			{
				path: 'featured-packages',
				name: 'adminFeaturedPackagePage',
				component: () => import('@pages/featured-packages/FeaturedPackagePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Available Packages',
					subtitle: 'All the available packages',
				},
			},
			{
				path: 'packages',
				name: 'adminPackagePage',
				component: () => import('@pages/packages/PackagePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Available Packages',
					subtitle: 'All the available packages',
				},
			},
			{
				path: 'packages/:id',
				name: 'adminPackageDetailPage',
				component: () => import('@pages/packages/PackageDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Package Detail',
					subtitle: 'All the available packages',
				},
			},
			{
				path: 'package-form',
				name: 'adminPackageForm',
				component: () => import('@pages/packages/PackageForm.vue'),
				meta: {
					requireAuth: true,
					title: 'Trek Form',
					// subtitle: 'Trek Form',
				},
			},
			{
				path: 'package-categories',
				name: 'adminPackageCategoryPage',
				component: () => import('@pages/packages/PackageCategoryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Package Categories',
					subtitle: 'View and manage all customers',
				},
			},
			{
				path: 'destinations',
				name: 'adminDestinationPage',
				component: () => import('@pages/destinations/DestinationPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Destinations',
					subtitle: 'View and manage all destinations',
				},
			},
			{
				path: 'destinations/:id',
				name: 'admin.destination.detail',
				component: () => import('@pages/destinations/DestinationDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Destination Detail',
					subtitle: 'View and manage destination details',
				},
			},
			{
				path: 'package-lookups',
				name: 'adminPackageLookupPage',
				component: () => import('@pages/packages/PackageLookupPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Package Lookup Page',
					subtitle: 'Lookup with icon',
				},
			},
			{
				path: 'lookups',
				name: 'adminLookupPage',
				component: () => import('@pages/lookups/LookupPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Itinerary Lookup Page',
					subtitle: 'Itinerary Highlights lookup with icon',
				},
			},
			{
				path: 'guides',
				name: 'adminGuidePage',
				component: () => import('@pages/guides/GuidePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Guide Profiles',
					subtitle: 'Tour & Trekking Guides',
				},
			},
			{
				path: 'guides/:id',
				name: 'adminGuideDetailPage',
				component: () => import('@pages/guides/GuideDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Guide Profiles',
					subtitle: 'Tour & Trekking Guides',
				},
			},
			{
				path: 'inquiries',
				name: 'adminInquiryPage',
				component: () => import('@pages/customers/InquiryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Inquiries',
					subtitle: 'Handle customer questions and requests',
				},
			},
			{
				path: 'invoices',
				name: 'adminInvoicePage',
				component: () => import('@pages/finance/InvoicePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Invoices',
					subtitle: 'Track and manage billing',
				},
			},
			{
				path: 'reports',
				name: 'adminReportPage',
				component: () => import('@pages/finance/ReportPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Reports',
					subtitle: 'Analyze business performance',
				},
			},

			// gallery routes
			{
				path: 'gallery',
				name: 'adminGalleryPage',
				component: () => import('@pages/gallery/GalleryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Gallery',
					subtitle: 'Manage media gallery',
				},
			},
			{
				path: 'gallery-form',
				name: 'adminGalleryForm',
				component: () => import('@pages/gallery/GalleryForm.vue'),
				meta: {
					requireAuth: true,
					title: 'Gallery Form',
					subtitle: 'Upload or edit gallery images',
				},
			},

			// settings
			{
				path: 'notifications',
				name: 'adminNotificationPage',
				component: () => import('@pages/settings/NotificationPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Notifications',
					subtitle: 'Send alerts and messages',
				},
			},
			{
				path: 'user-management',
				name: 'adminUserManagementPage',
				component: () => import('@pages/settings/UserManagementPage.vue'),
				meta: {
					requireAuth: true,
					title: 'User Management',
					subtitle: 'Manage admin panel users',
				},
			},
			{
				path: 'general-settings',
				name: 'adminGeneralSettingPage',
				component: () => import('@pages/settings/GeneralSettingPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Settings',
					subtitle: 'Application-wide configurations',
				},
			},
			{
				path: 'webpages',
				name: 'adminWebPage',
				component: () => import('@pages/webpage/WebPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Pages',
					subtitle: 'Web Pages',
				},
			},
			{
				path: 'webpages/:id',
				name: 'adminWebPageDetail',
				component: () => import('@pages/webpage/WebPageDetail.vue'),
				meta: {
					requireAuth: true,
					title: 'Pages',
					subtitle: 'Web Page Detail',
				},
			},
			{
				path: 'faqs',
				name: 'adminFAQPage',
				component: () => import('@pages/faq/FaqPage.vue'),
				meta: {
					requireAuth: true,
					title: 'FAQ',
					subtitle: 'FAQ Page',
				},
			},

			// demo page
			{
				path: 'demo-page',
				name: 'adminDemoPage',
				component: () => import('@pages/DemoPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Demo Page',
					subtitle: 'Temporary placeholder for testing',
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
		return next({
			path: '/admin/login',
			query: { redirect: to.fullPath },
		})
	}

	if (to.name === 'adminLoginPage' && isLoggedIn) {
		return next({ name: 'adminDashboardPage' })
	}

	next()
})

export default router
