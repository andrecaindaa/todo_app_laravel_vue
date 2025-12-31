import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
import TaskApp from './components/TaskApp.vue';

// base URL da API
axios.defaults.baseURL = 'http://127.0.0.1:8000';

const app = createApp(TaskApp);

// tornar axios disponível em todos os componentes
app.config.globalProperties.$axios = axios;

app.mount('#app');
