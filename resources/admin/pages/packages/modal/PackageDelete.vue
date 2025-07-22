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
export default {
    props: {
        item: {
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
            try {
                const resp = await axios.delete('/admin/travel-packages/'+this.item.id+"/delete");
                console.log(resp);
                this.submitting = false;
                this.handleClose();
            } catch (error) {
                console.log(error);
                this.submitting = false;
            }
        }
    }
}

</script>

<style scoped></style>
