<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <router-link class="navbar-brand" :to="{ name: 'home' }">Navbar</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link active" aria-current="page"
                                :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <!-- <li class="nav-item">
                                <router-link class="nav-link" :to="{ name: 'types' }">Type Listllllllllll</router-link>
                            </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/admin">Area Riservataa</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
</header>
</template>

<script>

export default {
    name: 'Header'
}
</script>
