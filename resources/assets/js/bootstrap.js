
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

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

import Echo from "laravel-echo"
/*import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store.js'
const app = new Vue({
    router: router,
    store
});
// Create the router instance
const router = new VueRouter({
    mode: 'history',
    app,
})*/
window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
    auth: {
        headers: {
            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJiZTBkZjJhOTEzNzhkOTllZDBjMGRkMzIzYWY5OGFjMzdmNmQ0ZDcwMjBlMTJhNWI4MDVmZmQ2MDFiYWViZmEwMDBlNDE4N2U1OGVhNWRiIn0.eyJhdWQiOiIxIiwianRpIjoiMmJlMGRmMmE5MTM3OGQ5OWVkMGMwZGQzMjNhZjk4YWMzN2Y2ZDRkNzAyMGUxMmE1YjgwNWZmZDYwMWJhZWJmYTAwMGU0MTg3ZTU4ZWE1ZGIiLCJpYXQiOjE1MzcxNjIxNDksIm5iZiI6MTUzNzE2MjE0OSwiZXhwIjoxNTY4Njk4MTQ4LCJzdWIiOiI1OSIsInNjb3BlcyI6WyJ1c2VyLm1lIiwidXNlci5zdG9yZSIsInVzZXIudXBkYXRlIiwiam9iLmluZGV4Iiwiam9iLnNob3ciLCJqb2Iuc3RvcmUiLCJqb2IudXBkYXRlIiwiZmlsZS51cGxvYWQiLCJmaWxlLnJlbW92ZSIsImpvYi5zdGF0cyIsImpvYi1iaWQuaW5kZXgiLCJqb2ItYmlkLnN0b3JlIiwiam9iLWJpZC51cGRhdGUiLCJzZXJ2aWNlLmluZGV4Iiwic3VwcG9ydC1pbnF1aXJ5LnN0b3JlIiwidXBkYXRlLmNhbXBhaWduIiwidXNlci1yYXRpbmcuc3RvcmUiLCJzdXBwb3J0LXF1ZXN0aW9uLmluZGV4Iiwic3VwcG9ydC1xdWVzdGlvbi5zdG9yZSIsInBheW1lbnQuc3RvcmUiLCJwbGFuLmluZGV4Il19.TgBynSk8VGNgb5G18r8AQuCUu3y8FyAR-36IP6OKwkMGt-l3VvZamk3T8c1ib7IXyZHZ-HNfBnSxZSOxqTDOMwQXDkCFo3IyzGqtEeryfL_SxW4j2UU2_yvaYtYZsyUBF-p9TKg394V8s4NT41MkTvbASIAzEbhFzUvEHKuT1BgxZjAagkITSa2MwLI1c43L8n8ZZL5v9-sCHTllmka9mg8jOc-mfDv36aRxUrKFqs1EeCOKsJQ9L4g1-iJpCDN0kWDVadkUCIEVtjFnyMZDaVWMg0LAbScxBaJoWHRS4m9iom0CVfb8-kkL_6aBLl15CslJMQZqstheBPyb4T2lSCk-CF5Yopj_kefGC3oAvUB8V_J2Ahh4oJsErQNyUD8tPGDvGAUzqVpILX812tDZhvH1noWBi4IdOSZvqTkyFVHZPbOKvyvw1X_PBB--tsvK2n1LdQiKD22c5Xzy-5zc9VqcgO1xTMVV83CJUZP-1PvYiXSdk7pIF9KP86BZgU1ELgNo5vZTB_Fq7iIDHVpN9x48jpP9_xnExBBqIHZTYJnGp1KfgfdIM-3AwOIYT18TYn9P2vHzOSVSvcsCU4rAMHf3audJNWHo8xJKMW3TcXqz-hnvf4T9Rwo5yygPyk0_twLO3ewD30p8ALOXu1k-U5mtGNmKH28FozLgg0n5gyY'
        }
    }
});
