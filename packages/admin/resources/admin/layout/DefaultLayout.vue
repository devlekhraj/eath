<template>
  <v-app class="app-layout">
    <!-- Base Permanent Drawer (Desktop full/rail, Tablet permanent 64px rail) -->
    <v-navigation-drawer v-if="mdAndUp" v-model="desktopDrawer" app width="270" color="primary" class="app-left-drawer"
      permanent :rail="isBaseDrawerRail" :rail-width="64">
      <!-- Brand / Workspace Header -->
      <template #prepend>
        <div class="pa-2 d-flex align-center" style="height: 63px">
          <div class="d-flex align-center justify-space-between w-100">
            <div class="d-flex align-center overflow-hidden">
              <div class="pl-2">
                <v-avatar size="40" class="flex-shrink-0" color="on-primary" rounded>
                  <v-img src="/images/logo.png" alt="Eathways" cover />
                </v-avatar>
              </div>
              <div v-if="!isBaseDrawerRail" class="ml-3 overflow-hidden text-left app-drawer-brand">
                <div class="text-subtitle-2 font-weight-semibold text-truncate text-white">
                  Eathways Admin
                </div>
                <div class="text-caption text-truncate opacity-80 text-white">
                  Management console
                </div>
              </div>
            </div>

            <div class="d-flex align-center justify-center flex-shrink-0" style="width: 44px; height: 44px">
              <v-btn :icon="isBaseDrawerRail ? 'mdi-chevron-right' : 'mdi-chevron-left'" variant="text" size="small"
                class="text-white" aria-label="Toggle rail mode" @click.stop="toggleRail" />
            </div>
          </div>
        </div>
        <v-divider class="border-opacity-25" />
      </template>

      <!-- Navigation Menu List -->
      <div class="pt-3">
        <v-list v-model:opened="openGroups" density="comfortable" open-strategy="single">
          <template v-for="group in menuGroups" :key="`desktop-${group.routeName || group.group}`">
            <!-- Group with Nested Items (Expanded Mode) -->
            <v-list-group v-if="!isBaseDrawerRail && group.items && group.items.length" :value="group.group"
              :class="{ 'active-nav-group': isGroupActive(group) }">
              <template #activator="{ props: activatorProps }">
                <v-list-item v-bind="activatorProps" rounded :title="group.group"
                  class="py-1 text-uppercase group-activator" :prepend-icon="group.icon || 'mdi-menu'" />
              </template>

              <v-list-item v-for="item in group.items" :key="item.routeName || item.title" rounded
                class="py-2 submenu-item" link :disabled="item.disabled" :active="isRouteActive(item.routeName)"
                :to="buildRouteTo(item.routeName, item.routeParams)" active-class="active-nav-item"
                prepend-icon="mdi-arrow-right-thin" :title="item.title">
                <template v-if="item.badge" #append>
                  <v-chip size="x-small" :color="item.badgeColor || 'primary'" variant="flat">
                    {{ item.badge }}
                  </v-chip>
                </template>
              </v-list-item>
            </v-list-group>

            <!-- Group with Nested Items (Rail Mode Flyout Menu) -->
            <v-menu v-else-if="isBaseDrawerRail && group.items && group.items.length" :key="`rail-${group.group}`"
              location="end top" open-on-hover :open-delay="80" :close-delay="120" transition="slide-x-transition"
              offset="8" min-width="210">
              <template #activator="{ props: menuProps }">
                <v-list-item v-bind="menuProps" rounded class="py-2 submenu-item"
                  :prepend-icon="group.icon || 'mdi-menu'" link :active="isGroupActive(group)"
                  active-class="active-nav-item" />
              </template>

              <v-card elevation="6" class="border py-1 bg-surface">
                <div
                  class="px-3 py-2 border-b text-caption font-weight-bold text-medium-emphasis text-uppercase tracking-wider">
                  {{ group.group }}
                </div>
                <v-list density="compact" class="py-1">
                  <v-list-item v-for="item in group.items" :key="`rail-sub-${item.routeName || item.title}`" rounded
                    class="my-1" link :disabled="item.disabled" :active="isRouteActive(item.routeName)"
                    :to="buildRouteTo(item.routeName, item.routeParams)" active-class="bg-primary text-white"
                    prepend-icon="mdi-arrow-right-thin" :title="item.title">
                    <template v-if="item.badge" #append>
                      <v-chip size="x-small" :color="item.badgeColor || 'primary'" variant="flat">
                        {{ item.badge }}
                      </v-chip>
                    </template>
                  </v-list-item>
                </v-list>
              </v-card>
            </v-menu>

            <!-- Single Top-Level Nav Item -->
            <v-list-item v-else :key="group.group" rounded class="py-2 submenu-item" :title="group.group"
              :prepend-icon="group.icon || 'mdi-view-dashboard-outline'" link :active="isRouteActive(group.routeName)"
              :to="buildRouteTo(group.routeName, group.routeParams)" active-class="active-nav-item">
              <v-tooltip v-if="isBaseDrawerRail" activator="parent" location="end">
                {{ group.group }}
              </v-tooltip>
            </v-list-item>
          </template>
        </v-list>
      </div>

      <!-- User Profile Footer -->
      <template #append>
        <div class="pa-3">
          <template v-if="!isBaseDrawerRail">
            <div class="user-card-bottom pa-3 d-flex align-center ga-3 rounded-lg">
              <v-avatar color="white" size="36">
                <span class="text-caption font-weight-bold text-primary">{{ userInitials }}</span>
              </v-avatar>
              <div class="flex-grow-1 overflow-hidden">
                <div class="text-caption font-weight-bold text-truncate text-white">{{ adminDisplayName }}</div>
                <div class="text-caption text-truncate opacity-75 text-white">{{ adminUsername }}</div>
              </div>
            </div>
          </template>
          <template v-else>
            <div class="d-flex justify-center">
              <v-avatar color="white" size="36">
                <span class="text-caption font-weight-bold text-primary">{{ userInitials }}</span>
              </v-avatar>
            </div>
          </template>
        </div>
      </template>
    </v-navigation-drawer>

    <!-- Mobile & Tablet Offcanvas Overlay Drawer -->
    <v-navigation-drawer v-if="!lgAndUp" v-model="mobileDrawer" temporary width="270" color="primary"
      class="app-mobile-drawer" scrim location="left"
      style="position: fixed !important; left: 0 !important; top: 0 !important; z-index: 1005 !important">
      <!-- Brand / Workspace Header with Close Button -->
      <template #prepend>
        <div class="pa-2 d-flex align-center" style="height: 63px">
          <div class="d-flex align-center justify-space-between w-100">
            <div class="d-flex align-center overflow-hidden">
              <div class="pl-2">
                <v-avatar size="40" class="flex-shrink-0" color="on-primary" rounded>
                  <v-img src="/images/logo.png" alt="Eathways" cover />
                </v-avatar>
              </div>
              <div class="ml-3 overflow-hidden text-left app-drawer-brand">
                <div class="text-subtitle-2 font-weight-semibold text-truncate text-white">
                  Eathways Admin
                </div>
                <div class="text-caption text-truncate opacity-80 text-white">
                  Management console
                </div>
              </div>
            </div>

            <div class="d-flex align-center justify-center flex-shrink-0" style="width: 44px; height: 44px">
              <v-btn icon="mdi-close" variant="text" size="small" class="text-white" aria-label="Close menu"
                @click.stop="mobileDrawer = false" />
            </div>
          </div>
        </div>
        <v-divider class="border-opacity-25" />
      </template>

      <!-- Navigation Menu List -->
      <div class="pt-3">
        <v-list v-model:opened="openGroups" density="comfortable" open-strategy="single">
          <template v-for="group in menuGroups" :key="`mobile-${group.routeName || group.group}`">
            <!-- Group with Nested Items -->
            <v-list-group v-if="group.items && group.items.length" :value="group.group"
              :class="{ 'active-nav-group': isGroupActive(group) }">
              <template #activator="{ props: activatorProps }">
                <v-list-item v-bind="activatorProps" rounded :title="group.group"
                  class="py-1 text-uppercase group-activator" :prepend-icon="group.icon || 'mdi-menu'" />
              </template>

              <v-list-item v-for="item in group.items" :key="`mobile-sub-${item.routeName || item.title}`" rounded
                class="py-2 submenu-item" link :disabled="item.disabled" :active="isRouteActive(item.routeName)"
                :to="buildRouteTo(item.routeName, item.routeParams)" active-class="active-nav-item"
                prepend-icon="mdi-arrow-right-thin" :title="item.title" @click="mobileDrawer = false">
                <template v-if="item.badge" #append>
                  <v-chip size="x-small" :color="item.badgeColor || 'primary'" variant="flat">
                    {{ item.badge }}
                  </v-chip>
                </template>
              </v-list-item>
            </v-list-group>

            <!-- Single Top-Level Nav Item -->
            <v-list-item v-else :key="`mobile-single-${group.group}`" rounded class="py-2 submenu-item"
              :title="group.group" :prepend-icon="group.icon || 'mdi-view-dashboard-outline'" link
              :active="isRouteActive(group.routeName)" :to="buildRouteTo(group.routeName, group.routeParams)"
              active-class="active-nav-item" @click="mobileDrawer = false" />
          </template>
        </v-list>
      </div>

      <!-- User Profile Footer -->
      <template #append>
        <div class="pa-3">
          <div class="user-card-bottom pa-3 d-flex align-center ga-3 rounded-lg">
            <v-avatar color="white" size="36">
              <span class="text-caption font-weight-bold text-primary">{{ userInitials }}</span>
            </v-avatar>
            <div class="flex-grow-1 overflow-hidden">
              <div class="text-caption font-weight-bold text-truncate text-white">{{ adminDisplayName }}</div>
              <div class="text-caption text-truncate opacity-75 text-white">{{ adminUsername }}</div>
            </div>
          </div>
        </div>
      </template>
    </v-navigation-drawer>

    <!-- Top Header App Bar -->
    <v-app-bar app flat class="app-header-bar border-b bg-surface">
      <!-- Mobile & Tablet Hamburger Toggle -->
      <v-app-bar-nav-icon class="d-lg-none ml-1" color="primary" :icon="mobileDrawer ? 'mdi-close' : 'mdi-menu'"
        aria-label="Toggle navigation drawer" @click="toggleRail" />

      <v-spacer />

      <!-- Action Toolbar -->
      <div class="d-flex align-center ga-2 pr-4">
        <!-- Notifications Menu -->
        <v-menu location="bottom end" transition="scale-transition" width="320">
          <template #activator="{ props }">
            <v-badge :content="notificationCount" :model-value="notificationCount > 0" color="error" overlap
              offset-x="6" offset-y="6">
              <v-btn v-bind="props" icon variant="tonal" color="primary" size="small" aria-label="Notifications menu">
                <v-icon size="20">mdi-bell-outline</v-icon>
              </v-btn>
            </v-badge>
          </template>

          <v-card>
            <div class="d-flex align-center justify-space-between px-4 py-3 border-b">
              <div class="text-subtitle-2 font-weight-semibold">Notifications</div>
              <div class="text-caption text-medium-emphasis">{{ notificationCount }} unread</div>
            </div>
            <v-list density="compact" class="py-1">
              <v-list-item rounded :to="{ name: 'adminNotificationPage' }" prepend-icon="mdi-open-in-new"
                title="View notifications" />
            </v-list>
          </v-card>
        </v-menu>

        <!-- User Profile Menu -->
        <v-menu location="bottom end" transition="scale-transition" min-width="240">
          <template #activator="{ props }">
            <v-btn v-bind="props" icon variant="tonal" color="primary" size="small" aria-label="Profile menu">
              <v-avatar size="32" color="primary">
                <span class="text-caption font-weight-bold text-white">{{ userInitials }}</span>
              </v-avatar>
            </v-btn>
          </template>

          <v-card>
            <div class="pa-3 border-b">
              <div class="text-subtitle-2 font-weight-semibold">{{ adminDisplayName }}</div>
              <div class="text-caption text-medium-emphasis text-truncate">{{ adminUsername }}</div>
            </div>
            <v-list density="compact" class="py-1">
              <v-list-item rounded :to="{ name: 'adminGeneralSettingPage' }" prepend-icon="mdi-cog-outline"
                title="Settings" link />
              <v-divider class="my-1" />
              <v-list-item rounded prepend-icon="mdi-logout" title="Sign Out" class="text-error"
                :disabled="isLoggingOut" link @click="logout" />
            </v-list>

            <v-divider />

            <!-- Primary Color Options -->
            <div class="pa-3">
              <div class="d-flex align-center justify-space-between mb-2">
                <span class="text-caption text-medium-emphasis font-weight-medium">Theme Color</span>
                <span class="text-caption font-weight-semibold text-capitalize text-primary">{{ currentThemeColorName }}</span>
              </div>
              <div class="d-flex align-center justify-space-between ga-1 pt-1">
                <v-btn v-for="option in themeColorOptions" :key="option.key" icon size="24" variant="flat"
                  :style="{ backgroundColor: option.primary, minWidth: '24px', width: '24px', height: '24px' }"
                  :aria-label="option.label" :title="option.label" class="rounded-circle elevation-1"
                  @click.stop="applyThemeColor(option.key)">
                  <v-icon v-if="activeThemeColorKey === option.key || activePrimaryColor.toLowerCase() === option.primary.toLowerCase()"
                    icon="mdi-check" size="14" color="white" />
                </v-btn>
              </div>
            </div>
          </v-card>
        </v-menu>
      </div>
    </v-app-bar>

    <!-- Main Content Area -->
    <v-main class="app-main">
      <v-container class="main-container-content pa-8" fluid>
        <RouterView />
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
import { computed, onMounted, ref, watch } from 'vue';
import { useRoute, useRouter, type RouteLocationRaw } from 'vue-router';
import { useDisplay, useTheme } from 'vuetify';
import { logoutApi, profileApi, type UserProfile } from '@/api/auth.api';

