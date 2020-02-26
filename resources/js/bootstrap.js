/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.swal = require('sweetalert2');
    window.moment = require('moment');

    require('material-dashboard/assets/js/core/bootstrap-material-design.min');
    require('jquery-mask-plugin');
    require('material-dashboard/assets/js/plugins/bootstrap-notify');
    require('material-dashboard/assets/js/plugins/chartist.min');
    require('material-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min');
    require('material-dashboard/assets/js/material-dashboard');
    require('flatpickr');
    require('flatpickr/dist/l10n/pt');
    require('flatpickr/dist/themes/material_green.css');
    require('bootstrap-select/dist/js/bootstrap-select')
} catch (e) {}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
