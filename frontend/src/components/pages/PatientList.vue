<template>
    <div>
        <input type="number" v-model="search_id" />
        <button class="btn btn-primary" @click="searchById">IDで検索</button>
        <hr />
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>診察券番号</th><th>名前</th><th>住所</th><th>電話番号</th>
                </tr>
            </thead>
            <tbody v-for="item in list" v-bind:key="item.name">
                <tr>
                    <td>{{item.id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.address}}</td>
                    <td>{{item.tel}}</td>
                    <td>
                        <router-link :to="{ name: 'PatientReserve', params: { id: item.id } }">予約</router-link>
                    </td>
                    <td>
                        <router-link :to="{ name: 'PatientEdit', params: { id: item.id } }">情報更新</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { get } from "../../modules/APIConnection";

export default {
    name: "PatientList",
    data: function() {
        return {
            list: [],
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