const router = useRouter();
const route = useRoute();
const theme = useTheme();

export type ThemeColorKey = 'brand-blue' | 'info-tone' | 'success-tone' | 'warning-tone' | 'error-tone' | 'purple-tone';

export type ThemeColorOption = {
  key: ThemeColorKey;
  label: string;
  themeName: 'primary' | 'info' | 'success' | 'warning' | 'error' | 'purple';
  primary: string;
  primaryDarken1: string;
};

const themeColorOptions: ThemeColorOption[] = [
  { key: 'brand-blue', label: 'Primary', themeName: 'primary', primary: '#1867C0', primaryDarken1: '#1F5592' },
  { key: 'info-tone', label: 'Info', themeName: 'info', primary: '#2196F3', primaryDarken1: '#1976D2' },
  { key: 'success-tone', label: 'Success', themeName: 'success', primary: '#4CAF50', primaryDarken1: '#388E3C' },
  { key: 'warning-tone', label: 'Warning', themeName: 'warning', primary: '#FB8C00', primaryDarken1: '#EF6C00' },
  { key: 'error-tone', label: 'Error', themeName: 'error', primary: '#B00020', primaryDarken1: '#8E0018' },
  { key: 'purple-tone', label: 'Purple', themeName: 'purple', primary: '#7E57C2', primaryDarken1: '#673AB7' },
];

