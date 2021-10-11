<template>
    <div>
        <v-app-bar app>
            <v-toolbar-title>Expense Manager</v-toolbar-title>
            <v-spacer></v-spacer>
            <router-link :to="{ name: 'login' }">
                <v-btn outlined>Login</v-btn>
            </router-link>
        </v-app-bar>
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
