<template>
    <div>
        <Navbar v-if="!isLoggedIn" />
        <Base v-if="isLoggedIn" />
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
    mounted() {
        setInterval(() => {
            this.isLoggedIn = localStorage.getItem("isLoggedIn");
            console.log("test");
        }, 1000);
    },
    data() {
        return {
            isLoggedIn: ""
        };
    }
};
</script>

<style></style>
