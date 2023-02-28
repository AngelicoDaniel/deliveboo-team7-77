<template>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light" data-bs-theme="dark">
            <div class="container-fluid bg-dark d-flex justify-content-between">
                <div class="">
                    <router-link class="navbar-brand" :to="{ name: 'home' }"><img class="img-logo"
                            src="../../../public/images/6103fbd57410870004d7f2dd.png" alt="" /></router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse w-100 d-flex justify-content-between " id="navbarNav">
                    <ul class="navbar-nav ">

                        <li class="nav-item">
                            <router-link class="nav-link active" aria-current="page"
                                :to="{ name: 'home' }">Home</router-link>
                        </li>

                        
                        <li>
                            <router-link class="nav-link active" aria-current="page"
                                :to="{ name: 'cart' }">Carrello</router-link>
                        </li>




                    </ul>
                    <div class="d-flex flex-end w-25">

                        <a class="nav-link text-white" href="http://127.0.0.1:8000/admin">Sei un ristoratore?</a>

                    </div>
                </div>

            </div>

        </nav>
    </header>
</template>


<script>
export default {
    name: "Header",
};
</script>
<style>

.img-logo {
    width: 170px;
}
</style>