const savedKey = (typeof localStorage !== 'undefined' && (localStorage.getItem('admin_theme_key') as ThemeColorKey | null)) || null;
const savedPrimary = typeof localStorage !== 'undefined' ? localStorage.getItem('admin_theme_primary') : null;

const initialOption = (savedKey && themeColorOptions.find((opt) => opt.key === savedKey)) ||
  (savedPrimary && themeColorOptions.find((opt) => opt.primary.toLowerCase() === savedPrimary.toLowerCase())) ||
  themeColorOptions[0];

const activeThemeColorKey = ref<ThemeColorKey>(initialOption.key);
const activePrimaryColor = ref<string>(initialOption.primary);

const currentThemeColorName = computed(() => {
  const match = themeColorOptions.find(
    (c) => c.key === activeThemeColorKey.value || c.primary.toLowerCase() === activePrimaryColor.value.toLowerCase()
  );
  return match?.label || 'Custom';
});

function applyThemeColor(colorKey: ThemeColorKey) {
  const option = themeColorOptions.find((entry) => entry.key === colorKey);
  if (!option) return;

  activeThemeColorKey.value = colorKey;
  activePrimaryColor.value = option.primary;

  for (const definition of Object.values(theme.themes.value)) {
    definition.colors.primary = option.primary;
    definition.colors['primary-darken-1'] = option.primaryDarken1;
  }

  if (typeof localStorage !== 'undefined') {
    localStorage.setItem('admin_theme_key', colorKey);
    localStorage.setItem('admin_theme_primary', option.primary);
  }
}

