<template>
    <ul class="navbar-nav">
        <li class="nav-item">
            <router-link class="nav-link" :to="{name:'home'}">Home</router-link>
        </li>
        <template v-if="isLoggedIn">
            <li class="nav-item">
                <router-link class="nav-link" :to="{name:'about'}">About</router-link>
            </li>
        </template>

        <template v-if="isAnonymous">
            <li class="nav-item me-2">
                <router-link class="nav-link" :to="{name:'register'}">Sign up</router-link>
            </li>
            <li class="nav-item me-2">
                <router-link class="nav-link" :to="{name:'login'}">Sign in</router-link>
            </li>
        </template>

        <template v-if="isLoggedIn">
            <li class="nav-item me-2">
                <router-link class="nav-link" :to="{name:'login'}">{{ currentUser.name }}</router-link>
            </li>
        </template>

    </ul>
</template>

<script>
// import {mapState} from "vuex"

import {mapGetters} from "vuex"
import {gettersTypes} from "@/Store/modules/auth"

export default {
    name: 'app-navbar',
    computed:{
        ...mapGetters({
            currentUser: gettersTypes.currentUser,
            isLoggedIn: gettersTypes.isLoggedIn,
            isAnonymous: gettersTypes.isAnonymous
        })

        // ...mapState({
        //     // currentUser: state => state.auth.currentUser,
        //     // isLoggedIn: state => state.auth.isLoggedIn
        // }),
        // currentUser(){
        //     return this.$store.getters[gettersTypes.currentUser]
        // },
        // isLoggedIn(){
        //     return this.$store.getters[gettersTypes.isLoggedIn]
        // },
        // isAnonymous(){
        //     return this.$store.getters[gettersTypes.isAnonymous]
        // },
    }
}
</script>

<style>

</style>
