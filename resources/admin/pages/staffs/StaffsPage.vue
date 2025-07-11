<script>
import { formatDateYMD } from '@utils/format'
// import { formatTime12h } from '@utils/format'
export default {
  data() {
    return {
      formatDateYMD,
      teachers: [],
      search: '',
      menuOpen: {}, // Track open state per teacher ID
      headers: [
        { title: 'ID', key: 'id' },
        { title: 'Name', key: 'name' }, // Combined name column
        { title: 'Code', key: 'code' }, // Combined name column
        { title: 'Username', key: 'username' },
        { title: 'Email', key: 'email' },
        { title: 'Mobile No', key: 'mobile_no' },
        { title: 'Date of Birth', key: 'dob' },
        { title: 'Joined Date', key: 'joined_date' },
        { title: 'Status', key: 'status' },
        { title: 'Actions', key: 'actions', sortable: false, align: 'end' },
      ],
    }
  },

  computed: {
    filteredTeachers() {
      if (!this.search) return this.teachers

      const searchLower = this.search.toLowerCase()

      return this.teachers.filter(t => {
        const fullName = (t.fname + ' ' + t.lname).toLowerCase()
        const email = (t.email || '').toLowerCase()
        const mobile = (t.mobile_no || '').toLowerCase()

        return (
          fullName.includes(searchLower) ||
          email.includes(searchLower) ||
          mobile.includes(searchLower)
        )
      })
    },
  },

  methods: {
    async fetchTeachers() {
      try {
        const response = await axios.get('/admin/staffs')
        this.teachers = response.data.data || response.data
      } catch (error) {
        console.error('Failed to fetch teachers:', error)
      }
    },

    addTeacher() {
      alert('Add Teacher button clicked')
    },

    viewTeacher(item) {
      alert(`View teacher: ${item.fname} ${item.lname}`)
    },

    editTeacher(item) {
      alert(`Edit teacher: ${item.fname} ${item.lname}`)
    },

    deleteTeacher(item) {
      alert(`Delete teacher: ${item.fname} ${item.lname}`)
    },

    toggleMenu(id) {
      this.$set(this.menuOpen, id, !this.menuOpen[id])
    },
  },

  mounted() {
    this.fetchTeachers()
  },
}
</script>

<template>
  <v-container fluid>
    <div class="d-flex justify-space-between align-center mb-4">
      <v-text-field v-model="search" label="Search by name, email or mobile" prepend-inner-icon="mdi-magnify" clearable
        style="max-width: 300px;" />
      <v-btn size="large" color="primary" @click="addTeacher" rounded elevation="1">
        <v-icon left>mdi-plus</v-icon>
        Add Teacher
      </v-btn>
    </div>

    <v-data-table :headers="headers" :items="filteredTeachers" item-value="id" class="elevation-0">
      <template #item.name="{ item }">
        <div class="d-flex align-center">
          <v-avatar size="32" class="me-2" color="primary">
            {{ (item.fname[0] || '') + (item.lname[0] || '') }}
          </v-avatar>
          <span>{{ item.fname }} {{ item.lname }}</span>
        </div>
      </template>

      <template #item.joined_date="{ item }">
        {{ formatDateYMD(item.joined_date) }}
      </template>
      <template #item.status="{ item }">
        <div class="d-flex align-center">
           <v-chip color="primary" label size="small" class="ma-2 text-capitalize">{{ item.status }}</v-chip>
        </div>
      </template>
      <template #item.dob="{ item }">
        {{ formatDateYMD(item.dob) }}
      </template>

      <template #item.actions="{ item }">
        <v-menu v-model="menuOpen[item.id]">
          <template #activator="{ props }">
            <v-btn v-bind="props" icon variant="text" aria-label="Actions menu">
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>

          <v-list elevation="0" border>
            <v-list-item @click="viewTeacher(item)" class="action-list-item">
              <v-list-item-icon><v-icon>mdi-eye</v-icon></v-list-item-icon>
              <v-list-item-title>View</v-list-item-title>
            </v-list-item>

            <v-list-item @click="editTeacher(item)" class="action-list-item">
              <v-list-item-icon><v-icon>mdi-pencil</v-icon></v-list-item-icon>
              <v-list-item-title>Edit</v-list-item-title>
            </v-list-item>

            <v-list-item @click="deleteTeacher(item)" class="action-list-item">
              <v-list-item-icon><v-icon color="red">mdi-delete</v-icon></v-list-item-icon>
              <v-list-item-title class="red--text">Delete</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </template>
    </v-data-table>
  </v-container>
</template>

<style scoped>
.action-list-item {
  display: flex !important;
  justify-content: space-between;
  width: 100%;
  align-items: center;
}

.d-flex {
  display: flex;
  align-items: center;
}

.me-2 {
  margin-right: 8px;
}
</style>
