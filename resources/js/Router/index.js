// import VueRouter from 'vue-router'

// const router = createRouter({
// //     history: createWebHistory(),
// //     routes: routes,
// // })


// const router = new VueRouter({
//     mode: 'history',
//     routes,
// })

import { createRouter, createWebHistory} from 'vue-router'
import routes from './routes'


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
