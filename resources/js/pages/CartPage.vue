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
            <h5 class="offcanvas-title" id="staticBackdropLabel">Checkout</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <div>

               <div class="input-box mb-2">
  <label for="customer_name">Nome <span class="text-danger">*</span></label>
  <br />
  <input
    type="text"
    name="customer_name"
    placeholder="Inserisci il tuo nome"
    v-model="customer_name"
    class="form-control"
    maxlength="50"
    required
    autofocus
  />
  <div v-if="validation.customer_name.message" class="alert alert-danger">
    {{ validation.customer_name.message }}
  </div>
</div>

                          <!-- input indirizzo di consegna -->
                        <div class="input-box mb-2">
                          <label for="address"
                            >Indirizzo di consegna
                            <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="text"
                            name="address"
                            placeholder="Inserisci il tuo indirizzo"
                            v-model="address"
                            value=""
                            class="form-control"
                            required
                            maxlength="255"
                          />

                          </div>

                           <!-- input email -->
                        <div class="input-box mb-2">
                          <label for="email"
                            >Email <span class="text-danger">*</span></label
                          >
                          <br />
                          <input
                            type="email"
                            name="email"
                            placeholder="tuamail@gmail.com"
                            v-model="email"
                            class="form-control"
                            required
                          />
                          </div>

                          <p class="py-2">Prezzo totale:</p>
        <h5  class="my-4">{{ this.TotalPrice }} €</h5>



                          <!-- bottone conferma dati -->
      <div class="d-flex justify-content-center">
  <router-link class="nav-link active" aria-current="page" :to="`/success`">
    <button @click="validateForm" class="btn-danger mt-2 mb-4" id="pay-btn" :disabled="cart.length === 0">
      Paga Il tuo Ordine
    </button>
  </router-link>
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
      formValidated: false,
      validation: {
        customer_name: {
          success: true,
          message: "",
          formValidated: false,
        },}
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


validateForm() {
  if (this.cart.length === 0 && !this.customer_name) {
    alert("Il carrello è vuoto o il nome del cliente non è stato inserito.");
    this.validation.customer_name.success = false;
    this.validation.customer_name.message = "Il nome è obbligatorio";
    this.formValidated = false;
  } else {
    this.validation.customer_name.success = true;
    this.validation.customer_name.message = "";
    this.formValidated = true;
  }
}




  },
}
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
