import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import App from './App.vue'
import HomePage from './pages/HomePage.vue'
import RestaurantPage from './pages/RestaurantPage.vue'

import DishPage from './pages/DishPage.vue'
import CartPage from './pages/CartPage.vue'

import PaymentSuccessfull from './pages/PaymentSuccessfull';




const router = new VueRouter({
    mode: 'history',
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
            path: '/dishes/:user_id',
            name: 'dish',
            component: DishPage
        },
        {
            path: '/cart',
            name: 'cart',
            component: CartPage
        },
        {
            path: '/success',
            name: 'success',
            component: PaymentSuccessfull
        },


    ]
});


export default router;
