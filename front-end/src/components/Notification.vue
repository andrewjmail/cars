<template>
  <div v-if="notification" class="absolute left-0 right-0" :class="notification.class">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between flex-wrap">
        <div class="w-0 flex-1 flex items-center">
          <p class="ml-3 font-medium text-white truncate">
            {{notification.message}}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Notification",
  computed: {
    notification() {
      return this.$store.state.notification;
    }
  }
}
</script>

<style scoped>

</style>