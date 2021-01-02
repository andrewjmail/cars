<template>
<div>
  <div v-if="vehicles.length > 0" class="py-5">
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">Make</th>
          <th class="px-4 py-2">Model</th>
          <th class="px-4 py-2">Fuel</th>
          <th class="px-4 py-2">Link</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="vehicle in vehicles" :key="vehicle.id">
          <td class="border px-4 py-2">{{vehicle.make.name}}</td>
          <td class="border px-4 py-2">{{vehicle.model.name}}</td>
          <td class="border px-4 py-2">{{vehicle.fuelType}}</td>
          <td class="border px-4 py-2"><a href="/">Link</a></td>
        </tr>
      </tbody>
    </table>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Reset</button>
  </div>
  <div v-else>No results</div>

</div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'VehicleTable',
  data() {
    return {
    }
  },
  computed: {
    vehicles() {
      return this.$store.state.vehicles;
    },
    error() {
      return this.$store.state.error;
    }
  },
  created() {
    this.getVehicles();
  },
  methods: {
    ...mapActions([
      'getVehicles'
    ]),
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
   
   
