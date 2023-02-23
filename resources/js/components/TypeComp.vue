<template>
    <div>
        <h1>Types:</h1>

        <div>
            <ul>
                <li v-for="elem in types" :key="elem.id">{{ elem.name }}</li>
            </ul>
        </div>


</div>
</template>

<script>

export default {
    name: 'TypeComp',

    mounted() {
        // this.getRestaurants();
        this.getTypes();
    },
    data() {
        return {
            // restaurants: [],
            types: []
        }
    },
    methods: {
        // getRestaurants() {
        //     axios.get('http://127.0.0.1:8000/api/restaurants')
        //         .then((res) => {
        //             console.log(res.data);
        //             this.restaurants = res.data
        //         })
        // },

        getTypes() {
            axios.get('http://127.0.0.1:8000/api/types')
                .then((res) => {
                    console.log(res.data);
                    this.types = res.data
                })
        }
    }


}

</script>

<style></style>
