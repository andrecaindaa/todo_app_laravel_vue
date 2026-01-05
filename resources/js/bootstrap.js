import axios from 'axios';

axios.defaults.baseURL = '/api';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
