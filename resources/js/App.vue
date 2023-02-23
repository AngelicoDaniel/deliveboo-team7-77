<template>
    <div>

      <HomePage/>
      <!-- <router-view></router-view> -->
    </div>
  </template>

<script>

// import TypeComp from './components/TypeComp.vue';
import HomePage from './pages/HomePage.vue';

export default {
    name: 'App',
    components: {
        // TypeComp,
        HomePage
    },

    // mounted() {
    //     this.getRestaurants();
    //     this.getTypes();
    // },
    // data() {
    //     return {
    //         restaurants: [],
    //         types: []
    //     }
    // },
    // methods: {
    //     getRestaurants() {
    //         axios.get('http://127.0.0.1:8000/api/restaurants')
    //             .then((res) => {
    //                 console.log(res.data);
    //                 this.restaurants = res.data
    //             })
    //     },

    //     getTypes() {
    //         axios.get('http://127.0.0.1:8000/api/types')
    //             .then((res) => {
    //                 console.log(res.data);
    //                 this.types = res.data
    //             })
    //     }
    // }


}

</script>

<style></style>
