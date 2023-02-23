<template>
  <div class="text-center">
    <h1 class="m-4">{{ this.$route.params.name }}</h1>
    <ul>
      <!-- <li v-for="elem in tag" :key="elem.id">
        <ul>
          <li v-for="posts in elem.posts" :key="posts.id">
            {{ posts.title }}
          </li>
        </ul>
      </li> -->
    </ul>
      <h1>ok</h1>
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
          console.log(res);
          this.type = res.data;
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
