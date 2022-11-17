
<template lang="">
    <div>
        {{ count }}
        <h1>Home</h1>
        <button class="button" @click="$store.commit('INCREMENT')">INCREMENT </button>
    </div>
</template>
<script>
import {mapState} from 'vuex'
export default {
    name: 'home',
    computed: {
        ...mapState({
            count: state => state.count
        })
    }
}
</script>
<style lang="">

</style>
