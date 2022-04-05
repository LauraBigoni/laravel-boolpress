import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Importo i componenti
import HomePage from './components/pages/Homepage.vue';
import ContactPage from './components/pages/ContactPage.vue';

// Definizione rotte
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: HomePage },
        { path: '/contacts', component: ContactPage }
    ]
});

export default router;