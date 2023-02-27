<template>
  <div class="text-center">
    <div class="m-3">
      <h3>I tuoi Piatti</h3>
      <li v-for="(item, index) in cart" :key="index">{{ item }} -</li>
    </div>
    <div class="m-3">
      <h4>Prezzo totale:</h4>
      {{ this.TotalPrice[0] }}
    </div>

    <div class="m-4">
      <button @click="removeCart()">Svuota Carrello</button>
    </div>
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
    localStorage
      .getItem("cart")
      .split(",")
      .forEach((element) => {
        this.cart.push(element);
      });

    localStorage
      .getItem("priceCart")
      .split(",")
      .forEach((element) => {
        this.TotalPrice.push(element);
      });
  },
  methods: {
    removeCart() {
      this.cart = [];
      this.TotalPrice = 0;
      localStorage.removeItem("cart");
      localStorage.removeItem("priceCart");
    },
  },
};
</script>

<style scoped lang="scss"></style>
