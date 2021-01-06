<template>
  <div>
    <div>
      <div class="flex justify-between align-middle">
        <h5>Vehicles</h5>
        <button @click="createModal" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Create</button>
      </div>
      <table class="table-auto">
        <thead>
        <tr>
          <td class="px-4 py-2">Model</td>
          <td class="px-4 py-2">Make</td>
          <td class="px-4 py-2">Colour</td>
          <td class="px-4 py-2">Fuel Type</td>
          <td class="px-4 py-2">Year</td>
          <td class="px-4 py-2">Price</td>
          <td class="px-4 py-2">Actions</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="vehicle in vehicles" :key="vehicle.id">
          <td class="border px-4 py-2">{{vehicle.model.name}}</td>
          <td class="border px-4 py-2">{{vehicle.make.name}}</td>
          <td class="border px-4 py-2">{{vehicle.colour}}</td>
          <td class="border px-4 py-2">{{vehicle.fuelType}}</td>
          <td class="border px-4 py-2">{{vehicle.year}}</td>
          <td class="border px-4 py-2">{{vehicle.price}}</td>
          <td class="border px-4 py-2">
            <button @click="editVehicleModal(vehicle.id)" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Edit</button>
            <button @click="deleteVehicleModal(vehicle.id)" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mt-2">Delete</button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <create-vehicle-modal v-if="showCreateModal"
                  :makes="makes"
                  :models="models"
                  :close-create-modal="closeCreateModal">
    </create-vehicle-modal>
<!--    <edit-modal v-if="editModel"-->
<!--                :close-edit-modal="closeEditModal"-->
<!--                :model="editModel">-->
<!--    </edit-modal>-->
<!--    <delete-modal v-if="deleteModel"-->
<!--                  :close-delete-modal="closeDeleteModal"-->
<!--                  :model="deleteModel"-->
<!--                >-->
<!--    </delete-modal>-->
  </div>
</template>

<script>
import {mapActions} from "vuex";

import CreateVehicleModal from "@/components/Admin/VehicleAdmin/CreateVehicleModal";

export default {
  name: "VehicleAdmin",
  components:{
    CreateVehicleModal
  },
  props: {
    vehicles: {
      required: true,
      type: Array
    },
    models: {
      required: true,
      type: Array
    },
    makes: {
      required: true,
      type: Array
    }
  },
  data() {
    return {
      showCreateModal: false,
      editModel: null,
      deleteModel: null
    }
  },
  methods: {
    ...mapActions([
      ''
    ]),
    createModal() {
      this.showCreateModal = true;
    },
    closeCreateModal() {
      this.showCreateModal = false;
    },
    editVehicleModal(id) {
      console.log(this.vehicles.find(vehicle => vehicle.id === id));
    },
    deleteVehicleModal(id) {
      console.log(this.vehicles.find(vehicle => vehicle.id === id));
    }
  },
}
</script>

<style scoped>

</style>