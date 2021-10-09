<template>
    <v-app>
        <v-dialog v-model="dialog" persistent max-width="500px">
            <v-card>
                <v-card-title primary-title>
                    Add User
                </v-card-title>
                <v-card-text>
                    <v-text-field label="Name"></v-text-field>
                    <v-text-field label="Email Address"></v-text-field>
                    <v-select
                        :items="roles"
                        item-text="name"
                        label="Select Role"
                    ></v-select>
                </v-card-text>

                <v-card-actions class="d-flex justify-space-between">
                    <v-btn color="info" @click="showDialog">Cancel</v-btn>
                    <v-btn color="success">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {};
    },
    computed: {
        ...mapGetters({
            dialog: "user/dialog",
            roles: "role/roles"
        })
    },
    methods: {
        ...mapActions({
            showDialog: "user/showDialog"
        })
    }
};
</script>

<style></style>
