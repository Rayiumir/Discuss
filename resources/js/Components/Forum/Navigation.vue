<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <ul class="space-y-2">
                <li>
                    <Link href="/">All Discussions</Link>
                </li>
                <li>
                    <Link href="/?filter[noreplies]=1">No replies</Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3";
</script>
