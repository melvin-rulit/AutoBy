<template>

</template>

<script>
import {DealService} from "../../services/DealService";

export default {
    name: "DealEdit",
    data: function (){
        return {
            id: this.$route.params.id,
            deal: []
        }
    },
    created() {
        DealService.getById(this.id)
            .then(response => this.deal = response.data.deal)
            .catch(error => this.errors = error.response.data.message)
    }
}
</script>

<style scoped>

</style>
