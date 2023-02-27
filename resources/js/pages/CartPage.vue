<template>
    <div class="text-center">

        <li v-for="(item, index) in cart" :key="index">
          {{ item }} -
        </li>

        {{this.TotalPrice[0]}}

        <button @click="removeCart()"> Svuota Carrello</button>

    </div>
</template>

<script>

export default {
    name: "CartPage",

    data() {
    return {

        cart: [],
        TotalPrice: [],

    };
},

    mounted() {


        localStorage.getItem('cart').split(',').forEach(element => {
            this.cart.push(element);
        });

        localStorage.getItem('priceCart').split(',').forEach(element => {
            this.TotalPrice.push(element);
        });


    },
    methods: {

 removeCart() {
            this.cart = [];
            this.TotalPrice = 0;
            localStorage.removeItem('cart');
            localStorage.removeItem('priceCart');
        },



    },
};
</script>

<style scoped lang="scss"></style>
