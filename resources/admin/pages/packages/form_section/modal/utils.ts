const dateFormatter = new Intl.DateTimeFormat('en', {
	month: 'short',
	day: 'numeric',
	year: 'numeric',
})

export const formatHuman = (val?: string | Date | null): string => {
	if (!val) return ''
	const d = new Date(val)
	if (Number.isNaN(d.getTime())) return String(val)
	return dateFormatter.format(d)
}

export const formatYmd = (val?: string | Date | null): string => {
	if (!val) return ''
	const d = new Date(val)
	if (Number.isNaN(d.getTime())) return String(val)
	return d.toISOString().slice(0, 10)
}
