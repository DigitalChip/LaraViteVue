<template>
    <div class="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <router-link class="navbar-brand" :to="{name:'home'}">LARA-VITE-VUE</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <AppNavbar></AppNavbar>
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
import AppNavbar from '@/Components/Header/AppNavbar.vue'

export default {
    name: 'app',

    components: {
        AppNavbar
        // AppNavbar: ()=> import ('./Components/Header/AppNavbar.vue')
    }
}
</script>

<style>

</style>
