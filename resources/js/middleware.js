import router from '@/router'
import store from "@/store";

router.beforeEach(async (to, from) => {

    if (to.path.includes('login') && store.state.user) {
        return {path: '/sports/football'}
    }
})
