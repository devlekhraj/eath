<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Are you sure?</h4>
        </v-card-text>
        <v-card-actions>
            <v-btn variant="text" @click="handleClose()">No</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" :loading="submitting" @click="deleteCategory()">Yes</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import http from '@/http.config'
export default {
    props: {
        imageItem: {
            type: Object,
            required: true,  // Vue enforces this now
        }
    },
    data() {
        return {
            submitting: false,
        }
    },  
    methods: {
        handleClose() {
            this.$emit('close');
        },
        async deleteCategory() {
            this.submitting = true;
            const resp = await http.delete('/admin/galleries/'+this.imageItem.id+"/delete");
            this.submitting = false;
            this.handleClose();
        }
    }
}

</script>

<style scoped></style>
