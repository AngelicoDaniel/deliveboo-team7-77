<template>
    <div>
        <input type="text" v-model="search" placeholder="Search restaurant type">
        <div>
            <ul>
                <li v-for="elem in filteredTypes" :key="elem.id">
                    <router-link class="nav-link active" aria-current="page"  :to="`/types/${elem.name}`">{{ elem.name
                    }}</router-link>
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
                })
        }
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
