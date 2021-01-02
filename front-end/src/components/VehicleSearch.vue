<template>
  <div class="container sm">
    <Errors v-if="error != null" :error="error"/>

    <div class="py-5">
      <div class="flex flex-row mb-3">
        <SelectInput v-if="makes.length" :options="this.makes" :handleSelect="handleSelect" type="make"/>
        <SelectInput v-if="models.length" :options="this.models" :handleSelect="handleSelect" type="model"/>
      </div>

      <div v-if="make" class="flex flex-none mb-3">
            <SelectInput :options="this.fuelTypes" :handleSelect="handleSelect" type="fuel_type"/>
      </div>

      <div class="px-3 mb-3">
        <button v-if="makes.length" v-on:click="search" :disabled="make === null" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
      </div>
    </div>

    <VehicleTable></VehicleTable>
  </div>
</template>

<script>

import { mapActions } from 'vuex'

import SelectInput from './SelectInput.vue'
import Errors from './Errors.vue'
import VehicleTable from "./VehicleTable";

export default {
  name: 'VehicleSearch',
  components: {
    SelectInput,
    Errors,
    VehicleTable
  },
  data() {
    return {
      make: null,
      model: null,
      fuelType: null,
      fuelTypes: ['Diesel', 'Electric', 'Petrol'],
    }
  },
  computed: {

    models() {
      return this.$store.state.models;
    },
    makes() {
      return this.$store.state.makes;
    },
    error() {
      return this.$store.state.error;
    }
  },
  created() {
    this.getMakes();
  },
  methods: {
    ...mapActions([
      'getMakes',
      'getModels',
      'getVehicles'
    ]),
    handleSelect(type, selected) {
      switch(type) {
        case 'make':
          this.make = selected;
          this.model = null;
          break;
        case 'model':
          this.model = selected;
          break;
        case 'fuel_type':
          this.fuelType = selected;
          break;
        default:
          break;
      }
      this.search()
    },
    search() {
      let query = '';

      if (this.make) {
        const make = this.makes.find(make => make.id === this.make).name;
        query = `make=${make}`;
      }

      if (this.model) {
        const model = this.models.find(model => model.id === this.model).name;
        query += `&model=${model}`
      }
      
      if (this.fuelType) {
        query += `&fuelType=${this.fuelType}`;
      }
      this.getVehicles(query);
      //this.$router.push({path: `search?${query}`});
    },
  },
  watch: {
    make() {
      // In case value has been reset
      if (this.make === null) {
        return;
      }
      this.getModels(this.make);
    },
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  button:disabled {
    background-color: red;
    cursor: not-allowed;
  }

</style>
