<template>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title primary-title>
                Add Role
            </v-card-title>
            <v-card-text>
                <v-text-field label="Name" v-model="role.name"></v-text-field>
                <v-text-field
                    label="Description"
                    v-model="role.description"
                ></v-text-field>
            </v-card-text>

            <v-card-actions class="d-flex justify-space-between">
                <v-btn color="info" @click="showDialog">Cancel</v-btn>
                <v-btn color="success" @click="add(role)">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {
            role: {}
        };
    },
    computed: {
        ...mapGetters({
            dialog: "role/dialog"
        })
    },
    methods: {
        ...mapActions({
            showDialog: "role/showDialog",
            add: "role/add"
        })
    }
};
</script>

<style></style>
