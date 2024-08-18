<script setup>
// import { Link } from "@inertiajs/vue3";

const props = defineProps({
    active: Boolean,
});

// export default {
//     components: { Link },
//     props: {
//         active: Boolean,
//     },
// };
// console.log(props.active);
</script>
<template>
    <Link
        class="hover:underline"
        :class="{
            'font-bold underline': active,
            // bisa pake $page.url.startsWith() atau pake $page.component ==
        }"
        ><slot
    /></Link>
</template>
