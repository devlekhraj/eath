<script setup lang="ts">
import { ref, defineEmits, defineProps, watch } from 'vue'
// import axios from '@/axios.config'
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
    BulletList,
    OrderedList,
    VuetifyTiptap,
    Code,
    CodeBlock,
    HorizontalRule,
    Blockquote
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
    BulletList,
    OrderedList,
    Italic,
    Underline,
    Strike,
    Color,
    Highlight,
    Heading,
    Link,
    Code,
    CodeBlock,
    Blockquote,
    HorizontalRule,
    Image.configure({
        inline: false,
        allowBase64: false,
        upload(file) {
            const formData = new FormData();
            formData.append('image', file);

            return axios.post('/admin/gallery-upload', formData)
                .then(response => {
                    console.log(response.url);
                    if (response && response.url) {
                        return response.url; // must return URL string here!
                    }
                    return Promise.reject('Upload failed');
                })
                .catch(err => {
                    console.error('Upload error:', err);
                    return Promise.reject(err);
                });
        }
    }),

    Video,
    Table,
    History,
    TextAlign,

]
</script>

<template>
    <VuetifyTiptap v-model="content" :min-height="200" style="max-height: calc(100vh - 290px)" class="p-4"
        :placeholder="'Type here...'" :toolbar="true" :toolbar-position="'top'" :extensions="extensions" />
</template>
