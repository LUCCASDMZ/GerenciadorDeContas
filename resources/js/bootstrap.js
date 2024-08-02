import axios from 'axios';
import Swal from 'sweetalert2'
window.Swal = Swal;
window.axios = axios;

//importar o framework bootstrap
import 'bootstrap';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
