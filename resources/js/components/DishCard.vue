<template>
  <div class="text-center">
    <div class="row justify-content-center my-5">
      <h3 class="text-center">Seleziona il tuo piatto preferito</h3>
    </div>

    <div class="">
      <div class="card-deck d-flex justify-content-center">
        <div
          v-for="(elem, index) in dish"
          :key="index"
          class="card"
          :style="{ backgroundImage: `url(${elem.image})` }"
        >
          <div class="card-overlay">
            <h5 class="card-title">{{ elem.name }}</h5>
            <p class="card-text">{{ elem.price }}</p>
            <p class="card-text">{{ elem.description }}</p>
            <button
              @click="addCart(elem.name, elem.price, elem.id, elem.user_id)"
              class="btn btn-primary"
            >
              Aggiungi al Carrello
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DishCard",

  data() {
    return {
      dish: [],
      cart: [],
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

    addCart(name, price, id, user_id) {
      if (this.cart.length > 0 && user_id != this.cart[0].user_id) {
        alert("Non Puoi inserire piatti di altri ristoranti nel carrello!!");
      } else {
        this.cart.push({
          id: id,
          name: name,
          price: price,
          user_id: user_id,
        }),
          localStorage.setItem("cart", JSON.stringify(this.cart));
        alert("Piatto aggiunto al carrello!");
      }
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


<style scoped lang="scss">
.card {
  flex-basis: 22%;
  justify-content: space-between;
  margin: 10px 10px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  aspect-ratio: 1/1;
}

.card-deck {
  display: flex;
  flex-wrap: wrap;
}

.card-titl .card-tex {
  color: white;
}

.card-overlay {
  margin-top: 25%;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.3);
  text-align: center;
  color: black;
}

.card-title {
  font-size: 1.2rem;
  margin: 0;
}

.card-text {
  font-size: 1rem;
  margin: 0;
}
</style>
