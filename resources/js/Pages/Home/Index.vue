<script setup>
    import { Head } from '@inertiajs/vue3';
    import HomeLayout from "@/Layouts/HomeLayout.vue";
    import Select from "@/Components/Select.vue";
    import InputLabel from "@/Components/InputLabel.vue";
</script>

<template>
    <Head title="Discuss Index" />
    <HomeLayout>
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
        <template #sidebar>
            Sidebar
        </template>
    </HomeLayout>
</template>
