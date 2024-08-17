<script setup>
import Nav from "@/Shared/Nav.vue";

defineProps({
    nama: String,
    frameworks: Array,
});
</script>

<template>
    <Nav></Nav>
    <h1>Hellow, {{ nama }}</h1>
    <p>We will use following frameworks:</p>
    <ul>
        <li v-for="framework of frameworks">{{ framework }}</li>
    </ul>
</template>
