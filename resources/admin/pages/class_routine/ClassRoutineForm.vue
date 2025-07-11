<template>
    <v-card>
        <v-card-title class="d-flex justify-space-between align-center">
            <span>Daily Class Routine</span>
            <v-btn icon @click="handleClose" elevation="0" aria-label="Close dialog">
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

<script>
export default {
    props: {
        classId: Number,
        date: String,
    },
    data() {
        return {
            selectedGradeId: null,
            selectedSectionId: null,
            selectedDays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            startDate: null,
            endDate: null,
            grades: [],
            subjects: [],
            teachers: [],
            routineRows: [this.createEmptyRow()],
            errors: {
                grade: '',
                section: '',
                days: '',
                startDate: '',
                endDate: '',
                routineRows: [{}],
            },
            daysOfWeek: [
                { label: 'Sun', value: 'Sunday' },
                { label: 'Mon', value: 'Monday' },
                { label: 'Tue', value: 'Tuesday' },
                { label: 'Wed', value: 'Wednesday' },
                { label: 'Thu', value: 'Thursday' },
                { label: 'Fri', value: 'Friday' },
                { label: 'Sat', value: 'Saturday' },
            ],
        }
    },
    computed: {
        filteredSections() {
            const grade = this.grades.find((g) => g.id === this.selectedGradeId)
            return grade ? grade.sections : []
        },
    },
    mounted() {
        this.fetchInitialData()
    },
    methods: {
        handleClose() {
            this.$emit('onClose')
        },
        createEmptyRow() {
            return {
                subject: null,
                teacher: null,
                startTime: null,
                endTime: null,
                isBreak: false,
                remarks: '',
            }
        },
        addRow() {
            this.routineRows.push(this.createEmptyRow())
            this.errors.routineRows.push({})
        },
        removeRow(index) {
            if (this.routineRows.length > 1) {
                this.routineRows.splice(index, 1)
                this.errors.routineRows.splice(index, 1)
            }
        },
        async fetchInitialData() {
            try {
                const [gradesRes, subjectsRes, teachersRes] = await Promise.all([
                    axios.get('/admin/grades'),
                    axios.get('/admin/subjects'),
                    axios.get('/admin/teachers'),
                ])

                this.grades = gradesRes.data
                this.subjects = subjectsRes.data
                this.teachers = teachersRes.data
            } catch (error) {
                console.error('Failed to fetch initial data:', error)
            }
        },
        validate() {
            let valid = true

            this.errors = {
                grade: '',
                section: '',
                days: '',
                startDate: '',
                endDate: '',
                routineRows: [],
            }

            if (!this.selectedGradeId) {
                this.errors.grade = 'Grade is required.'
                valid = false
            }

            // if (!this.selectedSectionId) {
            //     this.errors.section = 'Section is required.'
            //     valid = false
            // }

            if (this.selectedDays.length === 0) {
                this.errors.days = 'Select at least one day.'
                valid = false
            }

            if (!this.startDate) {
                this.errors.startDate = 'Start date is required.'
                valid = false
            }

            if (!this.endDate) {
                this.errors.endDate = 'End date is required.'
                valid = false
            }

            if (this.startDate && this.endDate && this.startDate > this.endDate) {
                this.errors.endDate = 'Must be after or equal to start date.'
                valid = false
            }

            this.routineRows.forEach((row, idx) => {
                const rowErrors = {}

                if (row.isBreak) {
                    if (!row.remarks || !row.remarks.trim()) {
                        rowErrors.remarks = 'Remarks are required for break.'
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
                }

                if (!row.startTime) {
                    rowErrors.startTime = 'Start time is required.'
                    valid = false
                }

                if (!row.endTime) {
                    rowErrors.endTime = 'End time is required.'
                    valid = false
                }

                if (row.startTime && row.endTime && row.startTime >= row.endTime) {
                    rowErrors.endTime = 'End time must be after start time.'
                    valid = false
                }

                this.errors.routineRows[idx] = rowErrors
            })

            return valid
        },
        async submitRoutine() {
            if (!this.validate()) {
                console.log('Validation failed')
                return
            }

            const payload = {
                grade_id: this.selectedGradeId,
                section_id: this.selectedSectionId,
                days: this.selectedDays,
                start_date: this.startDate,
                end_date: this.endDate,
                routines: this.routineRows,
            }

            try {
                const resp = await axios.post(`/admin/grades/${this.selectedGradeId}/routines`, payload)
                console.log('Routine submitted:', resp.data)
            } catch (error) {
                console.error('Submission error:', error.response?.data || error.message)
            }
        },
    },
}
</script>

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
