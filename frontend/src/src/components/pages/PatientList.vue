<template>
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
                    <router-link :to="{ name: 'RegisterReserve', params: { id: item.id } }">予約</router-link>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { get } from "../../modules/APIConnection";

export default {
    name: "PatientList",
    data: function() {
        return {
            list: []
        };
    },
    mounted: async function() {
        var result = await get("patient/list.php");
        var json = JSON.parse(JSON.stringify(result.data));
        this.list = json;
    }
}
</script>

<style scoped>
</style>
