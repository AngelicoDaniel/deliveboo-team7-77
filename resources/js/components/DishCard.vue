<template>
    <div class="text-center">
        <h1 class="m-4">{{ this.$route.params.user_id }}</h1>

        <ul>
            <li v-for="(elem, index) in dish" :key="index">
                {{ elem.name }}
                {{ elem.price }}
                <button @click="addCart(elem.name, elem.price)"> ADD</button>
            </li>
        </ul>

        <div>
            <h3>Carrello</h3>
            <p>Prezzo totale: {{ totalPrice }}€</p>
            <button @click="removeCart()"> Svuota Carrello</button>
            <p>Hai Aggiunto:</p>

            <ul>
                <li v-for="(item, index) in cart" :key="index">
                    {{ item }}
                </li>
            </ul>


        </div>
    </div>
</template>

<script>
export default {
    name: "DishCard",
    components: {},
    data() {
        return {
            dish: [],
            cart: [],
            totalPrice: 0,
        };
    },
    mounted() {
        this.getDish()

        localStorage.getItem('cart').split(',').forEach(element => {
            this.cart.push(element);
        });
        const priceCart = localStorage.getItem('priceCart');
        if (priceCart !== null) {
            this.totalPrice = parseFloat(priceCart);
        }
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
            localStorage.setItem('cart', this.cart);
            localStorage.setItem('priceCart', this.totalPrice);
        },

        removeCart() {
            this.cart = [];
            this.totalPrice = 0;
            localStorage.removeItem('cart');
            localStorage.setItem('priceCart');
        },
    },
};
</script>

<style scoped lang="scss"></style>
