<template>
    <div class="text-start">
        <input
            class="inp-sty"
            type="text"
            v-model="search"
            placeholder="Search restaurant type"
        />
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-3">
                    <ul
                        class="text-white fs-5 list-unstyled d-flex justify-content-between flex-wrap"
                    >
                        <li
                            class="list-type py-2 px-4 my-md-3 my-sm-2"
                            v-for="elem in filteredTypes"
                            :key="elem.id"
                        >
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="`/types/${elem.name}`"
                                >{{ elem.name }}</router-link
                            >
                            <ul v-if="elem.showRestaurants">
                                <li class="list-restaurants"
                                    v-for="restaurant in elem.restaurants"
                                    :key="restaurant.id"
                                >
                                    <router-link class="list-restaurants"
                                        :to="`/dishes/${restaurant.id}`"
                                        >{{ restaurant.name }}</router-link
                                    >
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "TypeComp",

    mounted() {
        this.getTypes();
    },

    data() {
        return {
            types: [],
            search: "",
        };
    },

    methods: {
        getTypes() {
            axios.get("http://127.0.0.1:8000/api/types").then((res) => {
                this.types = res.data.map((type) => {
                    return {
                        ...type,
                        showRestaurants: false,
                        filteredRestaurants: [],
                        originalRestaurants: [],
                    };
                });
                this.getRestaurants();
            });
        },

        getRestaurants() {
            axios.get("http://127.0.0.1:8000/api/restaurants").then((res) => {
                res.data.forEach((restaurant) => {
                    restaurant.types.forEach((type) => {
                        const matchingType = this.types.find(
                            (t) => t.id === type.id
                        );
                        if (matchingType) {
                            if (!matchingType.restaurants) {
                                matchingType.restaurants = [];
                            }
                            if (
                                !matchingType.restaurants.includes(restaurant)
                            ) {
                                matchingType.restaurants.push(restaurant);
                            }
                        }
                    });
                });
            });
        },
    },

    computed: {
        filteredTypes() {
            if (this.search) {
                return this.types.filter((type) => {
                    return (
                        type.name
                            .toLowerCase()
                            .includes(this.search.toLowerCase()) ||
                        (type.restaurants &&
                            type.restaurants.some((restaurant) =>
                                restaurant.name
                                    .toLowerCase()
                                    .includes(this.search.toLowerCase())
                            ))
                    );
                });
            } else {
                return this.types;
            }
        },
    },

    watch: {
        search(val) {
            if (val) {
                this.types.forEach((type) => {
                    type.filteredRestaurants = type.originalRestaurants.filter(
                        (restaurant) => {
                            return restaurant.name
                                .toLowerCase()
                                .includes(val.toLowerCase());
                        }
                    );
                });
            }
        },

        filteredTypes(val) {
            if (!this.search) {
                this.types.forEach((type) => {
                    type.showRestaurants = false;
                });
            } else {
                val.forEach((type) => {
                    type.showRestaurants = true;
                });
            }
        },
    },
};
</script>
<style>
.inp-sty {
    padding: 10px;
    border-radius: 20px;
    width: 30%;
    margin: 30px 0px;
    border: 0;
}

.list-type {
    background-color: #00ccbc;
    border-radius: 15px;
}

.list-restaurants{
  list-style-type: none;
  text-decoration: none;
  color: gray;
}
</style>
