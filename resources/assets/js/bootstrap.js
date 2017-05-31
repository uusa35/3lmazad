window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


window.$ = window.jQuery = require('jquery');
require('babel-polyfill');
require('js.cookie');
require('bootstrap-hover-dropdown');
require('jquery-slimscroll');
require('bootstrap-switch')
require('bootstrap-sass');
require('datatables.net');
require('datatables.net-buttons');
require('eonasdan-bootstrap-datetimepicker');
require('moment');
//window.$ = window.jQuery = require('jquery');
window.$.fn.transition = require('semantic-ui-transition');
window.$.fn.dropdown = require('semantic-ui-dropdown');
window.$.fn.popup = require('semantic-ui-popup');
window.$.fn.dimmer = require('semantic-ui-dimmer');
window.$.fn.modal = require('semantic-ui-modal');
import magnificPopup from 'magnific-popup';
import axios from 'axios';
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */



