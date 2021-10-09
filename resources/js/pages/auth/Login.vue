<template>
    <v-app>
        <v-content>
            <v-card width="600px" class="mx-auto mt-10">
                <v-card-title>Login - Expense Manager</v-card-title>
                <v-card-text>
                    <v-text-field
                        label="Email"
                        prepend-icon="mdi-account-circle"
                    ></v-text-field>
                    <v-text-field
                        label="Password"
                        :type="showPassword ? 'password' : 'text'"
                        prepend-icon="mdi-lock"
                        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                        @click:append="showPassword = !showPassword"
                    ></v-text-field>
                </v-card-text>

                <v-card-actions>
                    <v-btn outline color="primary" dark>Login</v-btn>
                </v-card-actions>
            </v-card>
        </v-content>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            showPassword: true
        };
    }
};
</script>

<style></style>
