<template>
    <header>
      <nav class="navbar navbar-expand-md bg-body-tertiary navbar-light" data-bs-theme="dark">
        <div class="container-fluid bg-dark d-flex justify-content-between">
          <div class="navbar-brand">
            <router-link :to="{ name: 'home' }">
              <img class="img-logo" src="../../../public/images/6103fbd57410870004d7f2dd.png" alt="" />
            </router-link>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'cart' }">Carrello</router-link>
              </li>
            </ul>
            <div class="nav-right d-flex align-items-center">
              <span class="nav-link text-white d-none d-md-block">Sei un ristoratore?</span>
              <a class="nav-link text-white mx-3" href="http://127.0.0.1:8000/login">Accedi</a>
              <a class="nav-link text-white mx-3" href="http://127.0.0.1:8000/register">Registrati</a>
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


<style lang="scss" scoped>
/* .navbar-nav li:hover {
  color: #00CCBC;
} */

.navbar {
    padding: 0;
    border-bottom: 1px solid #00CCBC;
}

.nav-right {
    margin-right: 30px;
}

.img-logo {
    width: 170px;
}

li {
    margin: 5px;
    border-bottom: 1px solid transparent;
}

li:hover {
    border-bottom-color: #00CCBC;
}
</style>
