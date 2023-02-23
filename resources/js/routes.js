import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './App.vue'

const router = new VueRouter({
    mode:'history',
    routes: [{
        path: '/',
        name: 'App',
        component: App
    }]
});


export default router;
