<template>
    <v-container>
        <v-data-table :headers="headers" :items="blog_list" :items-per-page="20" :sort-by="['name']"
            :sort-desc="[false]">
            <template #item.start_date="{ item }">
                {{ formatDate(item.start_date) }}
            </template>
            <template #item.sn="{ item, index }">
                {{ index + 1 }}
            </template>
            <template #item.title="{ item }">
                <span class="text-primary">{{ item.title }}</span>
            </template>


            <template #item.created_at="{ item }">
                {{ formatDate(item.created_at) }}
            </template>

            <template #item.price="{ item }">
                <span>{{ formatAmount(item.price) }}</span>
            </template>

            <template #item.is_active="{ item }">
                <v-chip :color="item.is_active ? 'green' : 'red'" dark size="small">
                    {{ item.is_active ? 'Active' : 'Inactive' }}
                </v-chip>
            </template>

            <template #item.is_published="{ item }">
                <v-chip :color="item.is_published ? 'blue' : 'grey'" dark size="small">
                    {{ item.is_published ? 'Featured' : 'No' }}
                </v-chip>
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
                                <v-icon start icon="mdi-eye" class="mr-2" /> View
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item :to="{ name: 'adminBlogForm', query: { id: item.id } }">
                            <v-list-item-title>
                                <v-icon start icon="mdi-pencil" class="mr-2" /> Edit
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="deleteItem(item)">
                            <v-list-item-title>
                                <v-icon start icon="mdi-delete" class="mr-2" /> Delete
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </template>
        </v-data-table>
    </v-container>
</template>

<script>
import { formatDate, formatAmount } from '@/utils/format';
export default {
    data() {
        return {
            headers: [
                { title: 'SN', key: 'sn', sortable: true },
                { title: 'Title', key: 'title', sortable: false },
                { title: 'Author', key: 'author', sortable: true },
                { title: 'Date', key: 'created_at', sortable: true },
                { title: 'Published', key: 'is_published', sortable: false },
                { title: 'Active', key: 'is_active', sortable: false },
                { title: 'Actions', key: 'actions', sortable: false },
            ],
            blog_list: [],
        };
    },
    mounted() {
        this.fetchBlogs();
    },

    methods: {
        formatAmount,
        formatDate,

        async fetchBlogs() {
            const resp = await axios.get('admin/blogs');
            this.blog_list = resp.data;
        },
        viewItem(item) {
            console.log({item});
        },
        async deleteItem(item) {
            console.log({item});
        }
    },
};
</script>

<style scoped></style>
