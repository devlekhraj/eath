<template>
    <v-dialog v-model="show" :width="dialogWidth" persistent scrollable>
        <component :is="currentComponent" v-bind="componentProps" 
        @onClose="handleClose"
        v-if="currentComponent" />
    </v-dialog>
</template>

<script>
export default {
    name: 'ModalTemplate',
    props: {
        hideHeader: {
            type: Boolean,
            default: false,
        },
        size: {
            type: String,
            default: 'md',
        },
    },
    data() {
        return {
            show: false,
            title: '',
            currentComponent: null,
            componentProps: {},
            dialogWidth: 600,
            sizeMap: {
                sm: 300,
                md: 600,
                lg: 900,
                xl: 1200,
            },
        }
    },
    watch: {
        size(newSize) {
            this.dialogWidth = this.sizeMap[newSize] || this.sizeMap.md
        },
    },
    methods: {
        open({ title = '', component = null, size = 'md', props = {} }) {
            this.title = title
            this.currentComponent = component
            this.componentProps = props
            this.dialogWidth = this.sizeMap[size] || this.sizeMap.md
            this.show = true
        },
        close() {
            this.show = false
            this.$emit('close')
        },
        handleClose() {
            this.close()
        },
    },
}
</script>
