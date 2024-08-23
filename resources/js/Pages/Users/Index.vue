<script setup>
import Layout from "@/Shared/Layout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
// import { Link } from "@inertiajs/vue3";
// import Inertia from "@inertiajs/inertia"; // versi vue 2
const props = defineProps({
    tanggal: String,
    time: String,
    users: Array,
    obj_users: Object,
    filters: Object,
    filter: String,
});
console.log(props.filters);
console.log(props.filter);

let search = ref(props.filters.search);

// function SearchItem() {
//     console.log(search.value);
// }

watch(search, (value) => {
    router.get(
        "/users",
        { search: value },
        { preserveState: true, preserveScroll: true, replace: true }
    );
});

// watch(props.filter, (value) => {
//     console.log(value);
// });
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
    <div class="flex justify-end">
        <Link
            href="/users/create"
            class="bg-emerald-300 rounded-lg p-2 text-white"
            >Create User</Link
        >
    </div>
    <div class="mt-96">tanggal: {{ tanggal }}</div>
    <div class="mt-96">waktu: {{ time }}</div>
    <Link href="/users" preserve-scroll>Refresh</Link>
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl">Users</h1>
        <div>
            <!-- <input
                v-model="search"
                type="text"
                name=""
                id=""
                class="rounded-lg"
                placeholder="Search..."
                preserve-scroll
                @input="SearchItem"
            /> -->
            <input
                v-model="search"
                type="text"
                name=""
                id=""
                class="rounded-lg"
                placeholder="Search..."
                preserve-scroll
            />
        </div>
    </div>
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
