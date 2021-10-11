<template>
    <v-app>
        <v-dialog v-model="dialog" persistent max-width="500px">
            <v-card>
                <v-card-title primary-title>
                    Add User
                </v-card-title>
                <v-card-text>
                    <v-text-field
                        label="Name"
                        v-model="user.name"
                    ></v-text-field>
                    <v-text-field
                        label="Email Address"
                        v-model="user.email"
                    ></v-text-field>
                    <v-select
                        :items="roles"
                        item-text="name"
                        item-value="id"
                        label="Select Role"
                        v-model="user.role_id"
                    ></v-select>

                    <v-text-field
                        type="password"
                        label="Password"
                        v-model="user.password"
                    ></v-text-field>
                    <v-text-field
                        type="password"
                        label="Confirm Password"
                        v-model="user.password_confirmation"
                    ></v-text-field>
                </v-card-text>

                <v-card-actions class="d-flex justify-space-between">
                    <v-btn color="info" @click="showDialog">Cancel</v-btn>
                    <v-btn color="success" @click="add(user)">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    data() {
        return {
            user: {}
        };
    },
    computed: {
        ...mapGetters({
            dialog: "user/dialog",
            roles: "role/roles"
        })
    },
    methods: {
        ...mapActions({
            showDialog: "user/showDialog",
            add: "user/add"
        })
    }
};
</script>

<style></style>
