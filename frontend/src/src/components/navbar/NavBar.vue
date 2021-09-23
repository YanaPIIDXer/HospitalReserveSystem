<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <p class="navbar-brand">診療予約システム</p>
        <div class="navbar-nav">
            <nav-bar-item text="患者一覧" index=0 :selectedIndex="selectedIndex" @on-click="onClickItem" />
            <nav-bar-item text="患者追加" index=1 :selectedIndex="selectedIndex" @on-click="onClickItem" />
            <nav-bar-item text="予約一覧" index=2 :selectedIndex="selectedIndex" @on-click="onClickItem" />
        </div>
    </nav>
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
            this.$emit("on-select", this.selectedIndex);
        }
    }
}
</script>

<style scoped>
</style>
