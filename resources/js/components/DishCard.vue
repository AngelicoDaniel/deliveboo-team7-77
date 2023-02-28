<template>
    <div class="text-center">

        <div class="row justify-content-center mb-5">
            <h3 class="text-center">Seleziona il tuo piatto preferito</h3>
        </div>



        <!-- <div v-for="(elem, index) in dish" :key="index">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <img :src="'/storage/' + elem.image" class="w-100 p-3" :alt="elem.name" />
                    </div>
                </div>
                <div class="col-md-6 p-3 text-center">
                    <h5>{{ elem.name }}</h5>
                    <p class="card-text mb-2 plate_description">
                        {{ elem.description }}
                    </p>
                    <p class="card-text mb-3">Prezzo: {{ elem.price }}€</p>
                    <button @click="addCart(elem.name, elem.price)" class="btn btn-primary">
                        Aggiungi al Carrello
                    </button>
                </div>
            </div>

        </div> -->

        <!-- -------------------------------------------------------- -->

        <div class="container my-4 w-25">


            <div class="row justify-content-center my-5" v-for="(elem, index) in dish" :key="index">

                <h5>{{ elem.name }}</h5>
                <p class="card-text mb-2 plate_description">
                    {{ elem.description }}
                </p>
                <p class="card-text mb-3">Prezzo: {{ elem.price }}€</p>
                <button @click="addCart(elem.name, elem.price)" class="btn btn-primary w-25">
                    Aggiungi al Carrello
                </button>


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
            alert("Piatto aggiunto al carrello!");
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

/* .card{
    width: 50%;
} */
img.restaurant_img {
    &.before-enter {
        opacity: 0;
        transform: translateX(50%) scale(0.5);
        transition: all 1.5s ease-in-out;
    }

    &.enter {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

.h2_info {
    &.before-enter {
        opacity: 0;
        transform: translateX(25%);
        transition: all 1.5s ease-in-out;
        transition-delay: 0.5s;
    }

    &.enter {
        opacity: 1;
        transform: translateX(0);
    }
}


.card.plate_card {
    .wrapper_plate_img {
        max-width: 230px;
    }

    &.before-enter {
        opacity: 0;
        transform: translateY(100%);
        transition: all 1s ease-in-out;
    }

    &.enter {
        opacity: 1;
        transform: translateY(0);
    }
}

.card_scrollbar {
    &::-webkit-scrollbar {
        width: 2px;
    }
}

.cart_style {

    overflow-y: auto;
    max-height: 500px;
    border-radius: 5px;
}

.full-cart {
    border-bottom: 2px solid blue;
}

.empty_cart {


    border-radius: 5px;
}

.cart_animation {
    &.before-enter {
        opacity: 0;
        transform: translatey(100%) scale(0.1);
        transition: all 1.5s ease-in-out;
    }

    &.enter {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.added_plate {
    &.before-enter {
        opacity: 0;
        transform: translateX(-50%);
        transition: all 0.5s ease-in-out;
    }

    &.enter {
        opacity: 1;
        transform: translateX(0);
    }
}

.ck_border {
    border-top: 2px solid blue;
}

.fa-circle-plus,
.fa-circle-minus {
    transition: transform 0.25s ease-in-out;

    &:hover {
        cursor: pointer;
        transform: scale(1.3);
    }
}
</style>
