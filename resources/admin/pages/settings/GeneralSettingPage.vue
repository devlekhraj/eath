<template>
    <div>
        <div>
            <v-data-table :headers="headers" :items="data_list" hide-default-footer="" class="elevation-0"
            :loading="is_fetching">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        <!-- <v-col cols="12" sm="6" md="4" lg="3" xl="3">
                            <v-text-field v-model="search" label="Search" density="comfortable" variant="outlined" clearable
                                hide-details prepend-inner-icon="mdi-magnify" placeholder="Search" />
                        </v-col> -->

                        <v-col cols="auto">
                            <v-btn size="large" color="primary" rounded @click="openForm()"> <v-icon>mdi-plus</v-icon>
                                Add Item</v-btn>
                        </v-col>
                    </v-row>
                </template>
                 <template #item.name="{ item }">
                    <div style="min-width: max-content;">
                        <span>{{ item.name }}</span>
                    </div>
                 </template>
                 <template #item.code="{ item }">
                    <div style="min-width: max-content;">
                        <span>{{ item.code }}</span>
                    </div>
                 </template>
                <template #item.value="{ item }">
                 
                    <div style="min-width: max-content;">
                        <div v-if="item.type=='image'">
                            <div class="d-flex align-center">
                                <div>
                                    <v-img :src="item.value" height="40" width="40"></v-img>
                                </div>
                                <div class="ml-3">
                                    <span> {{item.value}}</span>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <p>{{ item.value }}</p>
                        </div>
                    </div>
       

                </template>
                <!-- Actions slot -->
                <template #item.actions="{ item }">
                    <v-btn icon size="x-small" color="primary" variant="tonal" @click="openForm(item)">
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn icon size="x-small" color="error" class="ml-2" variant="tonal" @click="deleteItem(item)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </div>
        <modal-template ref="globalModal" @close="fetchData"></modal-template>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
const globalModal = ref(null)
const data_list = ref([])
const is_fetching = ref(false)

const headers = [
    { title: 'Name', key: 'name', align: 'start' },
    { title: 'Code', key: 'code' },
    { title: 'Value', key: 'value' },
    { title: 'Actions', key: 'actions', sortable: false },
]




import SettingForm from './modal/SettingForm.vue';
import SettingDelete from './modal/SettingDelete.vue';


function openForm(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: SettingForm,
        size: 'md',
        props: {
            item,
        },
    })
}
function deleteItem(item = {}) {
    console.log({ item });
    globalModal.value.open({
        title: 'Delete ' + item.name,
        component: SettingDelete,
        size: 'sm',
        props: {
            item,
        },
    })
}
async function fetchData() {
    try {
        
        is_fetching.value = true;
        const resp = await axios.get(`/admin/settings`)
        is_fetching.value = false;
        data_list.value = resp.data;


    } catch (err) {
        is_fetching.value = false;
        console.error('Failed to fetch package:', err)
    }
}

onMounted(() => {
    fetchData();
})
</script>
