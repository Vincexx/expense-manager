<template>
    <v-app>
        <v-container grid-list-xs>
            <v-card width="800px" class="mx-auto mt-10">
                <v-card-title>
                    Roles Management
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
                    :items="roles"
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

        <AddRole />
    </v-app>
</template>

<script>
import AddRole from "./modals/AddRole.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        AddRole
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "Display name", value: "name" },
                { text: "Description", value: "description" },
                { text: "Created_at", value: "created_at" }
            ]
        };
    },
    mounted() {
        this.fetch();
    },
    computed: {
        ...mapGetters({
            dialog: "role/dialog",
            roles: "role/roles"
        })
    },
    methods: {
        ...mapActions({
            showDialog: "role/showDialog",
            fetch: "role/fetch"
        })
    }
};
</script>

<style></style>
