<template>
    <router-link v-bind:to="path">
        <p class="nav-item nav-link" v-on:click="onClick()" v-bind:class="{active:(selectedIndex == index)}">{{ text }}</p>
    </router-link>
</template>

<script>
export default {
    name: "NavBarItem",
    props: {
        text: String,
        path: String,
        index: Number,
        selectedIndex: Number
    },
    methods: {
        onClick: function () {
            this.$emit("on-click", this.index);
        }
    }
}
</script>

<style scoped>
</style>
