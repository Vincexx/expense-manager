<template>
    <v-app>
        <v-container grid-list-xs>
            <v-card width="800px" class="mx-auto mt-10">
                <v-card-title>
                    Expenses
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
                    :items="expenses"
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

        <AddExpenses />
    </v-app>
</template>

<script>
import AddExpenses from "./modals/AddExpenses.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        AddExpenses
    },
    data() {
        return {
            search: "",
            headers: [
                { text: "Expense Category", value: "category" },
                { text: "Amount", value: "amount" },
                { text: "Entry Date", value: "entry_date" },
                { text: "Created_at", value: "created_at" }
            ],
            expenses: [
                {
                    category: "Travel",
                    amount: "$12",
                    entry_date: "12/21/2021",
                    created_at: "12/21/2021"
                },
                {
                    category: "Travel",
                    amount: "$12",
                    entry_date: "12/21/2021",
                    created_at: "12/21/2021"
                },
                {
                    category: "Travel",
                    amount: "$12",
                    entry_date: "12/21/2021",
                    created_at: "12/21/2021"
                }
            ]
        };
    },
    methods: {
        ...mapActions({
            showDialog: "expenses/showDialog"
        })
    }
};
</script>

<style></style>
