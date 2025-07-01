<script setup>
    import { Head } from '@inertiajs/vue3';
    import HomeLayout from "@/Layouts/HomeLayout.vue";
</script>

<template>
    <Head title="Discuss Index" />
    <HomeLayout>
        <template #posts>
            Posts
        </template>
        <template #sidebar>
            Sidebar
        </template>
    </HomeLayout>
</template>
