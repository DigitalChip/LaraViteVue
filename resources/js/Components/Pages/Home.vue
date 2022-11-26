<template>
    <div>
        <h2>Home page</h2>
        <p class="p-3 text-bg-info">Counter: {{ count }}</p>

        <button class="btn btn-primary me-2" @click="$store.commit('INCREMENT')">INCREMENT</button>
        <button class="btn btn-secondary" @click="$store.commit('DECREMENT')">Decrement</button>
    </div>

    <p class="mt-4">Data from userID {{ user.id }}: <strong> {{ user.name }}</strong> &lt;<a
        href="{{ user.email }}">{{ user.email }}</a>&gt;</p>

    <UserForm></UserForm>

    <h3>List of available users:</h3>
    <strong>Users count: {{ userscount }}</strong>
    <ol>
        <li v-for="user in usersData.users">{{ user.name }} &lt;<a href="{{ user.email }}">{{ user.email }}</a>&gt;</li>
    </ol>

</template>


<script>
import {mapState} from 'vuex'
import UserForm from '../UserAddForm.vue'

// url: 'http://laraprj.loc/api/v1/user/${id}'

axios.defaults.baseURL = 'http://laraprj.loc/api/v1'

export default {
    name: 'home',
    computed: {
        ...mapState({
            count: state => state.count
        }),
        userscount: function () { this.usersData.usersCount},
    },
    components: {
        UserForm
    },
    data() {
        return {
            user: {},
            usersData: {}
        }
    },

    mounted() {
        this.getUser(5)
        this.getUserData()
    },

    methods: {
        getUser(id) {
            axios({
                url: `/user/${id}`,
                responseType: 'json'
            })
                .then(response => (this.user = response.data.user))
                .catch(error => console.log('ERROR: ' + error.message))
        },
        getUserData() {
            axios({
                url: `/users`,
                responseType: 'json'
            })
                .then(response => (this.usersData = response.data))
                .catch(error => console.log('ERROR: ' + error.message))
        }
    },
}
</script>

<style lang="">

</style>
