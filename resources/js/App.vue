<template>
    <div>
        <Navbar />
        <Base />
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
        return {};
    }
};
</script>

<style></style>
