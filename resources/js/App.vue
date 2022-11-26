<template>
    <div class="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="#">LARA-VITE-VUE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <Navbar></Navbar>
                    </div>
                </div>
            </nav>

            <div class="container mt-3">
                <router-view></router-view>
            </div>

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
        // Navbar: ()=> import ('./Components/Header/Navbar.vue')
    }
}
</script>

<style>

</style>
