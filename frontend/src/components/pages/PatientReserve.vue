<template>
    <div>
        <h1>{{this.name}} 様</h1>
        <hr />
        <input type="date" v-model="date" />
        <input type="time" v-model="time" /><br />
        <button class="btn btn-primary" @click="onReserve">予約する</button>
        <hr />
        <h2>予約履歴</h2>
        <table class="table table-stripe">
            <tbody v-for="item in reserves" v-bind:key="item.id">
                <tr>
                    <td>{{item.date_and_time}}</td>
                    <td>
                        <router-link :to="{ name: 'ReserveEdit', params: { id: item.id } }">
                            変更・取消
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
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
        await this.update();
    },
    methods: {
        update: async function () {
            const result = await get("reserve/patient_reserve.php?id=" + this.id);
            if (result.status != 200) {
                alert("患者情報の取得に失敗しました。");
                return;
            }
            this.name = result.json.name;
            this.reserves = result.json.reserves;
        },
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
            if (result.status != 200 || !result.json.result) {
                alert("予約に失敗しました");
                return;
            }
            alert("予約しました");
            this.date = null;
            this.time = null;
            await this.update();
        }
    }
}
</script>

<style scoped>
</style>
