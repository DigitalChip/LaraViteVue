<template>

    <div class="row">
        <div class="col-md-6 col-xs-12 offset-md-3">
            <h1 class="display-5">Login</h1>
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" v-model="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" v-model="password">
                </div>

                <button type="submit" class="btn btn-primary px-5" :disabled="isSubmitting">Sign in</button>
            </form>
        </div>
    </div>

</template>

<script>
import {mapState} from 'vuex'
import {actionTypes} from '@/Store/modules/auth'

export default {
    name: "app-login",
    computed: {
        ...mapState({
            isSubmitting: state => state.auth.isSubmitting
        })
        // Or use old ES code
        // isSubmitting() {
        //     return this.$store.state.auth.isSubmitting
        // }
    },
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        onSubmit() {
            // this.$store.commit('registerStart')
            this.$store.dispatch(actionTypes.login, {
                email: this.email,
                password: this.password,
            }).then(user => {
                 console.log('USER REGISTERED: ', user)
                // this.$router.push({name: 'home'})
            })
        }
    }
}
</script>

<style scoped>

</style>
