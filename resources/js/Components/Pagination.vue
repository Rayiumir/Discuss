<template>
    <nav class="relative flex justify-center space-x-1">
        <template v-for="link in pagination.links" :key="link.label">
            <Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                class="px-3 py-1 border rounded hover:bg-gray-100"
            />
            <span
                v-else
                v-html="link.label"
                class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed"
            />
        </template>
    </nav>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3";

    defineProps({
        pagination: Object
    })
</script>
