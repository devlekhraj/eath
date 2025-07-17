<script setup lang="ts">
import { ref, defineEmits, defineProps, watch } from 'vue'
import {
    BaseKit,
    Bold,
    Color,
    TextAlign,
    Heading,
    Highlight,
    History,
    Image,
    Italic,
    Link,
    Strike,
    Table,
    Underline,
    Video,
    VuetifyTiptap,
} from 'vuetify-pro-tiptap'

const props = defineProps<{
    modelValue: string
}>()

const emit = defineEmits(['update:modelValue'])

const content = ref(props.modelValue)

watch(content, (val) => emit('update:modelValue', val))
watch(() => props.modelValue, (val) => {
    if (val !== content.value) {
        content.value = val
    }
})

const extensions = [
    BaseKit.configure({
        placeholder: {
            placeholder: 'Type here...'
        }
    }),
    Bold,
    Italic,
    Underline,
    Strike,
    Color,
    Highlight,
    Heading,
    Link,
    Image.configure({
        inline: false,
        allowBase64: true,
        upload(file: File) {
            return new Promise((resolve) => {
                const reader = new FileReader()
                reader.onload = () => resolve(reader.result as string)
                reader.readAsDataURL(file)
            })
        }
    }),
    Video,
    Table,
    History,
    TextAlign,

]
</script>

<template>
    <VuetifyTiptap v-model="content" :min-height="400" style="max-height: calc(100vh - 100px)" class="p-4"
        :placeholder="'Type here...'" :toolbar="true" :toolbar-position="'top'" :extensions="extensions" />
</template>
