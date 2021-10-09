import Login from "../pages/auth/Login.vue";
import Dashboard from "../pages/Dashboard.vue";
import User from "../pages/user/User.vue";
import Role from "../pages/user/Role.vue";
import Category from "../pages/expense/Category.vue";
import Expenses from "../pages/expense/Expenses.vue";


const routes = [
    {
        path: "/login",
        component: Login,
        name: "login"
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "dashboard"
    },
    {
        path: "/user",
        component: User,
        name: "user"
    },
    {
        path: "/role",
        component: Role,
        name: "role"
    },
    {
        path: "/expenses-category",
        component: Category,
        name: "expenses-category"
    },
    {
        path: "/expenses",
        component: Expenses,
        name: "expenses"
    },
];

export default routes;
