import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";

const  visible = ref(false)
const  discussion = ref(null)
const user = ref(null)
const form = useForm({
    body: ''
})
export default () => {
    const showCreatePost = (discussionContext, userContext = null) => {
        discussion.value = discussionContext
        user.value = userContext
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
        discussion,
        user
    }
}
