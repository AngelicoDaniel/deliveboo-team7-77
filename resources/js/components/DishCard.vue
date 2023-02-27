<template>
  <div class="text-center">
    <!-- <h1 class="m-4">{{ this.$route.params.name }}</h1> -->
    <h2 class="text-center m-5">Menu</h2>
    <ul>
      <li v-for="(elem, index) in dish" :key="index">
        {{ elem.name }}
        {{ elem.price }}
        <button @click="addCart(elem.name, elem.price)">ADD</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "DishCard",

  data() {
    return {
      dish: [],
      cart: [],
      totalPrice: localStorage.getItem("priceCart") || 0,
    };
  },

  mounted() {
    this.getDish();

    localStorage
      .getItem("cart")
      .split(",")
      .forEach((element) => {
        this.cart.push(element);
      });
  },
  methods: {
    getDish() {
      axios
        .get("http://127.0.0.1:8000/api/dishes/" + this.$route.params.user_id)
        .then((res) => {
          this.dish = res.data;
          console.log(this.dish);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    addCart(name, price) {
      this.cart.push(name);
      this.totalPrice += parseFloat(price);
      localStorage.setItem("cart", this.cart);
      localStorage.setItem("priceCart", this.totalPrice);
    },
    removeCart() {
      this.cart = [];
      this.totalPrice = 0;
      localStorage.removeItem("cart");
      localStorage.removeItem("priceCart");
    },
  },
};
</script>

<style scoped lang="scss"></style>
