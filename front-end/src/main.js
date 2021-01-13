import Vue from 'vue'
import App from './App.vue'
import VehicleSearch from './components/VehicleSearch'
import Admin from "./components/Admin/Index";
import Auth from "./components/Admin/Auth/Index"
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
      path: '/auth',
      name: 'Auth',
      component: Auth
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin,
      meta: {
        requiresAuth: true,
        is_admin : true
      }
    }
  ]
})

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    if (localStorage.getItem('token') == null) {
      next({
        path: '/auth',
        params: { nextUrl: to.fullPath }
      })
    } else {
      next();
    }
  }
  else {
    next();
  }
})

new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
