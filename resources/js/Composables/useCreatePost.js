import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";

const  visible = ref(false)
const  discussion = ref(null)
const form = useForm({
    body: ''
})
export default () => {
    const showCreatePost = (discussionContext) => {
        discussion.value = discussionContext
        visible.value = true
    }
    const hideCreatePost = () => {
        visible.value = false
    }
    return{
        form,
        visible,
        hideCreatePost,
        showCreatePost,
        discussion
    }
}
