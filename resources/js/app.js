require('./bootstrap');

window.Vue = require('vue');
// import Vue from 'vue';

import router from './routes.js';
import App from './App.vue';


const app = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});


