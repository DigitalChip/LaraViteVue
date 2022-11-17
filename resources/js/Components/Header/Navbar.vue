<template lang="">
    <nav class="navBar">
        <ul class="navBar_link">
           <li><router-link  :to="{name:'home'}">Home</router-link></li>
           <li><router-link  :to="{name:'about'}">About</router-link></li>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'navbar'
}
</script>
<style lang="">

</style>
