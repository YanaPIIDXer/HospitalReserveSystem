<template>
    <div>
        <h1>予約変更・取消</h1>
        <input type="date" v-model="date" />
        <input type="time" v-model="time" />
    </div>
</template>

<script>
import { get } from '../../modules/APIConnection';

export default {
    name: "ReserveEdit",
    data: function() {
        return {
            id: this.$route.params.id,
            date: null,
            time: null
        };
    },
    mounted: async function() {
        const result = await get("reserve/get_by_id.php?id=" + this.id);
        const json = JSON.parse(JSON.stringify(result.data));
        if (!json.result) {
            alert("不正なIDです");
            return;
        }
        const datetime = new Date(json.datetime);
        this.date = datetime.getFullYear() + "-" + ("00" + (datetime.getMonth() + 1)).slice(-2) + "-" + ("00" + datetime.getDate()).slice(-2);
        this.time = ("00" + datetime.getHours()).slice(-2) + ":" + ("00" + datetime.getMinutes()).slice(-2);
    }
}
</script>

<style scoped>
</style>
