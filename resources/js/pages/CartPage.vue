<template>
  <section class="h-100 h-custom" style="background-color: #eee">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-7">
                  <h5 class="mb-3">
                    <a
                      class="text-body continue_shopping"
                      ><i class="fas fa-long-arrow-alt-left mr-2"></i>Continua
                      lo shopping</a
                    >
                  </h5>
                  <hr />
                  <div v-if="cart.length > 0">
                    <div class="mb-4">
                      <p class="mb-1">Il tuo Carrello</p>
                    </div>
                    <div

                      v-for="(item, index) in cart" :key="index"
                      class="card mb-3"
                    >
                      <div class="row align-items-center p-3 added_plate">
                        <div class="col-0 col-sm-4 d-none d-sm-block">
                          <img
                            :src="`/storage/${item.image}`"
                            :alt="item.name"
                            width="100px"
                            class="d-inline-block"
                          />
                        </div>
                        <div class="col-8 col-sm-6">
                          <div class="d-flex flex-column">
                            <h6 class="mb-2">
                              {{ item.name }}
                            </h6>
                            <div>

                              <p
                                class="
                                  my-2
                                  ml-0 ml-sm-2
                                  d-sm-inline-block d-block
                                "
                              >
                                Prezzo:
                                {{ item.price }}€
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-4 col-sm-2 text-right">
                          <button
                            class="btn btn-danger"
                            @click="removeCartItem(index)"

                          >
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div v-else class="text-center mt-5">
                    <div class="d-flex flex-column mb-3">
                      <i class="fa-solid fa-2x fa-cart-shopping mb-3"></i>
                      <p>Il carrello è vuoto</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div  class="card card_right rounded-3">
                    <div class="p-4">
                      <button class="btn btn-danger" type="button" @click="removeCart()">
                        Svuota Carrello
                      </button>
                    </div>
                  </div>
                  <div class="py-5 text-white">
                    <h3 class="py-2">Prezzo totale:</h3>
                    <h5 class="my-4">{{ this.TotalPrice }} €</h5>
                    <h3 class="my-3">Paga ora</h3>

                    <button
                      class="btn btn-green"
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
                                class="btn btn-danger mt-2 mb-4"
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
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
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

  li {
    list-style: none;
    font-size: 120%;
  }

  h2,
  h3 {
    color: #00ccbc;
    font-size: 350%;
  }

  .btn-green{
    background-color: #00CCBC;
    color: white;
}

.btn-green:hover{
    border-color: #00CCBC;
    background-color: rgba(13, 163, 150, 0.9);
}

</style>
