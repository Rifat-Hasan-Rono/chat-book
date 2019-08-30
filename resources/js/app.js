/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueChatScroll from 'vue-chat-scroll'
import moment from 'moment'
Vue.use(VueRouter, VueAxios, axios);
Vue.use(VueChatScroll);
import Swal from 'sweetalert2'
window.Swal = Swal

Vue.filter('date', function (created) {
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
})

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
})
window.Toast = Toast

// import App from './components/App.vue';

import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import ResetComponent from './components/ResetComponent.vue';
import HomeComponent from './components/HomeComponent.vue';

const routes = [
    { name: 'login', path: '/login', component: LoginComponent },
    { name: 'register', path: '/register', component: RegisterComponent },
    { name: 'reset', path: '/reset', component: ResetComponent },
    { name: 'home', path: '/home', component: HomeComponent },
    { path: '/', redirect: '/login' },
    { path: '*', redirect: '/login' }
];
const router = new VueRouter({ mode: 'history', routes: routes });
const app = new Vue(Vue.util.extend({ router })).$mount('#app');