<template>
    <div>
        <h1>{{this.name}} 様</h1>
        <hr />
        <input type="date" v-model="date" />
        <input type="time" v-model="time" /><br />
        <button class="btn btn-primary" @click="onReserve">予約する</button>
    </div>
</template>

<script>
import { get, post } from '../../modules/APIConnection';

export default {
    name: "PatientReserve",
    data: function() {
        return {
            id: this.$route.params.id,
            name: "",
            date: null,
            time: null,
            reserves: []
        };
    },
    mounted: async function() {
        const result = await get("reserve/patient_reserve.php?id=" + this.id);
        const json = JSON.parse(JSON.stringify(result.data));
        this.name = json.name;
        this.reserves = json.reserve;
    },
    methods: {
        onReserve: async function() {
            if (!this.date) {
                alert("日付が入力されていません");
                return;
            }
            if (!this.time) {
                alert("時間が入力されていません");
                return;
            }
            if (!confirm("予約しますか？")) { return; }
            var datetime = this.date + " " + this.time;
            
            let params = new URLSearchParams();
            params.append("id", this.id);
            params.append("datetime", datetime);
            const result = await post("reserve/reserve.php", params);
            console.log(result);
        }
    }
}
</script>

<style scoped>
</style>
