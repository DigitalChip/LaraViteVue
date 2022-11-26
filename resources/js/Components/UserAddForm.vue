<template>
    <form method="POST" @submit.prevent="onSubmit">
        <div class="row py-4">
            <div class="col">
                <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Имя">
            </div>
            <div class="col">
                <input name="email" type="text" class="form-control" placeholder="E-mail" aria-label="Фамилия">
            </div>
            <div class="col">

                <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Send</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "UserAddForm",
    computed: {
        isSubmitting() {
            return this.$store.state.auth.isSubmitting
        }
    },
    methods: {
        onSubmit() {
            // this.$store.commit('registerStart')
            this.$store.dispatch('register')
        }
    }


}
</script>

<style scoped>

</style>
