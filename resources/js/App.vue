<template>
    <div>
        <HeaderComp/>
        <router-view></router-view>
        <!-- <h1>ciao</h1> -->

    </div>
  </template>

<script>

// import TypeComp from './components/TypeComp.vue';
import HeaderComp from './components/HeaderComp.vue';

export default {
    name: 'App',
    components: {
        // TypeComp,
        HeaderComp
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
