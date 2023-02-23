import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// import App from './App.vue'
import HomePage from './pages/HomePage.vue'
import RestaurantPage from './pages/RestaurantPage.vue'



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


]
});


export default router;
