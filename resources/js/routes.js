import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Importo i componenti
import HomePage from './components/pages/Homepage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';

// Definizione rotte
const router = new VueRouter({
    // history permette di vedere il "finto" link di navigazione nell'url della pagins
    mode: 'history',
    routes: [
        { path: '/', component: HomePage },
        { path: '/contacts', component: ContactPage },

        // !!! LA 404 SEMPRE ULTIMA
        { path: '*', component: NotFoundPage }
    ]
});

export default router;