<template>
    <div>
        <h1>予約リスト</h1>
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>予約者名</th><th>日時</th>
                </tr>
            </thead>
            <tbody v-for="item in list" v-bind:key="item.name">
                <tr>
                    <td>{{item.name}}</td>
                    <td>{{item.date_and_time}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { get } from '../../modules/APIConnection';
export default {
    name: "ReserveList",
    data: function () {
        return {
            list: []
        };
    },
    mounted: async function () {
        const json = await get("reserve/list.php");
        this.list = json;
    }
}
</script>

<style scoped>
</style>
