require("./bootstrap");

window.Vue = require("vue").default;

import VueRouter from "vue-router";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import Axios from "axios";
import routes from "./router/index";
import store from "./store";

Vue.use(Vuetify);
Vue.use(VueRouter);

Vue.prototype.$http = Axios;

const router = new VueRouter({
    mode: "history",
    routes: routes
});

Vue.component("app-component", require("./App.vue").default);

const app = new Vue({
    el: "#app",
    router,
    vuetify: new Vuetify(),
    store
});
