<template>
    <v-app-bar color="primary" app dark>
        <v-app-bar-title>診療予約システム</v-app-bar-title>
        <nav-bar-item text="トップ" path="/" index=0 :selectedIndex="selectedIndex" @on-click="onClickItem" />
        <nav-bar-item text="患者一覧" path="/patient_list" index=1 :selectedIndex="selectedIndex" @on-click="onClickItem" />
        <nav-bar-item text="患者追加" path="/register_patient" index=2 :selectedIndex="selectedIndex" @on-click="onClickItem" />
        <nav-bar-item text="予約一覧" path="reserve_list" index=3 :selectedIndex="selectedIndex" @on-click="onClickItem" />
    </v-app-bar>
</template>

<script>
import NavBarItem from './NavBarItem';

export default {
    name: "NavBar",
    components: {
        NavBarItem
    },
    data: function () {
        return {
            selectedIndex: 0
        };
    },
    methods: {
        onClickItem: function(index) {
            this.selectedIndex = index;
        }
    }
}
</script>

<style scoped>
</style>
