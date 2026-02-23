<template>
    <v-card>
        <v-card-text class="text-center pt-4 mt-4">
            <h4>Are you sure?</h4>
        </v-card-text>
        <v-card-actions>
            <v-btn variant="text" @click="handleClose()">No</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" :loading="submitting" @click="deleteItem()">Yes</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
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
                await axios.delete('/admin/media-usages/' + this.imageItem.id + '/delete');
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
