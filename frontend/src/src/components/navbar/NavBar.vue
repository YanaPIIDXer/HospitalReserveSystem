<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <p class="navbar-brand">診療予約システム</p>
        <div class="navbar-nav">
            <nav-bar-item text="患者一覧" index=0 />
            <nav-bar-item text="患者追加" index=1 />
            <nav-bar-item text="予約一覧" index=2 />
        </div>
    </nav>
</template>

<script>
import NavBarItem from './NavBarItem';

export default {
    name: "NavBar",
    components: {
        NavBarItem
    }
}
</script>

<style scoped>
</style>
