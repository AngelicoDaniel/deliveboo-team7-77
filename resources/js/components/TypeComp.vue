<template>
    <div class="text-center">
      <div class="d-flex justify-content-center">
        <div class="form-check form-check-inline" v-for="type in filteredTypes" :key="type.id">
          <input class="form-check-input" type="checkbox" :id="type.id" :value="type.id" v-model="selectedTypes">
          <label class="form-check-label" :for="type.id">{{ type.name }}</label>
        </div>
      </div>

      <div v-if="filteredRestaurants.length">
        <div class="card-deck d-flex">
          <div v-for="restaurant in filteredRestaurants" :key="restaurant.id" class="card" :style="{ backgroundImage: `url(/storage/${restaurant.image_logo})` }">
            <router-link :to="`/dishes/${restaurant.id}`">
              <div class="card-overlay">
                <h5 class="card-title">{{ restaurant.name }}</h5>
                <p class="card-text">Indirizzo: {{ restaurant.address }}</p>
              </div>
            </router-link>
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
      selectedTypes: [],
    };
  },

  methods: {
    getTypes() {
      axios.get("http://127.0.0.1:8000/api/types").then((res) => {
        this.types = res.data.map((type) => {
          return {
            ...type,
            restaurants: type.restaurants || [],
          };
        });
        this.getRestaurants();
      });
    },

    getRestaurants() {
      axios.get("http://127.0.0.1:8000/api/restaurants").then((res) => {
        res.data.forEach((restaurant) => {
          restaurant.types.forEach((type) => {
            const matchingType = this.types.find((t) => t.id === type.id);
            if (matchingType) {
              if (!matchingType.restaurants.includes(restaurant)) {
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
            type.name.toLowerCase().includes(this.search.toLowerCase()) ||
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

    filteredRestaurants() {
      if (this.selectedTypes.length) {
        const selectedTypeIds = this.selectedTypes.map((id) => parseInt(id));
        const matchingRestaurants = this.types
          .filter((type) => selectedTypeIds.includes(type.id))
          .map((type) => type.restaurants)
          .reduce((accumulator, currentValue) => {
            return accumulator.filter((restaurant) => currentValue.includes(restaurant));
          });

        return matchingRestaurants.filter((restaurant, index, self) => {
          // Rimuove i ristoranti duplicati
          return (
            index ===
            self.findIndex((r) => r.id === restaurant.id)
          );
        });
      } else {
        return [];
      }
    },
  },
};
</script>
<style scoped lang="scss">

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

.list-restaurants {
  list-style-type: none;
  text-decoration: none;
  color: gray;
}

.card{
    flex-basis: 22%;
    justify-content: space-between;
    margin: 10px 10px;
}

.card-deck{
    display: flex;
    flex-wrap: wrap;

}

.card-titl .card-tex{
    color: white;
}

router-link{
    text-decoration: none !important;
}

.card {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  aspect-ratio: 1/1;
}

.card-overlay {
margin-top: 25%;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.7);
  text-align: center;
  color: black;
}

.card-title {
  font-size: 1.2rem;
  margin: 0;
}

.card-text {
  font-size: 1rem;
  margin: 0;
}

</style>
