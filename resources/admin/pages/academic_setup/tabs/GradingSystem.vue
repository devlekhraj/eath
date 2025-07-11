<script setup>
import { ref } from 'vue'

const gradingScale = ref([
  { grade: 'A+', point: 4.0, description: 'Excellent' },
  { grade: 'A', point: 4.0, description: 'Excellent' },
  { grade: 'B+', point: 3.5, description: 'Very Good' },
  { grade: 'B', point: 3.0, description: 'Good' },
  { grade: 'C+', point: 2.5, description: 'Above Average' },
  { grade: 'C', point: 2.0, description: 'Average' },
  { grade: 'D+', point: 1.5, description: 'Below Average' },
  { grade: 'D', point: 1.0, description: 'Poor' },
  { grade: 'F', point: 0.0, description: 'Fail' },
])

function addGrade() {
  alert('Add Grade clicked')
}

function editGrade(item) {
  alert(`Edit grade ${item.grade}`)
}

function deleteGrade(item) {
  alert(`Delete grade ${item.grade}`)
}

const headers = [
  { title: 'Grade', key: 'grade' },
  { title: 'Grade Point', key: 'point' },
  { title: 'Description', key: 'description' },
  { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
]
</script>

<template>
  <div>
    <h2 class="mb-4">Student Grading System</h2>

    <v-btn color="primary" class="mb-4" @click="addGrade">Add Grade</v-btn>

    <v-data-table :headers="headers" :items="gradingScale" item-value="grade" :hide-default-footer="true">
      <template #item.actions="{ item }">
        <v-btn icon variant="text" size="small" @click="editGrade(item)">
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon variant="text" size="small" color="red" @click="deleteGrade(item)">
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<style scoped>
h2 {
  font-weight: 600;
}
</style>
