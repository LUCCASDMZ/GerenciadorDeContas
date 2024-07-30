import axios from 'axios';
window.axios = axios;

//importar o framework bootstrap
import 'bootstrap';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
