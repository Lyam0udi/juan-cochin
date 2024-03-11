// resources/js/main.js

import { createApp } from 'vue';
import App from './components/App.vue';
import Home from './components/Home.vue';
import About from './components/About.vue';
import Gallery from './components/Gallery.vue';
import Contact from './components/Contact.vue';
import router from './routes';

const app = createApp(App);
app.use(router);

app.component('home', Home);
app.component('about', About);
app.component('gallery', Gallery);
app.component('contact', Contact);
app.mount('#app');
