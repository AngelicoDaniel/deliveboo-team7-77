import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import App from './App.vue'
import HomePage from './pages/HomePage.vue'
import RestaurantPage from './pages/RestaurantPage.vue'

import DishPage from './pages/DishPage.vue'




const router = new VueRouter({
    mode:'history',
    routes: [
        {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/types/:name',
        name: 'restaurant',
        component: RestaurantPage
    },
    {
        path: '/dishes/:name',
        name: 'dish',
        component: DishPage
    },


]
});


export default router;
