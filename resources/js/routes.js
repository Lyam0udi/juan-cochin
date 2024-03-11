// resources/js/routes.js

import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';

const routes = [
  {
    path: '/',
    component: Home,
  },
  // Add other routes if needed
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
