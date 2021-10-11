<template>
    <v-app>
        <v-content>
            <v-card width="600px" class="mx-auto mt-15">
                <v-card-title>Login - Expense Manager</v-card-title>
                <v-card-text>
                    <v-text-field
                        label="Email"
                        prepend-icon="mdi-account-circle"
                        v-model="user.email"
                    ></v-text-field>
                    <v-text-field
                        label="Password"
                        :type="showPassword ? 'password' : 'text'"
                        prepend-icon="mdi-lock"
                        v-model="user.password"
                        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                        @click:append="showPassword = !showPassword"
                    ></v-text-field>
                </v-card-text>

                <v-card-actions>
                    <v-btn
                        color="primary"
                        dark
                        @click="login"
                        :loading="loading"
                        >Login</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-content>
    </v-app>
</template>

<script>
import { mapActions } from "vuex";
export default {
    data() {
        return {
            showPassword: true,
            user: {},
            loading: false
        };
    },
    methods: {
        ...mapActions({
            signIn: "auth/login",
            apiToken: "auth/apiToken"
        }),
        async login() {
            this.loading = true;
            // await axios.get("/sanctum/csrf-cookie");
            await axios
                .post("/api/login", this.user)
                .then(res => {
                    localStorage.setItem("api_token", res.data.api_token);
                    this.signIn(this.$router);
                })
                .catch(err => console.log(err))
                .finally(() => {
                    this.loading = false;
                });
        }
    }
};
</script>

<style></style>
