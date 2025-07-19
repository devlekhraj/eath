<template>
    <div>
        <p>{{ travelPackage }}</p>
    </div>
</template>
<script>
import { formatDate, formatAmount } from '@/utils/format';
export default {
    data() {
        return {
           travelPackage: {},
        };
    },
    mounted(){
        this.fetchPackage();
    },

    methods: {
        formatAmount,
        formatDate,

        async fetchPackage(){
           const resp = await axios.get('admin/packages/'+this.$route.params.id);
           this.travelPackage = resp.data;
        }
    },
};
</script>

<style scoped></style>
