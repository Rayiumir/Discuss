<template>
    <div :id="`post-${post.id}`" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex items-center space-x-3">
            <div class="flex-grow">
                <div class="flex items-start space-x-3">
                    <div class="w-7 flex-shrink-0">
                        <img :src="post.user?.avatar_url" class="w-7 h-7 rounded-full" alt="" v-if="post.user">
                    </div>
                    <div class="w-full">
                        <div>
                            <div>{{ post.user?.username || '[user deleted]' }}</div>
                            <div class="text-sm text-gray-500">Posted <time :datetime="post.created_at.datetime" :title="post.created_at.datetime">{{ post.created_at.human }}</time></div>
                        </div>
                        <div class="mt-3">
                            <form v-if="editing">
                                <InputLabel for="body" value="body" class="sr-only">Edit Post</InputLabel>
                                <Textarea v-model="editForm.body" id="body" class="w-full" rows="8"/>
                                <InputError  class="mt-2" :message="editForm.errors.body"/>
                                <div class="mt-3 flex items-center space-x-3">
                                    <PrimaryButton>
                                        Edit
                                    </PrimaryButton>
                                    <button type="button" v-on:click="editing = false" class="text-gray-800 text-sm">Cancel</button>
                                </div>
                            </form>
                            <div v-else v-html="post.body_markdown" class="markdown"></div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span v-if="post.discussion.user_can.reply">
                                <button v-on:click="showCreatePost(post.discussion)" class="text-indigo-500 text-sm">Reply</button>
                            </span>
                            <span v-if="post.user_can.edit">
                                <button v-on:click="editing = true" class="text-indigo-500 text-sm">Edit</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import useCreatePost from "@/Composables/useCreatePost.js";
    import {useForm} from "@inertiajs/vue3";
    import {ref} from "vue";
    import Textarea from "@/Components/Textarea.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import InputError from "@/Components/InputError.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    const {showCreatePost} = useCreatePost()

    const props = defineProps({
        post: Object
    })

    const editing = ref(false)

    const editForm = useForm({
        body: props.post.body
    })

</script>

