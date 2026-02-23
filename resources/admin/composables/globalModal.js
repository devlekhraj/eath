import { markRaw, reactive } from 'vue'

const sizeMap = {
    sm: 300,
    md: 600,
    lg: 900,
    xl: 1200,
}

const state = reactive({
    show: false,
    title: '',
    currentComponent: null,
    componentProps: {},
    dialogWidth: sizeMap.md,
})

let onCloseHandler = null
let onSavedHandler = null

function open({ title = '', component = null, size = 'md', props = {}, onClose = null, onSaved = null } = {}) {
    state.title = title
    state.currentComponent = component ? markRaw(component) : null
    state.componentProps = props || {}
    state.dialogWidth = sizeMap[size] || sizeMap.md
    onCloseHandler = typeof onClose === 'function' ? onClose : null
    onSavedHandler = typeof onSaved === 'function' ? onSaved : null
    state.show = true
}

function close(payload) {
    state.show = false
    const handler = onCloseHandler
    onCloseHandler = null
    onSavedHandler = null
    if (handler) handler(payload)
}

function saved(payload) {
    if (onSavedHandler) onSavedHandler(payload)
}

export function useGlobalModal() {
    return {
        state,
        open,
        close,
        saved,
    }
}
