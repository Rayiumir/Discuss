<template>
    <FixedForm v-if="visible">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">New siscussion</h1>
                <button v-on:click="hideCreateDiscussion">&times;</button>
            </div>
        </template>
        <template v-slot:main>
            <div class="flex items-start space-x-3">
                <div class="flex-grow">
                    <div>
                        <InputLabel for="Title" value="Title" class="sr-only"></InputLabel>
                        <TextInput id="Title" type="text" class="w-full"></TextInput>
                        <InputError class="mt-2"></InputError>
                    </div>
                </div>
                <div>
                    <Select id="topic">
                        <option value="">Choose a topic</option>
                        <option :value="topic.slug" v-for="topic in $page.props.topics" :key="topic.id">
                            {{ topic.title }}
                        </option>
                    </Select>
                </div>

            </div>
            <div class="mt-4">
                <Textarea name="" id="" cols="6" rows="4" class="w-full" placeholder="Body"></Textarea>
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
    import Select from "@/Components/Select.vue";
    import Textarea from "@/Components/Textarea.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import useCreateDiscussion from "@/Composables/useCreateDiscussion";

    const { visible } = useCreateDiscussion()
</script>
