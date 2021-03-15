require("./bootstrap");

// FOR THE VUE REALIZATION UNCOMMENT FOLLOWING:

window.Vue = require("vue").default;

import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import App from "./views/App";
import Hello from "./views/Hello";
import Home from "./views/Home";
import BooksIndex from "./views/BooksIndex";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/hello",
            name: "hello",
            component: Hello
        },
        {
            path: "/books",
            name: "books.index",
            component: BooksIndex
        }
    ]
});

const app = new Vue({
    el: "#app",
    components: { App },
    router
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
