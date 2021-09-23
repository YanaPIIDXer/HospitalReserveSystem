<template>
    <a class="nav-item nav-link" href="#">{{ text }}</a>
</template>

<script>
export default {
    name: "NavBarItem",
    props: {
        text: String
    }
}
</script>

<style scoped>
</style>
