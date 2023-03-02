<template>
  <div class="w-100 hero">
    <!-- <HeaderComp/> -->
    <div class="container">
      <div class="row">
        <div class="col-12 text-white text-center">
          <h1>
            I piatti dei ristoranti che ami,
            <span class="domicilio-span">a domicilio</span>
          </h1>
        </div>
      </div>
      <TypeComp />
    </div>
  </div>
</template>

<script>
import TypeComp from "../components/TypeComp.vue";
// import HeaderComp from '../components/HeaderComp.vue';

export default {
  name: "HomePage",
  components: {
    // HeaderComp,
    TypeComp,
  },
};
</script>

<style>
.hero {
  background-image: url("/images/pexels-valeria-boltneva-1639562.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 120px;
  height: 1000px;
}

h1{
 font-size:3.5rem;
 margin-bottom: 50px;
}

.domicilio-span {
  color: #00ccbc;
}
</style>
