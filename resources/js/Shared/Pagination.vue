<script setup>
defineProps({
    links: Array,
});
</script>
<template>
    <!-- <Component
        v-for="link in links"
        :is="link.url ? 'Link' : 'span'"
        :href="link.url"
        v-html="link.label"
        class="px-1"
        :class="link.url ? '' : 'text-slate-400'"
    /> -->
    <Component
        v-for="link in links"
        :is="link.url ? 'Link' : 'span'"
        :href="link.url"
        v-html="link.label"
        class="px-1"
        :class="{ 'text-slate-400': !link.url, 'font-bold': link.active }"
        preserve-scroll
    />
</template>
