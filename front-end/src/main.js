import Vue from 'vue'
import App from './App.vue'
import VehicleSearch from './components/VehicleSearch'
import Admin from "./components/Admin/Index";
import store from './store'
import Router from 'vue-router'
import "./main.css";
import "./filters.js"

Vue.config.productionTip = false

Vue.use(Router)

const router =  new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: VehicleSearch
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    }
  ]
})

new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
