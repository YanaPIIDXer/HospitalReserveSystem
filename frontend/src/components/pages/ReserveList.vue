<template>
    <div>
        <h1>予約リスト</h1>
        <v-data-table :headers="headers" :items="list">
        </v-data-table>
    </div>
</template>

<script>
import { get } from '../../modules/APIConnection';
export default {
    name: "ReserveList",
    data: function () {
        return {
            list: [],
            headers: [
                {
                    text: "予約者名",
                    align: "center",
                    value: "name"
                },
                {
                    text: "日時",
                    align: "center",
                    value: "date_and_time"
                },
            ],
        };
    },
    mounted: async function () {
        const result = await get("reserve/list.php");
        if (result.status != 200) {
            alert("予約リストの取得に失敗しました。");
            this.list = [];
            return;
        }
        this.list = result.json;
    }
}
</script>

<style scoped>
</style>
