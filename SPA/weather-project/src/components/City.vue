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
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: 'Paname Town', // nom de la ville
      weather: 'Peu nuageux', // descriptif météo 
      temperature: 20.55, // température en °C
      updatedAt: new Date().toLocaleString('fr-FR') // date de dernière mise à jour
    }
  }
}
</script>