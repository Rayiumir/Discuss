import {ref} from 'vue'

const  visible = ref(false)
export default () => {
    const showCreateDiscussion = () => {
        visible.value = true
    }
    const hideCreateDiscussion = () => {
        visible.value = false
    }
    return{
        visible,
        showCreateDiscussion,
        hideCreateDiscussion
    }
}
