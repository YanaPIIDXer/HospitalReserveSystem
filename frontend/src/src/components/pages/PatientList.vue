<template>
    <table class="table table-stripe">
        <thead>
            <tr>
                <th>名前</th><th>住所</th><th>電話番号</th>
            </tr>
        </thead>
        <tbody v-for="item in list" v-bind:key="item.name">
            <tr>
                <td>{{item.name}}</td>
                <td>{{item.address}}</td>
                <td>{{item.tel}}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import conn from "../../modules/BasicConnection";

export default {
    name: "PatientList",
    data: function() {
        return {
            list: []
        };
    },
    mounted: async function() {
        var result = await conn.get("http://localhost:3000/api/patient/list.php");
        var json = JSON.parse(JSON.stringify(result.data));
        this.list = json;
    }
}
</script>

<style scoped>
</style>
