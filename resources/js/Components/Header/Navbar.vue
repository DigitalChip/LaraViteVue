<template>
    <div class="navBar">
        <ul class="nav nav-tabs">
           <li class="nav-item"><router-link :to="{name:'home'}" class="nav-link" >Home</router-link></li>
           <li class="nav-item"><router-link :to="{name:'about'}" class="nav-link" >About</router-link></li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'navbar'
    }
</script>

<style>

</style>
