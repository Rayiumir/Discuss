<template>
    <FixedForm v-if="visible" v-on:submit.prevent="createPost" :form="form">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">Replying to {{ discussion.title }}</h1>
                <button v-on:click="hideCreatePost"><Svg name="icon-close" class="w-5 h-5"></Svg></button>
            </div>
        </template>
        <template v-slot:main="{ markdownPreviewEnabled }">
            <div>
                <InputLabel for="body" value="Body" class="sr-only"></InputLabel>
                <Textarea v-if="!markdownPreviewEnabled" name="body" id="body" class="w-full h-48 align-top" v-model="form.body"></Textarea>
                <InputError class="mt-2" :message="form.errors.body"></InputError>
            </div>
        </template>
        <template v-slot:button>
            <PrimaryButton> Reply </PrimaryButton>
        </template>
    </FixedForm>
</template>
<script setup lang="ts">
import FixedForm from "@/Components/Forum/FixedForm.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Textarea from "@/Components/Textarea.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import useCreatePost from "@/Composables/useCreatePost";
import Svg from "@/Components/Svg.vue";

const { form, visible, hideCreatePost, discussion } = useCreatePost()
const createPost = () =>  {
    form.post(route('posts.store', discussion.value), {
        onSuccess: () => {
            form.reset()
            hideCreatePost()
        }
    })
}
</script>
