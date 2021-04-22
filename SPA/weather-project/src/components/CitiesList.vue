<template>
  <div>
    <h1>Météo des villes</h1>
    <div
    v-for="city in cities" :key="city.id"
    >
    <City
    v-bind:name="city.name" 
    v-bind:weather="city.weather"
    v-bind:temperature="city.temperature"
    v-bind:updatedAt="city.updatedAt"
    />
    </div>
  </div>



</template>

<script>
import City from './City'
import { format } from 'timeago.js';

export default {
  name: 'CitiesList',
  components: {
    City
  },
  data() {
    return {
      cities: [
        {
          id: 1,
          name: 'Ville 1',
          weather: 'Ensoleillé',
          temperature: 22.0,
          updatedAt: format (new Date())
        },
        {
          id: 2,
          name: 'Ville 2',
          weather: 'Peu nuageux',
          temperature: 19.5,
          updatedAt: format (new Date())
        },
        {
          id: 3,
          name: 'Ville 3',
          weather: 'Pluie de fou',
          temperature: 12,
          updatedAt: format (new Date())
        },
        {
          id: 4,
          name: 'Ville 4',
          weather: 'Mi figue',
          temperature: 15,
          updatedAt: format (new Date())
        }
      ]
    }
  }
}
</script>