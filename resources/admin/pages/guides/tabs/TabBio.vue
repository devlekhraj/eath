<template>
    <div>
        <div class="text-right">
            <v-btn icon variant="tonal" color="primary" @click="editBio()"> <v-icon>mdi-pencil</v-icon> </v-btn>
        </div>
        <p>bio</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, aut.</p>


        <modal-template ref="globalModal" @close="handleClose"></modal-template>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import ModalBioForm from './modal/ModalBioForm.vue'

import { useSnackbar } from '@/composables/snackbar'

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


onMounted(() => {
})
</script>

<style scoped></style>