<template>
    <div>
        <h1>患者登録</h1>
        <hr />
        <form id="register_form">
            <label>姓：</label><input type="text" name="last_name" v-model="last_name" /><br />
            <label>名：</label><input type="text" name="first_name" v-model="first_name" /><br />
            <label>住所：</label><input type="text" name="address" v-model="address" /><br />
            <label>電話番号</label><input type="text" name="tel" v-model="tel" /><br />
            <button class="btn btn-primary" @click="onRegister">登録</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "RegisterPatient",
    data: function() {
        return {
            last_name: "",
            first_name: "",
            address: "",
            tel: ""
        };
    },
    methods: {
        onRegister: function() {
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
            
            if (!confirm("登録しますか？")) { return; }
            alert("登録しました");
        }
    }
}
</script>

<style scoped>
</style>
