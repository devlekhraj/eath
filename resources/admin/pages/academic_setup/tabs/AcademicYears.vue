<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const academicYears = ref([])

const headers = [
  { title: 'Academic Year', key: 'name' },
  { title: 'Status', key: 'status' },
  { title: 'Actions', key: 'actions', align: 'end', sortable: false },
]

async function fetchAcademicYears() {
  try {
    const res = await axios.get('/admin/academic-years')
    academicYears.value = res.data
  } catch (error) {
    console.error('Error fetching academic years:', error)
  }
}

function editYear(item) {
  console.log('Edit:', {item})
}

function deleteYear(item) {
  console.log('Delete:', {item})
}

onMounted(() => {
  fetchAcademicYears()
})
</script>


<template>
  <div>
    <v-btn color="primary" class="mb-4">Add Academic Year</v-btn>

    <v-data-table :headers="headers" :items="academicYears" item-value="id" class="elevation-0">
      <template #item.status="{ item }">
        <v-chip :color="item.is_active ? 'success' : 'grey'" small>
          {{ item.is_active ? 'Active' : 'Inactive' }}
        </v-chip>
      </template>

      <template #item.actions="{ item }">
        <div class="d-flex justify-end">
          <v-btn icon variant="text" size="small" @click="editYear(item)">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn icon variant="text" size="small" color="red" @click="deleteYear(item)">
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </div>
      </template>
    </v-data-table>
  </div>
</template>
