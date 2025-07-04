<script setup>
    import {Head, usePage} from '@inertiajs/vue3';
    import HomeLayout from "@/Layouts/HomeLayout.vue";
    import Select from "@/Components/Select.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import Discussion from "@/Components/Forum/Discussion.vue";
    import Pagination from "@/Components/Pagination.vue";
    // import * as discussions from "autoprefixer";
    const page = usePage()
    const discussions = page.props.discussions

</script>

<template>
    <Head title="Discuss Index" />
    <HomeLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <InputLabel for="topic" value="Topic" class="sr-only"/>
                    <Select id="topic">
                        <option value="">All Topics</option>
                        <option :value="topic.slug" v-for="topic in $page.props.topics" :key="topic.id">
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
            Sidebar
        </template>
    </HomeLayout>
</template>
