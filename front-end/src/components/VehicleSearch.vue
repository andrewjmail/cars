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

  </div>
</template>

<script>
import { mapActions } from 'vuex'

import axios from 'axios';

import SelectInput from './SelectInput.vue'
import Errors from './Errors.vue'

export default {
  name: 'VehicleSearch',
  components: {
    SelectInput,
    Errors
  },
  data() {
    return {
      makes: [],
      models: [],
      make: null,
      model: null,
      fuelType: null,
      fuelTypes: ['Diesel', 'Electric', 'Petrol'],
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
    axios.get(`http://localhost:8000/api/v1/makes`, {
      headers: {
        Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui' 
      }
    })
    .then(response => {
      this.makes = response.data.data;
    })
    .catch(e => {
        this.setError(e);
    })
  },
  methods: {
    ...mapActions([
      'getVehicles',
      'setError'
    ]),
    handleSelect(type, selected) {
        switch(type) {
        case 'make':
          this.make = selected;
          break;
        case 'model':
          this.model = selected;
          break;
        case 'fuel_type':
          this.fuelType = selected;
          break;
        default:
      }
    },
    search() {
      const make = this.makes.find(make => make.id === this.make).name;
      let query = `make=${make}`;

      if (this.model) {
        const model = this.models.find(model => model.id === this.model).name;
        query += `&model=${model}`
      }
      
      if (this.fuelType) {
        query += `&fuelType=${this.fuelType}`;
      }
      axios.get(`http://localhost:8000/api/v1/search?${query}`, {
        headers: {
          Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui' 
        }
      })
      .then(response => {
        this.getVehicles(response.data.data);
        this.$router.push({
          path: `search?${query}`
        })
      })
      .catch(e => {
        this.setError(e);
      })    
    },
  },
  watch: {
    make() {
      // Incase value has been reset
      if (this.make === null) {
        return;
      }

      axios.get(`http://localhost:8000/api/v1/makes/${this.make}/models`, {
        headers: {
          Authorization: 'Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui' 
        }
      })
      .then(response => {
        this.models = response.data.data;
        this.model = null;
        
      })
      .catch(e => {
        this.setError(e);
      })      
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
