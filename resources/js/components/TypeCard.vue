<template>
  <div class="text-center">
    <h1 class="m-4">{{ this.$route.params.name }}</h1>
     <!-- <ul>
      <li v-for="elem in type" :key="elem.id">
        <ul>
          <li v-for="user in elem.users" :key="user.id">
            {{ user.name }}
          </li>
        </ul>
      </li>
    </ul> -->

  </div>

</template>

<script>
export default {
  name: "TypeCard",
  components: {},
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
        .get("http://127.0.0.1:8000/api/types" + this.$route.params.name)
        .then((res) => {

          this.type = res;
          console.log(this.type );
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped lang="scss">
</style>
