import Home from '../components/Home'
import CitiesList from '../components/CitiesList'
import City from '../components/City'
import VueRouter from 'vue-router'


const router = new VueRouter({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/villes',
      name: 'CitiesList',
      component: CitiesList
    },
    {
      path: '/ville',
      name: 'City',
      component: City
    }
  ]
})

export default router
