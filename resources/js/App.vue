<template lang="">
    <div class="app">
        <h1 class="btn btn-primary">хоть что ниубдь</h1>
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>
<script>

// import './Styles/app.scss'

export default {
    name: 'app',
    components: {
        Navbar: () => import('./Components/Header/Navbar.vue')
    }
}
</script>
