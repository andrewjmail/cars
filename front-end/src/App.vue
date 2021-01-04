<template>
  <div id="app" class="container sm">
    <Notification></Notification>
    <h1 class="text-5xl text-center">Vehicle Search</h1>
    <router-view></router-view>
  </div>
</template>

<script>

import Notification from "@/components/Notification";

export default {
  name: 'App',
  components: {
    Notification
  }
}
</script>

<style>
#app {
  max-width: 800px;
  margin: 0 auto;
}
</style>
