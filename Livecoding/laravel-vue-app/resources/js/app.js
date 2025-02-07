
import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Import Vue Router

const app = createApp(App);
app.use(router); // Enable Vue Router
app.mount('#app'); // Ensure Vue mounts to the correct element
