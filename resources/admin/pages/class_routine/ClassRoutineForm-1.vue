<script setup>
import { ref, computed } from 'vue'

defineProps({
    classId: Number,
    date: String,
})

const selectedDays = ref([
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday'
])

const daysOfWeek = [
    { label: 'Sun', value: 'Sunday' },
    { label: 'Mon', value: 'Monday' },
    { label: 'Tue', value: 'Tuesday' },
    { label: 'Wed', value: 'Wednesday' },
    { label: 'Thu', value: 'Thursday' },
    { label: 'Fri', value: 'Friday' },
    { label: 'Sat', value: 'Saturday' },
]

const grades = ref([
    {
        id: 1,
        name: 'Grade 1',
        sections: [
            { id: 'A', name: 'Section A' },
            { id: 'B', name: 'Section B' },
        ]
    },
    {
        id: 2,
        name: 'Grade 2',
        sections: [
            { id: 'A', name: 'Section A' },
            { id: 'C', name: 'Section C' },
        ]
    },
    {
        id: 3,
        name: 'Grade 3',
        sections: [
            { id: 'B', name: 'Section B' },
            { id: 'C', name: 'Section C' },
        ]
    }
])

const selectedGradeId = ref(null)
const selectedSectionId = ref(null)

const filteredSections = computed(() => {
    const grade = grades.value.find(g => g.id === selectedGradeId.value)
    return grade ? grade.sections : []
})

const subjects = ref([
    { id: 1, name: 'Math' },
    { id: 2, name: 'Science' },
    { id: 3, name: 'English' },
])

const teachers = ref([
    { id: 1, name: 'Mr. Smith' },
    { id: 2, name: 'Ms. Johnson' },
    { id: 3, name: 'Mrs. Lee' },
])

const routineRows = ref([
    {
        subject: null,
        teacher: null,
        startTime: null,
        endTime: null,
        isBreak: false,
        remarks: '',
    }
])

function addRow() {
    routineRows.value.push({
        subject: null,
        teacher: null,
        startTime: null,
        endTime: null,
        isBreak: false,
        remarks: '',
    })
}

function removeRow(index) {
    if (routineRows.value.length > 1) {
        routineRows.value.splice(index, 1)
    }
}

function submitRoutine() {
    const payload = {
        grade_id: selectedGradeId.value,
        section_id: selectedSectionId.value,
        days: selectedDays.value,
        date: {
            start: null,
            end: null,
        },
        routines: routineRows.value,
    }

    console.log('Submitting routine:', payload)
    // alert('Submitted! See console for data.')
}
</script>

<template>
    <v-card>
        <v-card-title>
            Daily Class Routine - Class {{ classId }} - Date {{ date }}
        </v-card-title>
        <v-divider></v-divider>

        <v-card-text>
            <v-form>
                <v-row>
                    <v-col cols="12" md="3" class="pb-0">
                        <v-select v-model="selectedGradeId" :items="grades" item-title="name" item-value="id"
                            label="Grade" variant="outlined" density="comfortable" />
                    </v-col>

                    <v-col cols="12" md="3" class="pb-0">
                        <v-select v-model="selectedSectionId" :items="filteredSections" item-title="name"
                            item-value="id" label="Section" variant="outlined" density="comfortable"
                            :disabled="!selectedGradeId" />
                    </v-col>

                    <v-col cols="12" md="3" class="pb-0">
                        <v-text-field label="Start Date" type="date" variant="outlined" density="comfortable" />
                    </v-col>

                    <v-col cols="12" md="3" class="pb-0">
                        <v-text-field label="End Date" type="date" variant="outlined" density="comfortable" />
                    </v-col>

                    <v-col cols="12" md="6" class="py-0">
                        <v-row no-gutters>
                            <v-col v-for="day in daysOfWeek" :key="day.value" cols="auto" class="pr-2">
                                <v-checkbox v-model="selectedDays" :label="day.label" :value="day.value"
                                    density="compact" hide-details />
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col cols="12" md="6" class="text-end py-0">
                        <v-btn color="primary" text size="large" @click="addRow" class="mb-4">
                            <v-icon left>mdi-plus</v-icon> Add Row
                        </v-btn>
                    </v-col>
                </v-row>

                <div v-for="(row, index) in routineRows" :key="index" class="mb-4 mt-4">
                    <v-row align="center" dense class="ma-0 pa-0">

                        <v-col cols="12" :md="row.isBreak ? 6 : 3">
                            <template v-if="!row.isBreak">
                                <v-select v-model="row.subject" :items="subjects" item-title="name" item-value="id"
                                    label="Subject" variant="outlined" density="comfortable"
                                    prepend-inner-icon="mdi-book-open-variant" />
                            </template>
                            <template v-else>
                                <v-text-field v-model="row.remarks" label="Remarks" variant="outlined"
                                    density="comfortable" placeholder="Enter break remarks"
                                    prepend-inner-icon="mdi-comment-text" />

                            </template>
                        </v-col>

                        <v-col cols="12" md="3" v-if="!row.isBreak">
                            <v-select v-model="row.teacher" :items="teachers" item-title="name" item-value="id"
                                label="Teacher" variant="outlined" density="comfortable"
                                prepend-inner-icon="mdi-account-tie" />
                        </v-col>

                        <v-col cols="12" md="2">
                            <v-text-field v-model="row.startTime" label="Start Time" type="time" variant="outlined"
                                density="comfortable" />
                        </v-col>

                        <v-col cols="12" md="2">
                            <v-text-field v-model="row.endTime" label="End Time" type="time" variant="outlined"
                                density="comfortable" />
                        </v-col>

                        <v-col cols="12" md="2">
                            <div class="d-flex w-100 justify-space-between">
                                <div>
                                    <v-checkbox v-model="row.isBreak" label="Break" dense />
                                </div>
                                <div>
                                    <v-btn icon color="red" @click="removeRow(index)"
                                        :disabled="routineRows.length === 1" title="Remove row">
                                        <v-icon>mdi-delete</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </div>
            </v-form>
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions>
            <div class="text-center d-flex justify-space-around w-100 py-2">
                <v-btn size="large" elevation="1" color="primary" @click="submitRoutine">
                    Submit Routine
                </v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<style scoped>
.d-flex {
    display: flex;
}

.mb-4 {
    margin-bottom: 16px;
}
</style>
