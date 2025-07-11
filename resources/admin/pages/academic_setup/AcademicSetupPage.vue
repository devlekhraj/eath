<script setup>
import { ref, defineAsyncComponent } from 'vue'


const tab = ref('years')

const tabItems = [
  { label: 'Academic Years', icon: 'mdi-calendar-range', value: 'years', component: defineAsyncComponent(() => import('./tabs/AcademicYears.vue')) },
  { label: 'Classes & Sections', icon: 'mdi-school', value: 'classes', component: defineAsyncComponent(() => import('./tabs/ClassSection.vue')) },
  { label: 'Subjects', icon: 'mdi-book-open-variant', value: 'subjects', component: defineAsyncComponent(() => import('./tabs/Subjects.vue')) },
  { label: 'Grading System', icon: 'mdi-format-list-checks', value: 'grading', component: defineAsyncComponent(() => import('./tabs/GradingSystem.vue')) },
  { label: 'Exam Terms', icon: 'mdi-clipboard-text-clock-outline', value: 'exams', component: defineAsyncComponent(() => import('./tabs/ExamTerms.vue')) },
]

</script>

<template>
  <v-container fluid>
    <v-card flat class="rounded-lg">
      <v-card-text class="pa-0">
        <!-- Dynamic Tabs -->
        <v-tabs v-model="tab" bg-color="light-blue-lighten-5" dark stacked grow>
          <v-tab
            v-for="item in tabItems"
            :key="item.value"
            :value="item.value"
          >
            <v-icon start>{{ item.icon }}</v-icon>
            {{ item.label }}
          </v-tab>
        </v-tabs>

        <!-- Dynamic Tab Content -->
        <v-window v-model="tab" class="mt-4 px-5" style="min-height: calc(100vh - 200px);">
          <v-window-item
            v-for="item in tabItems"
            :key="item.value"
            :value="item.value"
          >
            <component :is="item.component" />
          </v-window-item>
        </v-window>
      </v-card-text>
    </v-card>
  </v-container>
</template>
