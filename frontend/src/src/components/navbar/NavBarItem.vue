<template>
    <p class="nav-item nav-link" v-on:click="onClick()" v-bind:class="{active:(selectedIndex == index)}">{{ text }}</p>
</template>

<script>
export default {
    name: "NavBarItem",
    props: {
        text: String,
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
