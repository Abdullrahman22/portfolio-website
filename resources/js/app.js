/*======= import Vue & Bootstrap =======*/
require('./bootstrap');
window.Vue = require('vue');

/*======= Vue Router =======*/
import router from './router/router-config'

const app = new Vue({
    el: '#app',
    router,
});
