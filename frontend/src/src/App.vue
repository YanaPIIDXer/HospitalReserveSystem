<template>
  <v-app>
    <nav-bar />
    <v-main>
      <router-view></router-view>
    </v-main>
    <footer-bar />
  </v-app>
</template>

<script>
import NavBar from './components/navbar/NavBar';
import FooterBar from './components/FooterBar';

export default {
  name: 'App',
  components: {
    NavBar,
    FooterBar
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
