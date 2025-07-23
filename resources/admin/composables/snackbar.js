// composables/snackbar.js
import { ref, inject, provide } from 'vue'

const SnackbarSymbol = Symbol('Snackbar')

export function createSnackbar() {
    const show = ref(false)
    const message = ref('')
    const color = ref('success') // 'success' | 'error' | 'info' | 'warning'

    function showSuccess(msg) {
        message.value = msg
        color.value = 'success'
        show.value = true
    }

    function showError(msg) {
        message.value = msg
        color.value = 'error'
        show.value = true
    }

    function showInfo(msg) {
        message.value = msg
        color.value = 'info'
        show.value = true
    }

    return {
        show,
        message,
        color,
        showSuccess,
        showError,
        showInfo,
    }
}

export function provideSnackbar() {
    const snackbar = createSnackbar()
    provide(SnackbarSymbol, snackbar)
    return snackbar
}

export function useSnackbar() {
    const snackbar = inject(SnackbarSymbol)
    if (!snackbar) {
        throw new Error('Snackbar not provided')
    }
    return snackbar
}
