<template>
    <FixedForm v-if="visible">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">New discussion</h1>
                <button v-on:click="hideCreateDiscussion">&times;</button>
            </div>
        </template>
        <template v-slot:main>
            <div class="flex items-start space-x-3">
                <div class="flex-grow">
                    <div>
                        <InputLabel for="Title" value="Title" class="sr-only"></InputLabel>
                        <TextInput id="Title" type="text" class="w-full" placeholder="Discussion Title" v-model="form.title"></TextInput>
                        <InputError class="mt-2" :message="form.errors.title"></InputError>
                    </div>
                </div>
                <div>
                    <InputLabel for="topic" value="Topic" class="sr-only"></InputLabel>
                    <select id="topic" v-model="form.topic_id" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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
                <Textarea name="" id="" cols="6" rows="4" class="w-full" v-model="form.body"></Textarea>
                <InputError class="mt-2" :message="form.errors.body"></InputError>
            </div>
        </template>
        <template v-slot:button>
            <PrimaryButton> Create discussion </PrimaryButton>
        </template>
    </FixedForm>
</template>
<script setup lang="ts">
    import FixedForm from "@/Components/Forum/FixedForm.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import TextInput from "@/Components/TextInput.vue";
    import InputError from "@/Components/InputError.vue";
    // import Select from "@/Components/Select.vue";
    import Textarea from "@/Components/Textarea.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import useCreateDiscussion from "@/Composables/useCreateDiscussion";

    const { form, visible, hideCreateDiscussion } = useCreateDiscussion()
</script>
