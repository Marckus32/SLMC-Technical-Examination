require('./bootstrap');
import router from './router.js';
import App from './components/App.vue';

window.Vue = require('vue');

// Vue.component('Home',require('./components/Users.vue').default);

const app = new Vue({
    el : '#app',
    components:{
        App
    },
    router
});