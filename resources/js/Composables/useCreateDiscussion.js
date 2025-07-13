import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";

const  visible = ref(false)
const form = useForm({
    topic_id: '',
    title: '',
    body: ''
})
export default () => {
    const showCreateDiscussion = () => {
        visible.value = true
    }
    const hideCreateDiscussion = () => {
        visible.value = false
    }
    return{
        form,
        visible,
        hideCreateDiscussion,
        showCreateDiscussion
    }
}
