<template>
  <div id="app">
    <h1 class="text-5xl text-center">Vehicle Search</h1>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'App',
}
</script>

<style>
#app {
  max-width: 800px;
  margin: 0 auto;
}
</style>
