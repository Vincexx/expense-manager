<template>
    <div>
        <Navbar v-if="!authenticated" />
        <Base v-if="authenticated" />
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Base from "./components/Base.vue";
import { mapGetters } from "vuex";
export default {
    components: {
        Navbar,
        Base
    },
    data() {
        return {
            drawer: null
        };
    },
    computed: {
        ...mapGetters({
            authenticated: "auth/authenticated"
        })
    }
};
</script>

<style></style>
