<template>
    <ul class="navbar-nav">
        <li class="nav-item">
            <router-link class="nav-link" :to="{name:'home'}">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{name:'about'}">About</router-link>
        </li>
        <li class="nav-item me-2">
            <router-link class="nav-link" :to="{name:'register'}">Registration</router-link>
        </li>
    </ul>

</template>

<script>
export default {
    name: 'navbar'
}
</script>

<style>

</style>
