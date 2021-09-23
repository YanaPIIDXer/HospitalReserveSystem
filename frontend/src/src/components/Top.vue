<template>
    <div>
        <nav-bar @on-select="onSelectedNavBarItem" />
    </div>
</template>

<script>
import NavBar from './navbar/NavBar';

export default {
    name: "Top",
    components: {
        NavBar
    },
    methods: {
        onSelectedNavBarItem: function (index) {
            alert(index);
        }
    }
}
</script>

<style scoped>
</style>
