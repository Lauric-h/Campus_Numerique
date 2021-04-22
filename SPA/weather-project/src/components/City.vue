<template>
  <div>
    <h1>Météo de {{ name }}</h1>
    <p>Au {{ updatedAt }}</p>
    <div>
      <h2>Temps</h2>
      <p>{{ weather }}</p>
    </div>
    <div>
      <h2>Température</h2>
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