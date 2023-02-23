require('./bootstrap');

window.Vue = require('vue');
// import Vue from 'vue';

import App from './App.vue';
import router from './routes.js';


const app = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});


