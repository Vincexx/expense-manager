import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../pages/Home.vue";
import Login from "../pages/auth/Login.vue";
import Dashboard from "../pages/Dashboard.vue";
import User from "../pages/user/User.vue";
import Role from "../pages/user/Role.vue";
import Category from "../pages/expense/Category.vue";
import Expenses from "../pages/expense/Expenses.vue";
import store from "../store";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Home,
        name: "home",
        meta: {
            requiresAuth: false
        }
    },
    {
        path: "/login",
        component: Login,
        name: "login",
        meta: {
            requiresAuth: false
        }
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "dashboard",
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/user",
        component: User,
        name: "user",
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/role",
        component: Role,
        name: "role",
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/expenses-category",
        component: Category,
        name: "expenses-category",
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/expenses",
        component: Expenses,
        name: "expenses",
        meta: {
            requiresAuth: true
        }
    }
];

let router = new VueRouter({
    mode: "history",
    routes: routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.state.auth.authenticated) {
            next({
                name: "login"
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
