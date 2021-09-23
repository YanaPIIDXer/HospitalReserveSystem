<template>
    <div>
        <h1>{{this.name}} 様</h1>
    </div>
</template>

<script>
import { get } from '../../modules/APIConnection';

export default {
    name: "PatientReserve",
    data: function() {
        return {
            id: this.$route.params.id,
            name: "",
            reserves: []
        };
    },
    mounted: async function() {
        const result = await get("reserve/patient_reserve.php?id=" + this.id);
        const json = JSON.parse(JSON.stringify(result.data));
        this.name = json.name;
        this.reserves = json.reserve;
    }
}
</script>

<style scoped>
</style>
