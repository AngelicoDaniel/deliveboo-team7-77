<template>
    <div class="text-start">
        <input class="inp-sty" type="text" v-model="search" placeholder="Search restaurant type">
        <div>
            <ul class="text-white  fs-5 list-unstyled">
                <li v-for="elem in filteredTypes" :key="elem.id">
                    <router-link class="nav-link active" aria-current="page" :to="`/types/${elem.name}`">{{ elem.name
                    }}</router-link>
                    <ul>
                        <li v-for="restaurant in elem.restaurants" :key="restaurant.id">
                            <router-link :to="`/restaurants/${restaurant.id}`">{{ restaurant.name }}</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'TypeComp',

    mounted() {
        this.getTypes();
    },

    data() {
        return {
            types: [],
            search: '',
            originalTypes: []
        }
    },

    methods: {
        getTypes() {
            axios.get('http://127.0.0.1:8000/api/types')
                .then((res) => {
                    this.types = res.data;
                    this.originalTypes = res.data;
                    this.getRestaurants();
                })
        },
        getRestaurants() {
            axios.get('http://127.0.0.1:8000/api/restaurants')
                .then((res) => {
                    res.data.forEach((restaurant) => {
                        restaurant.types.forEach((type) => {
                            const matchingType = this.types.find((t) => t.id === type.id);
                            if (matchingType) {
                                if (!matchingType.restaurants) {
                                    matchingType.restaurants = [];
                                }
                                matchingType.restaurants.push(restaurant);
                            }
                        });
                    });
                })
        },
    },

    computed: {
        filteredTypes() {
            return this.types.filter((type) => {
                return type.name.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    }
}
</script>
<style>
.inp-sty {
    padding: 10px;
    border-radius: 20px;
    width: 30%;
    margin: 30px 0px;
    border: 0;
}
</style>
