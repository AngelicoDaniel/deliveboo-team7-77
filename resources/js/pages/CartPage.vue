<template>
  <div class="cont text-center bg-dark my-5">
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
            <!-- box alert campi obbligatori -->
            <div
              v-if="!formValidated"
              class="alert alert-danger mb-1"
              role="alert"
            >
              I campi contrassegnati dall'asterisco (*) sono obbligatori.
            </div>

            <form>
              <!-- input Nome -->
              <div class="input-box mb-2">
                <label for="customer_name"
                  >Nome <span class="text-danger">*</span></label
                >
                <br />
                <input
                  id="addon-wrapping"
                  type="text"
                  name="customer_name"
                  placeholder="Inserisci il tuo nome"
                  v-model="customer_name"
                  class="form-control"
                  maxlength="50"
                  required
                  autofocus
                />
              </div>

              <!-- input cognome -->
              <div class="input-box mb-2">
                <label for="customer_surname"
                  >Cognome <span class="text-danger">*</span></label
                >
                <br />
                <input
                  type="text"
                  name="customer_surname"
                  placeholder="Inserisci il tuo cognome"
                  v-model="customer_surname"
                  class="form-control"
                  required
                  maxlength="50"
                />
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
                  name="customer_address"
                  placeholder="Inserisci il tuo indirizzo"
                  v-model="customer_address"
                  value=""
                  class="form-control"
                  required
                  maxlength="255"
                />
              </div>

              <!-- input telefono -->
              <div class="input-box mb-2">
                <label for="customer_phone"
                  >Inserisci il tuo numero di telefono
                  <span class="text-danger">*</span></label
                >
                <br />
                <input
                  type="tel"
                  name="customer_phone"
                  placeholder="Inserisci il tuo numero di telefono"
                  v-model="customer_phone"
                  class="form-control"
                  required
                />
                <small>Formato 346 15 96 524</small>
              </div>

              <!-- input email -->
              <div class="input-box mb-2">
                <label for="email"
                  >Email <span class="text-danger">*</span></label
                >
                <br />
                <input
                  type="email"
                  name="customer_email"
                  placeholder="tuamail@gmail.com"
                  v-model="customer_email"
                  class="form-control"
                  required
                />
              </div>

              <p class="py-2">Prezzo totale:</p>
              <h5 class="my-4">{{ this.TotalPrice }} €</h5>

              <!-- bottone conferma dati -->
              <div class="d-flex justify-content-center">
                <router-link
                  class="nav-link active"
                  aria-current="page"
                  :to="`/success`"
                >
                  <button
                    @click="validateForm"
                    class="btn-danger mt-2 mb-4"
                    id="pay-btn"
                    :disabled="
                      cart.length === 0 ||
                      customer_name === '' ||
                      customer_surname === '' ||
                      customer_address === '' ||
                      customer_phone === '' ||
                      customer_email === ''
                    "
                  >
                    Paga Il tuo Ordine
                  </button>
                </router-link>
              </div>
            </form>
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
      customer_name: "",
      customer_surname: "",
      customer_address: "",
      customer_phone: "",
      customer_email: "",

      order_number: null,
      formValidated: false,
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
      if (
        this.cart.length === 0 &&
        this.customer_name === " " &&
        this.customer_surname === " " &&
        this.customer_address === " " &&
        this.customer_phone === " " &&
        this.customer_email === " "
      ) {
        this.formValidated = false;
      } else {
        this.formValidated = true;
        this.cart = [];
        localStorage.removeItem("cart");
        this.totalPrice();
      }
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
