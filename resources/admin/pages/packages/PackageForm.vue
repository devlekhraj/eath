<script setup lang="ts">
import { ref } from 'vue'

// Main content fields
const packageName = ref('')
const content = ref('')

// List fields
const inclusions = ref<string[]>([])
const exclusions = ref<string[]>([])
const checklists = ref<string[]>([])

// Itinerary structure
interface ItineraryItem {
  day: number
  title: string
  description: string
}
const itinerary = ref<ItineraryItem[]>([])

// Adders
const addInclusion = () => inclusions.value.push('')
const addExclusion = () => exclusions.value.push('')
const addChecklist = () => checklists.value.push('')
const addItineraryItem = () => {
  itinerary.value.push({ day: itinerary.value.length + 1, title: '', description: '' })
}
</script>

<template>
  <v-container>
    <v-row>
      <!-- Left Column -->
      <v-col cols="12" md="7">
        <v-card elevation="0" class="pa-6">
          <v-text-field v-model="packageName" label="Package Name" variant="outlined" density="comfortable" />
          <RichTextEditor label="Description" v-model="content" />
        </v-card>
      </v-col>

      <!-- Right Column (Collapsible Sections) -->
      <v-col cols="12" md="5">
        <v-card elevation="0" class="pa-3">
          <v-expansion-panels multiple>
            <!-- Itinerary -->
            <v-expansion-panel elevation="0">
              <v-expansion-panel-title>Itinerary</v-expansion-panel-title>
              <v-expansion-panel-text>
                <v-btn size="small" @click="addItineraryItem" class="mb-2">Add Day</v-btn>
                <div v-for="(item, index) in itinerary" :key="index" class="mb-4 border-b pb-4">
                  <v-text-field v-model="item.title" :label="`Day ${item.day} Title`" class="mb-2" />
                  <v-textarea v-model="item.description" :label="`Day ${item.day} Description`" auto-grow />
                </div>
              </v-expansion-panel-text>
            </v-expansion-panel>
            <!-- Inclusions -->
            <v-expansion-panel elevation="0">
              <v-expansion-panel-title>Inclusions</v-expansion-panel-title>
              <v-expansion-panel-text>
                <v-btn size="small" @click="addInclusion" class="mb-2">Add Inclusion</v-btn>
                <v-text-field v-for="(item, index) in inclusions" :key="index" v-model="inclusions[index]"
                  label="Inclusion" class="mb-2" />
              </v-expansion-panel-text>
            </v-expansion-panel>

            <!-- Exclusions -->
            <v-expansion-panel elevation="0">
              <v-expansion-panel-title>Exclusions</v-expansion-panel-title>
              <v-expansion-panel-text>
                <v-btn size="small" @click="addExclusion" class="mb-2">Add Exclusion</v-btn>
                <v-text-field v-for="(item, index) in exclusions" :key="index" v-model="exclusions[index]"
                  label="Exclusion" class="mb-2" />
              </v-expansion-panel-text>
            </v-expansion-panel>

            <!-- Checklist -->
            <v-expansion-panel elevation="0">
              <v-expansion-panel-title>Checklist</v-expansion-panel-title>
              <v-expansion-panel-text>
                <v-btn size="small" @click="addChecklist" class="mb-2">Add Checklist</v-btn>
                <v-text-field v-for="(item, index) in checklists" :key="index" v-model="checklists[index]"
                  label="Checklist Item" class="mb-2" />
              </v-expansion-panel-text>
            </v-expansion-panel>


          </v-expansion-panels>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
