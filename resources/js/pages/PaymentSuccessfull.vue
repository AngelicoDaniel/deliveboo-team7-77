<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading mb-2">Ordine Effettuato!!</h4>
          <p>
            Grazie per aver acquistato con noi. Il riepilogo del tuo ordine è
            stato inviato all'indirizzo email che hai indicato. Ti invitiamo a
            contattarci per qualsiasi informazione.
          </p>
          <hr />
          <a href="/" class="btn btn-success">Torna alla Home</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PaymentSuccessfull",
};
</script>

<style lang="scss" scoped>

.container {
  margin: 15rem auto;

}
</style>
