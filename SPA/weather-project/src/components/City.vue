<template>
  <div>
    <hr>
    <h2>Météo de {{ name }}</h2>
    <p>Au {{ updatedAt }}</p>
    <div>
      <h3>Temps</h3>
      <p>{{ weather }}</p>
    </div>
    <div>
      <h3>Température</h3>
      <p>{{ temperature }} C</p>
    </div>

    <!-- updatedAt: new Date().toLocaleString('fr-FR') // date de dernière mise à jour -->
  </div>
</template>

<script>
export default {
  name: 'City',
  props: {
    name: String,
    weather: String,
    temperature: String,
    updatedAt: String
  },
  data() {
    return {
      
    }
  }
}
</script>