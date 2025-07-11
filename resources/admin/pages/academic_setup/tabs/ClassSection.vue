<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const grades = ref([])

async function fetchGrades() {
    try {
        const res = await axios.get('/admin/grades') // Your API endpoint here
        grades.value = res.data
    } catch (error) {
        console.error('Failed to fetch grades:', error)
    }
}

function editGrade(item) {
    alert('Edit grade: ' + item.name)
}

function deleteGrade(item) {
    alert('Delete grade: ' + item.name)
}

onMounted(() => {
    fetchGrades()
})
</script>

<template>
    <div>
        <v-btn color="primary" class="mb-4">Add Grade</v-btn>

        <v-data-table :headers="[
            { title: 'Grade Name', key: 'name' },
            { title: 'Label', key: 'label' },
            { title: 'Sections', key: 'sections' },
            { title: 'Actions', key: 'actions', sortable: false, align: 'end' }
        ]" :items="grades" item-value="id">
            <template #item.sections="{ item }">
                <span v-if="item.sections && item.sections.length > 0">
                    {{item.sections.map(s => s.name).join(', ')}}
                </span>
                <span v-else>
                    No sections
                </span>
            </template>

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
