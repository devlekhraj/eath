<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const examTerms = ref([])

const headers = [
  { title: 'ID', key: 'id' },
  { title: 'Name', key: 'name' },
  { title: 'Code', key: 'code' },
  { title: 'Description', key: 'description' },
  { title: 'Created At', key: 'created_at' },
  { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
]

async function fetchExamTerms() {
  try {
    const response = await axios.get('/admin/exam-terms')
    examTerms.value = response.data
  } catch (error) {
    console.error('Failed to fetch exam terms:', error)
  }
}

function editExamTerm(item) {
  alert(`Edit exam term: ${item.name}`)
  // Implement your edit logic here
}

function deleteExamTerm(item) {
  const confirmed = confirm(`Are you sure you want to delete "${item.name}"?`)
  if (confirmed) {
    alert(`Deleted exam term: ${item.name}`)
    // Implement your delete logic here (API call)
  }
}

onMounted(() => {
  fetchExamTerms()
})
</script>

<template>
  <div>
    <h2>Exam Terms</h2>

    <v-data-table :headers="headers" :items="examTerms" item-value="id">
      <template #item.created_at="{ item }">
        {{ new Date(item.created_at).toLocaleDateString() }}
      </template>

      <template #item.actions="{ item }">
        <v-btn icon variant="text" size="small" @click="editExamTerm(item)">
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon variant="text" size="small" color="red" @click="deleteExamTerm(item)">
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>
