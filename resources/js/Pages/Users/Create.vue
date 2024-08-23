<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import Layout from "@/Shared/Layout.vue";
import { reactive, ref, watch } from "vue";
let form = reactive({
    name: "",
    email: "",
    password: "",
});

watch(form, (value) => {
    console.log(value);
});

let handleSubmit = () => {
    router.post("/users/store", form);
};
</script>
<script>
export default { layout: Layout };
</script>

<template>
    <Head title="Create User">
        <meta name="description" content="Create User" head-key="description" />
    </Head>
    <h1 class="text-3xl font-bold">Create New User</h1>
    <form @submit.prevent="handleSubmit">
        <div>
            <label for="name" class="block">Name</label>
            <input
                v-model="form.name"
                type="text"
                name="name"
                id="name"
                class="rounded-lg border-slate-400"
            />
        </div>
        <div class="mt-3">
            <label for="email" class="block">Email</label>
            <input
                v-model="form.email"
                type="email"
                name="email"
                id="email"
                class="rounded-lg border-slate-400"
            />
        </div>
        <div class="mt-3">
            <label for="password" class="block">Password</label>
            <input
                v-model="form.password"
                type="password"
                name="password"
                id="password"
                class="rounded-lg border-slate-400"
            />
        </div>
        <div class="mt-3">
            <button class="bg-emerald-300 text-white p-3 font-bold rounded-lg">
                Submit
            </button>
        </div>
    </form>
</template>
