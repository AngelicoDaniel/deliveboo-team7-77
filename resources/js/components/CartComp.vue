<template>
    <div>
      <h1>cartcomp</h1>
      <p>Prezzo totale: {{ subtotalPrice }}€</p>
      <button @click="removeCart()"> Svuota Carrello</button>
      <p>Hai Aggiunto:</p>

      <ul>
        <li v-for="(item, index) in cart" :key="index">
          {{ item }} -
        </li>
        <h4>{{ totalPrice }}</h4>
      </ul>
    </div>
  </template>

  <script>
  export default {
    name: "CartComp",

    props: {
      totalPrice: {
        type: Number,
        required: true,
      },
      cart: {
        type: Array,
        required: true,
      },
    },

    computed: {
      subtotalPrice() {
        return this.cart.reduce(
          (accumulator, currentValue) => accumulator + currentValue.price,
          0
        );
      },
    },

    methods: {
      removeCart() {
        // logic to remove items from cart
      },
    },
  };
  </script>

  <style></style>
