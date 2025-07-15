<template>
    <markdown-toolbar class="flex items-center">
        <md-bold class="cursor-pointer py-1.5 px-1"><Svg name="icon-bold" class="w-5 h-5"></Svg></md-bold>
        <md-italic class="cursor-pointer py-1.5 px-1"><Svg name="icon-italic" class="w-5 h-5"></Svg></md-italic>
        <md-code class="cursor-pointer py-1.5 px-1"><Svg name="icon-code" class="w-5 h-5"></Svg></md-code>
        <md-link class="cursor-pointer py-1.5 px-1"><Svg name="icon-link" class="w-5 h-5"></Svg></md-link>
        <md-mention class="cursor-pointer py-1.5 px-1"><Svg name="icon-at" class="w-5 h-5"></Svg></md-mention>
    </markdown-toolbar>
</template>
<script>
    import Svg from "@/Components/Svg.vue";
    import {defineComponent} from "vue";

    export default defineComponent({
        components: {Svg}
    })

</script>

