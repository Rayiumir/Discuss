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
                            <div>
                                <span v-if="discussion.user_can.delete">
                                    <button class="text-indigo-700 text-sm" v-on:click="deleteDiscussion">Delete</button>
                                </span>
                            </div>
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
            <PrimaryButton v-on:click="showCreatePost(discussion)" class="w-full flex justify-center h-10" v-if="discussion.user_can.reply">Reply to discussion</PrimaryButton>
            <Navigation :query="query"/>
        </template>
    </HomeLayout>
</template>

<script setup>
import {Head, router} from '@inertiajs/vue3';
    import HomeLayout from "@/Layouts/HomeLayout.vue";
    import Pagination from "@/Components/Pagination.vue";
    import Post from "@/Components/Forum/Post.vue";
    import pluralize from "pluralize";
    import Navigation from "@/Components/Forum/Navigation.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import useCreatePost from "@/Composables/useCreatePost.js";
    import { onMounted, onUpdated, nextTick, watch } from "vue";
    import ScrollTos from 'vue-scrollto';

    const {showCreatePost} = useCreatePost();

    const props = defineProps({
        discussion: Object,
        posts: Array,
        query: Object,
        postId: Number
    })

    const scrollToPost = (postId) => {
        if (!postId) {
            return
        }

        nextTick(() => {
            ScrollTos.scrollTo(`#post-${postId}`, 500, { offset: -50 })
        })
    }

    onMounted(() => {
        scrollToPost(props.postId)
    })

    watch(() => props.postId, (postId) => {
        scrollToPost(postId)
    })

    const deleteDiscussion = () => {
        if (window.confirm('Are you sure?')) {
            router.delete(route('discussions.destroy', props.discussion))
        }
    }
</script>

