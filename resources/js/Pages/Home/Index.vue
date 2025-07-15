<script setup>
    import {Head, usePage, router} from '@inertiajs/vue3';
    import HomeLayout from "@/Layouts/HomeLayout.vue";
    import Select from "@/Components/Select.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import Discussion from "@/Components/Forum/Discussion.vue";
    import Pagination from "@/Components/Pagination.vue";
    import Navigation from "@/Components/Forum/Navigation.vue";
    import _omitBy  from 'lodash.omitby';
    import _isEmpty from 'lodash.isempty';
    import useCreateDiscussion from "@/Composables/useCreateDiscussion.js";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    const page = usePage()

    defineProps({
        discussions: Object,
        query: Object
    })

    const { showCreateDiscussion } = useCreateDiscussion()

    const filterTopic = (e) => {
        router.visit('/', {
            data: _omitBy({
                    'filter[topic]':  e.target.value
                },_isEmpty),
            preserveScroll: true
        })
    }

</script>

<template>
    <Head title="Discuss Index" />
    <HomeLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <InputLabel for="topic" value="Topic" class="sr-only"/>
                    <Select id="topic" v-on:change="filterTopic">
                        <option value="">All Topics</option>
                        <option :value="topic.slug" v-for="topic in $page.props.topics" :key="topic.id" :selected="query.filter?.topic === topic.slug">
                            {{ topic.title }}
                        </option>
                    </Select>
                </div>
            </div>
            <div class="space-y-3">
                <Discussion v-for="discussion in discussions.data" :key="discussion.id" :discussion="discussion"/>

                <Pagination :pagination="discussions.meta"/>
            </div>
        </div>
        <template #sidebar>
            <PrimaryButton v-on:click="showCreateDiscussion" class="w-full flex justify-center h-10" v-if="$page.props.auth.user">Start a discussion</PrimaryButton>
            <Navigation :query="query"/>
        </template>
    </HomeLayout>
</template>
