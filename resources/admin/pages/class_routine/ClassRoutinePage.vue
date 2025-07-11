<template>
  <v-container>
    <ModalTemplate ref="modalRef"/>

    <v-row class="mb-4" align="center">
      <v-col cols="12" md="3">
        <v-select
          v-model="selectedGrade"
          :items="grades"
          item-title="name"
          item-value="id"
          label="Filter by Grade"
          variant="outlined"
          density="comfortable"
        />
      </v-col>

      <v-col cols="12" md="3">
        <v-select
          v-model="selectedSection"
          :items="filteredSections"
          item-title="name"
          item-value="id"
          label="Filter by Section"
          variant="outlined"
          density="comfortable"
          :disabled="!selectedGrade"
          clearable
        />
      </v-col>

      <v-col cols="12" md="3">
        <v-text-field
          type="date"
          v-model="selectedDate"
          label="Date"
          variant="outlined"
          density="comfortable"
          clearable
        ></v-text-field>
      </v-col>

      <v-col cols="12" md="3" class="text-end">
        <v-btn color="primary" @click="openModal">
          <v-icon left>mdi-plus</v-icon>
          Add Routine
        </v-btn>
      </v-col>
    </v-row>

    <v-data-table
      :headers="headers"
      :items="filteredRoutines"
      :items-per-page="100"
      class="elevation-0"
    >
      <template #item.subject="{ item }">
        {{ item.subject?.name || '-' }}
      </template>

      <template #item.start_time="{ item }">
        {{ formatTime12h(item.start_time) }}
      </template>

      <template #item.end_time="{ item }">
        {{ formatTime12h(item.end_time) }}
      </template>

      <template #item.teacher="{ item }">
        <div class="d-flex align-center">
          <v-avatar size="32" class="me-2" color="primary" text-color="white" v-if="item.teacher">
            <template v-if="item.teacher?.avatar">
              <img :src="item.teacher.avatar" alt="Teacher Avatar" />
            </template>
            <template v-else>
              <v-icon icon="mdi-account-circle"></v-icon>
            </template>
          </v-avatar>
          <span>{{ item.teacher?.name || '-' }}</span>
        </div>
      </template>

      <template #item.grade="{ item }">
        {{ item.grade?.name || '-' }}
      </template>

      <template #item.section="{ item }">
        {{ item.section?.name || '-' }}
      </template>

      <template #item.remarks="{ item }">
        <span class="text-capitalize">{{ item.remarks || '-' }}</span>
      </template>

      <template #item.actions="{ item }">
        <v-menu
          v-model="item.menu"
          location="bottom right"
          :close-on-content-click="false"
          elevation="0"
          transition="scale-transition"
          max-width="200"
        >
          <template #activator="{ props }">
            <v-btn icon v-bind="props" elevation="0">
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>

          <v-list>
            <v-list-item @click="editRoutine(item)">
              <v-list-item-icon>
                <v-icon>mdi-pencil</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Edit</v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-delete</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Delete</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
import axios from 'axios'
import RouteForm from './ClassRoutineForm.vue'
import { formatTime12h } from '@utils/format'

export default {
  name: 'DailyRoutineTable',
  data() {
    return {
      modalRef: null,
      grades: [],
      routines: [],
      selectedGrade: null,
      selectedSection: null,
      selectedDate: new Date().toISOString().slice(0, 10),
      headers: [
        { title: 'Date', key: 'date', sortable: false },
        { title: 'Grade', key: 'grade', sortable: false },
        { title: 'Section', key: 'section', sortable: false },
        { title: 'Start Time', key: 'start_time', sortable: true },
        { title: 'End Time', key: 'end_time', sortable: true },
        { title: 'Subject', key: 'subject', sortable: false },
        { title: 'Teacher', key: 'teacher', sortable: false },
        { title: 'Remarks', key: 'remarks', sortable: false },
        { title: 'Actions', key: 'actions', sortable: false },
      ]
    }
  },
  computed: {
    filteredSections() {
      const grade = this.grades.find(g => g.id === this.selectedGrade)
      return grade ? grade.sections : []
    },
    filteredRoutines() {
      return this.routines.filter(r => {
        const matchGrade = this.selectedGrade ? r.grade?.id === this.selectedGrade : true
        const matchSection = this.selectedSection ? r.section?.id === this.selectedSection : true
        return matchGrade && matchSection
      })
    }
  },
  mounted() {
    this.fetchGrades()
  },
  watch: {
    selectedGrade(newVal) {
      const grade = this.grades.find(g => g.id === newVal)
      this.selectedSection = grade?.sections?.[0]?.id || null
    },
    selectedSection: 'fetchRoutines',
    selectedDate: 'fetchRoutines',
  },
  methods: {
    formatTime12h,
    async fetchGrades() {
      try {
        const res = await axios.get('/admin/grades')
        this.grades = res.data
        if (this.grades.length) {
          this.selectedGrade = this.grades[0].id;
          this.fetchRoutines();
        }
      } catch (err) {
        console.error('Failed to fetch grades:', err)
      }
    },
    async fetchRoutines() {
      if (!this.selectedGrade) return
      try {
        const res = await axios.get(`/admin/grades/${this.selectedGrade}/routines`, {
          params: {
            grade_id: this.selectedGrade,
            section_id: this.selectedSection,
            date: this.selectedDate,
          },
        })
        this.routines = res.data
      } catch (err) {
        console.error('Failed to fetch routines:', err)
      }
    },
    openModal() {
      this.$refs.modalRef.open({
        title: 'Create Class Routine',
        component: RouteForm,
        size: 'xl',
        props: {
          classId: this.selectedGrade,
          date: this.selectedDate,
        },
        onClose: this.fetchRoutines,
      })
    },
    editRoutine(item) {
      this.$refs.modalRef.open({
        title: 'Edit Routine',
        component: RouteForm,
        size: 'xl',
        props: {
          routineData: item,
          classId: item.grade?.id,
          date: item.date,
        },
        onClose: this.fetchRoutines,
      })
    },
  }
}
</script>
