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
        <span class="text-primary text-capitalize">{{ item.name }}</span>
      </template>

      <template #item.hierarchy="{ item }">
        <span class="text-capitalize">{{ item.hierarchy_text }}</span>
      </template>

      <!-- <template #item.is_active="{ item }">
        <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
          {{ item.is_active ? 'Active' : 'Inactive' }}
        </v-chip>
      </template> -->
      <template #item.is_active="{ item }">
        <div>
          <v-switch v-model="item.is_active" density="compact" color="success"
            hide-details @change="toggleActive(item)" />
        </div>
      </template>



      <template #item.actions="{ item }">
        <v-btn icon color="primary" variant="text" @click="handleOpen(item)">
          <v-icon>mdi-eye-circle</v-icon>
        </v-btn>
        <v-btn icon color="error" variant="text" @click="handleDelete(item)">
          <v-icon>mdi-delete-circle</v-icon>
        </v-btn>
      </template>
    </v-data-table>

    <modal-template ref="globalModal"
    @saved="fetchCategories"
    @close="fetchCategories"
    ></modal-template>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';

// Static headers
const headers = [
  { title: 'S.N.', key: 'sn', sortable: false },
  { title: 'Category Name', key: 'name', sortable: false },
  { title: 'Slug', key: 'slug', sortable: false },
  { title: 'Hierarchy', key: 'hierarchy', sortable: false },
  { title: 'Active', key: 'is_active', sortable: false },
  { title: 'Action', key: 'actions', sortable: false },
];

// Refs
const categories = ref([]);
const globalModal = ref(null);
import CategoryForm from './modal/CategoryForm.vue';
import CategoryDelete from './modal/CategoryDelete.vue';
// Method: Open modal
function handleOpen(item = {}) {
  globalModal.value.open({
    title: item ? 'Edit Category' : 'Add New Category',
    component: CategoryForm,
    size: 'md',
    props: {
      item, // <-- correctly passed as a prop
    },
  });
}
function handleDelete(item = {}) {
  globalModal.value.open({
    title: 'Delete Category',
    component: CategoryDelete,
    size: 'sm',
    props: {
      item, // <-- correctly passed as a prop
    },
  });
}


// Fetch categories and compute hierarchy
async function fetchCategories() {
  try {
    const resp = await axios.get('admin/blog-categories');
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
    const resp = await axios.patch(`admin/blog-categories/${item.id}/toggle-active`, {
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
