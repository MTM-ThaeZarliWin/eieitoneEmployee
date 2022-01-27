// Require Vue
window.Vue = require('vue').default;

//Put Default import
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import Vue from "vue";
import { routes } from "./routes";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
// Register Vue Components
Vue.component('employees-index', require('./components/employees/Index.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

// Initialize Vue
const app = new Vue({
    el: '#app',
    router: router,
});