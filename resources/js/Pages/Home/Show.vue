<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import Post from "@/Components/Forum/Post.vue";
// import * as discussions from "autoprefixer";
// const page = usePage()
// const discussions = page.props.discussions
defineProps({
    discussion: Object,
    posts: Array,
})

</script>

<template>
    <Head :title="discussion.title" />
    <HomeLayout>
        <div class="space-y-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">{{ discussion.topic.title }}</span>
                        <h1 class="text-lg font-medium">
                            <template v-if="discussion.is_pinned">
                                [Pinned]
                            </template>
                            {{ discussion.title }}
                        </h1>
                    </div>
                </div>
            </div>

            <template v-if="posts.data.length">
                <Post v-for="post in posts.data" :key="post.id" :post="post"/>
                <Pagination :pagination="posts.meta"/>
            </template>
        </div>
        <template #sidebar>
            Sidebar
        </template>
    </HomeLayout>
</template>

