<template>
    <div class="text-center">
        <h1 class="m-4">{{ this.$route.params.user_id}}</h1>

        <ul>
            <li v-for="(elem, index) in dish" :key="index">
                <!-- <ul>
                    <li v-for="(user, index) in elem.users" :key="index">
                        {{ user.name }}
                    </li>
                </ul> -->
                 {{ elem.name}}
                 {{ elem.price}}
            </li>
        </ul>
</div>
</template>

<script>
export default {
    name: "DishCard",
    components: {},
    data() {
        return {
            dish: [],
        };
    },
    mounted() {
        this.getDish();
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
    },
};
</script>

<style scoped lang="scss"></style>