export interface NavItem {
  title: string;
  routeName?: string;
  icon?: string;
  badge?: string | number;
  badgeColor?: string;
  disabled?: boolean;
  routeParams?: Record<string, string | number> | null;
}

export interface NavGroup {
  group: string;
  icon?: string;
  routeName?: string;
  routeParams?: Record<string, string | number> | null;
  items?: NavItem[];
}

const { md, mdAndUp, lgAndUp, smAndDown } = useDisplay();

// Helper to retrieve saved desktop rail state from localStorage
function getSavedDesktopRail(): boolean {
  if (typeof localStorage !== 'undefined') {
    const saved = localStorage.getItem('admin_desktop_rail');
    if (saved !== null) {
      return saved === 'true';
    }
  }
  return false; // Desktop default: expanded
}

const desktopRail = ref(getSavedDesktopRail());
const desktopDrawer = ref(true);
const mobileDrawer = ref(false);

const isBaseDrawerRail = computed(() => {
  if (lgAndUp.value) return desktopRail.value;
  return true; // Medium (md) is always 64px rail
});

function toggleRail() {
  if (lgAndUp.value) {
    desktopRail.value = !desktopRail.value;
    if (typeof localStorage !== 'undefined') {
      localStorage.setItem('admin_desktop_rail', String(desktopRail.value));
    }
  } else {
    // Medium device or mobile: trigger mobile device drawer
    mobileDrawer.value = !mobileDrawer.value;
  }
}

