<template>
    <div>
        <h1>患者情報更新</h1>
        <hr />
        <label>姓：</label><input type="text" v-model="last_name" /><br />
        <label>名：</label><input type="text" v-model="first_name" /><br />
        <label>住所：</label><input type="text" v-model="address" /><br />
        <label>電話番号</label><input type="text" v-model="tel" /><br />
        <button class="btn btn-primary" @click="onUpdate">更新</button>
    </div>
</template>

<script>
import { get, post } from '../../modules/APIConnection';
export default {
    name: "PatientEdit",
    data: function() {
        return {
            id: this.$route.params.id,
            last_name: "",
            first_name: "",
            address: "",
            tel: ""
        };
    },
    mounted: async function () {
        await this.updateInfo();
    },
    methods: {
        updateInfo: async function() {
            const result = await get("patient/get_by_id.php?id=" + this.id);
            if (result.status != 200) {
                alert("患者データの取得に失敗しました。");
                return;
            }
            this.last_name = result.json.name.split(" ")[0];
            this.first_name = result.json.name.split(" ")[1];
            this.address = result.json.address;
            this.tel = result.json.tel;
        },
        onUpdate: async function() {
            if (this.last_name === "") {
                alert("姓が入力されていません");
                return;
            }
            if (this.first_name === "") {
                alert("名が入力されていません");
                return;
            }
            if (this.address === "") {
                alert("住所が入力されていません");
                return;
            }
            if (this.tel === "") {
                alert("電話番号が入力されていません");
                return;
            }
            
            if (!confirm("更新しますか？")) { return; }
            const name = this.last_name + " " + this.first_name;
            let params = new URLSearchParams();
            params.append("id", this.id);
            params.append("name", name);
            params.append("address", this.address);
            params.append("tel", this.tel);
            const result = await post("patient/update.php", params);
            if (result.status != 200 || !result.json.result) {
                alert("更新に失敗しました。");
                return;
            }
            alert("更新しました");
            window.location = "/patient_list";
        }
    }
}
</script>

<style scoped>
</style>
