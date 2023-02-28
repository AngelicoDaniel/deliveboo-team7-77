<template>
  <!-- Card Ristoranti -->
  <div class="container my-4">
    <div v-scrollAnimation class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h3 class="p-4 mb-3 shadow">RISTORANTI</h3>
        <p>Seleziona il ritorante più adatto alle tue esigenze!</p>
      </div>
    </div>

    <div
      class="row justify-content-center my-5"
      v-for="(elem, index) in type"
      :key="index"
    >
      <div
        v-scrollAnimation
        v-for="(user, index) in elem.users"
        :key="index"
        class="card m-3"
        style="width: 18rem"
      >
        <router-link
          class="nav-link active"
          aria-current="page"
          :to="`/dishes/${user.id}`"
        >
          {{ user.name }}
          <div class="wrapper_img p-3">
            <img
              :src="'/storage/' + user.image_logo"
              class="card-img-top h-100 w-100"
              :alt="user.name"
            />
          </div>
          <p class="card-text mb-3 col-12">{{ user.address }}</p>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TypeCard",
  props: {},
  data() {
    return {
      type: [],
    };
  },
  mounted() {
    this.getType();
  },
  methods: {
    getType() {
      axios
        .get("http://127.0.0.1:8000/api/types/" + this.$route.params.name)
        .then((res) => {
          this.type = res.data;
          console.log(this.type);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.col-md-6 {
  h3 {
    border-radius: 10px;
  }
}
.wrapper_img {
  height: 180px;

  img {
    object-fit: cover;
    object-position: top;
  }
}

.before-enter {
  opacity: 0;
  transform: translateY(50%) scale(0.5);
  transition: all 1s ease-in-out;
}
.enter {
  opacity: 1;
  transform: translateY(0) scale(1);
}
</style>

