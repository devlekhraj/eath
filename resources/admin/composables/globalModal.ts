import { markRaw, reactive } from 'vue'
import type { Component } from 'vue'

type ModalSize = 'sm' | 'md' | 'lg' | 'xl'

const sizeMap: Record<ModalSize, number> = {
    sm: 300,
    md: 600,
    lg: 900,
    xl: 1200,
}

interface ModalState {
    show: boolean
    title: string
    currentComponent: Component | null
    componentProps: Record<string, unknown>
    dialogWidth: number
}

interface OpenOptions {
    title?: string
    component?: Component | null
    size?: ModalSize
    props?: Record<string, unknown>
    onClose?: ((payload?: unknown) => void) | null
    onSaved?: ((payload?: unknown) => void) | null
}

const state = reactive<ModalState>({
    show: false,
    title: '',
    currentComponent: null,
    componentProps: {},
    dialogWidth: sizeMap.md,
})

let onCloseHandler: ((payload?: unknown) => void) | null = null
let onSavedHandler: ((payload?: unknown) => void) | null = null

function open({ title = '', component = null, size = 'md', props = {}, onClose = null, onSaved = null }: OpenOptions = {}) {
    state.title = title
    state.currentComponent = component ? markRaw(component) : null
    state.componentProps = props || {}
    state.dialogWidth = sizeMap[size] || sizeMap.md
    onCloseHandler = typeof onClose === 'function' ? onClose : null
    onSavedHandler = typeof onSaved === 'function' ? onSaved : null
    state.show = true
}

function close(payload?: unknown) {
    state.show = false
    const handler = onCloseHandler
    onCloseHandler = null
    onSavedHandler = null
    if (handler) handler(payload)
}

function saved(payload?: unknown) {
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