// Watch route changes to close mobile drawer on navigation
watch(
  () => route.fullPath,
  () => {
    mobileDrawer.value = false;
  }
);

// Reset mobile drawer on breakpoint change
watch(
  [lgAndUp, md, smAndDown],
  () => {
    mobileDrawer.value = false;
    if (lgAndUp.value) {
      desktopRail.value = getSavedDesktopRail();
    }
  },
  { immediate: true },
);

const isLoggingOut = ref(false);
const profile = ref<UserProfile | null>(null);
const isAdminLoading = ref(false);
const openGroups = ref<string[]>([]);
const notificationCount = ref(0);

const menuGroups = computed<NavGroup[]>(() => [
  {
    group: 'Dashboard',
    icon: 'mdi-chart-line',
    routeName: 'adminDashboardPage',
  },
  {
    group: 'Treks / Tours',
    icon: 'mdi-briefcase-variant',
    routeName: 'adminPackagePage',
  },
  {
    group: 'Fixed Departure',
    icon: 'mdi-calendar-check',
    routeName: 'adminFeaturedPackagePage',
  },
  {
    group: 'Guide Profile',
    icon: 'mdi-account-cowboy-hat-outline',
    routeName: 'adminGuidePage',
  },
  {
    group: 'Regions',
    icon: 'mdi-tag-multiple-outline',
    routeName: 'adminDestinationPage',
  },
  {
    group: 'Blogs',
    icon: 'mdi-post-outline',
    routeName: 'adminBlogPage',
  },
  {
    group: 'Blog Categories',
    icon: 'mdi-folder-multiple-outline',
    routeName: 'adminBlogCategorypage',
  },
  {
    group: 'Inquiries',
    icon: 'mdi-message-question-outline',
    routeName: 'adminInquiryPage',
  },
  {
    group: 'Bookings',
    icon: 'mdi-calendar-check-outline',
    routeName: 'adminBookingPage',
  },
  {
    group: 'Customers',
    icon: 'mdi-account-group-outline',
    routeName: 'adminCustomerPage',
  },
  {
    group: 'Settings',
    icon: 'mdi-cog-outline',
    items: [
      { title: 'Pages', routeName: 'adminWebPage', icon: 'mdi-file-document-outline' },
      { title: 'Banners', routeName: 'adminBannerPage', icon: 'mdi-image-area' },
      { title: 'All Images', routeName: 'adminGalleryPage', icon: 'mdi-image' },
      { title: 'Notifications', routeName: 'adminNotificationPage', icon: 'mdi-bell-outline' },
      { title: 'General Settings', routeName: 'adminGeneralSettingPage', icon: 'mdi-cog-outline' },
      { title: 'Lookups', routeName: 'adminLookupPage', icon: 'mdi-format-list-bulleted-type' },
    ],
  },
  {
    group: 'FAQs',
    icon: 'mdi-file-document-outline',
    routeName: 'adminFAQPage',
  },
]);

const adminDisplayName = computed(() => {
  return profile.value?.name?.trim() || 'Admin';
});

const adminUsername = computed(() => {
  return profile.value?.email?.trim() || '';
});

const userInitials = computed(() => {
  const name = adminDisplayName.value;
  if (!name) return 'AD';
  const parts = name.trim().split(/\s+/);
  if (parts.length >= 2 && parts[0] && parts[1]) {
    return (parts[0][0] + parts[1][0]).toUpperCase();
  }
  return name.slice(0, 2).toUpperCase() || 'AD';
});

function isRouteActive(routeName?: string): boolean {
  if (!routeName) return false;
  return route.name === routeName || Boolean(route.matched?.some((m) => m.name === routeName));
}

function isGroupActive(group: NavGroup): boolean {
  if (group.routeName && isRouteActive(group.routeName)) return true;
  return Boolean(group.items?.some((item) => isRouteActive(item.routeName)));
}

