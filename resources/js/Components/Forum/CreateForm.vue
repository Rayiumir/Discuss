<template>
    <FixedForm v-if="visible" v-on:submit.prevent="createDiscussion" :form="form">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">New discussion</h1>
                <button v-on:click="hideCreateDiscussion"><Svg name="icon-close" class="w-5 h-5"></Svg></button>
            </div>
        </template>
        <template v-slot:main="{ markdownPreviewEnabled }">
            <div class="flex items-start space-x-3">
                <div class="flex-grow">
                    <div>
                        <InputLabel for="Title" value="Title" class="sr-only"></InputLabel>
                        <TextInput id="Title" name="title" type="text" class="w-full" placeholder="Discussion Title" v-model="form.title"></TextInput>
                        <InputError class="mt-2" :message="form.errors.title"></InputError>
                    </div>
                </div>
                <div>
                    <InputLabel for="topic" value="Topic" class="sr-only"></InputLabel>
                    <select id="topic" name="topic_id" v-model="form.topic_id" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Choose a topic ...</option>
                        <option :value="topic.id" v-for="topic in $page.props.topics" :key="topic.id">
                            {{ topic.title }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.topic_id"></InputError>
                </div>

            </div>
            <div class="mt-4">
                <InputLabel for="body" value="Body" class="sr-only"></InputLabel>
                <Textarea v-if="!markdownPreviewEnabled" name="body" id="body" class="w-full h-48 align-top" v-model="form.body"></Textarea>
                <InputError class="mt-2" :message="form.errors.body"></InputError>
            </div>
        </template>
        <template v-slot:button>
            <PrimaryButton> Start Discussion </PrimaryButton>
        </template>
    </FixedForm>
</template>
<script setup lang="ts">
    import FixedForm from "@/Components/Forum/FixedForm.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import TextInput from "@/Components/TextInput.vue";
    import InputError from "@/Components/InputError.vue";
    import Textarea from "@/Components/Textarea.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import useCreateDiscussion from "@/Composables/useCreateDiscussion";
    import Svg from "@/Components/Svg.vue";

    const { form, visible, hideCreateDiscussion } = useCreateDiscussion()
    const createDiscussion = () =>  {
        form.post(route('discussion.store'), {
            onSuccess: () => {
                form.reset()
                hideCreateDiscussion()
            }
        })
    }
</script>
