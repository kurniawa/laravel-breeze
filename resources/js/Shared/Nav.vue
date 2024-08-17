<script setup>
import { Link, router } from "@inertiajs/vue3";
</script>
<template>
    <nav>
        <ul class="flex gap-2 text-sky-500">
            <li>
                <Link
                    class="hover:underline"
                    href="/"
                    :class="{ 'font-bold underline': $page.url == '/' }"
                    >Home</Link
                >
            </li>
            <li>
                <Link
                    class="hover:underline"
                    href="/users"
                    :class="{
                        'font-bold underline': $page.url.startsWith('/users'),
                        // bisa pake $page.url.startsWith() atau pake $page.component ==
                    }"
                    >Users</Link
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
                    >Log Out</Link
                >
            </li>
        </ul>
    </nav>
</template>
