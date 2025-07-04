<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Pagination from "@/Components/Pagination.vue";
// import * as discussions from "autoprefixer";
// const page = usePage()
// const discussions = page.props.discussions
defineProps({
    discussion: Object
})

</script>

<template>
    <Head :title="discussion.title" />
    <HomeLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ discussion.title }}
                </div>
            </div>
        </div>
        <template #sidebar>
            Sidebar
        </template>
    </HomeLayout>
</template>

