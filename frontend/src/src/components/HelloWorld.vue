<template>
  <div>
    <h1>{{ msg }}</h1>
    <button v-on:click="onClickButton();" class="btn btn-primary">通信</button>
  </div>
</template>

<script>
import conn from '../modules/BasicConnection';
export default {
  name: 'HelloWorld',
  data: function() {
    return {
      msg: "Hello"
    };
  },
  methods: {
    onClickButton: async function() {
      try {
        var data = await conn.get("http://localhost:3000");
        data = JSON.parse(JSON.stringify(data["data"]));
        this.msg = data.message;
      }
      catch {
        this.msg = "Error.";
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
