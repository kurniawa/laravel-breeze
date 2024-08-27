<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import Layout from "@/Shared/Layout.vue";
import { reactive, ref, watch } from "vue";
// let form = reactive({
//     name: "",
//     email: "",
//     password: "",
// });
let form = useForm({
    name: "",
    email: "",
    password: "",
});

let is_posted = ref(false);

defineProps({
    errors: Object,
});

watch(form, (value) => {
    console.log(value);
});

// let handleSubmit = () => {
//     is_posted.value = true;
//     router.post("/users/store", form, {
//         onStart: () => (is_posted.value = true),
//         onFinish: () => (is_posted.value = false),
//     });
// };

let handleSubmit = () => {
    form.post("/users/store");
};

// Kalau menggunakan useForm, sudah tidak perlu lagi import router, sudah tidak perlu lagi iniliasisasi onStart dan onFinish
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
            <div
                v-if="form.errors.name"
                v-text="form.errors.name"
                c
                lass="text-red-400"
            ></div>
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
            <div
                v-if="errors.name"
                v-text="errors.name"
                class="text-red-400"
            ></div>
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
            <div
                v-if="errors.name"
                v-text="errors.name"
                class="text-red-400"
            ></div>
        </div>
        <div class="mt-3">
            <button
                class="bg-emerald-300 text-white p-3 font-bold rounded-lg"
                :disabled="is_posted"
            >
                Submit
            </button>
        </div>
    </form>
</template>
