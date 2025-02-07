import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/index',
        component: () => import('./Pages/Index.vue'),
        meta: { requiresAuth: true } // Requires authentication
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
