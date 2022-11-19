import './bootstrap'

import {createApp} from 'vue'
import App from './App.vue'
import router from './Router/index'
import store from "./Store/index";

const app = createApp(App)
app.use(router)
.use(store)
.mount('#app')
