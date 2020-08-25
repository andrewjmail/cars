<template>
<div>
  <div v-if="loading">Loading ...</div>
  <div v-else class="py-5">
    <table class="table-auto" v-if="vehicles.length">
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
    <div v-else>No results</div>
    <button v-on:click="back" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Back</button>
  </div>
  
</div>
</template>

<script>
import { mapActions } from 'vuex'
import axios from 'axios';

export default {
  name: 'Table',
  data() {
    return {
      loading: false,
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
    if (!this.$store.vehicles) {
      this.loading = true;
      axios.get(`http://localhost:8000/api/v1${this.$route.fullPath}`, {
        headers: {
          Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui' 
        }
      })
      .then(response => {
        this.loading = false;
        this.getVehicles(response.data.data);
      })
      .catch(e => {
          this.setError(e);
      })
    }
  },
  methods: {
    ...mapActions([
      'getVehicles',
      'setError'
    ]),
    back() {
      this.$router.push({
        path: `/`
      })
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
   
   
