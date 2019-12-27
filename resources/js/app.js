/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//item
Vue.component('item-form', require('./components/Item/ItemForm').default);
Vue.component('item-details', require('./components/Item/ItemDetails').default);
//country
Vue.component('country-cms-details', require('./components/CountryCms/CountryCmsDetails').default);
Vue.component('country-cms-index', require('./components/CountryCms/CountryCmsIndex').default);
Vue.component('country-cms-form', require('./components/CountryCms/CountryCmsForm').default);
//city
Vue.component('city-cms-details', require('./components/CityCms/CityCmsDetails').default);
Vue.component('city-cms-index', require('./components/CityCms/CityCmsIndex').default);
Vue.component('city-cms-form', require('./components/CityCms/CityCmsForm').default);
//category
Vue.component('category-cms-index', require('./components/CategoryCms/CategoryCmsIndex').default);
Vue.component('category-cms-form', require('./components/CategoryCms/CategoryCmsForm').default);
Vue.component('category-cms-details', require('./components/CategoryCms/CategoryCmsDetails').default);
//user
Vue.component('user-form', require('./components/User/UserForm').default);

Vue.component('user-cms-index', require('./components/UserCms/UserCmsIndex').default);
Vue.component('user-details', require('./components/UserCms/UserCmsDetails').default);

Vue.component('item-cms-index', require('./components/ItemCms/ItemCmsIndex').default);
Vue.component('item-cms-details', require('./components/ItemCms/ItemCmsDetals').default);

//item
Vue.component('donation-form', require('./components/Donation/DonationForm').default);

//Vue Select
import vSelect from 'vue-select'
Vue.component('v-select', vSelect);
import 'vue-select/dist/vue-select.css';

import Datetime from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'

Vue.use(Datetime);
window.moment = require('moment/moment');
//SweetAlert2
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
