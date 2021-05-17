require('./bootstrap');

window.Vue = require('vue').default;

import { Form, HasError, AlertError } from 'vform'
window.Form = Form;

let Fire = new Vue();
window.Fire = Fire;

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;


import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/data-user', component: require('./components/Pengguna/data-pengguna.vue').default },
    { path: '/data-level', component: require('./components/Pengguna/data-level.vue').default },
    { path: '/beranda', component: require('./components/Beranda/beranda.vue').default },
    { path: '/data-pekerjaan', component: require('./components/Pekerjaan/data-pekerjaan.vue').default },
    { path: '/data-unit', component: require('./components/Unit/data-unit.vue').default },
]

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});