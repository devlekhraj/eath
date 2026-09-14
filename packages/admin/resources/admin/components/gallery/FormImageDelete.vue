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
            <v-btn color="error" :loading="submitting" @click="deleteItem()">Delete</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import http from '@/http.config'
import { deleteMediaUsageApi } from '@/http/gallery.http'
export default {
    props: {
        imageItem: {
            type: Object,
            required: true,  // Vue enforces this now
        },
        onDeleted: {
            type: Function,
            default: null,
        },
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
        async deleteItem() {
            this.submitting = true;
            try {
                await http.delete('/admin/media-usages/' + this.imageItem.id + '/delete');
                if (this.onDeleted) {
                    this.onDeleted(this.imageItem);
                }
                this.handleClose();
            } catch (error) {
                console.error('Failed to delete image', error);
            } finally {
                this.submitting = false;
            }
        }
    }
}

</script>

<style scoped></style>
