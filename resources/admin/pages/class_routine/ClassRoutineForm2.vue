<script setup>
import { ref, computed, onMounted, defineEmits } from 'vue'

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
    'Friday',
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
        ],
    },
    {
        id: 2,
        name: 'Grade 2',
        sections: [
            { id: 'A', name: 'Section A' },
            { id: 'C', name: 'Section C' },
        ],
    },
    {
        id: 3,
        name: 'Grade 3',
        sections: [
            { id: 'B', name: 'Section B' },
            { id: 'C', name: 'Section C' },
        ],
    },
])

const selectedGradeId = ref(null)
const selectedSectionId = ref(null)
const startDate = ref(null)
const endDate = ref(null)

const filteredSections = computed(() => {
    const grade = grades.value.find((g) => g.id === selectedGradeId.value)
    return grade ? grade.sections : []
})

const emits = defineEmits(['close'])

function close() {
    console.log("Test");
  emits('close')
}

const subjects = ref([])

const teachers = ref([])

const routineRows = ref([
    {
        subject: null,
        teacher: null,
        startTime: null,
        endTime: null,
        isBreak: false,
        remarks: '',
    },
])

const errors = ref({
    grade: '',
    section: '',
    days: '',
    startDate: '',
    endDate: '',
    routineRows: [], // array of error objects per row
})

// Fetch data from API endpoints on component mount
onMounted(async () => {
    try {
        const [gradesRes, subjectsRes, teachersRes] = await Promise.all([
            axios.get('/admin/grades'),     // Adjust URL to your actual API
            axios.get('/admin/subjects'),
            axios.get('/admin/teachers'),
        ])

        grades.value = gradesRes.data
        subjects.value = subjectsRes.data
        teachers.value = teachersRes.data
    } catch (error) {
        console.error('Failed to fetch initial data:', error)
        // Optionally, set fallback data or show error message to user
    }
})

function addRow() {
    routineRows.value.push({
        subject: null,
        teacher: null,
        startTime: null,
        endTime: null,
        isBreak: false,
        remarks: '',
    })
    errors.value.routineRows.push({})
}

function removeRow(index) {
    if (routineRows.value.length > 1) {
        routineRows.value.splice(index, 1)
        errors.value.routineRows.splice(index, 1)
    }
}

function validate() {
    let valid = true
    errors.value.grade = ''
    errors.value.section = ''
    errors.value.days = ''
    errors.value.startDate = ''
    errors.value.endDate = ''
    errors.value.routineRows = []

    // Grade validation
    if (!selectedGradeId.value) {
        errors.value.grade = 'Grade is required.'
        valid = false
    }

    // Section validation
    if (!selectedSectionId.value) {
        errors.value.section = 'Section is required.'
        valid = false
    }

    // Days validation
    if (selectedDays.value.length === 0) {
        errors.value.days = 'Select at least one day.'
        valid = false
    }

    // Dates validation
    if (!startDate.value) {
        errors.value.startDate = 'Start date is required.'
        valid = false
    }
    if (!endDate.value) {
        errors.value.endDate = 'End date is required.'
        valid = false
    }
    if (startDate.value && endDate.value && startDate.value > endDate.value) {
        errors.value.endDate = 'Must be after or equal to start date.'
        valid = false
    }

    // Routine rows validation
    routineRows.value.forEach((row, idx) => {
        const rowErrors = {}

        if (row.isBreak) {
            if (!row.remarks || !row.remarks.trim()) {
                rowErrors.remarks = 'Remarks are required for break.'
                valid = false
            }
            if (!row.startTime) {
                rowErrors.startTime = 'Start time is required.'
                valid = false
            }
            if (!row.endTime) {
                rowErrors.endTime = 'End time is required.'
                valid = false
            }
            if (
                row.startTime &&
                row.endTime &&
                row.startTime >= row.endTime
            ) {
                rowErrors.endTime = 'End time must be after start time.'
                valid = false
            }
        } else {
            if (!row.subject) {
                rowErrors.subject = 'Subject is required.'
                valid = false
            }
            if (!row.teacher) {
                rowErrors.teacher = 'Teacher is required.'
                valid = false
            }
            if (!row.startTime) {
                rowErrors.startTime = 'Start time is required.'
                valid = false
            }
            if (!row.endTime) {
                rowErrors.endTime = 'End time is required.'
                valid = false
            }
            if (
                row.startTime &&
                row.endTime &&
                row.startTime >= row.endTime
            ) {
                rowErrors.endTime = 'End time must be after start time.'
                valid = false
            }
        }

        errors.value.routineRows[idx] = rowErrors
    })

    return valid
}

async function submitRoutine() {
    if (!validate()) {
        console.log('Please fix errors before submitting.')
        return
    }

    const payload = {
        grade_id: selectedGradeId.value,
        section_id: selectedSectionId.value,
        days: selectedDays.value,
        start_date: startDate.value,
        end_date: endDate.value,
        routines: routineRows.value,
    }

    try {
        const resp = await axios.post(`/admin/grades/${selectedGradeId.value}/routines`, payload)
        console.log('Response:', resp.data)
    } catch (error) {
        console.error('Submission failed:', error.response?.data || error.message)
    }
}

