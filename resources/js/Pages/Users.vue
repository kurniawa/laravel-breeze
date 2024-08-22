<script setup>
import Layout from "@/Shared/Layout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { Head, Link } from "@inertiajs/vue3";
// import { Link } from "@inertiajs/vue3";
const props = defineProps({
    tanggal: String,
    time: String,
    users: Array,
    obj_users: Object,
});
console.log(props.obj_users);
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
    <!-- <ul>
        <li v-for="user of users" :key="user.id" v-text="user.name"></li>
    </ul> -->
    <table>
        <tbody>
            <tr v-for="user of obj_users.data" :key="user.id">
                <td>{{ user.name }}</td>
                <td>
                    <Link
                        :href="'/users/' + user.id + '/edit'"
                        class="text-sky-500"
                        >Edit</Link
                    >
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Paginator -->
    <div class="mt-6">
        <template v-for="link in obj_users.links">
            <Link v-if="link.url" :href="link.url" v-html="link.label" />
            <span v-else v-html="link.label"></span>
        </template>
    </div>
    <div class="mt-5">
        <Pagination :links="obj_users.links" />
    </div>
    <!-- End: Paginator -->
    <!-- </Layout> -->
</template>
