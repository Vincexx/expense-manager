require("./bootstrap");

window.Vue = require("vue").default;

import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import Axios from "axios";
import router from "./router";
import store from "./store";

Vue.use(Vuetify);

Vue.prototype.$http = Axios;

Vue.component("app-component", require("./App.vue").default);

const app = new Vue({
    el: "#app",
    router,
    vuetify: new Vuetify(),
    store
});
