<template>
    <div>
        <div class="text-right pt-4">
            <v-btn variant="tonal" color="primary" @click="editBio()"> <v-icon>mdi-pencil</v-icon> Update </v-btn>
        </div>
        <div>
            <SummarnoteViewer :value="guide.bio"/>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import ModalBioForm from '@/modal-form/guides/ModalBioForm.vue'
import SummarnoteViewer from '@/components/SummarnoteViewer.vue'

import { useGlobalModal } from '@/composables/globalModal'
const emit = defineEmits(['close', 'saved'])
const { open: openModal } = useGlobalModal()


const props = defineProps({
    guide: {
        type: Object,
        default: () => ({}),
    },
})




function editBio() {
    openModal({
        title: 'Update Bio',
        component: ModalBioForm,
        size: 'xl',
        props: {
            item: props.guide, // <-- correctly passed as a prop
        },
        onClose: handleClose,
    });
}
function handleClose() {
    // You can refresh data or show a message here after modal closes
    emit('close')
}   

onMounted(() => {
})
</script>

<style scoped></style>
