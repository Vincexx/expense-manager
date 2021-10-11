import Vue from "vue";
import Vuex from "vuex";
import role from "./modules/role";
import user from "./modules/user";
import category from "./modules/category";
import expenses from "./modules/expenses";
import auth from "./modules/auth";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        role,
        user,
        category,
        expenses,
        auth
    }
});
