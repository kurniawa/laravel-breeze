<script setup>
import Nav from "@/Shared/Nav.vue";
import { Head } from "@inertiajs/vue3";
</script>
<template>
    <Head>
        <!-- <title>Breeze</title> -->
        <meta
            name="description"
            content="Information about my app"
            head-key="description"
        />
    </Head>
    <section class="p-6 bg-slate-200">
        <header class="flex justify-between">
            <h1 class="font-bold text-2xl">My App</h1>
            <Nav></Nav>
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>
