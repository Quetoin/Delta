/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/Home.vue';
import Produits from './components/Produits.vue';
//Vue.component('example-component', require('./components/HomeComponent.vue').default);

const routes = [
  {
    path:"/",
    compoment: Home
  },
  {
    path:"/public/produits",
    compoment: Produits
  }

];

const router = new VueRouter({
  mode:"history",
  routes: routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el:"#app",
    router:router
});
