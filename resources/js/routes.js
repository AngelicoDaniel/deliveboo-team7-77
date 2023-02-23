import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import App from './App.vue'
import HomePage from './pages/HomePage.vue'

const router = new VueRouter({
    mode:'history',
    routes: [{
        path: '/',
        name: 'home',
        component: HomePage
    }]
});


export default router;
