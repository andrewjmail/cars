import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
      vehicles: [],
      error: null
    },
    mutations: {
        getVehicles (state, vehicles) {
        state.vehicles = vehicles;
      },
      setError(state, error)  {
         state.error = error;
      }
    },
    actions: {
      getVehicles (context, vehicles) {
        context.commit('getVehicles', vehicles)
      },
      setError (context, error) {
        context.commit('setError', error.toString());
        setTimeout(() => {
          context.commit('setError', null)
        }, 5000);
      }
    }
  })