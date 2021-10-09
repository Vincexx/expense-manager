<template>
    <v-app>
        <v-container grid-list-xs>
            <v-card width="800px" class="mx-auto mt-10">
                <v-card-title>
                    Expenses Categories
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
                    :items="categories"
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

        <Category />
    </v-app>
</template>

<script>
import Category from "./modals/AddCategory.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        Category
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "Name", value: "name" },
                { text: "Description", value: "description" },
                { text: "Created_at", value: "created_at" }
            ],
            categories: [
                {
                    name: "Travel",
                    description: "Daily Commute",
                    created_at: "12/21/2021"
                },
                {
                    name: "Travel",
                    description: "Daily Commute",
                    created_at: "12/21/2021"
                },
                {
                    name: "Travel",
                    description: "Daily Commute",
                    created_at: "12/21/2021"
                }
            ]
        };
    },
    methods: {
        ...mapActions({
            showDialog: "category/showDialog"
        })
    }
};
</script>

<style></style>
