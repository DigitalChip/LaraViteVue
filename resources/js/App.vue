<template>
    <div class="app">
        <p class="">Ниже идет NavBar и RouterView</p>
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>

import '../scss/app.scss'

import Navbar from './Components/Header/Navbar.vue'
// const Navbar = () => import('./Components/Header/Navbar.vue')

export default {
    name: 'app',

    components: {
        Navbar
        // 'Navbar': ()=> import ('./Components/Header/Navbar.vue')
    }
}
</script>

<style>

</style>
