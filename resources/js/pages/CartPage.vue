<template>
  <div class="cont text-center bg-dark">
    <div class="container d-flex justify-content-around">
      <div class="py-5">
        <h2 class="py-2">I tuoi Piatti:</h2>

        <div class="card my-2" v-for="(item, index) in cart" :key="index">
          <div class="card-body">
            <li>{{ item.id }}</li>
            <li>{{ item.name }}</li>
            <li>{{ item.price }}</li>
            <button class="btn btn-danger" @click="removeCartItem(index)">
              Rimuovi
            </button>
          </div>
        </div>

        <div class="p-4">
          <button class="btn-danger" @click="removeCart()">
            Svuota Carrello
          </button>
        </div>
      </div>
      <div class="py-5 text-white">
        <h3 class="py-2">Prezzo totale:</h3>
        <h5 class="my-4">{{ this.TotalPrice }} €</h5>
        <h3 class="my-3">Paga ora</h3>

        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#staticBackdrop"
          aria-controls="staticBackdrop"
        >
          Checkout
        </button>

        <div
          class="offcanvas offcanvas-start"
          data-bs-backdrop="static"
          tabindex="-1"
          id="staticBackdrop"
          aria-labelledby="staticBackdropLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <div>
                <div
                        v-if="!formValidated"
                        class="alert alert-danger mb-1"
                        role="alert"
                      >
                        I campi contrassegnati dall'asterisco (*) sono
                        obbligatori.
                      </div>




            </div>
          </div>
        </div>

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
      TotalPrice: 0,
      customer_name: null,
      address: null,
      email: null,
      ship_cost: null,
      order_number: null,
    };
  },

  mounted() {
    if (localStorage.getItem("cart")) {
      this.cart = JSON.parse(localStorage.getItem("cart"));
    }

    this.totalPrice();
  },
  methods: {
    removeCartItem(index) {
      this.cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(this.cart));
      this.totalPrice();
    },

    removeCart() {
      this.cart = [];
      localStorage.removeItem("cart");
      this.totalPrice();
    },

    totalPrice() {
      this.TotalPrice = 0;
      this.cart.forEach((elem) => {
        this.TotalPrice += elem.price;
      });
    },
  },
};
</script>

<style scoped lang="scss">
.cont {
  li {
    list-style: none;
    font-size: 120%;
  }

  h2,
  h3 {
    color: #00ccbc;
    font-size: 350%;
  }

  .btn-primary {
    width: 150px;
  }

  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    border-radius: 5px;
  }

  .btn-danger:hover {
    background-color: #c82333;
    border-color: #c823;
  }
}
</style>
