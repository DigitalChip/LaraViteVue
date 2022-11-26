<template>

    <div class="row">
        <div class="col-md-6 col-xs-12 offset-md-3">
            <h1 class="display-5">Registration</h1>
            <div class="lead mb-3">You can register on this site. Fill in your credentials and submit.</div>
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary px-5" :disabled="isSubmitting">Register</button>
            </form>
        </div>
    </div>

</template>

<script>
export default {
    name: "app-register",
    computed: {
        isSubmitting() {
            return this.$store.state.auth.isSubmitting
        }
    },
    methods: {
        onSubmit() {
            // this.$store.commit('registerStart')
            this.$store.dispatch('register', {
                name: 'ssadasdasd',
                email: 'asdasda@asdasd.ad',
                password: 'sfasfd'
            })
        }
    }
}
</script>

<style scoped>

</style>
