<template class="text-center">
    <div class="container w-100 my-5 d-flex justify-content-center ">
        <form class="w-50 " @submit.prevent="submitForm">
            <div  class="alert alert-danger mb-1" role="alert">
                I campi contrassegnati dall'asterisco (*) sono obbligatori.
            </div>
            <div class="input-box mb-2">
                <label for="card_number">Numero della carta<span class="text-danger">*</span></label>
                    <br />
                <input id="addon-wrapping" type="tel" placeholder="Inserisci il numero della carta" class="form-control"  maxlength="50" required autofocus/>
            </div>
            <div class="input-box mb-2">
                <label for="card_holder_name">Nome del titolare<span class="text-danger">*</span></label>
                    <br />
                <input id="addon-wrapping" type="text" placeholder="Inserisci il tuo Nome" class="form-control" maxlength="50" required autofocus />
            </div>
            <div class="input-box mb-2">
                <label for="card_holder_surname">Cognome del titolare<span class="text-danger">*</span></label>
                    <br />
                <input id="addon-wrapping" type="text" placeholder="Inserisci il tuo Cognome" class="form-control" maxlength="50" required autofocus />
            </div>
            <div class=" d-flex">
 <div class="input-box mb-2 w-50">
                <label for="card_expiration_date">Data di scadenza della carta<span class="text-danger">*</span></label>
                    <br />
                <input id="addon-wrapping" type="date" placeholder="Inserisci la data" class="form-control" maxlength="50" required autofocus />
            </div>
            <div class="input-box mb-2 w-50">
                <label for="card_cvv">Codice di sicurezza della carta(CVV)<span class="text-danger">*</span></label>
                    <br />
                <input id="addon-wrapping" type="number" placeholder="Inserisci il numero della carta" class="form-control" maxlength="3" required autofocus />
            </div>
            </div>


            <button @click="success()" type="submit" class="btn btn-green">
                <router-link class="nav-link active" aria-current="page" :to="{ name: 'success' }">
                <span @click="success()">Invia</span>
                </router-link>
            </button>
        </form>
    </div>
</template>

  <script>
  export default {
    name: "PayForm",
    data() {
    return {
       /*  card_number:"",
        card_holder_name:"",
        card_holder_surname:"",
        card_expiration_date:"",
        card_cvv */
    };
},

    methods:{
        payForm(){
          this.$router.push({
             name: "success",
        });
        },
    }}

  </script>

  <style lang="scss" scoped>
.btn-green {
    background-color: #00ccbc;
    color: white;
}

.btn-green:hover {
    border-color: #00ccbc;
    background-color: rgba(13, 163, 150, 0.9);
}
  </style>
