<template>
    <div>
        <h1>患者の予約情報</h1>
    </div>
</template>

<script>
export default {
    name: "PatientReserve",
    data: function() {
        return {
            id: this.$route.params.id
        };
    }
}
</script>

<style scoped>
</style>
