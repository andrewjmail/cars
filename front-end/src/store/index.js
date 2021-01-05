import Vue from 'vue';
import Vuex from 'vuex';

import modelService from '../services/ModelService';
import makeService from '../services/MakeService';
import vehicleService from '../services/VehicleService';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
      vehicles: [],
      error: null,
      makes: [],
      models: [],
      notification: null
    },
    mutations: {
      SET_VEHICLES(state, vehicles) {
        state.vehicles = vehicles;
      },
      SET_ERROR(state, error)  {
        state.error = error;
        setTimeout(() => state.error = null, 2500);
      },
      SET_MAKES(state, makes) {
        state.makes = makes;
      },
      CREATE_MAKE(state, make) {
        state.makes.push(make);
      },
      UPDATE_MAKE(state, make) {
        state.makes = state.makes.map(stateMake => {
          return stateMake.id === make.id ? make : stateMake;
        });
      },
      DELETE_MAKE(state, make) {
          state.makes = state.makes.filter(stateMake => stateMake.id !== make.id);
      },
      SET_MODELS(state, models) {
        state.models = models;
      },
      CREATE_MODEL(state, model) {
        state.models.push(model);
      },
      UPDATE_MODEL(state, model) {
        state.models = state.models.map(stateModel => {
          return stateModel.id === model.id ? model : stateModel;
        });
      },
      DELETE_MODEL(state, model) {
        state.models = state.models.filter(stateModel => stateModel.id !== model.id);
      },
      SET_NOTIFICATION(state, notification) {
          state.notification = notification;
          setTimeout(() => state.notification = null, 2500);
      }
    },
    actions: {
      getVehicles (context, query = '') {
        vehicleService.get(query).then(response => {
            console.log(response);
            context.commit('SET_VEHICLES', response.data)
        }).catch(error => {
            context.commit('SET_ERROR', error.toString());
        });
      },
      getMakes(context) {
        makeService.get().then(response => {
            console.log(response);
            context.commit('SET_MAKES', response.data);
        }).catch(error => {
            context.commit('SET_ERROR', error.toString());
        });
      },
      createMake(context, make) {
        makeService.create(make).then(response => {
          context.commit('CREATE_MAKE', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      updateMake(context, make) {
        return makeService.update(make).then(response => {
          context.commit('UPDATE_MAKE', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      deleteMake(context, make) {
        return makeService.delete(make).then(response => {
          context.commit('DELETE_MAKE', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      getModels(context) {
        modelService.get().then(response => {
          context.commit('SET_MODELS', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      createModel(context, data) {
        modelService.create(data).then(response => {
          context.commit('CREATE_MODEL', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      updateModel(context, data) {
        return modelService.update(data).then(response => {
          context.commit('UPDATE_MAKE', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      deleteModel(context, model) {
        return modelService.delete(model).then(response => {
          context.commit('DELETE_MODEL', response.data);
        }).catch(error => {
          context.commit('SET_ERROR', error.toString());
        });
      },
      setNotification(context, notification) {
          context.commit('SET_NOTIFICATION', notification);
      }
    },
  })