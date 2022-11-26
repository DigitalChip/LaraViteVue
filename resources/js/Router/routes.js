const routes = [
    {
        path: '/',
        component: () => import('../Components/Pages/Home.vue'),
        name: 'home'
    },
    {
        path: '/about',
        component: () => import('../Components/Pages/About.vue'),
        name: 'about'
    },
    {
        path: '/register',
        component: () => import('../Components/Pages/Register.vue'),
        name: 'register'
    },

]

export default routes
