<script setup>
import Layout from "@/Shared/Layout.vue";
import { Head } from "@inertiajs/vue3";
// import { Link } from "@inertiajs/vue3";
defineProps({
    tanggal: String,
    time: String,
    users: Array,
});
</script>

<script>
export default {
    layout: Layout,
};
</script>

<template>
    <!-- <Layout> -->
    <Head title="User">
        <meta
            name="description"
            content="User Information"
            head-key="description"
        />
    </Head>
    <div class="mt-96">tanggal: {{ tanggal }}</div>
    <div class="mt-96">waktu: {{ time }}</div>
    <Link href="/users" preserve-scroll>Refresh</Link>
    <h1>Users</h1>
    <ul>
        <li v-for="user of users" :key="user.id" v-text="user.name"></li>
    </ul>
    <!-- </Layout> -->
</template>
