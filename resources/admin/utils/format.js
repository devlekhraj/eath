// utils/time.js
export function formatTime12h(time24) {
  if (!time24) return 'N/A'
  const [hourStr, minute] = time24.split(':')
  let hour = parseInt(hourStr, 10)

  const ampm = hour >= 12 ? 'PM' : 'AM'
  hour = hour % 12
  if (hour === 0) hour = 12

  return `${hour}:${minute} ${ampm}`
}
export function formatDate(date) {
  if (!date) return 'N/A'
  const d = new Date(date)

  const year = d.getFullYear()
  const month = String(d.getMonth() + 1).padStart(2, '0')
  const day = String(d.getDate()).padStart(2, '0')

  return `${year}/${month}/${day}`
}

export function formatDateTime(dateTime) {
  if (!dateTime) return 'N/A'
  const d = new Date(dateTime)

  const year = d.getFullYear()
  const month = String(d.getMonth() + 1).padStart(2, '0')
  const day = String(d.getDate()).padStart(2, '0')
  const hours = String(d.getHours()).padStart(2, '0')
  const minutes = String(d.getMinutes()).padStart(2, '0')

  return `${year}/${month}/${day} ${hours}:${minutes}`
}

export function formatAmount(amount) {
  if (amount == null || isNaN(amount)) return 'N/A'

  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  }).format(amount)
}

export function formatPhoneNumber(phone) {
  if (!phone) return 'N/A'

  // Remove all non-numeric characters
  const cleaned = phone.toString().replace(/\D/g, '')

  // Must be exactly 10 digits for standard US format
  if (cleaned.length !== 10) return phone

  const areaCode = cleaned.slice(0, 3)
  const centralOffice = cleaned.slice(3, 6)
  const lineNumber = cleaned.slice(6)

  return `(${areaCode}) ${centralOffice}-${lineNumber}`
}
