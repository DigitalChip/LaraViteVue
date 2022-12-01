<template>

    <div class="row">
        <div class="col-md-6 col-xs-12 offset-md-3">
            <h1 class="display-5">Registration</h1>
            <div class="lead mb-3">You can register on this site. Fill in your credentials and submit.</div>
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" v-model="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" v-model="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" v-model="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="password_confirmation"
                           v-model="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary px-5" :disabled="isSubmitting">Sign up</button>
            </form>
        </div>
    </div>

</template>

<script>
import {mapState} from 'vuex'
import {actionTypes} from '@/Store/modules/auth'

export default {
    name: "app-register",
    computed: {
        ...mapState({
            isSubmitting: state => state.auth.isSubmitting
        })
        // isSubmitting() {
        //     return this.$store.state.auth.isSubmitting
        // }
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    methods: {
        onSubmit() {
            // this.$store.commit('registerStart')
            this.$store.dispatch(actionTypes.register, {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(user => {
                // console.log('USER REGISTERED: ', user)
                this.$router.push({name: 'home'})
            })
        }
    }
}
</script>

<style scoped>

</style>