</script>

<template>
    <v-card>
        <v-card-title class="d-flex justify-space-between align-center">
            <span>Daily Class Routine</span>
            <v-btn icon @click="close" elevation="0" aria-label="Close dialog">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>

        <v-divider></v-divider>

        <v-card-text>
            <v-form>
                <div class="mb-4">
                    <div class="mb-6">
                        <v-row>
                            <v-col cols="12" md="3" class="pb-0">
                                <v-select v-model="selectedGradeId" :items="grades" item-title="name" item-value="id"
                                    label="Grade" variant="outlined" density="comfortable" :error="!!errors.grade"
                                    :error-messages="errors.grade" />
                            </v-col>

                            <v-col cols="12" md="3" class="pb-0">
                                <v-select v-model="selectedSectionId" :items="filteredSections" item-title="name"
                                    item-value="id" label="Section" variant="outlined" density="comfortable"
                                    :disabled="!selectedGradeId" :error="!!errors.section"
                                    :error-messages="errors.section" />
                            </v-col>

                            <v-col cols="12" md="3" class="pb-0">
                                <v-text-field v-model="startDate" label="Start Date" type="date" variant="outlined"
                                    density="comfortable" :error="!!errors.startDate"
                                    :error-messages="errors.startDate" />
                            </v-col>

                            <v-col cols="12" md="3" class="pb-0">
                                <v-text-field v-model="endDate" label="End Date" type="date" variant="outlined"
                                    density="comfortable" :error="!!errors.endDate" :error-messages="errors.endDate" />
                            </v-col>
                        </v-row>
                    </div>
                    <div class="mb-4">
                        <v-row>
                            <v-col cols="12" md="6" class="py-0">
                                <v-row no-gutters>
                                    <v-col v-for="day in daysOfWeek" :key="day.value" cols="auto" class="pr-2">
                                        <v-checkbox v-model="selectedDays" :label="day.label" :value="day.value"
                                            density="compact" hide-details />
                                    </v-col>
                                </v-row>
                                <div v-if="errors.days" class="error-message" style="color: red; font-size: 0.8rem;">
                                    {{ errors.days }}
                                </div>
                            </v-col>

                            <v-col cols="12" md="6" class="text-end py-0">
                                <v-btn color="primary" text size="large" @click="addRow" class="mb-4">
                                    <v-icon left>mdi-plus</v-icon> Add Row
                                </v-btn>
                            </v-col>
                        </v-row>
                    </div>
                </div>

                <div v-for="(row, index) in routineRows" :key="index" class="mb-4 mt-4">
                    <v-row align="center" dense class="ma-0 pa-0">
                        <v-col cols="12" :md="row.isBreak ? 6 : 3">
                            <template v-if="!row.isBreak">
                                <v-select v-model="row.subject" :items="subjects" item-title="name" item-value="id"
                                    label="Subject" variant="outlined" density="comfortable"
                                    prepend-inner-icon="mdi-book-open-variant"
                                    :error="!!errors.routineRows[index]?.subject"
                                    :error-messages="errors.routineRows[index]?.subject" />
                            </template>
                            <template v-else>
                                <v-text-field v-model="row.remarks" label="Remarks" variant="outlined"
                                    density="comfortable" placeholder="Enter break remarks"
                                    prepend-inner-icon="mdi-comment-text" :error="!!errors.routineRows[index]?.remarks"
                                    :error-messages="errors.routineRows[index]?.remarks" />
                            </template>
                        </v-col>

                        <v-col cols="12" md="3" v-if="!row.isBreak">
                            <v-select v-model="row.teacher" :items="teachers" item-title="name" item-value="id"
                                label="Teacher" variant="outlined" density="comfortable"
                                prepend-inner-icon="mdi-account-tie" :error="!!errors.routineRows[index]?.teacher"
                                :error-messages="errors.routineRows[index]?.teacher" />
                        </v-col>

                        <v-col cols="12" md="2">
                            <v-text-field v-model="row.startTime" label="Start Time" type="time" variant="outlined"
                                density="comfortable" :error="!!errors.routineRows[index]?.startTime"
                                :error-messages="errors.routineRows[index]?.startTime" />
                        </v-col>

                        <v-col cols="12" md="2">
                            <v-text-field v-model="row.endTime" label="End Time" type="time" variant="outlined"
                                density="comfortable" :error="!!errors.routineRows[index]?.endTime"
                                :error-messages="errors.routineRows[index]?.endTime" />
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
            <div class="text-center d-flex justify-space-around w-100">
                <v-btn size="large" variant="outlined" color="primary" @click="submitRoutine">
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

.error-message {
    color: red;
    font-size: 0.8rem;
    margin-top: 2px;
}
</style>
