<template>
    <div>
        <Navbar v-if="!authenticated" />
        <Base v-if="authenticated" />
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Base from "./components/Base.vue";
export default {
    components: {
        Navbar,
        Base
    },
    data() {
        return {
            drawer: null,
            authenticated: true
        };
    }
};
</script>

<style></style>
