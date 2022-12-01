import authApi from '@/Api/auth'

const state = {
    isSubmitting: false,
    currentUser: null,
    userToken: null,
    validationErrors: null,
    isLoggedIn: null,
    isAnonymous: null
}

export const mutationTypes = {
    registerStart: '[auth] registerStart',
    registerSuccess: '[auth] registerSuccess',
    registerFailure: '[auth] registerFailure',
    loginStart: '[auth] loginStart',
    loginSuccess: '[auth] loginSuccess',
    loginFailure: '[auth] loginFailure',
}

export const actionTypes = {
    register: '[auth] register',
    login: '[auth] login',
}

export const gettersTypes = {
    currentUser: '[auth] currentUser',
    userToken: '[auth] userToken',
    isLoggedIn: '[auth] isLoggedIn',
    isAnonymous: '[auth] isAnonymous',
}

const getters = {
    [gettersTypes.currentUser]: state => {
        return state.currentUser
    },
    [gettersTypes.userToken]: state => {
        return state.userToken
    },
    [gettersTypes.isLoggedIn]: state => {
        return Boolean(state.isLoggedIn)
    },
    [gettersTypes.isAnonymous]: state => {
        return state.isLoggedIn === false
    },
}

const mutations = {
    [mutationTypes.registerStart](state) {
        state.isSubmitting = true
        state.validationErrors = null
    },
    [mutationTypes.registerSuccess](state, payload) {
        state.isSubmitting = false
        state.currentUser = payload.user
        state.userToken = payload.token
        state.isLoggedIn = true
    },
    [mutationTypes.registerFailure](state, payload) {
        state.isSubmitting = false
        state.validationErrors = payload
    },

    [mutationTypes.loginStart](state) {
        state.isSubmitting = true
        state.validationErrors = null
    },
    [mutationTypes.loginSuccess](state, payload) {
        state.isSubmitting = false
        state.currentUser = payload.user
        state.userToken = payload.token
        state.isLoggedIn = true
    },
    [mutationTypes.loginFailure](state, payload) {
        state.isSubmitting = false
        state.validationErrors = payload
    }
}

const actions = {
    [actionTypes.register](context, credentials) {
        return new Promise(resolve => {
            context.commit(mutationTypes.registerStart)
            authApi.register({
                ...credentials          // Use decomposition ES6 or use old ES5
                // name: credentials.name,
                // email: credentials.email,
                // password: credentials.password,
                // confirm_password: credentials.confirm_password
            })
                .then(response => {
                    const res = response.data
                    context.commit(mutationTypes.registerSuccess, res.data)
                    // console.log('Success: ', res.message)
                    resolve(res)
                })
                .catch(result => {
                    const res = result.response.data
                    context.commit(mutationTypes.registerFailure, res)
                    console.log('Error: ', res)
                    // console.log('Error: ', res.message)
                    // console.log('Error: ', res.data)
                })
        })
    },
    [actionTypes.login](context, credentials) {
        return new Promise(resolve => {
            context.commit(mutationTypes.loginStart)
            authApi.login({
                ...credentials          // Use decomposition ES6 or use old ES5
                // email: credentials.email,
                // password: credentials.password,
            })
                .then(response => {
                    const res = response.data
                    context.commit(mutationTypes.loginSuccess, res.data)
                    // console.log('Success: ', res.message)
                    resolve(res)
                })
                .catch(result => {
                    const res = result.response.data
                    context.commit(mutationTypes.loginFailure, res)
                    console.log('Error: ', res)
                    // console.log('Error: ', res.message)
                    // console.log('Error: ', res.data)
                })
        })
    }
}

export default {
    state,
    getters,
    mutations,
    actions,
}
