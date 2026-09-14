<template>
    <div>
        <div>
            <v-data-table :headers="headers" :items="data_list" hide-default-footer="" class="elevation-0"
                :items-per-page="-1" :loading="is_fetching">
                <template #top>
                    <v-row class="px-4 py-2 mb-4 mt-2" align="center" justify="space-between" no-gutters>
                        

                        <v-col cols="auto">
                            <v-btn color="primary" @click="openForm()"> <v-icon>mdi-plus</v-icon>
                                Add Item</v-btn>
                        </v-col>
                    </v-row>
                </template>
                <template #item.name="{ item }">
                    <div>
                        <a href="#" class="text-primary text-decoration-underline" @click.prevent="openForm(item)">
                            {{ item.name }}
                        </a>
                    </div>
                </template>

                <template #item.code="{ item }">
                    <div>
                        <span>{{ item.code }}</span>
                    </div>
                </template>

                <template #item.value="{ item }">
                    <div style="max-width: 500px;">
                        <div v-if="item.type == 'image'" class="d-flex align-center">
                            <v-img :src="item.value" height="40" width="40" class="rounded mr-2 flex-shrink-0" />
                            <span class="text-caption text-truncate">{{ item.value }}</span>
                        </div>
                        <div v-else>
                            <span class="text-body-2">{{ item.value }}</span>
                        </div>
                    </div>
                </template>

                <template #item.actions="{ item }">
                    <div class="d-flex align-center justify-center ga-1">
                        <v-btn color="primary" variant="outlined" @click="openForm(item)" title="Edit setting">
                            <v-icon start size="14">mdi-pencil</v-icon>
                            Edit
                        </v-btn>
                        <v-btn color="error" variant="outlined" @click="deleteItem(item)" title="Delete setting">
                            <v-icon start size="14">mdi-delete</v-icon>
                            Delete
                        </v-btn>
                    </div>
                </template>
            </v-data-table>
        </div>
    </div>
</template>

<script setup>
import http from '@/http.config'
import { useGlobalModal } from '@/composables/globalModal'
const { open: openModal } = useGlobalModal()
import { ref, onMounted } from 'vue'
const data_list = ref([])
const is_fetching = ref(false)

const headers = [
    { title: 'Name', key: 'name', align: 'start' },
    { title: 'Code', key: 'code' },
    { title: 'Value', key: 'value' },
    { title: 'Actions', key: 'actions', sortable: false },
]




import SettingForm from '@/modal-form/settings/SettingForm.vue';
import SettingDelete from '@/modal-form/settings/SettingDelete.vue';
import { getSettingsApi } from '@/http/settings.http'


function openForm(item = {}) {
    console.log({ item });
    openModal({
        title: item?.id ? 'Edit Item' : 'Add New Item',
        component: SettingForm,
        size: 'md',
        props: {
            item,
        },
        onClose: fetchData,
    })
}
function deleteItem(item = {}) {
    console.log({ item });
    openModal({
        title: 'Delete ' + item.name,
        component: SettingDelete,
        size: 'sm',
        props: {
            item,
        },
        onClose: fetchData,
    })
}
async function fetchData() {
    try {

        is_fetching.value = true;
        const resp = await http.get(`/admin/settings`)
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
