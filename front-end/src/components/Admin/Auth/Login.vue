<template>
  <div class="flex items-center justify-center h-full">

    <div class="max-w-xs w-full">
      <h4>Login</h4>
      <div class="mt-2">
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input v-model="username" type="text" name="name" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>
      <div class="mt-2">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input v-model="password" type="text" name="name" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>
      <button @click="login" type="button" class="mt-2 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm">
        Login
      </button>
    </div>
  </div>
</template>

<script>

import loginService from '../../../services/AuthService';

export default {
  name: "Login",
  data() {
    return {
      username: null,
      password: null
    }
  },
  methods: {
    login() {
      loginService.login(this.password, this.username).then(res => {
        console.log(res);
      });
    }
  }
}
</script>

<style scoped>

</style>