<template>
    <v-dialog v-model="show" :width="dialogWidth" persistent scrollable>
        <component :is="currentComponent" v-bind="componentProps" v-if="currentComponent" @onClose="handleClose"
            @close="handleClose" @saved="success" />
    </v-dialog>
</template>

<script>
import { markRaw } from 'vue';

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
        };
    },
    watch: {
        size(newSize) {
            this.dialogWidth = this.sizeMap[newSize] || this.sizeMap.md;
        },
    },
    methods: {
        open({ title = '', component = null, size = 'md', props = {} }) {
            this.title = title;
            this.currentComponent = markRaw(component); // Prevent Vue from making it reactive
            this.componentProps = props;
            this.dialogWidth = this.sizeMap[size] || this.sizeMap.md;
            this.show = true;
        },
        close() {
            this.show = false;
            this.$emit('close');
        },
        handleClose() {
            this.close();
        },
        success() {
            this.$emit('saved');
        },
    },
};
</script>
