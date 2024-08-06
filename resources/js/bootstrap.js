//importar o framework bootstrap
import 'bootstrap';

//importar jquery
import jQuery from 'jquery';
window.$ = jQuery;

//importar select2
import select2 from 'select2';
select2();

//importar axios
import axios from 'axios';
window.axios = axios;

//importar sweetalert2
import Swal from 'sweetalert2';
window.Swal = Swal;


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
