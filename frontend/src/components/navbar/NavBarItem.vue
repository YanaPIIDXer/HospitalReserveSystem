<template>
    <v-btn text v-on:click="onClick()" v-bind:class="{active:(selectedIndex == index)}" v-bind:to="path">
        {{ text }}
    </v-btn>
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
.active {
    color: blue;
}
</style>
