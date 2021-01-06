<template>
  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                Create Vehicle
              </h3>

              <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">Make</label>
                <select
                    v-model="make"
                    name="make"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                >
                  <option value="" disabled selected>Select the Make</option>
                  <option v-for="make in makes" :value="make.id" :key="make.id">{{make.name}}</option>
                </Select>
              </div>

              <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">Model</label>
                <select
                    v-model="model"
                    name="make"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                >
                  <option value="" disabled selected>Select the Model</option>
                  <option v-for="model in makesModels" :value="model.id" :key="model.id">{{model.name}}</option>
                </Select>
              </div>

              <div class="mt-2">
                <label for="colour" class="block text-sm font-medium text-gray-700">Colour</label>
                <input v-model="colour" type="text" name="colour" id="colour" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mt-2">
                <label for="price" class="block text-sm font-medium text-gray-700">Price (£)</label>
                <input v-model="price" type="text" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">Year</label>
                <select
                    v-model="year"
                    name="make"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                >
                  <option value="" disabled selected>Select the Fuel type</option>
                  <option v-for="year in years" :value="year" :key="year">{{year}}</option>
                </Select>
              </div>

              <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">Fuel Type</label>
                <select
                    v-model="fuelType"
                    name="make"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                >
                  <option value="" disabled selected>Select the Fuel type</option>
                  <option value="1">Petrol</option>
                  <option value="2">Diesel</option>
                  <option value="3">Electric</option>
                </Select>
              </div>

            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="submit" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Update
          </button>
          <button @click="closeEditModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
  name: "EditVehicleModal",
  props: {
    closeEditModal: {
      required: true,
      type: Function
    },
    vehicle: {
      required: true,
      type: Object
    },
    makes: {
      required: true,
      type: Array
    },
    models: {
      required: true,
      type: Array
    }
  },
  data() {
    return {
      colour: null,
      price: null,
      make: null,
      model: null,
      fuelType: null,
      year: null,
      makesModels: []
    }
  },
  watch: {
    make: function (val) {
      if (val) {
        this.makesModels = this.models.filter(model => model.make.id === val);
      }
    }
  },
  computed: {
    years() {
      return ['2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010'];
    },
    initialModels() {
      return this.models.filter(model => model.make.id === this.make)
    }
  },
  methods: {
    ...mapActions([
      'updateVehicle'
    ]),
    submit() {
      this.updateVehicle({
        model: this.model,
        make: this.make,
        colour: this.colour,
        price: Number(this.price),
        year: this.year,
        fuel_type: this.fuelType,
        id: this.vehicle.id
      }).then(() => {
        this.closeCreateModal();
      });
    }
  },
  created() {
    this.colour = this.vehicle.colour,
    this.price = this.vehicle.price,
    this.make = this.vehicle.make.id,
    this.model = this.vehicle.model.id,
    this.fuelType = this.vehicle.make.id,
    this.year = this.vehicle.year,
    this.makesModels = this.initialModels
  }
}
</script>

<style scoped>

</style>