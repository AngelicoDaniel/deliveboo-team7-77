<template>
  <div>
    <HeaderComp />
    <router-view></router-view>
    <FooterComp />
  </div>
</template>

<script>
import HeaderComp from "./components/HeaderComp.vue";
import FooterComp from "./components/FooterComp.vue";

export default {
  name: "App",
  components: {
    HeaderComp,
    FooterComp,
  },

};
</script>

<style>
</style>
