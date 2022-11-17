// require('./bootstrap')

// import Vue from 'vue'
// import VueRouter from 'vue-router';

import 'bootstrap'

import {createApp} from 'vue'
import App from './App.vue'
import router from './Router/index'
// import store from './Store/index';


// let app=new createApp({
//     el: '#app',
//     router,
//     // store,
//     components: {App}
// })
const app = createApp(App)
app.use(router)
app.mount('#app')


// createApp(App).mount("#app")
