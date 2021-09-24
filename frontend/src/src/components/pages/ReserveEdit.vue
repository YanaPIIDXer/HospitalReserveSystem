<template>
    <div>
        <h1>予約変更・取消</h1>
        <input type="date" v-model="date" />
        <input type="time" v-model="time" /><br />
        <button class="btn btn-primary" @click="onUpdate">変更</button><br />
        <hr />
        <button class="btn btn-danger" @click="onDelete">取消</button>
    </div>
</template>

<script>
import { get, post } from '../../modules/APIConnection';

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
        const json = await get("reserve/get_by_id.php?id=" + this.id);
        if (!json.result) {
            alert("不正なIDです");
            return;
        }
        const datetime = new Date(json.datetime);
        this.date = datetime.getFullYear() + "-" + ("00" + (datetime.getMonth() + 1)).slice(-2) + "-" + ("00" + datetime.getDate()).slice(-2);
        this.time = ("00" + datetime.getHours()).slice(-2) + ":" + ("00" + datetime.getMinutes()).slice(-2);
    },
    methods: {
        onUpdate: async function () {
            if (!confirm("変更しますか？")) { return; }
            var datetime = this.date + " " + this.time;
            
            let params = new URLSearchParams();
            params.append("id", this.id);
            params.append("datetime", datetime);
            const json = await post("reserve/update.php", params);
            if (!json.result) {
                alert("変更に失敗しました");
                return;
            }
            alert("変更しました");
            window.location = "/patient_list";
        },
        onDelete: async function () {
            if (!confirm("本当に取り消しますか？")) { return; }
            
            let params = new URLSearchParams();
            params.append("id", this.id);
            const json = await post("reserve/delete.php", params);
            if (!json.result) {
                alert("取消に失敗しました");
                return;
            }
            alert("取り消しました");
            window.location = "/patient_list";
        }
    }
}
</script>

<style scoped>
</style>
