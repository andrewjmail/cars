<template>
  <div>
y
    <div>
      <h5>Makes</h5>
      <table class="table-auto">
        <thead>
          <tr>
            <td class="px-4 py-2">Name</td>
            <td class="px-4 py-2">Actions</td>
          </tr>
        </thead>
        <tbody>
        <tr v-for="make in makes" :key="make.id">
          <td class="border px-4 py-2">{{make.name}}</td>
          <td class="border px-4 py-2">
            <button @click="editMake(make.id)" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Edit</button>
            <button @click="deleteMake(make.id)" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mt-2">Delete</button>
          </td>
        </tr>
        </tbody>
      </table>
      <h5>Create Make</h5>
      <div>
        <label>Name</label>
        <input v-model="make" type="text" placeholder="Make Name">
        <button @click="submitMake">Create Make</button>
      </div>
    </div>
  <EditModal
      v-if="makeToEdit"
      :make="makeToEdit"
      :close-edit-modal="closeEditModal">
  </EditModal>
  <DeleteModal
      v-if="makeToDelete"
      :make="makeToDelete"
      :close-delete-modal="closeDeleteModal"></DeleteModal>
  </div>
</template>

<script>

import {mapActions} from "vuex";

import EditModal from "@/components/EditModal";
import DeleteModal from "@/components/DeleteModal";

export default {
  name: "Admin",
  components: {
    EditModal,
    DeleteModal
  },
  data() {
    return {
      make: null,
      makeToEdit: null,
      makeToDelete: null
    }
  },
  computed: {
    makes() {
      return this.$store.state.makes;
    }
  },
  methods: {
    ...mapActions([
      'getMakes',
      'createMake'
    ]),
    submitMake() {
      if (this.make) {
        this.createMake(this.make);
      }
    },
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
    }
  },
  created() {
    this.getMakes();
  }

}
</script>

<style scoped>

</style>