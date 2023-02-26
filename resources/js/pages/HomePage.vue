<template>
    <div class="w-100 hero">
        <!-- <HeaderComp/> -->
        <div class="container ">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h1>I piatti dei ristoranti che ami e la spesa, a domicilio</h1>
                </div>

            </div>
            <TypeComp />
        </div>




</div>
</template>

<script>

import TypeComp from '../components/TypeComp.vue';
// import HeaderComp from '../components/HeaderComp.vue';

export default {
    name: 'HomePage',
    components: {
        // HeaderComp,
        TypeComp,
    },
}

</script>

<style>
.hero {
    background-image: url('/images/360_F_294218701_se4mQtVmQoPnG4UX7J8PjvTzn8yeWyqF.jpg');
    background-size: cover;


    width: 100%;
    height: 85.3vh;
}
</style>
