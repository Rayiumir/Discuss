<template>
    <AuthenticatedLayout>
        <div class="py-12 max-w-7xl mx-auto space-y-6 md:space-y-0 md:grid grid-cols-7 gap-6 sm:px-6 lg:px-8">
            <div class="col-span-2">
                <slot name="sidebar"/>
            </div>
            <div class="col-span-5">
                <slot/>
            </div>
        </div>
    </AuthenticatedLayout>
    <CreateForm/>
</template>

<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import CreateForm from "@/Components/Forum/CreateForm.vue";
</script>

