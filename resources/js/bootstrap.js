// Importa y configura la librería Axios para realizar peticiones HTTP
import axios from 'axios';
window.axios = axios;

// Configura la cabecera por defecto para identificar peticiones AJAX
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

