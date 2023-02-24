

<template>
    <div class="text-center">
        <h1 class="m-4">{{ this.$route.params.name }}</h1>

        <ul>
            <li v-for="(elem, index) in type" :key="index">
                <ul>
                    <li v-for="(user, index) in elem.users" :key="index">
                        <router-link class="nav-link active" aria-current="page"
                                :to="`/dishes/${user.id}`"> {{ user.name }}</router-link>

                </li>
                </ul>
            </li>
        </ul>
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

<style scoped lang="scss"></style>

