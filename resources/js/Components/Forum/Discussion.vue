<template>
    <Link :href="route('single.show', discussion)">
        <div  class="block bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
            <div class="p-3 text-gray-900 flex items-center space-x-3">
                <div class="flex-grow">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">{{ discussion.topic.title }}</span>
                        <h1 class="text-lg font-medium">
                            <template v-if="discussion.isPinned">
                                [Pinned]
                            </template>
                            {{ discussion.title }}
                        </h1>
                    </div>
                    <div v-if="discussion.post" class="text-gray-500 text-sm mt-3 line-clamp-1">
                        {{ discussion.post.body_preview }}
                    </div>
                    <div v-else>
                        Not Post
                    </div>

                    <div v-if="discussion.latest_post" class="inline-block text-sm mt-6">
                        <Link :href="`${route('single.show', discussion)}?post=${discussion.latest_post.id}`">
                            Last post by {{ discussion.latest_post.user?.username || '[user deleted]'}} at <time :datetime="discussion.latest_post.created_at.datetime" :title="discussion.latest_post.created_at.datetime">{{ discussion.latest_post.created_at.human }}</time>
                        </Link>
                    </div>
                    <div v-else class="text-sm mt-6">
                        No posts yet
                    </div>

                </div>
                <div class="flex-shrink-0 flex flex-col items-end">
                    <div class="flex items-center justify-start -space-x-1">
                        <img :src="participant.avatar_url" v-for="participant in participants" :key="participant.id" class="h-6 w-6 rounded-full ring-2 ring-white first-of-type:w-7 first-of-type:h-7" :title="participant.username">
                        <span class="!ml-1 text-sm text-gray-600" v-if="discussion.participants.length > 3">+ {{ discussion.participants.length - 3}} more</span>
                    </div>
                    <div class="text-sm mt-3">
                        {{ pluralize('reply', discussion.replies_count, true)}}
                    </div>
                </div>
            </div>
        </div>
    </Link>
</template>
<script setup>
    import { Link } from "@inertiajs/vue3";
    import { computed } from "vue";
    import pluralize from "pluralize";

    const props = defineProps({
        discussion: Object
    })

    const participants = computed(() => props.discussion.participants.slice(0, 3))
</script>

