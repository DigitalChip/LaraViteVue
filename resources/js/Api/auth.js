import api from './index'

const register = credentials => {
    return api.post('/register', {...credentials})
}

const login = credentials => {
    return api.post('/login', {...credentials})
}

const getCurrentUser = () => {
    return api.get('/user')
}


export default {
    register,
    login,
    getCurrentUser
}
