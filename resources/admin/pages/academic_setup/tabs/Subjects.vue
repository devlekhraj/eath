<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const subjects = ref([])

const headers = [
    { title: 'Subject Name', key: 'name', sortable: true },
    { title: 'Code', key: 'code', sortable: true },
    { title: 'Description', key: 'description', sortable: false },
    // Optional Status if you add is_active column in your subjects table:
    // { title: 'Status', key: 'status', sortable: true, align: 'center' },
    { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
]

async function fetchSubjects() {
    try {
        const res = await axios.get('/admin/subjects')
        subjects.value = res.data
    } catch (error) {
        console.error('Error fetching subjects:', error)
    }
}

function editSubject(item) {
    console.log('Edit:', item)
}

function deleteSubject(item) {
    console.log('Delete:', item)
}

onMounted(() => {
    fetchSubjects()
})
</script>

<template>
    <div>
        <v-btn color="primary" class="mb-4">Add Subject</v-btn>

        <v-data-table :headers="headers" :items="subjects" item-value="id" class="elevation-0" dense>
            <!-- Optional status column template if is_active exists -->
            <!--
      <template #item.status="{ item }">
        <v-chip :color="item.is_active ? 'success' : 'grey'" small>
          {{ item.is_active ? 'Active' : 'Inactive' }}
        </v-chip>
      </template>
-->

            <template #item.actions="{ item }">
                <div class="d-flex justify-end gap-2">
                    <v-btn icon variant="text" size="small" @click="editSubject(item)">
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn icon variant="text" size="small" color="red" @click="deleteSubject(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </div>
            </template>
        </v-data-table>
    </div>
</template>
