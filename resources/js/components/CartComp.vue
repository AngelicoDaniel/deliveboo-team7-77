<template>
    <div>
        <h1>cartcomp</h1>

        <!-- <div>
            <h3>Carrello</h3>
            <p>Prezzo totale: {{ totalPrice }}€</p>
            <button @click="removeCart()"> Svuota Carrello</button>
            <p>Hai Aggiunto:</p>

            <ul>
                <li v-for="(item, index) in cart" :key="index">
                    {{ item }}

                </li>
            </ul>
        </div> -->
    </div>
</template>

<script>
export default {
    name: "CartComp",

    data() {
        return {
            totalPrice: 0
        }
    },

    props: {
        dish: Array,
        cart: Array,
        removeCart: Function,
        addCart: Function,
    },

    mounted() {
        const priceCart = localStorage.getItem('priceCart');
        if (priceCart !== null) {
            this.totalPrice = parseFloat(priceCart);
        }
    },

    methods: {

        // removeCart() {
        //     this.removeCart()
        // },

        // addCart() {
        //     this.addCart()
        // },

        addCart(name, price) {

            // localStorage.setItem('cart', this.cart);
            // localStorage.setItem('priceCart', this.totalPrice);
        },
        removeCart() {
            // this.cart = [];
            // this.totalPrice = 0;
            // localStorage.removeItem('cart');
            // localStorage.setItem('priceCart');
        },

    }
}



</script>

<style></style>
