<template>
    <p class="nav-item nav-link">{{ text }}</p>
</template>

<script>
export default {
    name: "NavBarItem",
    props: {
        text: String,
        index: Number
    }
}
</script>

<style scoped>
</style>
