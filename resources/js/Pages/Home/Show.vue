<script setup>
import {Head, usePage} from '@inertiajs/vue3';
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import Post from "@/Components/Forum/Post.vue";
import pluralize from "pluralize";
import Navigation from "@/Components/Forum/Navigation.vue";

defineProps({
    discussion: Object,
    posts: Array,
    query: Object
})

</script>

<template>
    <Head :title="discussion.title" />
    <HomeLayout>
        <div class="space-y-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">{{ discussion.topic.title }}</span>
                        <h1 class="text-lg font-medium">
                            <template v-if="discussion.is_pinned">
                                [Pinned]
                            </template>
                            {{ discussion.title }}
                        </h1>
                    </div>
                    <div class="text-sm mt-3">
                        {{ pluralize('reply', discussion.replies_count, true) }}
                    </div>
                </div>
            </div>

            <template v-if="posts.data.length">
                <Post v-for="post in posts.data" :key="post.id" :post="post"/>
                <Pagination :pagination="posts.meta"/>
            </template>
        </div>
        <template #sidebar>
            <Navigation :query="query"/>
        </template>
    </HomeLayout>
</template>

