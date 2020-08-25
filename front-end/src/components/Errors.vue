<template>
    <div class="rounded-sm border border-red-300 p-2">
        {{error}}
    </div>
</template>

<script>

export default {
  name: 'Errors',
  props: {
    error: String,
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
