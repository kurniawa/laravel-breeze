<script setup>
// import { Link, router } from "@inertiajs/vue3";
import NavLink from "./NavLink.vue";
</script>
<template>
    <nav>
        <ul class="flex text-sky-500 space-x-4 list-inside list-disc">
            <li>
                <Link
                    class="hover:underline"
                    href="/"
                    :class="{ 'font-bold underline': $page.url == '/' }"
                    >Home</Link
                >
            </li>
            <li>
                <!-- <Link
                    class="hover:underline"
                    href="/users"
                    :class="{
                        'font-bold underline': $page.url.startsWith('/users'),
                        // bisa pake $page.url.startsWith() atau pake $page.component ==
                    }"
                    >Users</Link
                > -->
                <NavLink
                    href="/users"
                    :active="$page.component === 'Users/Index'"
                    >Users</NavLink
                >
            </li>
            <li>
                <Link
                    class="hover:underline"
                    href="/settings"
                    :class="{
                        'font-bold underline': $page.component == 'Settings',
                    }"
                    >Settings</Link
                >
            </li>
            <li>
                <Link
                    class="hover:underline"
                    href="/logout"
                    method="POST"
                    :data="{ foo: 'bar' }"
                    as="button"
                    >Log Out</Link
                >
            </li>
        </ul>
    </nav>
</template>
