import axs from './index'

const register = credentials => {
    return axs.post('/users', {user: credentials})
}

export default {
    register
}
