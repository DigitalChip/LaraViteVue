<template>
    <div>
        <h2>Home page</h2>
        <p>Counter: {{ count }}</p>

        <button class="btn btn-primary" @click="$store.commit('INCREMENT')">INCREMENT </button>
        <button class="btn btn-secondary" @click="$store.commit('DECREMENT')">Decrement </button>
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
