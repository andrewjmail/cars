<template>
  <div>
    <div>
      <div class="flex justify-between align-middle">
        <h5>Models</h5>
        <button @click="createModal" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Create</button>
      </div>
      <table class="table-auto">
        <thead>
        <tr>
          <td class="px-4 py-2">Name</td>
          <td class="px-4 py-2">Make</td>
          <td class="px-4 py-2">Actions</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="model in models" :key="model.id">
          <td class="border px-4 py-2">{{model.name}}</td>
          <td class="border px-4 py-2">{{model.make.name}}</td>
          <td class="border px-4 py-2">
            <button @click="editModelModal(model.id)" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-2 mr-2">Edit</button>
            <button @click="deleteModelModal(model.id)" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mt-2">Delete</button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <create-modal v-if="showCreateModal"
                 :close-create-modal="closeCreateModal">
    </create-modal>
    <edit-modal v-if="editModel"
                :close-edit-modal="closeEditModal"
                :model="editModel">
    </edit-modal>
    <delete-modal v-if="deleteModel"
                  :close-delete-modal="closeDeleteModal"
                  :model="deleteModel"
                >
    </delete-modal>
  </div>
</template>

<script>
import {mapActions} from "vuex";
import CreateModal from './CreateModelModal';
import EditModal from './EditModelModal'
import DeleteModal from "./DeleteModelModal";

export default {
  name: "ModelAdmin",
  components:{
    CreateModal,
    EditModal,
    DeleteModal
  },
  props: {
    models: {
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
      'getModels'
    ]),
    createModal() {
      this.showCreateModal = true;
    },
    closeCreateModal() {
      this.showCreateModal = false;
    },
    editModelModal(id) {
      this.editModel = {... this.models.find(model => id === model.id)};
    },
    closeEditModal() {
      this.editModel = null;
    },
    deleteModelModal(id) {
      this.deleteModel = {... this.models.find(model => id === model.id)};
    },
    closeDeleteModal() {
      this.deleteModel = null;
    }
  },
}
</script>

<style scoped>

</style>