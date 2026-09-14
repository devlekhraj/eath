<template>
    <v-card>
        <v-card-title class="d-flex align-center justify-space-between py-0">
            <span>Confirm Delete</span>
            <v-btn icon variant="text" aria-label="Close dialog" @click="handleClose">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text class="text-center pt-4">
            <div class="text-subtitle-1 font-weight-medium">Are you sure?</div>
        </v-card-text>
        <v-card-actions class="justify-end">
            <v-btn variant="text" @click="handleClose()">Cancel</v-btn>
            <v-btn color="error" :loading="submitting" @click="deleteCategory()">Delete</v-btn>
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
            await http.delete('/admin/galleries/'+this.imageItem.id+"/delete");
            this.submitting = false;
            this.handleClose();
        }
    }
}

</script>

<style scoped></style>
