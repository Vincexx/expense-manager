import Vue from "vue";
import Vuex from "vuex";
import role from "./modules/role";
import user from "./modules/user";
import category from "./modules/category";
import expenses from "./modules/expenses";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        role,
        user,
        category,
        expenses
    }
});
