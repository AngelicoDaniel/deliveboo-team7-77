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
            :style="{ backgroundImage: `url(/storage/${elem.image})` }"
          >
            <div class="card-overlay d-flex flex-column align-items-center justify-content-center justify-content-around">
              <h4 class="card-title">{{ elem.name }}</h4>
              <p class="card-text">{{ elem.price }}€ </p>
              <p class="card-text">{{ elem.description }}</p>
              <button
                @click="addCart(elem.name, elem.price, elem.id, elem.user_id , elem.image)"
                class="btn"
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

      addCart(name, price, id, user_id , image) {
        if (this.cart.length > 0 && user_id != this.cart[0].user_id) {
          alert("Non Puoi inserire piatti di altri ristoranti nel carrello!!");
        } else {
          this.cart.push({
            id: id,
            name: name,
            price: price,
            user_id: user_id,
            image: image,
          }),
            localStorage.setItem("cart", JSON.stringify(this.cart));
          alert("Piatto aggiunto al carrello!");
        }
      },

      removeCart() {
        this.cart = [];
        localStorage.removeItem("cart");
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
  position: relative; /* needed for absolute positioning of .card-overlay */
  transition: transform 0.5s ease-in-out; /* add a transition effect for transform */
  border-radius: 10%;
}

.card:hover .card-overlay {
  opacity: 1; /* show content on hover */
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}


.card-deck {
  display: flex;
  flex-wrap: wrap;
}

.card-overlay {
  opacity: 0; /* hide content initially */
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.3);
  text-align: center;
  color: black;
  transition: opacity 0.5s ease-in-out; /* add a transition effect for opacity */
  border-radius: 10%;
}


.card-title {
  font-size: 1.7rem;
  margin: 0;
  font-weight: bolder;
}

.card-text {
  font-size: 1.3rem;
  margin: 0;
  font-weight: bold;
}

.btn{
    background-color: #00CCBC;
    color: white;
    font-weight: bold;
}

.btn:hover{
    border-color: #00CCBC;
    color: black;
    background-color: rgba(13, 163, 150, 0.9);
}


  </style>
