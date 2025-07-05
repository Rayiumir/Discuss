<template>
    <div  class="block bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex items-center space-x-6">
            <div class="flex-grow">
                <div class="flex items-center space-x-3">
                    {{ post.body }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        post: Object
    })
</script>

