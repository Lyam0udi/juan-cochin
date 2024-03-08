// resources/js/app.js

require('./bootstrap');

import Vue from 'vue';
import router from './routes'; // Import your VueRouter instance
import App from './components/App.vue'; // Main component that will wrap your routes

const app = new Vue({
  el: '#app',
  components: { App },
  router, // Use the VueRouter instance
});
