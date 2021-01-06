<template>
  <div>
    <make-admin :makes="makes"></make-admin>
    <model-admin :models="models"></model-admin>
    <vehicle-admin :vehicles="vehicles"
                   :makes="makes"
                   :models="models">
    </vehicle-admin>
  </div>
</template>

<script>

import {mapActions} from "vuex";

import MakeAdmin from './MakeAdmin/Index'
import ModelAdmin from './ModelAdmin/Index';
import VehicleAdmin from './VehicleAdmin/Index';

export default {
  name: "Admin",
  components: {
    ModelAdmin,
    VehicleAdmin,
    MakeAdmin
  },
  data() {
    return {
      make: null,
      makeToEdit: null,
      makeToDelete: null,
      showCreateModal: false
    }
  },
  computed: {
    makes() {
      return this.$store.state.makes;
    },
    models() {
      return this.$store.state.models;
    },
    vehicles() {
      return this.$store.state.vehicles;
    },
  },
  methods: {
    ...mapActions([
      'getMakes',
      'getModels',
      'getVehicles'
    ]),
    editMake(id) {
      this.makeToEdit = { ...this.makes.find(make => make.id === id)};
    },
    deleteMake(id) {
      this.makeToDelete = { ...this.makes.find(make => make.id === id)};
    },
    closeDeleteModal() {
      this.makeToDelete = null;
    },
    closeEditModal() {
      this.makeToEdit = null;
    },
    closeCreateModal() {
      this.showCreateModal = false;
    },
    createMake() {
      this.showCreateModal = true;
    }

  },
  created() {
    this.getMakes();
    this.getModels();
    this.getVehicles();
  }

}
</script>

<style scoped>

</style>