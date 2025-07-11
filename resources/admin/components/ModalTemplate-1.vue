<template>
    <v-dialog v-model="show" :width="dialogWidth" persistent scrollable>
        <component :is="currentComponent" v-bind="componentProps" v-if="currentComponent" />
    </v-dialog>
</template>

<script setup>
import { ref, defineExpose, defineProps, watch } from 'vue'

const props = defineProps({
    hideHeader: {
        type: Boolean,
        default: false,
    },
    size: {
        type: String,
        default: 'md',
    },
})

const show = ref(false)
const title = ref('')
const currentComponent = ref(null)
const componentProps = ref({})

const sizeMap = {
    sm: 300,
    md: 600,
    lg: 900,
    xl: 1200,
}

const dialogWidth = ref(sizeMap[props.size] || sizeMap.md)

watch(
    () => props.size,
    (newSize) => {
        dialogWidth.value = sizeMap[newSize] || sizeMap.md
    }
)

function open({ title: newTitle = '', component = null, size = 'md', props = {} }) {
    title.value = newTitle
    currentComponent.value = component
    componentProps.value = props
    dialogWidth.value = sizeMap[size] || sizeMap.md
    show.value = true
}

function close() {
    show.value = false
}

defineExpose({
    open,
    close,
})
</script>
