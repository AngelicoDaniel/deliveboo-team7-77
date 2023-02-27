<template>
    <div class="text-center">
      <h1>Il tuo carrello</h1>
      <CartComp :cart="cart" :totalPrice="totalPrice" />
    </div>
  </template>

  <script>
  import CartComp from "../components/CartComp.vue";
  export default {
    name: "CartPage",
    components: {
      CartComp,
    },
    data() {
      return {
        cart: [],
        totalPrice: 0,
      };
    },
    mounted() {
      this.getCart();
    },
    methods: {
      getCart() {
        this.cart = JSON.parse(localStorage.getItem("cart")) || [];
        this.totalPrice = localStorage.getItem("priceCart") || 0;
      },
    },
  };
  </script>

  <style lang="scss" scoped></style>
