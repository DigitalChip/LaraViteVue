import authApi from '../../Api/auth'

const state = {
    isSubmitting: false
}
const mutations = {
    registerStart(state) {
        state.isSubmitting = true
    },
    registerSuccess(state) {
        state.isSubmitting = false
    },
    registerFailed(state) {
        state.isSubmitting = false
    }
}

const actions = {
    register(context, credentials) {
        return new Promise(resolve => {
            context.commit('registerStart')
            authApi.register(credentials)
                .then(response => {
                    console.log('response', response)
                    context.commit('registerSuccess', response.data.user)
                })
                .catch(result => {
                    console.log('Error: ', result)
                    context.commit('registerFailed')
                })
        })
        // setTimeout(()=>{context.commit('registerStop')},3000)

    }
}

export default {
    state,
    mutations,
    actions
}
