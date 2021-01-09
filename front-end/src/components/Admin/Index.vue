<template>
  <div>
    <div class="mt-5 mb-5 flex justify-center w-full">
      <ul class="flex justify-between">
        <li class="mx-4"><a href="" @click.prevent="setTab('makes')" :class="{ 'active': tab === 'makes'}">Makes</a></li>
        <li class="mx-4"><a href="" @click.prevent="setTab('models')" :class="{ 'active': tab === 'models'}">Models</a></li>
        <li class="mx-4"><a href="" @click.prevent="setTab('vehicles')" :class="{ 'active': tab === 'vehicles'}">Vehicles</a></li>
      </ul>
    </div>
    <make-admin
        v-if="tab === 'makes'"
        :makes="makes">
    </make-admin>
    <model-admin
        v-if="tab === 'models'"
        :models="models">
    </model-admin>
    <vehicle-admin
        v-if="tab === 'vehicles'"
        :vehicles="vehicles"
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
      showCreateModal: false,
      tab: 'makes'
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
    },
    setTab(tab) {
      this.tab = tab;
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
  .active {
    border-bottom: 1px solid;
    font-weight: 500;
  }
</style>