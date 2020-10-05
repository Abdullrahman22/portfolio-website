/*======= import Vue & Bootstrap =======*/
require('./bootstrap');
window.Vue = require('vue');

/*======= Vue Router =======*/
import router from './router/router-config'


/*======= Vue-Sweetalert2 =======*/
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

/*======= Pagination =======*/
Vue.component('pagination', require('laravel-vue-pagination'));


const app = new Vue({
    el: '#app',
    router,
});
