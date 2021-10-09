<template>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title primary-title>
                Add Expenses
            </v-card-title>
            <v-card-text>
                <v-select
                    :items="categories"
                    label="Select Expense Category"
                    item-text="name"
                ></v-select>
                <v-text-field label="Amount" type="number"></v-text-field>
                <v-menu
                    v-model="menu"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="auto"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="date"
                            label="Picker without buttons"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                        ></v-text-field>
                    </template>
                    <v-date-picker
                        v-model="date"
                        @input="menu = false"
                    ></v-date-picker>
                </v-menu>
            </v-card-text>

            <v-card-actions class="d-flex justify-space-between">
                <v-btn color="info" @click="showDialog">Cancel</v-btn>
                <v-btn color="success">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {
            date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                .toISOString()
                .substr(0, 10),
            menu: false
        };
    },
    computed: {
        ...mapGetters({
            dialog: "expenses/dialog",
            categories: "category/categories"
        })
    },
    methods: {
        ...mapActions({
            showDialog: "expenses/showDialog"
        })
    }
};
</script>

<style></style>
