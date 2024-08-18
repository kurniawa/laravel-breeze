<script setup>
import Layout from "@/Shared/Layout.vue";

defineProps({
    nama: String,
    frameworks: Array,
});
</script>
<script>
export default {
    layout: Layout,
    computed: {
        foo() {
            return this.$page.props.foo;
        },
    },
};
</script>

<template>
    <!-- <Layout> -->
    <h1 class="text-3xl">Hellow, {{ nama }}, {{ foo }}</h1>
    <p>We will use following frameworks:</p>
    <ul>
        <li v-for="framework of frameworks">{{ framework }}</li>
    </ul>
    <!-- </Layout> -->
</template>
