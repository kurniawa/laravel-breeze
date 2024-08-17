<script setup>
import Nav from "@/Shared/Nav.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    tanggal: String,
    time: String,
});
</script>

<template>
    <Nav></Nav>
    <h1>Users</h1>
    <div class="mt-96">tanggal: {{ tanggal }}</div>
    <div class="mt-96">waktu: {{ time }}</div>
    <Link href="/users" preserve-scroll>Refresh</Link>
</template>
