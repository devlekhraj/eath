import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

const routes: RouteRecordRaw[] = [
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

			// Journeys (table: journeys)
			{
				path: 'journeys',
				name: 'adminJourneyPage',
				component: () => import('@pages/journeys/JourneyPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Journeys',
					subtitle: 'Manage all website journeys',
				},
			},
			{
				path: 'journeys/:id',
				name: 'adminJourneyDetailPage',
				component: () => import('@pages/journeys/JourneyDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Journey Detail',
					subtitle: 'Manage journey content, pricing, itinerary, and media',
				},
			},
			{
				path: 'journey-form',
				name: 'adminJourneyForm',
				component: () => import('@pages/journeys/JourneyDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Journey Detail',
				},
			},
			// Legacy journey aliases
			{
				path: 'packages',
				redirect: '/admin/journeys',
			},
			{
				path: 'packages/:id',
				redirect: (to) => `/admin/journeys/${to.params.id}`,
			},

			// Journey Departures (table: journey_departures)
			{
				path: 'departures',
				name: 'adminDeparturePage',
				component: () => import('@pages/journey-departures/JourneyDeparturePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Departures',
					subtitle: 'Manage journey departure dates and availability',
				},
			},
			{
				path: 'journey-departures',
				redirect: '/admin/departures',
			},
			{
				path: 'featured-packages',
				redirect: '/admin/departures',
			},

			// Guides (table: guides)
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

			// Destinations (table: destinations)
			{
				path: 'destinations',
				name: 'adminDestinationPage',
				component: () => import('@pages/destinations/DestinationPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Destinations',
					subtitle: 'Manage regions, places, and destination pages',
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

			// Experiences (table: experiences)
			{
				path: 'experiences',
				name: 'adminExperiencePage',
				component: () => import('@pages/experiences/ExperiencePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Experiences',
					subtitle: 'Manage journey experience tags and filters',
				},
			},
			{
				path: 'package-categories',
				redirect: '/admin/experiences',
			},

			// Travel Months (table: travel_months)
			{
				path: 'travel-months',
				name: 'adminTravelMonthPage',
				component: () => import('@pages/travel-months/TravelMonthPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Travel Months',
					subtitle: 'Manage seasonal trekking windows and conditions',
				},
			},

			// Articles (tables: articles, article_categories)
			{
				path: 'articles',
				name: 'adminArticlePage',
				component: () => import('@pages/articles/ArticlePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Articles',
					subtitle: 'Manage website stories, guides, and journal content',
				},
			},
			{
				path: 'articles/:id',
				name: 'adminArticleDetailPage',
				component: () => import('@pages/articles/ArticleDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Article Detail',
					subtitle: 'View and edit article post',
				},
			},
			{
				path: 'article-categories',
				name: 'adminArticleCategoryPage',
				component: () => import('@pages/articles/ArticleCategoryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Article Categories',
					subtitle: 'Organize article content',
				},
			},
			// Legacy article aliases
			{
				path: 'blogs',
				redirect: '/admin/articles',
			},
			{
				path: 'blog-detail',
				redirect: '/admin/articles',
			},
			{
				path: 'blog-categories',
				redirect: '/admin/article-categories',
			},

			// Traveler Stories (table: traveler_stories)
			{
				path: 'traveler-stories',
				name: 'adminTravelerStoryPage',
				component: () => import('@pages/traveler-stories/TravelerStoryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Traveler Stories',
					subtitle: 'Manage traveler experiences, testimonials, and journeys taken',
				},
			},

			// Inquiries (table: inquiries)
			{
				path: 'inquiries',
				name: 'adminInquiryPage',
				component: () => import('@pages/inquiries/InquiryPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Inquiries',
					subtitle: 'Handle customer questions and requests',
				},
			},
			{
				path: 'customers',
				redirect: '/admin/inquiries',
			},

			// Planner Submissions (table: planner_submissions)
			{
				path: 'planner-submissions',
				name: 'adminPlannerSubmissionPage',
				component: () => import('@pages/planner-submissions/PlannerSubmissionPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Planner Submissions',
					subtitle: 'Review trip planner requests from the website',
				},
			},
			{
				path: 'bookings',
				redirect: '/admin/planner-submissions',
			},

			// Newsletter Subscriptions (table: newsletter_subscriptions)
			{
				path: 'newsletter-subscriptions',
				name: 'adminNewsletterSubscriptionPage',
				component: () => import('@pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Newsletter Subscriptions',
					subtitle: 'Manage subscriber list and status',
				},
			},

			// Website Sections (table: website_sections)
			{
				path: 'website-sections',
				name: 'adminWebsiteSectionPage',
				component: () => import('@pages/website-sections/WebsiteSectionPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Website Sections',
					subtitle: 'Manage global sections and homepage content blocks',
				},
			},
			{
				path: 'website-sections/:id',
				name: 'adminWebsiteSectionDetailPage',
				component: () => import('@pages/website-sections/WebsiteSectionDetailPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Edit Website Section',
					subtitle: 'Modify section content, media, and settings',
				},
			},
			// Legacy section aliases
			{
				path: 'banners',
				redirect: '/admin/website-sections',
			},
			{
				path: 'banners/:id',
				redirect: (to) => `/admin/website-sections/${to.params.id}`,
			},

			// Website Pages (table: website_pages)
			{
				path: 'website-pages',
				name: 'adminWebsitePage',
				component: () => import('@pages/website-pages/WebsitePage.vue'),
				meta: {
					requireAuth: true,
					title: 'Pages',
					subtitle: 'Web Pages',
				},
			},
			{
				path: 'website-pages/:id',
				name: 'adminWebsitePageDetail',
				component: () => import('@pages/website-pages/WebsitePageDetail.vue'),
				meta: {
					requireAuth: true,
					title: 'Pages',
					subtitle: 'Web Page Detail',
				},
			},
			{
				path: 'webpages',
				redirect: '/admin/website-pages',
			},
			{
				path: 'webpages/:id',
				redirect: (to) => `/admin/website-pages/${to.params.id}`,
			},

			// Media Assets (table: media_assets)
			{
				path: 'media-assets',
				name: 'adminMediaAssetPage',
				component: () => import('@pages/media-assets/MediaAssetPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Media Assets',
					subtitle: 'Upload and manage media assets, photos, and banners',
				},
			},
			{
				path: 'media',
				redirect: '/admin/media-assets',
			},
			{
				path: 'gallery',
				redirect: '/admin/media-assets',
			},

			// FAQs (table: faqs)
			{
				path: 'faqs',
				name: 'adminFAQPage',
				component: () => import('@pages/faqs/FaqPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Frequently Asked Questions',
					subtitle: 'Manage questions, answers, categories, and journey associations',
				},
			},

			// Settings (tables: website_settings, admins)
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
				path: 'notifications',
				name: 'adminNotificationPage',
				component: () => import('@pages/settings/NotificationPage.vue'),
				meta: {
					requireAuth: true,
					title: 'Notifications',
					subtitle: 'Send alerts and messages',
				},
			},

			// Demo page
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
