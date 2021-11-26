<template>
    <div>
        診察券番号から検索：<input type="number" v-model="search_id" />
        <button class="btn btn-primary" @click="searchById">IDで検索</button>
        <hr />
        <v-data-table :headers="headers" :items="list">
        </v-data-table>
    </div>
</template>

<script>
import { get } from "../../modules/APIConnection";

export default {
    name: "PatientList",
    data: function() {
        return {
            list: [],
            headers: [
                {
                    text: "診察券番号",
                    align: "center",
                    value: "id",
                },
                {
                    text: "名前",
                    align: "center",
                    value: "name",
                },
                {
                    text: "住所",
                    align: "center",
                    value: "address",
                },
                {
                    text: "電話番号",
                    align: "center",
                    value: "tel",
                },
            ],
            search_id: 0
        };
    },
    mounted: async function() {
        const result = await get("patient/list.php");
        if (result.status != 200) {
            alert("患者リストの取得に失敗しました。");
            this.list = [];
            return;
        }
        this.list = result.json;
    },
    methods: {
        searchById: async function () {
            const result = await get("patient/get_by_id.php?id=" + this.search_id);
            if (result.status != 200) {
                alert("取得に失敗しました。");
                this.list = [];
                return;
            }
            this.list = [
                {
                    id: this.search_id,
                    name: result.json.name,
                    address: result.json.address,
                    tel: result.json.tel
                }
            ]
        }
    }
}
</script>

<style scoped>
</style>
