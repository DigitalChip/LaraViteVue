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
    }
]

export default routes
