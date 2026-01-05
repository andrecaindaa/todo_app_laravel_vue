import './bootstrap'
import { createApp } from 'vue'
import axios from 'axios'
import TaskApp from './components/TaskApp.vue'

axios.defaults.baseURL = '/api'

const app = createApp(TaskApp)

app.config.globalProperties.$axios = axios

app.mount('#app')
