import Vuex from 'vuex'

const store = new Vuex.Store({
    state: {
        count: 0,
    },
    mutations: {
        INCREMENT(state) {
            state.count++
        },
        DECREMENT(state) {
            state.count--
        },
    },
    actions: {}
})

export default store;
