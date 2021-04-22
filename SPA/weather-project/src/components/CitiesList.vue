<template>
  <div>
    <h1>Météo des villes</h1>
    <City 
    name='Paris' 
    weather="Caca" 
    temperature="21" 
    v-bind:updatedAt="new Date().toLocaleString('fr-FR')"
    />
  </div>



</template>

<script>
import City from './City'

export default {
  name: 'CitiesList',
  components: {
    City
  }
}
</script>