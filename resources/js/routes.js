import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Importo i componenti
import HomePage from './components/pages/Homepage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';
import PostDetailPage from './components/pages/PostDetailPage.vue';

// Definizione rotte
const router = new VueRouter({
    // history permette di vedere il "finto" link di navigazione nell'url della pagins
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: '/', component: HomePage, name: 'home' },
        { path: '/contacts', component: ContactPage, name: 'contacts' },
        { path: '/posts/:slug', component: PostDetailPage, name: 'post-detail' },
        // !!! LA 404 SEMPRE ULTIMA
        { path: '*', component: NotFoundPage, name: 'not-found' }
    ]
});

export default router;