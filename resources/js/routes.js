// resources/js/routes.js

import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Gallery from './components/Gallery.vue';
import Contact from './components/Contact.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { path: '/gallery', component: Gallery },
  { path: '/contact', component: Contact },
];

const router = new VueRouter({
  routes,
  mode: 'history', // Use HTML5 history mode for cleaner URLs
});

export default router;
