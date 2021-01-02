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
      models: []
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
      SET_MODELS(state, models) {
        state.models = models;
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
            context.commit('SET_MAKES', response.data.data);
        }).catch(error => {
            context.commit('SET_ERROR', error.toString());
        });
      },
      getModels(context, make) {
        modelService.get(make).then(response => {
            context.commit('SET_MODELS', response.data.data);
        }).catch(error => {
            context.commit('SET_ERROR', error.toString());
        });
      },
    },
  })