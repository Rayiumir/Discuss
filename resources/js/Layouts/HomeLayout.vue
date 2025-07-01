<template>
    <AuthenticatedLayout>
        <div class="py-12 max-w-7xl mx-auto space-y-6 md:space-y-0 md:grid grid-cols-7 gap-6 sm:px-6 lg:px-8">
            <div class="col-span-2 bg-black">
                <slot name="sidebar"/>
            </div>
            <div class="col-span-5 bg-green-300">
                <slot name="posts"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

