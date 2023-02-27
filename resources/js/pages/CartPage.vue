<template>
    <div class="text-center">
      <div class="m-3">
        <h3>I tuoi Piatti</h3>
        <li v-for="(item, index) in cart" :key="index">
          {{ item }} -
          <button @click="removeItem(index)">Elimina</button>
        </li>
      </div>
      <div class="m-3">
        <h4>Prezzo totale:</h4>
        {{ this.TotalPrice[0] }}
      </div>

      <div class="m-4">
        <button @click="removeCart()">Svuota Carrello</button>
        <!-- <button @click="removeData()">Elimina dati</button> -->
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

    //   removeData() {
    //     localStorage.clear();
    //     location.reload(); // ricarica la pagina per visualizzare i dati aggiornati
    //   },

      removeItem(index) {
        this.cart.splice(index, 1); // rimuovi l'elemento dalla posizione "index"
        this.TotalPrice.splice(index, 1); // rimuovi il prezzo corrispondente dall'array "TotalPrice"
        localStorage.setItem("cart", this.cart.toString());
        localStorage.setItem("priceCart", this.TotalPrice.toString());
      },
    },
  };
  </script>

  <style scoped lang="scss"></style>
