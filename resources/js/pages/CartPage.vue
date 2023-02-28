<template>
  <div class="cont text-center bg-dark">
    <div class="container d-flex justify-content-around">
      <div class="py-5">
      <h2 class="py-2">I tuoi Piatti:</h2>

      <div class="card my-2" v-for="(item, index) in cart" :key="index">
        <div class="card-body">
          <li>{{ item }}</li>
        </div>
      </div>
      
      <div class="p-4">
      <button class="btn-danger" @click="removeCart()">Svuota Carrello</button>
    </div>
    </div>
    <div class="py-5 text-white">
      <h3 class="py-2">Prezzo totale:</h3>
      <h5 class="my-4">{{ this.TotalPrice[0] }} €</h5>
      <h3 class="my-3">Paga ora</h3>
      <button type="button" class="btn btn-primary my-3">Checkout</button>
    </div>
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

<style scoped lang="scss">
.cont{
  li{
    list-style: none;
    font-size: 120%;
  }

  h2, h3{
    color:#00CCBC;
    font-size: 350%;
  }

  .btn-primary{
    width: 150px;
  }

  .btn-danger {
  background-color: #dc3545;
  border-color: #dc3545;
  border-radius: 5px;
}

.btn-danger:hover {
  background-color: #c82333;
  border-color: #c823
}
}
</style>
