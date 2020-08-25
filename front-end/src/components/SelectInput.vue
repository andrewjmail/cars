<template>
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
        {{ type | capitalize }}
      </label>
      <div class="relative">
        <select 
          v-model="selected" 
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          v-on:change="updateSelected"
        >
          <option value="" disabled selected>Select your option</option>
          <option v-for="option in options" :key="option.id" v-bind:value="option.id ? option.id : option">{{option.name ? option.name : option}}</option>
        </Select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
</template>

<script>

export default {
  name: 'SelectInput',
  data() {
    return {
      selected: ''
    }
  },
  methods: {
    updateSelected() {
      this.handleSelect(this.type, this.selected);
    }
  },
  props: {
    options: Array,
    handleSelect: Function,
    type: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
