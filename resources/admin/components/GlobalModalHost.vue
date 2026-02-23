<template>
    <v-dialog v-model="state.show" :width="state.dialogWidth" persistent scrollable>
        <component :is="state.currentComponent" v-if="state.currentComponent" v-bind="state.componentProps" @onClose="handleClose"
            @close="handleClose" @saved="handleSaved" />
    </v-dialog>
</template>

<script setup>
import { useGlobalModal } from '@/composables/globalModal'

const modal = useGlobalModal()
const state = modal.state

function handleClose(payload) {
    modal.close(payload)
}

function handleSaved(payload) {
    modal.saved(payload)
}
</script>
