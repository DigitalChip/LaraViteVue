import Vuex from 'vuex'

import auth from './modules/auth'

const store = new Vuex.Store({
    state: {
        count: 6,
    },
    mutations: {
        INCREMENT(state) {
            state.count++
        },
        DECREMENT(state) {
            state.count--
        },
    },
    actions: {},
    modules:{
        auth
    }
})

export default store;
