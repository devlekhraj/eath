<template>
    <div>
        <ModalTemplate ref="modalRef" />
        <button @click="openModal">Open Modal with Form</button>
        <button @click="closeModal">Close Modal</button>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import RouteForm from './ClassRoutineForm.vue'

const modalRef = ref(null)

function openModal() {
    modalRef.value.open({
        title: 'Edit Class Routine',
        component: RouteForm,
        size: 'xl',
        props: {
            classId: 101,
            date: '2025-07-06',
        },
    })
}

function closeModal() {
    modalRef.value.close()
}
</script>
