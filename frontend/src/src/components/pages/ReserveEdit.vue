<template>
    <div>
        <h1>予約変更・取消</h1>
    </div>
</template>

<script>
export default {
    name: "ReserveEdit",
    data: function() {
        return {
            id: this.$route.params.id
        };
    }
}
</script>

<style scoped>
</style>
