<template>
    <v-app>
        <v-container grid-list-xs>
            <v-card width="800px" class="mx-auto mt-10">
                <v-card-title>
                    Users Management
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                    :headers="headers"
                    :items="users"
                    :search="search"
                ></v-data-table>

                <v-btn
                    color="success"
                    rounded
                    class="float-right mt-10"
                    @click="showDialog"
                >
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-card>
        </v-container>

        <AddUser />
    </v-app>
</template>

<script>
import AddUser from "./modals/AddUser.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        AddUser
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "Name", value: "name" },
                { text: "Email Address", value: "email" },
                { text: "Role", value: "roles.name" },
                { text: "Created_at", value: "created_at" }
            ]
        };
    },
    computed: {
        ...mapGetters({
            users: "user/users"
        })
    },
    mounted() {
        this.fetch();
    },
    methods: {
        ...mapActions({
            showDialog: "user/showDialog",
            fetch: "user/fetch"
        })
    }
};
</script>

<style></style>
