<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app width="300px">
            <v-list>
                <v-sheet class="pa-7 text-center">
                    <v-avatar>
                        <img
                            src="https://cdn.vuetifyjs.com/images/john.jpg"
                            alt="John"
                            class="mb-2"
                        />
                    </v-avatar>

                    <div class="font-weight-bold">Charles Pitagan</div>
                </v-sheet>

                <router-link :to="{ name: 'dashboard' }">
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-icon>

                        <v-list-item-title>Dashboard</v-list-item-title>
                    </v-list-item>
                </router-link>

                <v-list-group :value="false" prepend-icon="mdi-account-group">
                    <template v-slot:activator>
                        <v-list-item-title>User Management</v-list-item-title>
                    </template>

                    <router-link :to="{ name: 'role' }">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-line</v-icon>
                            </v-list-item-icon>

                            <v-list-item-title class="overline"
                                >Roles</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>

                    <router-link :to="{ name: 'user' }">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-line</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title class="overline"
                                >Users</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>
                </v-list-group>

                <v-list-group :value="false" prepend-icon="mdi-cart">
                    <template v-slot:activator>
                        <v-list-item-title
                            >Expense Management</v-list-item-title
                        >
                    </template>

                    <router-link :to="{ name: 'expenses-category' }">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-line</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title class="overline"
                                >Expense Category</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>

                    <router-link :to="{ name: 'expenses' }">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-line</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title class="overline"
                                >Expenses</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title>Welcome to Expense Manager</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn
                outline
                color="success"
                dark
                @click="logout"
                :loading="loading"
                >Sign Out</v-btn
            >
        </v-app-bar>

        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data: () => ({
        drawer: null,
        loading: false,
    }),
    mounted() {},
    methods: {
        logout() {
            this.loading = true;
            axios
                .post("/logout")
                .then(res => {
                    localStorage.removeItem("isLoggedIn");
                    this.$router.push("/");
                    console.log("Logged Out");
                })
                .catch(err => console.log(err))
                .finally(() => {
                    this.loading = false;
                });
        }
    }
};
</script>
