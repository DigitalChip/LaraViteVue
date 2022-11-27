import authApi from '@/Api/auth'

const state = {
    isSubmitting: false,
    currentUser: null,
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
    isLoggedIn: '[auth] isLoggedIn',
    isAnonymous: '[auth] isAnonymous',
}

const getters = {
    [gettersTypes.currentUser]: state => {
        return state.currentUser
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
        state.currentUser = payload
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
        state.currentUser = payload
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
                    context.commit(mutationTypes.registerSuccess, res.data.user)
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
                    context.commit(mutationTypes.loginSuccess, res.data.user)
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

// FAILTURE REGISTRATION JSON
// {
//     "success": false,
//     "message": "Validation Error!",
//     "data": {
//          "name": [
//              "Такое значение поля Имя уже существует."
//          ],
//              "email": [
//              "Такое значение поля E-Mail адрес уже существует."
//          ]
//      }
// }


// SUCCESSFULLY REGISTRATION JSON
// {
//     "success": true,
//     "data": {
//     "token": {
//         "name": "lara-vite-vue",
//         "abilities": [ "*" ],
//         "expires_at": null,
//         "tokenable_id": 68,
//         "tokenable_type": "App\\Models\\User",
//         "updated_at": "2022-11-26T18:40:53.000000Z",
//         "created_at": "2022-11-26T18:40:53.000000Z",
//         "id": 27
//     },
//     "user": {
//         "name": "Axel Mullen",
//             "email": "wuho@mailinator.com",
//             "updated_at": "2022-11-26T18:40:53.000000Z",
//             "created_at": "2022-11-26T18:40:53.000000Z",
//             "id": 68
//          }
//     },
//     "message": "User register successfully."
// }
