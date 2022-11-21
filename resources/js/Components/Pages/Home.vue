<template>
    <div>
        <h2>Home page</h2>
        <p>Counter: {{ count }}</p>

        <button class="btn btn-primary" @click="$store.commit('INCREMENT')">INCREMENT </button>
        <button class="btn btn-secondary" @click="$store.commit('DECREMENT')">Decrement </button>
    </div>
    <p>Name is: {{ user.data.user.name }}</p>
</template>


<script>
import { mapState } from 'vuex'

export default {
    name: 'home',
    computed: {
        ...mapState({
            count: state => state.count
        })
    },
    data() {
        return {
            user: {
                data: {user: {name:{}}}
            }
        }
    },
    mounted() {
        try {
            this.getUser(5)
        } catch (e) {
            console.log('error');
        }
    },
    methods: {
        // url: 'http://laraprj.loc/api/v1/user/${id}'
        getUser(id) {
            axios({
                url: "http://laraprj.loc/api/v1/user/" + id,
                responseType: 'json'
            }).then(response => (this.user = response));

        },
    },
}
</script>

<style lang="">

</style>