function buildRouteTo(routeName?: string, routeParams?: Record<string, string | number> | null): RouteLocationRaw | undefined {
  if (!routeName) return undefined;
  return routeParams ? { name: routeName, params: routeParams } : { name: routeName };
}

// Automatically expand active group on route change
watch(
  () => route.name,
  () => {
    const activeGroup = menuGroups.value.find((g) => g.items?.some((item) => isRouteActive(item.routeName)));
    if (activeGroup && !openGroups.value.includes(activeGroup.group)) {
      openGroups.value = [activeGroup.group];
    }
  },
  { immediate: true },
);

async function loadProfile() {
  if (!localStorage.getItem('token')) {
    return;
  }

  isAdminLoading.value = true;
  try {
    const response = await profileApi();
    profile.value = response.data;
    notificationCount.value = Number(response.notification_count ?? 0);
  } catch (error) {
    console.error('Failed to load admin profile', error);
    profile.value = null;
    notificationCount.value = 0;
  } finally {
    isAdminLoading.value = false;
  }
}

async function logout() {
  if (isLoggingOut.value) return;

  isLoggingOut.value = true;
  try {
    try {
      await logoutApi();
    } catch {
      // Ignore network failure during logout request
    }
    localStorage.removeItem('token');
    profile.value = null;
    await router.push({ name: 'adminLoginPage' });
  } finally {
    isLoggingOut.value = false;
  }
}

onMounted(() => {
  applyThemeColor(activeThemeColorKey.value);
  void loadProfile();
});
</script>

<style lang="scss">
.app-layout {
  background:
    radial-gradient(circle at top left, rgba(79, 70, 229, 0.08), transparent 30%),
    radial-gradient(circle at top right, rgba(14, 165, 233, 0.08), transparent 24%),
    linear-gradient(180deg, #f8fbff 0%, #ffffff 56%, #f7f9fc 100%);
}

.app-main {
  min-height: 100vh;
}

.main-container-content {
  min-height: calc(100vh - 64px);
  max-height: calc(100vh - 64px);
  overflow-y: auto;
}

.app-left-drawer,
.app-mobile-drawer {
  transition: width 0.25s cubic-bezier(0.4, 0, 0.2, 1), transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);

  .v-navigation-drawer__content {
    padding: 0 8px;
  }

  .user-card-bottom {
    background: rgba(255, 255, 255, 0.12);
  }

  .active-nav-item {
    background-color: rgba(255, 255, 255, 0.18) !important;
    color: #ffffff !important;
    font-weight: 600;

    .v-list-item-title,
    .v-icon {
      color: #ffffff !important;
    }
  }

  .v-list-item {
    align-items: center;
    transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1), padding 0.25s cubic-bezier(0.4, 0, 0.2, 1);

    .v-list-item__prepend {
      align-self: center;
      display: inline-flex;
      align-items: center;
      line-height: 1;

      >.v-icon {
        font-size: 18px !important;
        width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        margin: auto 0;
        transition: font-size 0.25s cubic-bezier(0.4, 0, 0.2, 1), width 0.25s cubic-bezier(0.4, 0, 0.2, 1), height 0.25s cubic-bezier(0.4, 0, 0.2, 1), transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      }
    }

    .v-list-item__content {
      align-self: center;
      display: flex;
      align-items: center;
    }

    .v-list-item-title {
      line-height: 1 !important;
      display: flex;
      align-items: center;
      margin: auto 0;
    }
  }

  &.v-navigation-drawer--rail,
  &.v-navigation-drawer--rail .v-list-item,
  .v-navigation-drawer--rail .v-list-item {
    .v-list-item__prepend>.v-icon {
      font-size: 24px !important;
      width: 24px !important;
      height: 24px !important;
    }
  }

  .group-activator {
    font-size: 0.75rem;
    letter-spacing: 0.05em;
    opacity: 0.85;
    color: #ffffff;
  }

  .v-list-group__items .v-list-item {
    --indent-padding: 0px !important;
    padding-inline-start: 12px !important;

    .v-list-item__prepend .v-icon {
      font-size: 16px !important;
      opacity: 0.8;
    }
  }

  .submenu-item {
    color: rgba(255, 255, 255, 0.85);

    &:hover {
      background-color: rgba(255, 255, 255, 0.08);
      color: #ffffff;
    }
  }
}

.app-header-bar {
  backdrop-filter: blur(8px);
}
</style>
