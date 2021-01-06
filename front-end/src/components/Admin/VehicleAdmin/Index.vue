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
    <edit-vehicle-modal v-if="editVehicle"
                :close-edit-modal="closeEditModal"
                :vehicle="editVehicle"
                :makes="makes"
                :models="models">
    </edit-vehicle-modal>
    <delete-vehicle-modal v-if="deleteVehicle"
                  :close-delete-modal="closeDeleteModal"
                  :vehicle="deleteVehicle"
                >
    </delete-vehicle-modal>
  </div>
</template>

<script>
import {mapActions} from "vuex";

import CreateVehicleModal from "@/components/Admin/VehicleAdmin/CreateVehicleModal";
import EditVehicleModal from "@/components/Admin/VehicleAdmin/EditVehicleModal";
import DeleteVehicleModal from "@/components/Admin/VehicleAdmin/DeleteVehicleModal";

export default {
  name: "VehicleAdmin",
  components:{
    EditVehicleModal,
    CreateVehicleModal,
    DeleteVehicleModal
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
      editVehicle: null,
      deleteVehicle: null
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
    closeEditModal() {
      this.editVehicle = null;
    },
    editVehicleModal(id) {
      this.editVehicle = {...this.vehicles.find(vehicle => vehicle.id === id)};
    },
    deleteVehicleModal(id) {
      this.deleteVehicle = {...this.vehicles.find(vehicle => vehicle.id === id)};
    },
    closeDeleteModal() {
      this.deleteVehicle = null;
    }
  },
}
</script>

<style scoped>

</style>