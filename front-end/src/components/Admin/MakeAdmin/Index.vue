<template>
  <div>
    <div>
      <div class="flex justify-between align-middle">
        <h5>Makes</h5>
        <button @click="createMake" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Create</button>
      </div>
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
    </div>

    <edit-modal
        v-if="makeToEdit"
        :make="makeToEdit"
        :close-edit-modal="closeEditModal">
    </edit-modal>
    <delete-modal
        v-if="makeToDelete"
        :make="makeToDelete"
        :close-delete-modal="closeDeleteModal">

    </delete-modal>
    <create-modal
          v-if="showCreateModal"
          :close-create-modal="closeCreateModal">
    </create-modal>
  </div>
</template>

<script>

import EditModal from "@/components/Admin/MakeAdmin/EditMakeModal";
import DeleteModal from "@/components/Admin/MakeAdmin/DeleteMakeModal";
import CreateModal from "@/components/Admin/MakeAdmin/CreateMakeModal";

export default {
  name: "Admin",
  components: {
    EditModal,
    DeleteModal,
    CreateModal,
  },
  props: {
    makes: {
      required: true,
      type: Array
    }
  },
  data() {
    return {
      makeToEdit: null,
      makeToDelete: null,
      showCreateModal: false
    }
  },
  methods: {
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

}
</script>

<style scoped>

</style>