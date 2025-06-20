import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '279a1dc422436a40989f', // pakai punyamu
    cluster: 'ap1',
    forceTLS: true
});
