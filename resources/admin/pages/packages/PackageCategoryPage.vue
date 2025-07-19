<template>
  <v-container>
    <div class="text-right mb-4">
      <v-btn size="large" color="primary" rounded @click="handleOpen">
        <v-icon>mdi-plus</v-icon> Add Category
      </v-btn>
    </div>

    <v-data-table :headers="headers" :items="categories" :items-per-page="20" :sort-by="['name']" :sort-desc="[false]">
      <template #item.sn="{ index }">
        {{ index + 1 }}
      </template>

      <template #item.name="{ item }">
        <span class="text-primary">{{ item.name }}</span>
      </template>

      <template #item.hierarchy="{ item }">
        <span>{{ item.hierarchy_text }}</span>
      </template>

      <!-- <template #item.is_active="{ item }">
        <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
          {{ item.is_active ? 'Active' : 'Inactive' }}
        </v-chip>
      </template> -->
      <template #item.is_active="{ item }">
        <div>
          <v-switch v-model="item.is_active" :true-value="1" density="compact" :false-value="0" color="success"
            hide-details @change="toggleActive(item)" />
        </div>
      </template>



      <template #item.actions="{ item }">
        <v-menu location="bottom end">
          <template #activator="{ props }">
            <v-btn v-bind="props" icon variant="text" color="primary">
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>

          <v-list density="compact" elevation="1">
            <v-list-item @click="viewItem(item)">
              <v-list-item-title>
                <v-icon start icon="mdi-eye" class="mr-2" /> View Detail
              </v-list-item-title>
            </v-list-item>

            <v-list-item @click="editItem(item)">
              <v-list-item-title>
                <v-icon start icon="mdi-pencil" class="mr-2" /> Edit Cateogry
              </v-list-item-title>
            </v-list-item>

            <v-list-item @click="deleteItem(item)">
              <v-list-item-title>
                <v-icon start icon="mdi-delete" class="mr-2" /> Delete Category
              </v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </template>

    </v-data-table>

    <modal-template ref="globalModal"></modal-template>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Static headers
const headers = [
  { title: 'S.N.', key: 'sn', sortable: false },
  { title: 'Category Name', key: 'name', sortable: false },
  { title: 'Hierarchy', key: 'hierarchy', sortable: false },
  { title: 'Active', key: 'is_active', sortable: false },
  { title: 'Action', key: 'actions', sortable: false },
];

// Refs
const categories = ref([]);
const globalModal = ref(null);
import CategoryForm from './modal/CategoryForm.vue';
// Method: Open modal
function handleOpen() {
  globalModal.value.open({
    title: 'Add New Category',
    component: CategoryForm,
    size: 'md',
    data: {},
  });
}

// Fetch categories and compute hierarchy
async function fetchCategories() {
  try {
    const resp = await axios.get('admin/package-categories');
    categories.value = resp.data.map((item) => {
      return {
        ...item,
        hierarchy: item.parent
          ? `${item.parent.name_en} > ${item.name_en}`
          : item.name_en,
      };
    });
  } catch (error) {
    console.error('Failed to load categories', error);
  }
}

async function toggleActive(item) {
  try {
    const resp = await axios.patch(`admin/package-categories/${item.id}/toggle-active`, {
      is_active: item.is_active
    });
    this.$toast?.success?.('Status updated successfully'); // Optional toast
  } catch (error) {
    item.is_active = !item.is_active; // Revert back if failed
    console.error('Failed to update status:', error);
    this.$toast?.error?.('Failed to update status');
  }
}
// Initial load
onMounted(() => {
  fetchCategories();
});
</script>

<style scoped></style>
