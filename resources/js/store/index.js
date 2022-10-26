import {createStore} from "vuex";

const $app = JSON.parse(document.head.querySelector('meta[name="data"]').content)

export default createStore({
    state() {
        return {
            user: $app.user
        }
    },
    mutations: {

    },
    getters: {

    }
})
