<template>
    <div>
        <div class="text-right pt-4">
            <v-btn variant="tonal" color="primary" @click="editBio()"> <v-icon>mdi-pencil</v-icon> Update </v-btn>
        </div>
        <div>
            <SummarnoteViewer :value="guide.bio"/>
        </div>
        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import ModalBioForm from './modal/ModalBioForm.vue'

import { useSnackbar } from '@/composables/snackbar'
const emit = defineEmits(['close', 'saved'])
const { showSuccess, showError } = useSnackbar()

const props = defineProps({
    guide: {
        type: Object,
        default: () => ({}),
    },
})


const globalModal = ref(null);


function editBio() {
    globalModal.value.open({
        title: 'Update Bio',
        component: ModalBioForm,
        size: 'xl',
        props: {
            item: props.guide, // <-- correctly passed as a prop
        },
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