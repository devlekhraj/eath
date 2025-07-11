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

export function formatDateYMD(date) {
  if (!date) return 'N/A'
  const d = new Date(date)

  const year = d.getFullYear()
  const month = String(d.getMonth() + 1).padStart(2, '0')
  const day = String(d.getDate()).padStart(2, '0')

  return `${year}/${month}/${day}`
}
