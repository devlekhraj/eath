/**
 * Universal Utilities for Formatting, Time, Numbers, Currency, and Dynamic Colors
 */

// ==========================================
// 1. Time & Date Formatting Functions
// ==========================================

export function formatTime12h(time24: string | null | undefined): string {
  if (!time24) return 'N/A';
  const [hourStr, minute] = time24.split(':');
  let hour = parseInt(hourStr, 10);

  const ampm = hour >= 12 ? 'PM' : 'AM';
  hour = hour % 12;
  if (hour === 0) hour = 12;

  return `${hour}:${minute} ${ampm}`;
}

export function timeAgo(date: string | number | Date | null | undefined): string {
  if (!date) return 'N/A';

  const now = new Date();
  const past = new Date(date);
  const diffInSeconds = Math.floor((now.getTime() - past.getTime()) / 1000);

  const units = [
    { max: 60, value: 1, name: 'second' as const },
    { max: 3600, value: 60, name: 'minute' as const },
    { max: 86400, value: 3600, name: 'hour' as const },
    { max: 604800, value: 86400, name: 'day' as const },
    { max: 2592000, value: 604800, name: 'week' as const },
    { max: 31536000, value: 2592000, name: 'month' as const },
    { max: Infinity, value: 31536000, name: 'year' as const },
  ];

  for (const unit of units) {
    if (diffInSeconds < unit.max) {
      const value = Math.floor(diffInSeconds / unit.value);
      const rtf = new Intl.RelativeTimeFormat('en', { numeric: 'auto' });
      return rtf.format(-value, unit.name);
    }
  }

  return 'a long time ago';
}

export function formatDate(date: string | number | Date | null | undefined): string {
  if (!date) return 'N/A';
  const d = new Date(date);
  if (isNaN(d.getTime())) return 'N/A';

  const year = d.getFullYear();
  const month = String(d.getMonth() + 1).padStart(2, '0');
  const day = String(d.getDate()).padStart(2, '0');

  return `${year}/${month}/${day}`;
}

export function formatDateTime(dateTime: string | number | Date | null | undefined): string {
  if (!dateTime) return 'N/A';
  const d = new Date(dateTime);
  if (isNaN(d.getTime())) return 'N/A';

  const year = d.getFullYear();
  const month = String(d.getMonth() + 1).padStart(2, '0');
  const day = String(d.getDate()).padStart(2, '0');
  const hours = String(d.getHours()).padStart(2, '0');
  const minutes = String(d.getMinutes()).padStart(2, '0');

  return `${year}/${month}/${day} ${hours}:${minutes}`;
}

// ==========================================
// 2. Number, Currency & Phone Formatting
// ==========================================

export function formatAmount(amount: number | string | null | undefined): string {
  if (amount == null) return 'N/A';
  const num = typeof amount === 'string' ? parseFloat(amount) : amount;
  if (isNaN(num)) return 'N/A';

  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  }).format(num);
}

export function formatPhoneNumber(phone: string | number | null | undefined): string {
  if (!phone) return 'N/A';

  // Remove all non-numeric characters
  const cleaned = phone.toString().replace(/\D/g, '');

  // Must be exactly 10 digits for standard US format
  if (cleaned.length !== 10) return String(phone);

  const areaCode = cleaned.slice(0, 3);
  const centralOffice = cleaned.slice(3, 6);
  const lineNumber = cleaned.slice(6);

  return `(${areaCode}) ${centralOffice}-${lineNumber}`;
}

// ==========================================
// 3. Dynamic Color & Dot Indicators
// ==========================================

// 12 maximally distinct high-contrast colors across the 360° color wheel
const DYNAMIC_PALETTE = [
  '#2563eb', // Royal Blue
  '#dc2626', // Crimson Red
  '#16a34a', // Vivid Green
  '#ea580c', // Bright Orange
  '#7c3aed', // Deep Violet
  '#0891b2', // Cyan
  '#ca8a04', // Mustard Gold
  '#db2777', // Magenta Pink
  '#0d9488', // Teal
  '#4f46e5', // Deep Indigo
  '#65a30d', // Lime
  '#c026d3', // Fuchsia
];

const UNASSIGNED_COLOR = '#94a3b8'; // Slate 400

/**
 * Deterministically generates a consistent hash integer for any string.
 * Uses djb2 hashing algorithm for uniform distribution across the palette.
 */
function hashString(str: string): number {
  let hash = 5381;
  for (let i = 0; i < str.length; i++) {
    hash = ((hash << 5) + hash) + str.charCodeAt(i); // hash * 33 + c
  }
  return Math.abs(hash);
}

/**
 * Returns a deterministic, distinct hexadecimal color code for any entity (string, number, or object).
 */
export function getColor(
  entity: string | number | { name?: string; title?: string; slug?: string; id?: string | number } | null | undefined
): string {
  if (!entity) return UNASSIGNED_COLOR;

  let text = '';
  if (typeof entity === 'string' || typeof entity === 'number') {
    text = String(entity).trim().toLowerCase();
  } else if (typeof entity === 'object') {
    text = (entity.slug || entity.name || entity.title || (entity.id ? `id-${entity.id}` : '')).trim().toLowerCase();
  }

  if (!text) return UNASSIGNED_COLOR;

  const hash = hashString(text);
  const colorIndex = hash % DYNAMIC_PALETTE.length;
  return DYNAMIC_PALETTE[colorIndex];
}

/**
 * Returns an inline style object containing the background-color and standard dimensions for dot indicators.
 */
export function dotStyle(
  entity: string | number | { name?: string; title?: string; slug?: string; id?: string | number } | null | undefined
): { backgroundColor: string; width: string; height: string } {
  return {
    backgroundColor: getColor(entity),
    width: '7px',
    height: '7px',
  };
}

export const colorStyle = dotStyle;
export const regionStyle = dotStyle;
export const categoryStyle = dotStyle;

// ==========================================
// 4. Date & Status Helpers
// ==========================================

const humanDateFormatter = new Intl.DateTimeFormat('en', {
  month: 'short',
  day: 'numeric',
  year: 'numeric',
});

export const formatHuman = (val?: string | Date | null): string => {
  if (!val) return '';
  const d = new Date(val);
  if (Number.isNaN(d.getTime())) return String(val);
  return humanDateFormatter.format(d);
};

export const formatYmd = (val?: string | Date | null): string => {
  if (!val) return '';
  const d = new Date(val);
  if (Number.isNaN(d.getTime())) return String(val);
  return d.toISOString().slice(0, 10);
};

/**
 * Universal Status Color Resolver for Vuetify Chips across all admin pages.
 */
export function getStatusColor(status?: string | boolean | number | null): string {
  if (status === null || status === undefined) return 'primary';
  if (typeof status === 'boolean') return status ? 'success' : 'secondary';
  
  const key = String(status).trim().toLowerCase();
  switch (key) {
    case 'open':
    case 'active':
    case 'replied':
    case 'published':
    case '1':
    case 'true':
      return 'success';
    case 'limited':
    case 'filling_fast':
    case 'reviewing':
    case 'pending':
    case 'draft':
      return 'warning';
    case 'guaranteed':
      return 'info';
    case 'full':
    case 'cancelled':
    case 'rejected':
    case 'new':
      return 'error';
    case 'closed':
    case 'inactive':
    case 'completed':
    case '0':
    case 'false':
      return 'secondary';
    default:
      return 'primary';
  }
}

